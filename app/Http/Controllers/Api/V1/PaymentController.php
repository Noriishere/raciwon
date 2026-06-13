<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function store(
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

        if ($order->payment) {

            return response()->json([
                'success' => false,
                'message' => 'Order sudah memiliki pembayaran.',
            ], 422);
        }

        DB::transaction(function () use (
            $order,
            $validated,
            $inventoryService
        ) {

            Payment::create([
                'order_id' => $order->id,

                'payment_method' => $validated['payment_method'],

                'amount' => $order->subtotal,

                'status' => 'paid',

                'paid_at' => now(),
            ]);

            $order->update([
                'status' => 'completed',
            ]);

            $inventoryService
                ->reduceStock($order);
        });

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil diproses.',
        ]);
    }
}
