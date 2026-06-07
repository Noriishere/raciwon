{{-- Delete Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openDeleteInventory" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openDeleteInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full
                   max-w-sm
                   sm:max-w-lg
                   lg:max-w-2xl
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 sm:px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold">
                            Hapus Bahan Baku
                        </h2>

                        <p class="text-red-100 mt-1">
                            Tindakan ini tidak dapat dibatalkan.
                        </p>

                    </div>

                    <button type="button" @click="openDeleteInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="p-6 sm:p-8">

                <div class="text-center">

                    {{-- Icon --}}
                    <div
                        class="w-24 h-24 mx-auto rounded-full bg-red-100 text-red-600 flex items-center justify-center">

                        <i class="fa-solid fa-trash text-4xl"></i>

                    </div>

                    <h3 class="mt-6 text-xl sm:text-2xl font-bold text-slate-800">

                        Yakin ingin menghapus?

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Data bahan baku berikut akan dihapus dari sistem.

                    </p>

                </div>

                {{-- Item --}}
                <div class="mt-8 rounded-3xl border border-slate-200 p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <h4 class="font-bold text-lg">
                                Beras Premium
                            </h4>

                            <p class="text-sm text-slate-500">
                                Inventory Item
                            </p>

                        </div>

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                            Aman

                        </span>

                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-5">

                        <div>

                            <p class="text-xs text-slate-500">
                                Stok
                            </p>

                            <p class="font-semibold">
                                50 Kg
                            </p>

                        </div>

                        <div>

                            <p class="text-xs text-slate-500">
                                Minimum
                            </p>

                            <p class="font-semibold">
                                10 Kg
                            </p>

                        </div>

                        <div>

                            <p class="text-xs text-slate-500">
                                Harga
                            </p>

                            <p class="font-semibold">
                                Rp 15.000
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Warning --}}
                <div class="mt-5 rounded-2xl border border-amber-200 bg-amber-50 p-4">

                    <div class="flex gap-3">

                        <i class="fa-solid fa-triangle-exclamation text-amber-500 mt-0.5"></i>

                        <div>

                            <h5 class="font-semibold text-amber-900">
                                Perhatian
                            </h5>

                            <p class="text-sm text-amber-700 mt-1">

                                Jika bahan baku masih digunakan dalam Recipe
                                Builder, penghapusan dapat memengaruhi
                                perhitungan food cost dan costing menu.

                            </p>

                        </div>

                    </div>

                </div>

                {{-- Recipe Usage --}}
                <div class="mt-4 rounded-2xl border border-red-200 bg-red-50 p-4">

                    <div class="flex gap-3">

                        <i class="fa-solid fa-link text-red-500 mt-0.5"></i>

                        <div>

                            <h5 class="font-semibold text-red-900">
                                Digunakan Pada 3 Menu
                            </h5>

                            <p class="text-sm text-red-700 mt-1">

                                Nasi Goreng Spesial,
                                Ayam Geprek,
                                Nasi Ayam Crispy

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 sm:px-8 py-4 bg-slate-50 border-t flex flex-col-reverse sm:flex-row justify-end gap-3">

                <button type="button" @click="openDeleteInventory = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button type="submit" class="px-5 py-3 rounded-xl bg-red-600 text-white hover:bg-red-700 transition">

                    <i class="fa-solid fa-trash mr-2"></i>

                    Hapus Bahan

                </button>

            </div>

        </div>

    </div>

</template>
