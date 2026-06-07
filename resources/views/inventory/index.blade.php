<x-app-layout>

    <div x-data="{
        openCreateInventory: false,
        openEditInventory: false,
        openShowInventory: false,
        openDeleteInventory: false,
        openStockModal: false
    }">

        <div class="space-y-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h1 class="text-3xl font-bold">
                            Manajemen Inventaris
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Kelola stok bahan baku dan pantau kondisi inventaris bisnis Anda.
                        </p>

                    </div>

                    <div class="flex flex-wrap gap-3">

                        <button @click="openStockModal = true"
                            class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition">

                            <i class="fa-solid fa-arrow-right-arrow-left mr-2"></i>
                            Stock Adjustment

                        </button>

                        <button @click="openCreateInventory = true"
                            class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Bahan

                        </button>

                    </div>

                </div>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Total Bahan --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Bahan Baku
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                125
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-600 flex items-center justify-center">

                            <i class="fa-solid fa-boxes-stacked text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Low Stock --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Low Stock
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                8
                            </h3>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">

                            <i class="fa-solid fa-triangle-exclamation text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Out Of Stock --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Stok Habis
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                3
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-circle-xmark text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Inventory Value --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Nilai Inventaris
                            </p>

                            <h3 class="text-2xl font-bold mt-2">
                                Rp 15.250.000
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                            <i class="fa-solid fa-sack-dollar text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="flex flex-col lg:flex-row gap-4">

                    <div class="flex-1 relative">

                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input type="text" placeholder="Cari bahan baku..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                    </div>

                    <div class="flex flex-wrap gap-2">

                        <button class="px-4 py-3 rounded-xl bg-brand-600 text-white font-medium">
                            Semua
                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">
                            Aman
                        </button>

                        <button class="px-4 py-3 rounded-xl bg-yellow-100 text-yellow-700">
                            Low Stock
                        </button>

                        <button class="px-4 py-3 rounded-xl bg-red-100 text-red-700">
                            Habis
                        </button>

                    </div>

                </div>

            </div>

            {{-- Inventory Table --}}
            <div class="bg-white rounded-3xl shadow-card overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Nama Bahan
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Unit
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Stok
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Minimum
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Harga / Unit
                                </th>

                                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @for ($i = 0; $i < 10; $i++)
                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4">

                                        <div>

                                            <p class="font-semibold text-slate-800">
                                                Beras Premium
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                ID: INV-001
                                            </p>

                                        </div>

                                    </td>

                                    <td class="px-6 py-4">
                                        Kg
                                    </td>

                                    <td class="px-6 py-4 font-semibold">
                                        50
                                    </td>

                                    <td class="px-6 py-4">
                                        10
                                    </td>

                                    <td class="px-6 py-4">
                                        Rp 15.000
                                    </td>

                                    <td class="px-6 py-4">

                                        <span
                                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                            Aman

                                        </span>

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <button @click="openShowInventory = true"
                                                class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200">

                                                <i class="fa-solid fa-eye"></i>

                                            </button>

                                            <button @click="openEditInventory = true"
                                                class="w-10 h-10 rounded-xl bg-brand-100 text-brand-600 hover:bg-brand-200">

                                                <i class="fa-solid fa-pen"></i>

                                            </button>

                                            <button @click="openStockModal = true"
                                                class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-700 hover:bg-yellow-200">

                                                <i class="fa-solid fa-arrow-right-arrow-left"></i>

                                            </button>

                                            <button @click="openDeleteInventory = true"
                                                class="w-10 h-10 rounded-xl bg-red-100 text-red-600 hover:bg-red-200">

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

            {{-- Components --}}
            <x-inventory.create-modal />
            <x-inventory.edit-modal />
            <x-inventory.show-modal />
            <x-inventory.stock-modal />
            <x-inventory.delete-modal />

        </div>

    </div>

</x-app-layout>
