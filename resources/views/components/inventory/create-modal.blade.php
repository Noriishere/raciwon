{{-- Create Inventory Modal --}}
<template x-teleport="body">

    <div x-show="openCreateInventory" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openCreateInventory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop x-data="{
                name: '',
                unit: '',
                stock: 0,
                minimum: 0,
                cost: 0,

                get status() {

                    if (Number(this.stock) <= 0) {
                        return {
                            label: 'Habis',
                            color: 'bg-red-100 text-red-700'
                        }
                    }

                    if (Number(this.stock) <= Number(this.minimum)) {
                        return {
                            label: 'Low Stock',
                            color: 'bg-yellow-100 text-yellow-700'
                        }
                    }

                    return {
                        label: 'Aman',
                        color: 'bg-green-100 text-green-700'
                    }
                }
            }" class="relative w-full max-w-5xl max-h-[90vh]
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Tambah Bahan Baku
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Tambahkan bahan baku baru ke inventaris RACIWON.
                        </p>

                    </div>

                    <button type="button" @click="openCreateInventory = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            <form action="{{ route('admin.inventory.store') }}" method="POST">

                @csrf
                {{-- Body --}}
                <div class="p-8 overflow-y-auto max-h-[calc(90vh-150px)]">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- Form --}}
                        <div class="lg:col-span-2">

                            <div class="space-y-5">

                                {{-- Nama --}}
                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Nama Bahan
                                    </label>

                                    <input x-model="name" type="text" name="name" placeholder="Contoh: Beras Premium"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                                {{-- Unit + Harga --}}
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>

                                        <label class="block mb-2 text-sm font-medium">
                                            Satuan
                                        </label>

                                        <select x-model="unit" name="unit"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3">

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

                                        <input x-model="cost" type="number" step="0.01" min="0" name="cost_per_unit"
                                            placeholder="15000"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                    </div>

                                </div>

                                {{-- Stock --}}
                                <div class="grid md:grid-cols-2 gap-4">

                                    <div>

                                        <label class="block mb-2 text-sm font-medium">
                                            Stok Awal
                                        </label>

                                        <input x-model="stock" type="number" step="0.01" min="0" name="initial_stock"
                                            placeholder="50"
                                            class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                        <p class="mt-2 text-xs text-slate-500">
                                            Akan dicatat sebagai stok masuk pertama.
                                        </p>

                                    </div>

                                    <div>

                                        <label class="block mb-2 text-sm font-medium">
                                            Minimum Stok
                                        </label>

                                        <input x-model="minimum" type="number" step="0.01" min="0" name="minimum_stock"
                                            placeholder="10"
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

                                    <span :class="status.color"
                                        class="inline-flex px-3 py-1 rounded-full text-xs font-medium">

                                        <span x-text="status.label"></span>

                                    </span>

                                    <h4 class="font-bold text-lg mt-4" x-text="name || 'Preview Bahan'">
                                    </h4>

                                    <div class="mt-5 space-y-3">

                                        <div class="flex justify-between">

                                            <span class="text-sm text-slate-500">
                                                Stok Awal
                                            </span>

                                            <span class="font-semibold">

                                                <span x-text="stock || 0"></span>

                                                <span x-text="unit"></span>

                                            </span>

                                        </div>

                                        <div class="flex justify-between">

                                            <span class="text-sm text-slate-500">
                                                Minimum
                                            </span>

                                            <span class="font-semibold">

                                                <span x-text="minimum || 0"></span>

                                                <span x-text="unit"></span>

                                            </span>

                                        </div>

                                        <div class="flex justify-between">

                                            <span class="text-sm text-slate-500">
                                                Harga
                                            </span>

                                            <span class="font-semibold text-brand-600">

                                                Rp

                                                <span x-text="Number(cost || 0).toLocaleString('id-ID')"></span>

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

                    <button type="button" @click="openCreateInventory = false"
                        class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                        Batal

                    </button>

                    <button type="submit"
                        class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                        <i class="fa-solid fa-floppy-disk mr-2"></i>

                        Simpan Menu

                    </button>

                </div>

            </form>

        </div>

    </div>

</template>