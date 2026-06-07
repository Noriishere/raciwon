{{-- Show Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openShowInventory" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openShowInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full
                   max-w-sm
                   sm:max-w-2xl
                   lg:max-w-5xl
                   bg-white rounded-3xl shadow-2xl overflow-hidden
                   flex flex-col
                   max-h-[90vh]"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="shrink-0 bg-gradient-to-r from-brand-600 to-brand-500 px-6 sm:px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold">
                            Detail Bahan Baku
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Informasi lengkap inventaris bahan baku.
                        </p>

                    </div>

                    <button @click="openShowInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-6 sm:p-8">

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                    {{-- Detail --}}
                    <div class="xl:col-span-2">

                        <div class="space-y-6">

                            {{-- Information --}}
                            <div class="bg-slate-50 rounded-3xl p-6">

                                <h3 class="font-bold text-lg mb-5">
                                    Informasi Bahan
                                </h3>

                                <div class="grid md:grid-cols-2 gap-5">

                                    <div>
                                        <p class="text-sm text-slate-500">Nama Bahan</p>
                                        <p class="font-semibold mt-1">Beras Premium</p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-slate-500">Satuan</p>
                                        <p class="font-semibold mt-1">Kg</p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-slate-500">Stok Saat Ini</p>
                                        <p class="font-semibold mt-1">50 Kg</p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-slate-500">Minimum Stok</p>
                                        <p class="font-semibold mt-1">10 Kg</p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-slate-500">Harga / Unit</p>
                                        <p class="font-semibold mt-1">Rp 15.000</p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-slate-500">Nilai Inventaris</p>
                                        <p class="font-semibold text-green-600 mt-1">
                                            Rp 750.000
                                        </p>
                                    </div>

                                </div>

                            </div>

                            {{-- Notes --}}
                            <div class="bg-slate-50 rounded-3xl p-6">

                                <h3 class="font-bold text-lg mb-4">
                                    Catatan
                                </h3>

                                <p class="text-slate-600 leading-relaxed">

                                    Bahan utama yang digunakan untuk berbagai menu
                                    makanan seperti nasi goreng, ayam geprek,
                                    dan menu paket.

                                </p>

                            </div>

                            {{-- Recent Activity --}}
                            <div class="bg-slate-50 rounded-3xl p-6">

                                <div class="flex items-center justify-between mb-5">

                                    <h3 class="font-bold text-lg">
                                        Aktivitas Terakhir
                                    </h3>

                                    <a href="#" class="text-sm text-brand-600 hover:text-brand-700">

                                        Lihat Semua

                                    </a>

                                </div>

                                <div class="space-y-4">

                                    <div class="flex items-center justify-between">

                                        <div>

                                            <p class="font-medium">
                                                Stock In
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                07 Juni 2026 • Owner
                                            </p>

                                        </div>

                                        <span
                                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                            +20 Kg

                                        </span>

                                    </div>

                                    <div class="flex items-center justify-between">

                                        <div>

                                            <p class="font-medium">
                                                Waste
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                05 Juni 2026 • Cashier
                                            </p>

                                        </div>

                                        <span
                                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                                            -2 Kg

                                        </span>

                                    </div>

                                    <div class="flex items-center justify-between">

                                        <div>

                                            <p class="font-medium">
                                                Adjustment
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                03 Juni 2026 • Owner
                                            </p>

                                        </div>

                                        <span
                                            class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">

                                            +1 Kg

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div class="xl:sticky xl:top-0">

                            <div class="border border-slate-200 rounded-3xl overflow-hidden">

                                <div
                                    class="h-52 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                    <i class="fa-solid fa-boxes-stacked text-6xl text-brand-300"></i>

                                </div>

                                <div class="p-5">

                                    <span
                                        class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                        Aman

                                    </span>

                                    <h4 class="font-bold text-lg mt-4">
                                        Beras Premium
                                    </h4>

                                    <p class="text-slate-500 text-sm mt-1">
                                        Inventory Item
                                    </p>

                                    <div class="mt-5 space-y-3">

                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-500">Current Stock</span>
                                            <span class="font-semibold">50 Kg</span>
                                        </div>

                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-500">Minimum</span>
                                            <span class="font-semibold">10 Kg</span>
                                        </div>

                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-500">Cost / Unit</span>
                                            <span class="font-semibold">Rp 15.000</span>
                                        </div>

                                    </div>

                                    <div class="mt-5 rounded-2xl border border-green-200 bg-green-50 p-4">

                                        <div class="flex gap-3">

                                            <i class="fa-solid fa-circle-check text-green-600 mt-0.5"></i>

                                            <p class="text-xs text-green-700">

                                                Stok masih berada di atas batas minimum
                                                dan aman untuk operasional.

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="shrink-0 px-6 sm:px-8 py-4 bg-slate-50 border-t flex justify-end">

                <button @click="openShowInventory = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Tutup

                </button>

            </div>

        </div>

    </div>

</template>
