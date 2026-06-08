<x-app-layout>

    <div x-data="{
        openCreateExpense: false
    }">

        <div class="space-y-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h1 class="text-3xl font-bold">
                            Expense Management
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Kelola seluruh pengeluaran operasional bisnis.
                        </p>

                    </div>

                    <button @click="openCreateExpense = true"
                        class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                        <i class="fa-solid fa-plus mr-2"></i>

                        Tambah Pengeluaran

                    </button>

                </div>

            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Total --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Pengeluaran
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                Rp 12,5 Jt
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-wallet text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Today --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Hari Ini
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                Rp 450rb
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <i class="fa-solid fa-calendar-day text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Month --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Bulan Ini
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                Rp 3,2 Jt
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                            <i class="fa-solid fa-calendar text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Average --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Rata-rata Harian
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                Rp 105rb
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                            <i class="fa-solid fa-chart-line text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Expense Trend --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h3 class="font-bold text-lg">
                            Expense Trend
                        </h3>

                        <p class="text-sm text-slate-500">
                            Tren pengeluaran 30 hari terakhir
                        </p>

                    </div>

                </div>

                <div
                    class="h-80 rounded-2xl bg-slate-50 border border-dashed border-slate-300 flex items-center justify-center">

                    <div class="text-center">

                        <i class="fa-solid fa-chart-area text-5xl text-slate-300"></i>

                        <p class="mt-3 text-slate-400">
                            Chart.js Expense Trend
                        </p>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="grid lg:grid-cols-3 gap-4">

                    <input type="text" placeholder="Cari pengeluaran..."
                        class="rounded-xl border border-slate-200 px-4 py-3">

                    <input type="date" class="rounded-xl border border-slate-200 px-4 py-3">

                    <select class="rounded-xl border border-slate-200 px-4 py-3">

                        <option>
                            Semua User
                        </option>

                        <option>
                            Owner
                        </option>

                        <option>
                            Cashier
                        </option>

                    </select>

                </div>

            </div>

            {{-- Expense Table --}}
            <div class="bg-white rounded-3xl shadow-card overflow-hidden">

                <div class="px-6 py-5 border-b">

                    <h3 class="font-bold text-lg">
                        Daftar Pengeluaran
                    </h3>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Judul
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Nominal
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Dibuat Oleh
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Deskripsi
                                </th>

                                <th class="px-6 py-4 text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @for ($i = 0; $i < 10; $i++)

                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4">
                                        08 Jun 2026
                                    </td>

                                    <td class="px-6 py-4 font-medium">
                                        Pembelian Beras
                                    </td>

                                    <td class="px-6 py-4 font-semibold text-red-600">
                                        Rp 250.000
                                    </td>

                                    <td class="px-6 py-4">
                                        Owner
                                    </td>

                                    <td class="px-6 py-4 text-slate-500">
                                        Pembelian stok mingguan
                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center items-center gap-2">

                                            <button
                                                class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200">

                                                <i class="fa-solid fa-eye"></i>

                                            </button>

                                            <button
                                                class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 hover:bg-amber-200">

                                                <i class="fa-solid fa-pen"></i>

                                            </button>

                                            <button class="w-10 h-10 rounded-xl bg-red-100 text-red-600 hover:bg-red-200">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </div>

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

        </div>
        <x-expenses.create-modal>
    </div>

</x-app-layout>