<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\RecipeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => [
                'required',
                'exists:menus,id',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.inventory_id' => [
                'required',
                'exists:inventories,id',
            ],

            'items.*.quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],
        ]);
        $inventoryIds = collect($validated['items'])
            ->pluck('inventory_id');

        if (
            $inventoryIds->count()
            !==
            $inventoryIds->unique()->count()
        ) {
            return back()->withErrors([
                'items' => 'Bahan tidak boleh duplikat.',
            ]);
        }
        DB::transaction(function () use ($validated) {

            RecipeItem::where(
                'menu_id',
                $validated['menu_id']
            )->delete();

            foreach ($validated['items'] as $item) {

                RecipeItem::create([
                    'menu_id' => $validated['menu_id'],
                    'inventory_id' => $item['inventory_id'],
                    'quantity' => $item['quantity'],
                ]);
            }
        });

        return redirect()
            ->route('admin.menu.index')
            ->with(
                'success',
                'Resep berhasil disimpan.'
            );
    }

    public function show(Menu $menu)
    {
        $recipeItems = RecipeItem::with('inventory')
            ->where('menu_id', $menu->id)
            ->get()
            ->map(function ($item) {

                return [
                    'inventory_id' => $item->inventory_id,
                    'inventory_name' => $item->inventory->name,
                    'quantity' => $item->quantity,
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $recipeItems,
        ]);
    }
}
