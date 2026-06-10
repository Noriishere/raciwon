<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
