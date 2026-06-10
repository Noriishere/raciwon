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
                            Manajemen Bahan Baku
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Kelola seluruh bahan baku yang digunakan dalam operasional bisnis.
                        </p>

                    </div>

                    <div>

                        <button @click="openCreateInventory = true"
                            class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Bahan

                        </button>

                    </div>

                </div>

            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Total --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Bahan
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                {{ $totalBahan }}
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
                                {{ $lowStock }}
                            </h3>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">

                            <i class="fa-solid fa-triangle-exclamation text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Empty --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Stok Habis
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                {{ $stokHabis }}
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-circle-xmark text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="flex flex-col lg:flex-row gap-4">

                    <form method="GET" class="flex flex-col lg:flex-row gap-4">

                        <div class="flex-1 relative">

                            <i
                                class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari bahan baku..."
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200">

                        </div>

                        <div class="flex flex-wrap gap-2">

                            <button name="filter" value=""
                                class="px-4 py-3 rounded-xl {{ request('filter') == '' ? 'bg-brand-600 text-white' : 'bg-slate-100' }}">
                                Semua
                            </button>

                            <button name="filter" value="aman"
                                class="px-4 py-3 rounded-xl {{ request('filter') == 'aman' ? 'bg-brand-600 text-white' : 'bg-slate-100' }}">
                                Aman
                            </button>

                            <button name="filter" value="low"
                                class="px-4 py-3 rounded-xl {{ request('filter') == 'low' ? 'bg-yellow-500 text-white' : 'bg-yellow-100 text-yellow-700' }}">
                                Low Stock
                            </button>

                            <button name="filter" value="habis"
                                class="px-4 py-3 rounded-xl {{ request('filter') == 'habis' ? 'bg-red-500 text-white' : 'bg-red-100 text-red-700' }}">
                                Habis
                            </button>

                        </div>

                    </form>

                </div>

            </div>

            {{-- Table --}}
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

                            @forelse($inventories as $inventory)
                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4">

                                        <div>

                                            <p class="font-semibold text-slate-800">
                                                {{ $inventory->name }}
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                Inventory Item
                                            </p>

                                        </div>

                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $inventory->unit }}
                                    </td>

                                    <td class="px-6 py-4 font-semibold">
                                        {{ $inventory->current_stock }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $inventory->minimum_stock }}
                                    </td>

                                    <td class="px-6 py-4">
                                        Rp {{ number_format($inventory->price, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($inventory->current_stock <= 0)

                                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">
                                                Habis
                                            </span>

                                        @elseif($inventory->current_stock <= $inventory->minimum_stock)

                                            <span
                                                class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">
                                                Low Stock
                                            </span>

                                        @else

                                            <span
                                                class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                                Aman
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-center gap-2">

                                            <button @click="openShowInventory = true"
                                                class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200">

                                                <i class="fa-solid fa-eye"></i>

                                            </button>

                                            <button @click="openEditInventory = true"
                                                class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 hover:bg-amber-200">

                                                <i class="fa-solid fa-pen"></i>

                                            </button>

                                            <button @click="openStockModal = true"
                                                class="w-10 h-10 rounded-xl bg-brand-100 text-brand-600 hover:bg-brand-200">

                                                <i class="fa-solid fa-arrow-right-arrow-left"></i>

                                            </button>

                                            <button @click="openDeleteInventory = true"
                                                class="w-10 h-10 rounded-xl bg-red-100 text-red-600 hover:bg-red-200">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </div>

                                    </td>

                                </tr>
                            @empty

                                <tr>

                                    <td colspan="7" class="text-center py-10 text-slate-500">

                                        Tidak ada data inventory ditemukan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">

                <div class="px-6 py-4 border-t">
                    {{ $inventories->links() }}
                </div>

            </div>

            {{-- Modals --}}
            <x-inventory.create-modal />
            <x-inventory.show-modal />
            <x-inventory.edit-modal />
            <x-inventory.stock-modal />
            <x-inventory.delete-modal />

        </div>

    </div>

</x-app-layout>