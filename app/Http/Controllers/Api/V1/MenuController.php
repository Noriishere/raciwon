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

        return response()->json([
            'status' => 'success',
            'data' => $menus
        ]);
    }

    public function show(Menu $menu)
    {
        $menu->load('category');

        return response()->json([
            'status' => 'success',
            'data' => $menu
        ]);
    }
}
