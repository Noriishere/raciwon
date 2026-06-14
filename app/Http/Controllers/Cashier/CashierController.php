<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Order;

class CashierController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'customer',
            'table',
            'items.menu',
        ])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view(
            'cashier.dashboard',
            [
                'orders' => $orders,
                'pendingOrders' => $orders->count(),
            ]
        );
    }

    public function pendingOrders()
    {
        $orders = Order::with([
            'customer',
            'table',
            'items.menu',
        ])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'count' => $orders->count(),
            'data' => $orders,
        ]);
    }

    public function confirm(Order $order)
    {
        $order->update([
            'status' => 'confirmed',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan diterima.',
        ]);
    }
}
