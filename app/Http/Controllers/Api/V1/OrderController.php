<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([

            'order_type' => [
                'required',
                'in:dine_in,take_away',
            ],

            'table_id' => [
                'nullable',
                'exists:tables,id',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.menu_id' => [
                'required',
                'exists:menus,id',
            ],

            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        if (
            $validated['order_type'] === 'dine_in'
            &&
            empty($validated['table_id'])
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Meja wajib dipilih untuk dine in.',
            ], 422);
        }

        $order = DB::transaction(function () use ($validated) {

            $subtotal = 0;

            foreach ($validated['items'] as $item) {

                $menu = Menu::findOrFail(
                    $item['menu_id']
                );

                $subtotal +=
                    $menu->price *
                    $item['quantity'];
            }

            $order = Order::create([
                'customer_id' => auth('customer')->id(),

                'table_id' => $validated['table_id']
                    ?? null,

                'order_number' => 'ORD-'.
                    now()->format('YmdHis').
                    '-'.
                    str_pad(
                        random_int(1, 999),
                        3,
                        '0',
                        STR_PAD_LEFT
                    ),

                'order_type' => $validated['order_type'],

                'subtotal' => $subtotal,

                'status' => 'pending',
            ]);

            foreach ($validated['items'] as $item) {

                $menu = Menu::findOrFail(
                    $item['menu_id']
                );

                OrderItem::create([
                    'order_id' => $order->id,

                    'menu_id' => $menu->id,

                    'quantity' => $item['quantity'],

                    'price' => $menu->price,

                    'subtotal' => $menu->price *
                        $item['quantity'],
                ]);
            }

            return $order;
        });

        return response()->json([
            'success' => true,
            'message' => 'Order berhasil dibuat.',
            'data' => $order->load(
                'items.menu'
            ),
        ], 201);
    }

    public function show(Order $order)
    {
        $order->load([
            'customer',
            'table',
            'items.menu',
        ]);

        return response()->json([
            'success' => true,
            'data' => $order,
        ]);
    }

    public function myOrders()
    {
        $orders = Order::with([
            'items.menu',
        ])
            ->where(
                'customer_id',
                auth('customer')->id()
            )
            ->latest()
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $orders,
        ]);
    }

    public function complete(
        Order $order,
        InventoryService $inventoryService
    ) {
        if (
            ! in_array(
                $order->status,
                ['pending', 'confirmed']
            )) {

            return response()->json([
                'success' => false,
                'message' => 'Order sudah selesai.',
            ], 422);
        }

        $inventoryService
            ->reduceStock($order);

        $order->update([
            'status' => 'completed',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order berhasil diselesaikan.',
        ]);
    }
}
