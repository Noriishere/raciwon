<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'unit' => ['required'],
            'cost_per_unit' => ['required', 'numeric'],
            'initial_stock' => ['required', 'numeric', 'min:0'],
            'minimum_stock' => ['required', 'numeric', 'min:0'],
        ]);

        DB::transaction(function () use ($validated) {

            $inventory = Inventory::create([
                'name' => $validated['name'],
                'unit' => $validated['unit'],
                'current_stock' => $validated['initial_stock'],
                'minimum_stock' => $validated['minimum_stock'],
                'cost_per_unit' => $validated['cost_per_unit'],
            ]);

            if ($validated['initial_stock'] > 0) {

                StockMovement::create([
                    'inventory_id' => $inventory->id,
                    'user_id' => auth()->id(),
                    'type' => 'in',
                    'quantity' => $validated['initial_stock'],
                    'notes' => 'Stok awal inventory',
                ]);
            }
        });

        return redirect()
            ->route('admin.inventory.index')
            ->with('success', 'Bahan berhasil ditambahkan.');
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
        $inventory = Inventory::with([
            'recipeItems',
            'stockMovements',
        ])->findOrFail($id);

        if ($inventory->recipeItems()->exists()) {

            return back()->with(
                'error',
                'Bahan tidak dapat dihapus karena sudah digunakan pada resep menu.'
            );
        }

        $inventory->delete();

        return redirect()
            ->route('admin.inventory.index')
            ->with(
                'success',
                'Bahan berhasil dihapus.'
            );
    }
}
