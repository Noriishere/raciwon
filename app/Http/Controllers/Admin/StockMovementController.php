<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index(Request $request)
    {
        $query = StockMovement::with([
            'inventory',
            'user',
        ]);

        if ($request->filled('search')) {

            $query->whereHas('inventory', function ($q) use ($request) {

                $q->where(
                    'name',
                    'like',
                    '%'.$request->search.'%'
                );

            });
        }

        if ($request->filled('type')) {

            $query->where(
                'type',
                $request->type
            );
        }

        $movements = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $breakdown = [
            'in' => StockMovement::where('type', 'in')->count(),
            'out' => StockMovement::where('type', 'out')->count(),
            'waste' => StockMovement::where('type', 'waste')->count(),
            'adjustment' => StockMovement::where('type', 'adjustment')->count(),
        ];

        $stats = [
            'total' => StockMovement::count(),

            'in' => StockMovement::where(
                'type',
                'in'
            )->count(),

            'out' => StockMovement::where(
                'type',
                'out'
            )->count(),

            'waste' => StockMovement::where(
                'type',
                'waste'
            )->count(),

            'adjustment' => StockMovement::where(
                'type',
                'adjustment'
            )->count(),
        ];

        return view(
            'stock-movements.index',
            compact(
                'movements',
                'stats',
                'breakdown'
            )
        );
    }
}
