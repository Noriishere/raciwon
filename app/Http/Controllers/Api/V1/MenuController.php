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
            // Generate URL lengkap untuk gambar utama
            $imageUrl = $menu->image ? asset('storage/'.$menu->image) : null;

            // Masukkan URL lengkap ke dalam array images
            $imagesArray = $imageUrl ? [$imageUrl] : [];

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
                'image' => $imageUrl, // Sekarang outputnya jadi: http://domain-kamu.com/storage/menus/file.jpg
                'images' => $imagesArray,
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

        $imagesArray = $menu->image ? [$menu->image] : [];

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
                'image' => $menu->image,
                'images' => $imagesArray,
            ],
        ]);
    }
}
