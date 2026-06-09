{{-- Edit Category Modal --}}
<template x-teleport="body">


    <div x-show="openEditCategory" x-cloak class="fixed inset-0 z-[99999] overflow-y-auto p-4"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openEditCategory = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        <div class="min-h-full flex items-center justify-center">

            <div @click.stop
                class="relative w-full max-w-xl my-8 max-h-[90vh] overflow-y-auto bg-white rounded-3xl shadow-2xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-5 text-white">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-blue-100 text-xs uppercase tracking-wider">
                                Category Management
                            </p>

                            <h2 class="font-brand text-3xl md:text-4xl mt-1">
                                Edit Kategori
                            </h2>

                        </div>

                        <button type="button" @click="openEditCategory = false"
                            class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                </div>

                {{-- Form --}}
                <form :action="'/categories/' + selectedCategory.id" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="p-6">

                        <div class="space-y-5">

                            {{-- Nama --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Nama Kategori
                                </label>

                                <input type="text" name="name" x-model="selectedCategory.name"
                                    class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-500">

                            </div>

                            {{-- Icon --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Icon
                                </label>

                                <select name="icon" x-model="selectedCategory.icon"
                                    class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-500">

                                    <option value="fa-solid fa-bowl-food">
                                        🍜 Makanan
                                    </option>

                                    <option value="fa-solid fa-mug-hot">
                                        ☕ Minuman
                                    </option>

                                    <option value="fa-solid fa-ice-cream">
                                        🍰 Dessert
                                    </option>

                                    <option value="fa-solid fa-cookie-bite">
                                        🍟 Snack
                                    </option>

                                    <option value="fa-solid fa-fish">
                                        🐟 Seafood
                                    </option>

                                    <option value="fa-solid fa-glass-water">
                                        🥤 Beverage
                                    </option>

                                </select>

                            </div>

                            {{-- Deskripsi --}}
                            <div>

                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Deskripsi
                                </label>

                                <textarea name="description" rows="3" x-model="selectedCategory.description"
                                    class="w-full rounded-2xl border border-slate-200 px-4 py-3 resize-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"></textarea>

                            </div>

                            {{-- Preview --}}
                            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4">

                                <p class="text-xs uppercase tracking-wide text-slate-500 mb-3">
                                    Preview
                                </p>

                                <div class="flex items-center gap-4">

                                    <div
                                        class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                                        <i :class="selectedCategory.icon" class="text-xl">
                                        </i>

                                    </div>

                                    <div>

                                        <h3 class="font-semibold text-slate-800"
                                            x-text="selectedCategory.name || 'Nama Kategori'">
                                        </h3>

                                        <p class="text-xs text-slate-500"
                                            x-text="selectedCategory.description || 'Deskripsi kategori...'">
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div
                        class="sticky bottom-0 bg-white px-6 py-4 border-t border-slate-100 flex flex-col sm:flex-row justify-end gap-3">

                        <button type="button" @click="openEditCategory = false"
                            class="w-full sm:w-auto px-5 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 transition font-medium">

                            Batal

                        </button>

                        <button type="submit"
                            class="w-full sm:w-auto px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-medium transition">

                            <i class="fa-solid fa-floppy-disk mr-2"></i>

                            Update Kategori

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


</template>