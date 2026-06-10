<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        $query = Inventory::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($filter === 'aman') {
            $query->whereRaw('current_stock > minimum_stock');
        } elseif ($filter === 'low') {
            $query->whereRaw('current_stock > 0')->whereRaw('current_stock <= minimum_stock');
        } elseif ($filter === 'habis') {
            $query->where('current_stock', '<=', 0);
        }

        $inventories = $query->latest()->paginate(10)->withQueryString();

        $totalBahan = Inventory::count();
        $lowStock = Inventory::whereRaw('current_stock > 0')->whereRaw('current_stock <= minimum_stock')->count();
        $stokHabis = Inventory::where('current_stock', '<=', 0)->count();

        return view('inventory.index', compact('inventories', 'totalBahan', 'lowStock', 'stokHabis'));
    }
}
