<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('created_at')
            ->get();

        $processingOrders = Order::with([
            'customer',
            'table',
            'items.menu',
        ])
            ->where('status', 'confirmed')
            ->orderBy('created_at')
            ->get();

        return view(
            'cashier.dashboard',
            [
                'orders' => $orders,
                'processingOrders' => $processingOrders,
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
            ->oldest()
            ->get();

        return response()->json([
            'success' => true,
            'count' => $orders->count(),
            'data' => $orders,
        ]);
    }

    public function processingOrders()
    {
        $orders = Order::with([
            'customer',
            'table',
            'items.menu',
        ])
            ->where('status', 'confirmed')
            ->oldest()
            ->get();

        return response()->json([
            'data' => $orders,
        ]);
    }

    public function payment(
        Request $request,
        Order $order
    ) {
        $validated = $request->validate([
            'payment_method' => [
                'required',
                'in:cash,transfer,qris',
            ],
        ]);

        DB::transaction(function () use (
            $validated,
            $order
        ) {

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $validated['payment_method'],
                'amount' => $order->subtotal,
                'paid_at' => now(),
                'status' => 'paid',
            ]);

            $order->update([
                'status' => 'confirmed',
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil.',
        ]);
    }
}
