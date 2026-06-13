<?php

namespace App\Services;

use App\Models\Inventory;
use App\Models\Order;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InventoryService
{
    public function reduceStock(Order $order): void
    {
        DB::transaction(function () use ($order) {

            $order->load(
                'items.menu.recipeItems.inventory'
            );

            foreach ($order->items as $orderItem) {

                foreach (
                    $orderItem->menu->recipeItems as $recipeItem
                ) {

                    $inventory = Inventory::lockForUpdate()
                        ->findOrFail(
                            $recipeItem->inventory_id
                        );

                    $qtyUsed =
                        $recipeItem->quantity
                        *
                        $orderItem->quantity;

                    $before =
                        $inventory->current_stock;

                    $after =
                        $before - $qtyUsed;

                    if ($after < 0) {

                        throw ValidationException::withMessages([
                            'stock' => "Stok {$inventory->name} tidak mencukupi.",
                        ]);
                    }

                    StockMovement::create([
                        'inventory_id' => $inventory->id,

                        'user_id' => null,

                        'type' => 'out',

                        'quantity' => $qtyUsed,

                        'notes' => 'Order #'.
                            $order->order_number,

                        'stock_before' => $before,

                        'stock_after' => $after,
                    ]);

                    $inventory->update([
                        'current_stock' => $after,
                    ]);
                }
            }
        });
    }
}
