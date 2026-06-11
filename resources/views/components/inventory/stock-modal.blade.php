{{-- Stock Movement Modal --}}

<template x-teleport="body">

    
    <div x-show="openStockModal" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6">

        {{-- Backdrop --}}
        <div @click="openStockModal = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop x-data="{
            type:'in',
            quantity:0,
            notes:'',

            get finalStock() {

                let current = Number(selectedInventory.current_stock);
                let qty = Number(this.quantity);

                if(this.type === 'in') {
                    return current + qty;
                }

                if(this.type === 'out') {
                    return current - qty;
                }

                if(this.type === 'waste') {
                    return current - qty;
                }

                if(this.type === 'adjustment') {
                    return qty;
                }

                return current;
            }
        }" class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col h-[90vh]">

            <form action="{{ route('admin.inventory.movement.store') }}" method="POST" class="flex flex-col h-full">

                @csrf

                {{-- Header --}}
                <div class="shrink-0 bg-gradient-to-r from-brand-600 to-brand-500 px-6 py-5 text-white">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="text-2xl font-bold">
                                Stock Movement
                            </h2>

                            <p class="text-orange-100 mt-1">
                                Catat perubahan stok inventaris.
                            </p>

                        </div>

                        <button type="button" @click="openStockModal = false"
                            class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20">

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                </div>

                {{-- Body --}}
                <div class="flex-1 overflow-y-auto p-4 sm:p-6">

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        {{-- Form --}}
                        <div class="lg:col-span-2">

                            <input type="hidden" name="inventory_id" :value="selectedInventory.id">

                            <div class="space-y-5">

                                {{-- Inventory Info --}}
                                <div class="rounded-2xl border border-slate-200 p-4 bg-slate-50">

                                    <h4 class="font-semibold text-slate-800" x-text="selectedInventory.name">
                                    </h4>

                                    <p class="text-sm text-slate-500 mt-1">

                                        Stok Saat Ini :

                                        <span x-text="selectedInventory.current_stock">
                                        </span>

                                        <span x-text="selectedInventory.unit">
                                        </span>

                                    </p>

                                </div>

                                {{-- Type --}}
                                <div>

                                    <label class="block mb-2 text-sm font-medium">

                                        Jenis Pergerakan

                                    </label>

                                    <select x-model="type" name="type"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

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
                                            Stock Opname
                                        </option>

                                    </select>

                                </div>

                                {{-- Quantity --}}
                                <div>

                                    <label class="block mb-2 text-sm font-medium">

                                        Jumlah

                                    </label>

                                    <input x-model="quantity" type="number" step="0.01" min="0" name="quantity"
                                        placeholder="0" class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                                {{-- Notes --}}
                                <div>

                                    <label class="block mb-2 text-sm font-medium">

                                        Catatan

                                    </label>

                                    <textarea x-model="notes" name="notes" rows="5"
                                        placeholder="Contoh: Pembelian stok baru, barang rusak, stock opname..."
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3 resize-none"></textarea>

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
                                        class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                        Preview

                                    </span>

                                    <h4 class="font-bold text-lg mt-4">

                                        Dampak Perubahan

                                    </h4>

                                    <div class="mt-5 space-y-4">

                                        <div class="flex justify-between">

                                            <span class="text-slate-500">

                                                Stok Saat Ini

                                            </span>

                                            <span class="font-semibold">

                                                <span x-text="selectedInventory.current_stock"></span>

                                                <span x-text="selectedInventory.unit"></span>

                                            </span>

                                        </div>

                                        <div class="flex justify-between">

                                            <span class="text-slate-500">

                                                Perubahan

                                            </span>

                                            <span class="font-semibold text-brand-600">

                                                <span x-text="quantity || 0"></span>

                                                <span x-text="selectedInventory.unit"></span>

                                            </span>

                                        </div>

                                        <div class="border-t pt-3 flex justify-between">

                                            <span class="font-medium">

                                                Stok Setelahnya

                                            </span>

                                            <span class="font-bold text-brand-600">

                                                <span x-text="finalStock"></span>

                                                <span x-text="selectedInventory.unit"></span>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="shrink-0 px-6 py-4 border-t bg-slate-50 flex flex-col sm:flex-row justify-end gap-3">

                    <button type="button" @click="openStockModal = false"
                        class="w-full sm:w-auto px-5 py-3 rounded-xl bg-slate-200">

                        Batal

                    </button>

                    <button type="submit" class="w-full sm:w-auto px-5 py-3 rounded-xl bg-brand-600 text-white">

                        <i class="fa-solid fa-floppy-disk mr-2"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>
    

</template>