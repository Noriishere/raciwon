@props([
'inventories'
])

{{-- Recipe Builder Modal --}} <template x-teleport="body">


<div
    x-show="openRecipeMenu"
    x-cloak
    class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"

    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"

    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">

    {{-- Backdrop --}}
    <div
        @click="openRecipeMenu = false"
        class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
    </div>

    {{-- Modal --}}
    <div
        @click.stop

        x-data="{

            addItem() {

                recipeItems.push({
                    inventory_id:'',
                    quantity:''
                });

            },

            removeItem(index) {

                recipeItems.splice(index,1);

            }

        }"

        class="relative
               w-full
               max-w-6xl
               h-[90vh]
               bg-white
               rounded-3xl
               shadow-2xl
               overflow-hidden
               flex
               flex-col">

        {{-- Header --}}
        <div
            class="shrink-0 bg-gradient-to-r from-brand-600 to-brand-500 px-6 lg:px-8 py-6 text-white">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-bold">

                        Recipe Builder

                    </h2>

                    <p class="mt-1 text-orange-100">

                        Kelola resep dan bahan baku untuk menu

                        <span
                            class="font-semibold"
                            x-text="selectedMenu.name">
                        </span>

                    </p>

                </div>

                <button
                    type="button"
                    @click="openRecipeMenu = false"
                    class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

        </div>

        {{-- Form --}}
        <form
            action="{{ route('admin.recipe.store') }}"
            method="POST"
            class="flex flex-col h-full">

            @csrf

            <input
                type="hidden"
                name="menu_id"
                :value="selectedMenu.id">

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                    {{-- Form --}}
                    <div class="xl:col-span-2">

                        <div class="space-y-5">

                            {{-- Menu Info --}}
                            <div
                                class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                                <h3
                                    class="font-bold text-lg text-slate-800"
                                    x-text="selectedMenu.name">
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">

                                    Tambahkan bahan baku yang digunakan
                                    untuk membuat menu ini.

                                </p>

                            </div>

                            {{-- Recipe Items --}}
                            <div>

                                <div class="flex items-center justify-between mb-4">

                                    <h4 class="font-semibold text-slate-800">

                                        Daftar Bahan

                                    </h4>

                                    <button
                                        type="button"
                                        @click="addItem()"
                                        class="px-4 py-2 rounded-xl bg-brand-100 text-brand-700 hover:bg-brand-200 transition">

                                        <i class="fa-solid fa-plus mr-2"></i>

                                        Tambah Bahan

                                    </button>

                                </div>

                                <div class="space-y-4">

                                    <template
                                        x-for="(item,index) in recipeItems"
                                        :key="index">

                                        <div
                                            class="border border-slate-200 rounded-2xl p-4">

                                            <div class="grid grid-cols-12 gap-3 items-end">

                                                {{-- Inventory --}}
                                                <div class="col-span-12 md:col-span-6">

                                                    <label
                                                        class="block mb-2 text-sm font-medium">

                                                        Bahan Baku

                                                    </label>

                                                    <select
                                                        :name="`items[${index}][inventory_id]`"
                                                        x-model="item.inventory_id"
                                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                        <option value="">
                                                            Pilih Bahan
                                                        </option>

                                                        @foreach ($inventories as $inventory)

                                                            <option
                                                                value="{{ $inventory->id }}">

                                                                {{ $inventory->name }}
                                                                ({{ $inventory->unit }})

                                                            </option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                                {{-- Quantity --}}
                                                <div class="col-span-12 md:col-span-4">

                                                    <label
                                                        class="block mb-2 text-sm font-medium">

                                                        Jumlah

                                                    </label>

                                                    <input
                                                        type="number"
                                                        step="0.01"
                                                        min="0.01"
                                                        :name="`items[${index}][quantity]`"
                                                        x-model="item.quantity"
                                                        placeholder="0"
                                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                </div>

                                                {{-- Delete --}}
                                                <div class="col-span-12 md:col-span-2">

                                                    <button
                                                        type="button"
                                                        @click="removeItem(index)"
                                                        class="w-full py-3 rounded-xl bg-red-100 text-red-600 hover:bg-red-200 transition">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>

                                                </div>

                                            </div>

                                        </div>

                                    </template>

                                    {{-- Empty State --}}
                                    <div
                                        x-show="recipeItems.length === 0"
                                        class="border-2 border-dashed border-slate-200 rounded-2xl p-10 text-center">

                                        <i
                                            class="fa-solid fa-utensils text-4xl text-slate-300">
                                        </i>

                                        <h4
                                            class="mt-4 font-semibold text-slate-700">

                                            Belum Ada Bahan

                                        </h4>
                                        <button
                                            type="button"
                                            @click="addItem()"
                                            class="mt-4 px-4 py-2 rounded-xl bg-brand-600 text-white">

                                            Tambah Bahan Pertama

                                        </button>
                                        <p
                                            class="mt-2 text-sm text-slate-500">

                                            Tambahkan bahan baku untuk
                                            membuat resep menu ini.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div
                            class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-48 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                <i
                                    class="fa-solid fa-bowl-food text-6xl text-brand-300">
                                </i>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                    Recipe Preview

                                </span>

                                <h4
                                    class="font-bold text-lg mt-4"
                                    x-text="selectedMenu.name || 'Menu'">
                                </h4>

                                <p
                                    class="text-slate-500 text-sm mt-1">

                                    Total bahan yang digunakan.

                                </p>

                                <div
                                    class="mt-5 flex items-center justify-between">

                                    <span
                                        class="text-slate-500">

                                        Jumlah Bahan

                                    </span>

                                    <span
                                        class="font-bold text-brand-600"
                                        x-text="recipeItems.length">
                                    </span>

                                </div>

                                <div
                                    class="mt-5 p-4 rounded-2xl border border-amber-200 bg-amber-50">

                                    <div class="flex gap-3">

                                        <i
                                            class="fa-solid fa-circle-info text-amber-500 mt-0.5">
                                        </i>

                                        <p
                                            class="text-xs text-amber-700">

                                            Resep ini akan digunakan untuk
                                            food costing dan pengurangan
                                            stok otomatis saat transaksi.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div
                class="shrink-0 px-6 lg:px-8 py-4 bg-slate-50 border-t flex flex-col-reverse sm:flex-row justify-end gap-3">

                <button
                    type="button"
                    @click="openRecipeMenu = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan Resep

                </button>

            </div>

        </form>

    </div>

</div>


</template>
