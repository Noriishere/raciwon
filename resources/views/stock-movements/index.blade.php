<x-app-layout>

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
                        245
                    </h3>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Stock In
                    </p>

                    <h3 class="text-3xl font-bold text-green-600 mt-2">
                        120
                    </h3>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Stock Out
                    </p>

                    <h3 class="text-3xl font-bold text-blue-600 mt-2">
                        95
                    </h3>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <p class="text-sm text-slate-500">
                        Waste
                    </p>

                    <h3 class="text-3xl font-bold text-red-600 mt-2">
                        30
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

                                <span>48%</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-green-500 w-[48%]">
                                </div>

                            </div>

                        </div>

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Stock Out</span>

                                <span>37%</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-blue-500 w-[37%]">
                                </div>

                            </div>

                        </div>

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Waste</span>

                                <span>10%</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-red-500 w-[10%]">
                                </div>

                            </div>

                        </div>

                        <div>

                            <div class="flex justify-between mb-2">

                                <span>Adjustment</span>

                                <span>5%</span>

                            </div>

                            <div class="h-2 rounded-full bg-slate-100">

                                <div class="h-2 rounded-full bg-yellow-500 w-[5%]">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="grid lg:grid-cols-4 gap-4">

                    <input type="text" placeholder="Cari bahan..."
                        class="rounded-xl border border-slate-200 px-4 py-3">

                    <select class="rounded-xl border border-slate-200 px-4 py-3">

                        <option>Semua Type</option>
                        <option>IN</option>
                        <option>OUT</option>
                        <option>WASTE</option>
                        <option>ADJUSTMENT</option>

                    </select>

                    <input type="date" class="rounded-xl border border-slate-200 px-4 py-3">

                    <select class="rounded-xl border border-slate-200 px-4 py-3">

                        <option>Semua User</option>
                        <option>Owner</option>
                        <option>Cashier</option>

                    </select>

                </div>

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
                                    User
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Notes
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @for ($i = 0; $i < 15; $i++)
                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4">
                                        08 Jun 2026
                                    </td>

                                    <td class="px-6 py-4 font-medium">
                                        Beras Premium
                                    </td>

                                    <td class="px-6 py-4">

                                        <span
                                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                            IN

                                        </span>

                                    </td>

                                    <td class="px-6 py-4 font-semibold text-green-600">
                                        +20 Kg
                                    </td>

                                    <td class="px-6 py-4">
                                        Owner
                                    </td>

                                    <td class="px-6 py-4 text-slate-500">
                                        Pembelian supplier
                                    </td>

                                </tr>
                            @endfor

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">

                <div class="bg-white rounded-2xl shadow-card p-2 flex gap-2">

                    <button class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200">

                        <i class="fa-solid fa-chevron-left"></i>

                    </button>

                    <button class="w-10 h-10 rounded-xl bg-brand-600 text-white">

                        1

                    </button>

                    <button class="w-10 h-10 rounded-xl hover:bg-slate-100">

                        2

                    </button>

                    <button class="w-10 h-10 rounded-xl hover:bg-slate-100">

                        3

                    </button>

                    <button class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200">

                        <i class="fa-solid fa-chevron-right"></i>

                    </button>

                </div>

            </div>

            {{-- Modal --}}
            <x-inventory.stock-modal />

        </div>

    </div>

</x-app-layout>
