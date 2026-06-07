{{-- Edit Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openEditInventory" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openEditInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full max-w-5xl max-h-[90vh]
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Edit Bahan Baku
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Perbarui informasi inventaris bahan baku.
                        </p>

                    </div>

                    <button type="button" @click="openEditInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="p-8 overflow-y-auto max-h-[calc(90vh-150px)]">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Form --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-5">

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Nama Bahan
                                </label>

                                <input type="text" value="Beras Premium"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                            </div>

                            <div class="grid md:grid-cols-2 gap-4">

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Satuan
                                    </label>

                                    <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                        <option selected>Kg</option>
                                        <option>Gram</option>
                                        <option>Liter</option>
                                        <option>Ml</option>
                                        <option>Pcs</option>
                                        <option>Pack</option>

                                    </select>

                                </div>

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Harga Per Unit
                                    </label>

                                    <input type="number" value="15000"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                            </div>

                            <div class="grid md:grid-cols-2 gap-4">

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Stok Saat Ini
                                    </label>

                                    <input type="number" value="50" disabled
                                        class="w-full rounded-xl border border-slate-200 bg-slate-100 px-4 py-3">

                                </div>

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Minimum Stok
                                    </label>

                                    <input type="number" value="10"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                            </div>

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Catatan
                                </label>

                                <textarea rows="5" class="w-full rounded-xl border border-slate-200 px-4 py-3">Bahan utama untuk menu nasi goreng.</textarea>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-52 bg-gradient-to-br from-amber-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-pen-to-square text-6xl text-orange-400"></i>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-block px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-medium">

                                    Sedang Diedit

                                </span>

                                <h4 class="font-bold text-lg mt-4">
                                    Beras Premium
                                </h4>

                                <p class="text-slate-500 text-sm mt-1">
                                    Terakhir diperbarui 2 hari lalu
                                </p>

                                <div class="mt-5 space-y-3">

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Stok
                                        </span>

                                        <span class="font-semibold">
                                            50 Kg
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Minimum
                                        </span>

                                        <span class="font-semibold">
                                            10 Kg
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Harga
                                        </span>

                                        <span class="font-semibold text-brand-600">
                                            Rp 15.000
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-8 py-3 bg-slate-50 border-t flex justify-end gap-3">

                <button type="button" @click="openEditInventory = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button type="submit"
                    class="px-5 py-3 rounded-xl bg-amber-500 text-white hover:bg-amber-600 transition">

                    <i class="fa-solid fa-pen mr-2"></i>

                    Update Bahan

                </button>

            </div>

        </div>

    </div>

</template>