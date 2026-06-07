{{-- Show Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openShowInventory" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openShowInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full max-w-5xl max-h-[90vh]
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Detail Bahan Baku
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Informasi lengkap inventaris bahan baku.
                        </p>

                    </div>

                    <button type="button" @click="openShowInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="p-8 overflow-y-auto max-h-[calc(90vh-150px)]">

                <div class="grid lg:grid-cols-3 gap-6">

                    {{-- Left --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-56 bg-gradient-to-br from-amber-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-boxes-stacked text-7xl text-brand-300"></i>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                    Stok Aman
                                </span>

                                <h3 class="text-xl font-bold mt-4">
                                    Beras Premium
                                </h3>

                                <p class="text-slate-500 text-sm mt-1">
                                    Inventaris Utama
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Right --}}
                    <div class="lg:col-span-2 space-y-6">

                        {{-- Stats --}}
                        <div class="grid md:grid-cols-3 gap-4">

                            <div class="bg-brand-50 rounded-2xl p-5">

                                <p class="text-sm text-slate-500">
                                    Stok Saat Ini
                                </p>

                                <h4 class="text-3xl font-bold text-brand-600 mt-2">
                                    50 Kg
                                </h4>

                            </div>

                            <div class="bg-yellow-50 rounded-2xl p-5">

                                <p class="text-sm text-slate-500">
                                    Minimum Stok
                                </p>

                                <h4 class="text-3xl font-bold text-yellow-600 mt-2">
                                    10 Kg
                                </h4>

                            </div>

                            <div class="bg-green-50 rounded-2xl p-5">

                                <p class="text-sm text-slate-500">
                                    Harga / Unit
                                </p>

                                <h4 class="text-2xl font-bold text-green-600 mt-2">
                                    Rp 15.000
                                </h4>

                            </div>

                        </div>

                        {{-- Detail --}}
                        <div class="bg-slate-50 rounded-3xl p-6">

                            <h4 class="font-bold text-lg mb-5">

                                Informasi Inventaris

                            </h4>

                            <div class="grid md:grid-cols-2 gap-y-5">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Nama Bahan
                                    </p>

                                    <p class="font-semibold">
                                        Beras Premium
                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Satuan
                                    </p>

                                    <p class="font-semibold">
                                        Kg
                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Nilai Inventaris
                                    </p>

                                    <p class="font-semibold text-green-600">
                                        Rp 750.000
                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Status
                                    </p>

                                    <p class="font-semibold text-green-600">
                                        Aman
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- Recent Activity --}}
                        <div class="bg-slate-50 rounded-3xl p-6">

                            <h4 class="font-bold text-lg mb-5">

                                Aktivitas Terakhir

                            </h4>

                            <div class="space-y-4">

                                <div class="flex items-center justify-between">

                                    <div>

                                        <p class="font-medium">
                                            Stock In
                                        </p>

                                        <p class="text-sm text-slate-500">
                                            Penambahan stok
                                        </p>

                                    </div>

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                        +20 Kg

                                    </span>

                                </div>

                                <div class="flex items-center justify-between">

                                    <div>

                                        <p class="font-medium">
                                            Waste
                                        </p>

                                        <p class="text-sm text-slate-500">
                                            Bahan rusak
                                        </p>

                                    </div>

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">

                                        -2 Kg

                                    </span>

                                </div>

                                <div class="flex items-center justify-between">

                                    <div>

                                        <p class="font-medium">
                                            Adjustment
                                        </p>

                                        <p class="text-sm text-slate-500">
                                            Koreksi stok
                                        </p>

                                    </div>

                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">

                                        +1 Kg

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-8 py-3 bg-slate-50 border-t flex justify-end gap-3">

                <button type="button" @click="openShowInventory = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Tutup

                </button>

            </div>

        </div>

    </div>

</template>
