<x-app-layout>

    <div x-data="{
        openCreateMenu: false,
        openEditMenu: false,
        openShowMenu: false,
        openDeleteMenu: false
    }">

        <div class="space-y-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h1 class="text-3xl font-bold">
                            Manajemen Menu
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Kelola seluruh menu makanan dan minuman yang tersedia pada bisnis Anda.
                        </p>

                    </div>

                    <div class="flex gap-3">

                        <button class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition">

                            <i class="fa-solid fa-file-import mr-2"></i>
                            Import

                        </button>

                        <button @click="openCreateMenu = true"
                            class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Menu

                        </button>

                    </div>

                </div>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Menu
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                48
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-600 flex items-center justify-center">

                            <i class="fa-solid fa-utensils text-xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Menu Aktif
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                42
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                            <i class="fa-solid fa-circle-check text-xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Nonaktif
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                6
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-ban text-xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Kategori
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                8
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <i class="fa-solid fa-layer-group text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="flex flex-col lg:flex-row gap-4">

                    <div class="flex-1 relative">

                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                        </i>

                        <input type="text" placeholder="Cari nama menu..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                    </div>

                    <div class="flex flex-wrap gap-2">

                        <button class="px-4 py-3 rounded-xl bg-brand-600 text-white font-medium">

                            Semua

                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                            Makanan

                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                            Minuman

                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                            Snack

                        </button>

                    </div>

                </div>

            </div>

            {{-- Grid Menu --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Card --}}
                @for ($i = 0; $i < 8; $i++)
                    <div
                        class="bg-white rounded-3xl shadow-card overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-200">

                        <div
                            class="h-48 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                            <i class="fa-solid fa-bowl-food text-6xl text-brand-400">
                            </i>

                        </div>

                        <div class="p-5">

                            <div class="flex justify-between items-start">

                                <div>

                                    <h3 class="font-bold text-lg text-slate-800">
                                        Nasi Goreng Spesial
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Makanan
                                    </p>

                                </div>

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                    Aktif

                                </span>

                            </div>

                            <p class="mt-4 text-2xl font-bold text-brand-600">

                                Rp 25.000

                            </p>

                            <p class="mt-2 text-sm text-slate-500 line-clamp-2">

                                Nasi goreng dengan topping ayam, telur, dan sayuran segar.

                            </p>

                            <div class="mt-5 flex gap-2">

                                <button @click="openEditMenu = true"
                                    class="flex-1 py-2.5 rounded-xl bg-brand-600 text-white font-medium hover:bg-brand-700 transition">

                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                    Edit

                                </button>

                                <button @click="openShowMenu = true"
                                    class="w-11 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                        </div>

                    </div>
                @endfor

            </div>

            {{-- Pagination Dummy --}}
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

            <x-menu.create-modal />
            <x-menu.edit-modal />
            <x-menu.delete-modal />
            <x-menu.show-modal />

        </div>

</x-app-layout>
