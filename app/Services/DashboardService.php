<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Expense;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Carbon\Carbon;

class DashboardService
{
    public function stats(): array
    {
        $today = Carbon::today();

        $todayRevenue = Payment::query()
            ->where('status', 'paid')
            ->whereDate('paid_at', $today)
            ->sum('amount');

        $todayOrders = Order::query()
            ->whereDate('created_at', $today)
            ->count();

        $monthRevenue = Payment::query()
            ->where('status', 'paid')
            ->whereMonth('paid_at', now()->month)
            ->whereYear('paid_at', now()->year)
            ->sum('amount');

        $monthExpense = Expense::query()
            ->whereMonth('expense_date', now()->month)
            ->whereYear('expense_date', now()->year)
            ->sum('amount');

        return [
            'today_revenue' => $todayRevenue,
            'today_orders' => $todayOrders,
            'monthly_profit' => $monthRevenue - $monthExpense,
            'customers' => Customer::count(),
        ];
    }

    public function orderStatus(): array
    {
        return [
            'pending' => Order::where('status', 'pending')->count(),
            'confirmed' => Order::where('status', 'confirmed')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];
    }

    public function lowStockIngredients()
    {
        return Inventory::query()
            ->whereColumn('current_stock', '<=', 'minimum_stock')
            ->latest()
            ->take(5)
            ->get();
    }

    public function topMenus()
    {
        return OrderItem::query()
            ->selectRaw('menu_id, SUM(quantity) as total_sold')
            ->with('menu')
            ->groupBy('menu_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();
    }
}
