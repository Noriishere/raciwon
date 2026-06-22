<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Services\InventoryService;
use DB;
use Illuminate\Http\Request;

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

    public function payment(
        Request $request,
        Order $order,
        InventoryService $inventoryService
    ) {
        $validated = $request->validate([
            'payment_method' => [
                'required',
                'in:cash,transfer,qris',
            ],
        ]);

        DB::transaction(function () use (
            $validated,
            $order,
            $inventoryService
        ) {

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $validated['payment_method'],
                'amount' => $order->subtotal,
                'paid_at' => now(),
                'status' => 'paid',
            ]);

            $inventoryService
                ->reduceStock($order);

            $order->update([
                'status' => 'completed',
            ]);
        });

        return response()->json([
            'success' => true,
        ]);
    }
}
