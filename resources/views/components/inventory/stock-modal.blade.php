{{-- Stock Adjustment Modal --}}
<template x-teleport="body">

    <div x-show="openStockModal" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openStockModal = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full max-w-4xl max-h-[90vh]
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Penyesuaian Stok
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Catat perubahan stok inventaris dan simpan ke audit trail.
                        </p>

                    </div>

                    <button @click="openStockModal = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="p-8 overflow-y-auto max-h-[calc(90vh-150px)]">

                <div class="grid lg:grid-cols-3 gap-6">

                    {{-- Form --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-5">

                            {{-- Inventory --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Bahan Baku
                                </label>

                                <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                    <option>Pilih Bahan Baku</option>
                                    <option>Beras Premium</option>
                                    <option>Ayam Fillet</option>
                                    <option>Minyak Goreng</option>
                                    <option>Telur</option>

                                </select>

                            </div>

                            {{-- Type --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Tipe Pergerakan
                                </label>

                                <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                    <option value="in">
                                        Stock In
                                    </option>

                                    <option value="out">
                                        Stock Out
                                    </option>

                                    <option value="waste">
                                        Waste
                                    </option>

                                    <option value="adjustment">
                                        Adjustment
                                    </option>

                                </select>

                            </div>

                            {{-- Qty --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Jumlah
                                </label>

                                <input type="number" step="0.01" placeholder="0"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                            </div>

                            {{-- Notes --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Catatan
                                </label>

                                <textarea rows="5" placeholder="Contoh: Pembelian stok dari supplier..."
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3"></textarea>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-52 bg-gradient-to-br from-orange-50 to-amber-100 flex items-center justify-center">

                                <i class="fa-solid fa-arrow-right-arrow-left text-6xl text-brand-400">
                                </i>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                    Preview

                                </span>

                                <h4 class="font-bold text-lg mt-4">
                                    Dampak Perubahan
                                </h4>

                                <p class="text-slate-500 text-sm mt-1">
                                    Sistem akan memperbarui stok secara otomatis.
                                </p>

                                <div class="mt-5 space-y-4">

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Stok Saat Ini
                                        </span>

                                        <span class="font-semibold">
                                            50 Kg
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Perubahan
                                        </span>

                                        <span class="font-semibold text-green-600">
                                            +10 Kg
                                        </span>

                                    </div>

                                    <div class="border-t pt-4 flex justify-between">

                                        <span class="font-medium">
                                            Stok Setelahnya
                                        </span>

                                        <span class="font-bold text-brand-600">
                                            60 Kg
                                        </span>

                                    </div>

                                </div>

                                <div class="mt-5 p-4 rounded-2xl bg-amber-50 border border-amber-200">

                                    <div class="flex gap-3">

                                        <i class="fa-solid fa-circle-info text-amber-500 mt-0.5"></i>

                                        <p class="text-xs text-amber-700">

                                            Seluruh perubahan akan dicatat
                                            pada Stock Movement dan tidak
                                            dapat dihapus untuk menjaga audit trail.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-8 py-3 bg-slate-50 border-t flex justify-end gap-3">

                <button type="button" @click="openStockModal = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button type="submit"
                    class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan Perubahan

                </button>

            </div>

        </div>

    </div>

</template>
