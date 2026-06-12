<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();
        $menus = Menu::withCount('recipeItems')
            ->latest()
            ->paginate(12);

        $stats = [
            'total_menu' => Menu::count(),
            'active_menu' => Menu::where('status', 'available')->count(),
            'inactive_menu' => Menu::where('status', 'unavailable')->count(),
            'total_category' => Category::count(),
        ];

        $inventories = Inventory::orderBy('name')->get();

        return view('menu.index', compact(
            'menus',
            'categories',
            'inventories',
            'stats'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'images' => ['nullable', 'array'],              // Validasi input form array
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required'],
        ]);

        // 1. Proses upload banyak gambar jika ada
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('menus', 'public');
            }
        }

        // 2. Masukkan array path gambar ke dalam key 'image' (sesuai kolom DB Anda)
        $validated['image'] = $imagePaths;

        // 3. Simpan ke database
        Menu::create($validated);

        return back()->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:150'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required'],
        ]);

        // Jika user mengupload gambar-gambar baru
        if ($request->hasFile('images')) {
            // Hapus foto-foto lama yang ada di dalam array database
            if (is_array($menu->image)) {
                foreach ($menu->image as $oldPath) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $imagePaths[] = $file->store('menus', 'public');
            }

            $validated['image'] = $imagePaths;
        }

        $menu->update($validated);

        return back()->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()->with(
            'success',
            'Menu berhasil dihapus.'
        );
    }
}
