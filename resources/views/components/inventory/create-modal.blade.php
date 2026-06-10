{{-- Create Inventory Modal --}}

<template x-teleport="body">

    
    <div x-show="openCreateInventory" x-cloak class="fixed inset-0 z-[99999]">

        {{-- Backdrop --}}
        <div @click="openCreateInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative h-full sm:h-auto sm:max-h-[90vh] w-full sm:max-w-2xl mx-auto bg-white sm:rounded-3xl shadow-2xl flex flex-col">

            <form action="{{ route('admin.inventory.store') }}" method="POST" class="flex flex-col h-full">

                @csrf

                {{-- Header --}}
                <div class="shrink-0 bg-gradient-to-r from-brand-600 to-brand-500 px-4 sm:px-6 py-4 sm:py-5 text-white">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-xl sm:text-2xl font-bold">
                                Tambah Bahan Baku
                            </h2>

                            <p class="mt-1 text-sm text-orange-100">
                                Tambahkan bahan baku baru ke inventaris.
                            </p>

                        </div>

                        <button type="button" @click="openCreateInventory = false"
                            class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20">

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                </div>

                {{-- Body --}}
                <div class="flex-1 overflow-y-auto p-4 sm:p-6">

                    <div class="space-y-5">

                        {{-- Nama --}}
                        <div>

                            <label class="block mb-2 text-sm font-medium text-slate-700">

                                Nama Bahan
                                <span class="text-red-500">*</span>

                            </label>

                            <input type="text" name="name" required placeholder="Contoh: Beras Premium"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                        </div>

                        {{-- Unit --}}
                        <div>

                            <label class="block mb-2 text-sm font-medium text-slate-700">

                                Satuan
                                <span class="text-red-500">*</span>

                            </label>

                            <select name="unit" required
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

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

                        {{-- Harga --}}
                        <div>

                            <label class="block mb-2 text-sm font-medium text-slate-700">

                                Harga / Unit
                                <span class="text-red-500">*</span>

                            </label>

                            <input type="number" name="cost_per_unit" step="0.01" min="0" required placeholder="15000"
                                class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                        </div>

                        {{-- Stock --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>

                                <label class="block mb-2 text-sm font-medium text-slate-700">

                                    Stok Awal
                                    <span class="text-red-500">*</span>

                                </label>

                                <input type="number" name="initial_stock" step="0.01" min="0" required placeholder="0"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                                <p class="mt-2 text-xs text-slate-500">

                                    Akan otomatis dicatat sebagai stok masuk pertama.

                                </p>

                            </div>

                            <div>

                                <label class="block mb-2 text-sm font-medium text-slate-700">

                                    Minimum Stok
                                    <span class="text-red-500">*</span>

                                </label>

                                <input type="number" name="minimum_stock" step="0.01" min="0" required placeholder="10"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                            </div>

                        </div>

                        {{-- Info --}}
                        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4">

                            <div class="flex gap-3">

                                <i class="fa-solid fa-circle-info text-amber-500 mt-0.5"></i>

                                <p class="text-sm text-amber-700">

                                    Data inventaris digunakan untuk
                                    stock monitoring, recipe builder,
                                    food costing, dan laporan inventaris.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="shrink-0 border-t bg-slate-50 p-4">

                    <div class="grid grid-cols-2 gap-3">

                        <button type="button" @click="openCreateInventory = false"
                            class="w-full px-4 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                            Batal

                        </button>

                        <button type="submit"
                            class="w-full px-4 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                            <i class="fa-solid fa-floppy-disk mr-2"></i>
                            Simpan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>
    

</template>