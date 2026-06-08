<x-app-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <h1 class="text-3xl font-bold">
                        Financial Reports
                    </h1>

                    <p class="mt-2 text-orange-100">
                        Ringkasan laporan keuangan, pendapatan,
                        pengeluaran, dan profit bisnis RACIWON.
                    </p>

                </div>

                <div class="flex flex-wrap gap-3">

                    <button
                        class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                        <i class="fa-solid fa-file-pdf mr-2"></i>

                        Export PDF

                    </button>

                    <button
                        class="px-5 py-3 rounded-xl bg-white/10 border border-white/20 hover:bg-white/20 transition">

                        <i class="fa-solid fa-file-excel mr-2"></i>

                        Export Excel

                    </button>

                </div>

            </div>

        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            {{-- Revenue --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Revenue
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            Rp 125,8 Jt
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                        <i class="fa-solid fa-money-bill-trend-up text-xl"></i>

                    </div>

                </div>

            </div>

            {{-- Expense --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Expense
                        </p>

                        <h3 class="text-3xl font-bold mt-2 text-red-600">
                            Rp 32,4 Jt
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                        <i class="fa-solid fa-wallet text-xl"></i>

                    </div>

                </div>

            </div>

            {{-- Profit --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Gross Profit
                        </p>

                        <h3 class="text-3xl font-bold mt-2 text-blue-600">
                            Rp 93,4 Jt
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-chart-line text-xl"></i>

                    </div>

                </div>

            </div>

            {{-- Margin --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Profit Margin
                        </p>

                        <h3 class="text-3xl font-bold mt-2 text-amber-600">
                            74%
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                        <i class="fa-solid fa-percent text-xl"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- Revenue vs Expense Chart --}}
        <div class="bg-white rounded-3xl shadow-card p-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="font-bold text-lg">
                        Revenue vs Expense
                    </h3>

                    <p class="text-sm text-slate-500">
                        Perbandingan pendapatan dan pengeluaran
                        30 hari terakhir.
                    </p>

                </div>

                <select class="rounded-xl border border-slate-200 px-4 py-2">

                    <option>
                        30 Hari
                    </option>

                    <option>
                        3 Bulan
                    </option>

                    <option>
                        1 Tahun
                    </option>

                </select>

            </div>

            <div
                class="h-96 rounded-2xl border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center">

                <div class="text-center">

                    <i class="fa-solid fa-chart-column text-6xl text-slate-300"></i>

                    <p class="mt-4 text-slate-400">
                        Chart.js Revenue vs Expense
                    </p>

                </div>

            </div>

        </div>

        {{-- Financial Summary --}}
        <div class="grid lg:grid-cols-2 gap-6">

            {{-- Revenue Summary --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-bold text-lg mb-6">
                    Revenue Summary
                </h3>

                <div class="space-y-5">

                    <div class="flex justify-between items-center">

                        <span class="text-slate-500">
                            Hari Ini
                        </span>

                        <span class="font-bold text-green-600">
                            Rp 2.450.000
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-slate-500">
                            Minggu Ini
                        </span>

                        <span class="font-bold text-green-600">
                            Rp 15.200.000
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-slate-500">
                            Bulan Ini
                        </span>

                        <span class="font-bold text-green-600">
                            Rp 48.600.000
                        </span>

                    </div>

                </div>

            </div>

            {{-- Expense Summary --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-bold text-lg mb-6">
                    Expense Summary
                </h3>

                <div class="space-y-5">

                    <div class="flex justify-between items-center">

                        <span class="text-slate-500">
                            Hari Ini
                        </span>

                        <span class="font-bold text-red-600">
                            Rp 350.000
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-slate-500">
                            Minggu Ini
                        </span>

                        <span class="font-bold text-red-600">
                            Rp 2.150.000
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-slate-500">
                            Bulan Ini
                        </span>

                        <span class="font-bold text-red-600">
                            Rp 8.900.000
                        </span>

                    </div>

                </div>

            </div>

        </div>
        {{-- Recent Financial Activity --}}
        <div class="bg-white rounded-3xl shadow-card overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="font-bold text-lg">
                            Recent Financial Activity
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Aktivitas keuangan terbaru dari sistem.
                        </p>

                    </div>

                    <button class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

                        Lihat Semua

                    </button>

                </div>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-left">
                                Tanggal
                            </th>

                            <th class="px-6 py-4 text-left">
                                Tipe
                            </th>

                            <th class="px-6 py-4 text-left">
                                Deskripsi
                            </th>

                            <th class="px-6 py-4 text-left">
                                User
                            </th>

                            <th class="px-6 py-4 text-left">
                                Nominal
                            </th>

                            <th class="px-6 py-4 text-left">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @for ($i = 0; $i < 10; $i++)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4">
                                    08 Jun 2026
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                        Revenue

                                    </span>

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    Order #ORD-1024

                                </td>

                                <td class="px-6 py-4 text-slate-500">

                                    Cashier

                                </td>

                                <td class="px-6 py-4 font-semibold text-green-600">

                                    + Rp 250.000

                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                        Completed

                                    </span>

                                </td>

                            </tr>

                        @endfor

                        @for ($i = 0; $i < 5; $i++)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4">
                                    08 Jun 2026
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                                        Expense

                                    </span>

                                </td>

                                <td class="px-6 py-4 font-medium">

                                    Pembelian Beras Premium

                                </td>

                                <td class="px-6 py-4 text-slate-500">

                                    Owner

                                </td>

                                <td class="px-6 py-4 font-semibold text-red-600">

                                    - Rp 500.000

                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                        Recorded

                                    </span>

                                </td>

                            </tr>

                        @endfor

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Export Report --}}
        <div class="bg-white rounded-3xl shadow-card p-6">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <h3 class="font-bold text-lg">
                        Export Financial Report
                    </h3>

                    <p class="text-slate-500 text-sm mt-1">

                        Download laporan keuangan dalam format PDF atau Excel
                        untuk kebutuhan audit dan dokumentasi bisnis.

                    </p>

                </div>

                <div class="flex flex-wrap gap-3">

                    <button class="px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white transition">

                        <i class="fa-solid fa-file-pdf mr-2"></i>

                        Export PDF

                    </button>

                    <button class="px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white transition">

                        <i class="fa-solid fa-file-excel mr-2"></i>

                        Export Excel

                    </button>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>