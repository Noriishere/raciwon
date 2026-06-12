<x-app-layout>
    @php

        $typeColors = [
            'in' => 'bg-green-100 text-green-700',
            'out' => 'bg-blue-100 text-blue-700',
            'waste' => 'bg-red-100 text-red-700',
            'adjustment' => 'bg-amber-100 text-amber-700',
        ];
        $totalMovement = max(array_sum($breakdown), 1);

        $inPercent = round(($breakdown['in'] / $totalMovement) * 100);
        $outPercent = round(($breakdown['out'] / $totalMovement) * 100);
        $wastePercent = round(($breakdown['waste'] / $totalMovement) * 100);
        $adjustmentPercent = round(($breakdown['adjustment'] / $totalMovement) * 100);
    @endphp
    <div x-data="{
        openStockModal: false
    }">

        <div class="space-y-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h1 class="text-3xl font-bold">
                            Stock Movements
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Audit trail seluruh aktivitas pergerakan stok inventaris.
                        </p>

                    </div>

                    <button @click="openStockModal = true"
                        class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                        <i class="fa-solid fa-plus mr-2"></i>

                        Stock Adjustment

                    </button>

                </div>

            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Total Movement
                    </p>

                    <h3 class="text-3xl font-bold mt-2">

                        {{ number_format($stats['total']) }}

                    </h3>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Stock In
                    </p>

                    <h3 class="text-3xl font-bold text-green-600 mt-2">

                        {{ number_format($stats['in']) }}

                    </h3>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Stock Out
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600 mt-2">

                        {{ number_format($stats['out']) }}

                    </h3>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Waste
                    </p>

                    <h3 class="text-3xl font-bold text-red-600 mt-2">

                        {{ number_format($stats['waste']) }}

                    </h3>

                </div>

            </div>

            {{-- Analytics --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                <div class="xl:col-span-2 bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between mb-6">

                        <h3 class="font-bold text-lg">
                            Movement Trend
                        </h3>

                        <span class="text-sm text-slate-500">
                            30 Hari Terakhir
                        </span>

                    </div>

                    <div
                        class="h-80 rounded-2xl bg-slate-50 border border-dashed border-slate-300 flex items-center justify-center">

                        <div class="text-center">

                            <i class="fa-solid fa-chart-line text-4xl text-slate-300"></i>

                            <p class="mt-3 text-slate-400">
                                Chart.js Movement Trend
                            </p>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <h3 class="font-bold text-lg mb-6">
                        Movement Breakdown
                    </h3>

                    <div class="space-y-5">

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Stock In</span>

                                <span>{{ $inPercent }}%</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-green-500" style="width: {{ $inPercent }}%">
                                </div>

                            </div>

                        </div>

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Stock Out</span>

                                <span>{{ $outPercent }}</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-blue-500" style="width: {{ $outPercent }}%">
                                </div>

                            </div>

                        </div>

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Waste</span>

                                <span>{{ $wastePercent }}</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-red-500" style="width: {{ $wastePercent }}%">
                                </div>

                            </div>

                        </div>

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Adjustment</span>

                                <span>{{ $adjustmentPercent }}</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-yellow-500" style="width: {{ $adjustmentPercent }}%">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <form method="GET">

                    <div class="grid lg:grid-cols-4 gap-4">

                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari bahan..."
                            class="rounded-xl border border-slate-200 px-4 py-3">

                        <select name="type" class="rounded-xl border border-slate-200 px-4 py-3">

                            <option value="">
                                Semua Type
                            </option>

                            <option value="in" @selected(request('type') == 'in')>

                                IN

                            </option>

                            <option value="out" @selected(request('type') == 'out')>

                                OUT

                            </option>

                            <option value="waste" @selected(request('type') == 'waste')>

                                WASTE

                            </option>

                            <option value="adjustment" @selected(request('type') == 'adjustment')>

                                ADJUSTMENT

                            </option>

                        </select>

                        <button type="submit" class="rounded-xl bg-brand-600 text-white">

                            Filter

                        </button>

                        <a href="{{ route('admin.stock-movements.index') }}"
                            class="rounded-xl bg-slate-100 flex items-center justify-center">

                            Reset

                        </a>

                    </div>

                </form>

            </div>

            {{-- Table --}}
            <div class="bg-white rounded-3xl shadow-card overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Bahan
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Type
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Qty
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Sebelum
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Sesudah
                                </th>

                                <th class="px-6 py-4 text-left">
                                    User
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Notes
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($movements as $movement)
                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4">
                                        {{ $movement->created_at->format('d M Y H:i') }}
                                    </td>

                                    <td class="px-6 py-4 font-medium">
                                        {{ $movement->inventory->name }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-medium
                                                                {{ $typeColors[$movement->type] ?? 'bg-slate-100 text-slate-700' }}">

                                            {{ strtoupper($movement->type) }}

                                        </span>

                                    </td>

                                    <td class="px-6 py-4 font-semibold text-green-600">
                                        {{ number_format($movement->quantity, 2) }}
                                        {{ $movement->inventory->unit }}
                                    </td>

                                    {{-- Sebelum --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        {{ number_format($movement->stock_before, 2) }}

                                    </td>

                                    {{-- Sesudah --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <span class="font-semibold">

                                            {{ number_format($movement->stock_after, 2) }}

                                        </span>

                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $movement->user->name }}
                                    </td>

                                    <td class="px-6 py-4 text-slate-500">
                                        {{ $movement->notes ?: '-' }}
                                    </td>

                                </tr>
                            @empty

                                <tr>

                                    <td colspan="8" class="px-6 py-10 text-center text-slate-500">

                                        Belum ada riwayat pergerakan stok.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">

                <div class="mt-6">

                    {{ $movements->links() }}

                </div>

            </div>

            {{-- Modal --}}
            <x-inventory.stock-modal />

        </div>

    </div>

</x-app-layout>