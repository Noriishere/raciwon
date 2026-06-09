<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display category list
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::withCount('menus')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");

                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $stats = [
            'total_categories' => Category::count(),
            'used_categories' => Category::has('menus')->count(),
            'empty_categories' => Category::doesntHave('menus')->count(),
            'total_menu' => Menu::count(),
        ];

        return view('categories.index', compact(
            'categories',
            'stats'
        ));
    }

    /**
     * Store new category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:100', 'unique:categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        Category::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Show category detail
     */
    public function show(Category $category)
    {
        $category->loadCount('menus');

        return response()->json($category);
    }

    /**
     * Update category
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'icon' => ['required', 'string', 'max:255'],
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')
                    ->ignore($category->id),
            ],
            'description' => ['nullable', 'string'],
        ]);

        $category->update($validated);

        return redirect()
            ->back()
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Delete category
     */
    public function destroy(Category $category)
    {
        if ($category->menus()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki menu.');
        }

        $category->delete();

        return redirect()
            ->back()
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
