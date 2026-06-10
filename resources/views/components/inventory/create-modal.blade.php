{{-- Create Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openCreateInventory" x-cloak
        class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openCreateInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="shrink-0 bg-gradient-to-r from-brand-600 to-brand-500 px-6 lg:px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Tambah Bahan Baku
                        </h2>

                        <p class="mt-1 text-orange-100">
                            Tambahkan bahan baku baru ke inventaris RACIWON.
                        </p>

                    </div>

                    <button type="button" @click="openCreateInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <form action="{{ route('admin.inventory.store') }}" method="POST">

                
                @csrf

                {{-- Body --}}
                <div class="p-4 sm:p-6 lg:p-8 overflow-y-auto max-h-[calc(90vh-150px)]">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- Form --}}
                        <div class="lg:col-span-2">

                            <div class="space-y-5">

                                {{-- Nama --}}
                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Nama Bahan
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Contoh: Beras Premium"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500">

                                </div>

                                {{-- Unit + Harga --}}
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>

                                        <label class="block mb-2 text-sm font-medium">
                                            Satuan
                                        </label>

                                        <select name="unit" class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                            <option value="">
                                                Pilih Satuan
                                            </option>

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
                                            Harga / Unit
                                        </label>

                                        <input type="number" name="cost_per_unit" min="0" step="0.01"
                                            placeholder="15000"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                    </div>

                                </div>

                                {{-- Stok --}}
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>

                                        <label class="block mb-2 text-sm font-medium">
                                            Stok Awal
                                        </label>

                                        <input type="number" name="initial_stock" min="0" step="0.01" placeholder="50"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                        <p class="mt-2 text-xs text-slate-500">
                                            Akan dicatat sebagai stok masuk pertama.
                                        </p>

                                    </div>

                                    <div>

                                        <label class="block mb-2 text-sm font-medium">
                                            Minimum Stok
                                        </label>

                                        <input type="number" name="minimum_stock" min="0" step="0.01" placeholder="10"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Preview --}}
                        <div>

                            <div class="border border-slate-200 rounded-3xl overflow-hidden">

                                <div
                                    class="h-40 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                    <i class="fa-solid fa-boxes-stacked text-5xl text-brand-300"></i>

                                </div>

                                <div class="p-5">

                                    <span
                                        class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                        Inventaris Baru

                                    </span>

                                    <h4 class="font-bold text-lg mt-4">
                                        Preview Bahan
                                    </h4>

                                    <p class="text-slate-500 text-sm mt-1">
                                        Informasi inventaris akan ditampilkan di sini.
                                    </p>

                                    <div class="mt-5 space-y-3">

                                        <div class="flex justify-between">

                                            <span class="text-sm text-slate-500">
                                                Stok Awal
                                            </span>

                                            <span class="font-semibold">
                                                0
                                            </span>

                                        </div>

                                        <div class="flex justify-between">

                                            <span class="text-sm text-slate-500">
                                                Minimum
                                            </span>

                                            <span class="font-semibold">
                                                0
                                            </span>

                                        </div>

                                        <div class="flex justify-between">

                                            <span class="text-sm text-slate-500">
                                                Harga
                                            </span>

                                            <span class="font-semibold text-brand-600">
                                                Rp 0
                                            </span>

                                        </div>

                                    </div>

                                    <div class="mt-5 p-4 rounded-2xl border border-amber-200 bg-amber-50">

                                        <div class="flex gap-3">

                                            <i class="fa-solid fa-circle-info text-amber-500 mt-0.5"></i>

                                            <p class="text-xs text-amber-700">

                                                Digunakan untuk stock monitoring,
                                                recipe builder,
                                                food costing,
                                                dan inventory reporting.

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="px-4 sm:px-6 lg:px-8 py-4 bg-slate-50 border-t flex flex-col sm:flex-row justify-end gap-3">

                    <button type="button" @click="openCreateInventory = false"
                        class="w-full sm:w-auto px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300">

                        Batal

                    </button>

                    <button type="submit"
                        class="w-full sm:w-auto px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700">

                        <i class="fa-solid fa-floppy-disk mr-2"></i>

                        Simpan Bahan

                    </button>

                </div>
                

            </form>

        </div>

    </div>

</template>