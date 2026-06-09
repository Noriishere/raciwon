<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

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

        $stats = [
            'total_menu' => Menu::count(),
            'active_menu' => Menu::where('status', 'available')->count(),
            'inactive_menu' => Menu::where('status', 'unavailable')->count(),
            'total_category' => Category::count(),
        ];

        return view('admin.menu.index', compact(
            'menus',
            'categories',
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
            'image' => ['nullable', 'image'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('image')) {

            $validated['image'] =
                $request->file('image')->store('menus', 'public');
        }

        Menu::create($validated);

        return back()->with(
            'success',
            'Menu berhasil ditambahkan.'
        );
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
            'image' => ['nullable', 'image'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('image')) {

            $validated['image'] =
                $request->file('image')->store('menus', 'public');
        }

        $menu->update($validated);

        return back()->with(
            'success',
            'Menu berhasil diperbarui.'
        );
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
