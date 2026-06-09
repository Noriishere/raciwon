<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
            ->paginate(12);

        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    public function show(Category $category)
    {
        $category->loadCount('menus');

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }
}