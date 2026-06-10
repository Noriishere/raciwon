{{-- Edit Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openEditInventory" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openEditInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop class="relative w-full max-w-5xl max-h-[90vh] flex flex-col
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-6 sm:px-8 py-5 text-white shrink-0">

                <div class="flex items-center justify-between">

                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold">
                            Edit Bahan Baku
                        </h2>
                        <p class="text-orange-100 text-xs sm:text-sm mt-1">
                            Perbarui informasi inventaris bahan baku.
                        </p>
                    </div>

                    <button type="button" @click="openEditInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition flex items-center justify-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                </div>

            </div>

            <form :action="`{{ url('admin/inventory') }}/${selectedInventory.id}`" method="POST"
                class="flex flex-col overflow-hidden h-full m-0">

                @csrf
                @method('PUT')

                {{-- Body --}}
                <div class="p-6 sm:p-8 overflow-y-auto flex-1">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- Form Inputs --}}
                        <div class="lg:col-span-2">

                            <div class="space-y-4 sm:space-y-5">

                                {{-- Nama --}}
                                <div>
                                    <label class="block mb-2 text-sm font-medium">
                                        Nama Bahan
                                    </label>
                                    <input x-model="selectedInventory.name" type="text" name="name"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 outline-none">
                                </div>

                                {{-- Unit + Harga --}}
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>
                                        <label class="block mb-2 text-sm font-medium">
                                            Satuan
                                        </label>
                                        <select x-model="selectedInventory.unit" name="unit"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 outline-none">
                                            <option value="kg">Kg</option>
                                            <option value="gram">Gram</option>
                                            <option value="liter">Liter</option>
                                            <option value="ml">Ml</option>
                                            <option value="pcs">Pcs</option>
                                            <option value="pack">Pack</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block mb-2 text-sm font-medium">
                                            Harga Per Unit
                                        </label>
                                        <input x-model="selectedInventory.cost_per_unit" type="number" step="0.01"
                                            min="0" name="cost_per_unit"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 outline-none">
                                    </div>

                                </div>

                                {{-- Stock --}}
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>
                                        <label class="block mb-2 text-sm font-medium">
                                            Stok Saat Ini
                                        </label>
                                        <input x-model="selectedInventory.current_stock" type="number" disabled
                                            class="w-full rounded-xl border border-slate-200 bg-slate-100 px-4 py-3 text-slate-500 cursor-not-allowed outline-none">
                                        <p class="mt-1.5 text-xs text-slate-500">
                                            Stok hanya bisa diubah melalui modul penyesuaian stok.
                                        </p>
                                    </div>

                                    <div>
                                        <label class="block mb-2 text-sm font-medium">
                                            Minimum Stok
                                        </label>
                                        <input x-model="selectedInventory.minimum_stock" type="number" step="0.01"
                                            min="0" name="minimum_stock"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 outline-none">
                                    </div>

                                </div>

                                {{-- Catatan --}}
                                <div>
                                    <label class="block mb-2 text-sm font-medium">
                                        Catatan
                                    </label>
                                    <textarea name="notes" rows="4"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 resize-none focus:ring-2 focus:ring-brand-500 outline-none"
                                        placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                                </div>

                            </div>

                        </div>

                        {{-- Preview --}}
                        <div>

                            <div class="border border-slate-200 rounded-3xl overflow-hidden bg-white">

                                <div
                                    class="h-36 sm:h-40 bg-gradient-to-br from-amber-50 to-orange-100 flex items-center justify-center">
                                    <i class="fa-solid fa-pen-to-square text-5xl text-orange-400"></i>
                                </div>

                                <div class="p-5">

                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-medium">
                                        Sedang Diedit
                                    </span>

                                    <h4 class="font-bold text-lg mt-3 sm:mt-4"
                                        x-text="selectedInventory.name || 'Preview Bahan'"></h4>

                                    <div class="mt-4 sm:mt-5 space-y-3">

                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-500">Stok</span>
                                            <span class="font-semibold">
                                                <span x-text="selectedInventory.current_stock || 0"></span>
                                                <span x-text="selectedInventory.unit"></span>
                                            </span>
                                        </div>

                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-500">Minimum</span>
                                            <span class="font-semibold">
                                                <span x-text="selectedInventory.minimum_stock || 0"></span>
                                                <span x-text="selectedInventory.unit"></span>
                                            </span>
                                        </div>

                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-500">Harga</span>
                                            <span class="font-semibold text-brand-600">
                                                Rp <span
                                                    x-text="Number(selectedInventory.cost_per_unit || 0).toLocaleString('id-ID')"></span>
                                            </span>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="px-6 sm:px-8 py-4 bg-slate-50 border-t flex justify-end gap-3 shrink-0">

                    <button type="button" @click="openEditInventory = false"
                        class="px-5 py-2.5 sm:py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition text-sm font-medium text-slate-700">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-5 py-2.5 sm:py-3 rounded-xl bg-amber-500 text-white hover:bg-amber-600 transition text-sm font-medium shadow-sm flex items-center">
                        <i class="fa-solid fa-pen mr-2"></i>
                        Update Bahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</template>