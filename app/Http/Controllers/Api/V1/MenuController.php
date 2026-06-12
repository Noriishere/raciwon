<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $menus = Menu::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->paginate(12);

        $transformedMenus = $menus->getCollection()->map(function ($menu) {
            
          $rawImage = $menu->image;
            $imagesArray = [];

            // 1. Jika data berupa string yang dipisahkan koma (contoh: "menus/a.png,menus/b.png")
            if (is_string($rawImage) && str_contains($rawImage, ',')) {
                $rawImage = explode(',', $rawImage);
            } 
            // 2. Jika data berupa JSON string (contoh: '["menus/a.png"]')
            elseif (is_string($rawImage) && str_starts_with(trim($rawImage), '[')) {
                $rawImage = json_decode($rawImage, true);
            }

            // 3. Ubah semua path menjadi URL utuh
            if (is_array($rawImage)) {
                foreach ($rawImage as $path) {
                    // Bersihkan path dari spasi atau karakter sisa
                    $cleanPath = trim(str_replace(['"', '[', ']', '\\'], '', $path));
                    if (!empty($cleanPath)) {
                        $imagesArray[] = asset('storage/' . $cleanPath);
                    }
                }
            } elseif (is_string($rawImage) && !empty($rawImage)) {
                $imagesArray[] = asset('storage/' . trim($rawImage));
            }

            // Ambil gambar pertama sebagai cover
            $mainImageUrl = count($imagesArray) > 0 ? $imagesArray[0] : null;

            return [
                'id' => $menu->id,
                'name' => $menu->name,
                'category' => $menu->category ? $menu->category->name : null,
                'price' => (int) $menu->price,
                'sold' => '0',
                'stock' => 10,
                'quantity' => 0,
                'notes' => '',
                'activeImageIndex' => 0,
                'image' => $mainImageUrl, // Gambar utama (String URL tunggal)
                'images' => $imagesArray, // Kumpulan semua gambar (Array URL)
            ];
        });

        $menus->setCollection($transformedMenus);

        return response()->json([
            'status' => 'success',
            'data' => $menus,
        ]);
    }

    public function show(Menu $menu)
    {
        $menu->load('category');

        $imagesArray = [];

        if (is_array($menu->image)) {
            foreach ($menu->image as $path) {
                $imagesArray[] = asset('storage/' . $path);
            }
        } elseif (is_string($menu->image) && !empty($menu->image)) {
            $imagesArray[] = asset('storage/' . $menu->image);
        }

        $mainImageUrl = count($imagesArray) > 0 ? $imagesArray[0] : null;

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $menu->id,
                'name' => $menu->name,
                'category' => $menu->category ? $menu->category->name : null,
                'price' => (int) $menu->price,
                'sold' => '0',
                'stock' => 10,
                'quantity' => 0,
                'notes' => '',
                'activeImageIndex' => 0,
                'image' => $mainImageUrl,
                'images' => $imagesArray,
            ],
        ]);
    }
}