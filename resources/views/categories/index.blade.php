<x-app-layout>

    <x-slot name="header">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Categories
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola kategori menu untuk mengorganisir produk kuliner Anda.
            </p>

        </div>

    </x-slot>

    <div x-data="{
    openCreateCategory:false,
    openEditCategory:false,
    openDeleteCategory:false,
    openShowCategory:false
}">

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl p-6 shadow-card">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Categories
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            12
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-orange-100 text-brand-600 flex items-center justify-center">

                        <i class="fa-solid fa-layer-group text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-card">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Used Categories
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            10
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                        <i class="fa-solid fa-check text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-card">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Empty Categories
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            2
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                        <i class="fa-solid fa-triangle-exclamation text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl p-6 shadow-card">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Menu
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            48
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-utensils text-xl"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- Search + Action --}}
        <div class="bg-white rounded-3xl p-6 shadow-card mt-8">

            <div class="flex flex-col lg:flex-row gap-4">

                <div class="relative flex-1">

                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    </i>

                    <input type="text" placeholder="Cari kategori..."
                        class="w-full pl-12 pr-4 py-3 rounded-2xl border border-slate-200 focus:ring-2 focus:ring-brand-200 focus:border-brand-500">

                </div>

                <button @click="openCreateCategory = true"
                    class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl bg-brand-600 text-white font-medium hover:bg-brand-700 transition">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Kategori

                </button>

            </div>

        </div>

        {{-- Category Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-8">

            @for ($i = 1; $i <= 8; $i++)

                <div class="bg-white rounded-3xl p-6 shadow-card hover:-translate-y-1 transition duration-300">

                    <div class="flex items-start justify-between">

                        <div class="w-16 h-16 rounded-2xl bg-orange-100 text-brand-600 flex items-center justify-center">

                            <i class="fa-solid fa-bowl-food text-2xl"></i>

                        </div>

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                            18 Menu

                        </span>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-800">

                        Makanan

                    </h3>

                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">

                        Menu utama seperti nasi goreng, ayam geprek,
                        dan makanan berat lainnya.

                    </p>

                    <div class="mt-6 flex gap-2">

                        <button @click="openShowCategory = true"
                            class="flex-1 h-11 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

                            <i class="fa-solid fa-eye"></i>

                        </button>

                        <button @click="openEditCategory = true"
                            class="flex-1 h-11 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200 transition">

                            <i class="fa-solid fa-pen"></i>

                        </button>

                        <button @click="openDeleteCategory = true"
                            class="flex-1 h-11 rounded-xl bg-red-100 text-red-600 hover:bg-red-200 transition">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>

                </div>

            @endfor

        </div>
        {{-- Create Category Modal --}}
        <template x-teleport="body">

            <div x-show="openCreateCategory" x-cloak class="fixed inset-0 z-[99999] overflow-y-auto p-4"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                {{-- Backdrop --}}
                <div @click="openCreateCategory = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md">
                </div>

                <div class="min-h-full flex items-center justify-center">

                    {{-- Modal --}}
                    <div @click.stop
                        class="relative w-full max-w-xl my-8 max-h-[90vh] overflow-y-auto bg-white rounded-3xl shadow-2xl">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-6 py-5 text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-orange-100 text-xs uppercase tracking-wider">
                                        Category Management
                                    </p>

                                    <h2 class="font-brand text-3xl md:text-4xl mt-1">
                                        Tambah Kategori
                                    </h2>

                                </div>

                                <button @click="openCreateCategory = false"
                                    class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                                    <i class="fa-solid fa-xmark"></i>

                                </button>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="p-6">

                            <div class="space-y-5">

                                {{-- Nama --}}
                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                                        Nama Kategori

                                    </label>

                                    <input type="text" placeholder="Contoh: Makanan"
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-200 focus:border-brand-500">

                                </div>

                                {{-- Icon --}}
                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                                        Icon

                                    </label>

                                    <select
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-200 focus:border-brand-500">

                                        <option>
                                            🍜 Makanan
                                        </option>

                                        <option>
                                            ☕ Minuman
                                        </option>

                                        <option>
                                            🍰 Dessert
                                        </option>

                                        <option>
                                            🍟 Snack
                                        </option>

                                        <option>
                                            🐟 Seafood
                                        </option>

                                        <option>
                                            🥤 Beverage
                                        </option>

                                    </select>

                                </div>

                                {{-- Deskripsi --}}
                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                                        Deskripsi

                                    </label>

                                    <textarea rows="3" placeholder="Masukkan deskripsi kategori..."
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 resize-none focus:ring-2 focus:ring-brand-200 focus:border-brand-500"></textarea>

                                </div>

                                {{-- Preview --}}
                                <div class="bg-orange-50 border border-orange-100 rounded-2xl p-4">

                                    <p class="text-xs uppercase tracking-wide text-slate-500 mb-3">
                                        Preview
                                    </p>

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="w-12 h-12 rounded-xl bg-orange-100 text-brand-600 flex items-center justify-center text-xl">

                                            🍜

                                        </div>

                                        <div>

                                            <h3 class="font-semibold text-slate-800">
                                                Makanan
                                            </h3>

                                            <p class="text-xs text-slate-500">
                                                Kategori menu makanan utama
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Footer --}}
                        <div
                            class="sticky bottom-0 bg-white px-6 py-4 border-t border-slate-100 flex flex-col sm:flex-row justify-end gap-3">

                            <button type="button" @click="openCreateCategory = false"
                                class="w-full sm:w-auto px-5 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 transition font-medium">

                                Batal

                            </button>

                            <button type="submit"
                                class="w-full sm:w-auto px-5 py-3 rounded-2xl bg-brand-600 hover:bg-brand-700 text-white font-medium transition">

                                <i class="fa-solid fa-floppy-disk mr-2"></i>

                                Simpan Kategori

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </template>
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

                    {{-- Modal --}}
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

                                <button @click="openEditCategory = false"
                                    class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                                    <i class="fa-solid fa-xmark"></i>

                                </button>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="p-6">

                            <div class="space-y-5">

                                {{-- Nama --}}
                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                                        Nama Kategori

                                    </label>

                                    <input type="text" value="Makanan"
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-500">

                                </div>

                                {{-- Icon --}}
                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                                        Icon

                                    </label>

                                    <select
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-200 focus:border-blue-500">

                                        <option selected>
                                            🍜 Makanan
                                        </option>

                                        <option>
                                            ☕ Minuman
                                        </option>

                                        <option>
                                            🍰 Dessert
                                        </option>

                                        <option>
                                            🍟 Snack
                                        </option>

                                        <option>
                                            🐟 Seafood
                                        </option>

                                        <option>
                                            🥤 Beverage
                                        </option>

                                    </select>

                                </div>

                                {{-- Deskripsi --}}
                                <div>

                                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                                        Deskripsi

                                    </label>

                                    <textarea rows="3"
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 resize-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500">Kategori untuk menu makanan utama seperti nasi goreng, ayam geprek, mie goreng dan makanan berat lainnya.</textarea>

                                </div>

                                {{-- Preview --}}
                                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4">

                                    <p class="text-xs uppercase tracking-wide text-slate-500 mb-3">
                                        Preview
                                    </p>

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">

                                            🍜

                                        </div>

                                        <div>

                                            <h3 class="font-semibold text-slate-800">
                                                Makanan
                                            </h3>

                                            <p class="text-xs text-slate-500">
                                                Kategori menu makanan utama
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

                    </div>

                </div>

            </div>

        </template>
        {{-- Delete Category Modal --}}
        <template x-teleport="body">

            <div x-show="openDeleteCategory" x-cloak
                class="fixed inset-0 z-[99999] flex items-center justify-center p-4"
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                {{-- Backdrop --}}
                <div @click="openDeleteCategory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
                </div>

                {{-- Modal --}}
                <div @click.stop class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                    {{-- Body --}}
                    <div class="p-8 text-center">

                        <div
                            class="mx-auto w-20 h-20 rounded-full bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-trash text-3xl"></i>

                        </div>

                        <h3 class="mt-6 font-brand text-4xl text-slate-800">
                            Hapus Kategori
                        </h3>

                        <p class="mt-4 text-slate-500 leading-relaxed">

                            Kategori

                            <span class="font-semibold text-slate-700">
                                Makanan
                            </span>

                            akan dihapus secara permanen dari sistem.

                        </p>

                        <div class="mt-5 p-4 rounded-2xl bg-red-50 border border-red-100">

                            <p class="text-sm text-red-600">

                                <i class="fa-solid fa-triangle-exclamation mr-2"></i>

                                Tindakan ini tidak dapat dibatalkan.

                            </p>

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-6 pb-6">

                        <div class="grid grid-cols-2 gap-3">

                            <button type="button" @click="openDeleteCategory = false"
                                class="py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 transition font-medium">

                                Batal

                            </button>

                            <button type="submit"
                                class="py-3 rounded-2xl bg-red-600 hover:bg-red-700 text-white font-medium transition">

                                <i class="fa-solid fa-trash mr-2"></i>

                                Hapus

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </template>
        {{-- Detail Category Modal --}}
        <template x-teleport="body">

            <div x-show="openShowCategory" x-cloak class="fixed inset-0 z-[99999] overflow-y-auto p-4"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                {{-- Backdrop --}}
                <div @click="openShowCategory = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md">
                </div>

                <div class="min-h-full flex items-center justify-center">

                    {{-- Modal --}}
                    <div @click.stop
                        class="relative w-full max-w-xl my-8 max-h-[90vh] overflow-y-auto bg-white rounded-3xl shadow-2xl">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-6 py-5 text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <p class="text-orange-100 text-xs uppercase tracking-wider">
                                        Category Details
                                    </p>

                                    <h2 class="font-brand text-3xl md:text-4xl mt-1">
                                        Detail Kategori
                                    </h2>

                                </div>

                                <button @click="openShowCategory = false"
                                    class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                                    <i class="fa-solid fa-xmark"></i>

                                </button>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="p-6">

                            {{-- Category Header --}}
                            <div class="bg-orange-50 border border-orange-100 rounded-3xl p-5">

                                <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                                    <div
                                        class="w-16 h-16 rounded-2xl bg-orange-100 text-brand-600 flex items-center justify-center text-3xl">

                                        🍜

                                    </div>

                                    <div>

                                        <h3 class="text-2xl font-bold text-slate-800">
                                            Makanan
                                        </h3>

                                        <p class="text-slate-500 text-sm mt-1">
                                            Kategori menu makanan utama
                                        </p>

                                    </div>

                                </div>

                            </div>

                            {{-- Statistics --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">

                                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">

                                    <p class="text-xs uppercase tracking-wide text-slate-500">
                                        Total Menu
                                    </p>

                                    <h4 class="text-3xl font-bold text-slate-800 mt-2">
                                        18
                                    </h4>

                                </div>

                                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">

                                    <p class="text-xs uppercase tracking-wide text-slate-500">
                                        Status
                                    </p>

                                    <span
                                        class="inline-flex mt-3 px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">

                                        Active

                                    </span>

                                </div>

                            </div>

                            {{-- Description --}}
                            <div class="mt-6 bg-white border border-slate-200 rounded-2xl p-5">

                                <p class="text-xs uppercase tracking-wide text-slate-500 mb-3">
                                    Deskripsi
                                </p>

                                <p class="text-slate-600 leading-relaxed">

                                    Kategori untuk menu makanan utama seperti nasi goreng,
                                    ayam geprek, mie goreng, dan berbagai menu berat lainnya.

                                </p>

                            </div>

                            {{-- Metadata --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">

                                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">

                                    <p class="text-xs uppercase tracking-wide text-slate-500">
                                        Dibuat
                                    </p>

                                    <p class="mt-2 font-medium text-slate-800">
                                        22 Juli 2025
                                    </p>

                                </div>

                                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">

                                    <p class="text-xs uppercase tracking-wide text-slate-500">
                                        Terakhir Diubah
                                    </p>

                                    <p class="mt-2 font-medium text-slate-800">
                                        23 Juli 2025
                                    </p>

                                </div>

                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="px-6 py-4 border-t border-slate-100 flex flex-col sm:flex-row justify-end gap-3">

                            <button @click="openShowCategory = false"
                                class="w-full sm:w-auto px-5 py-3 rounded-2xl bg-brand-600 hover:bg-brand-700 text-white transition">

                                Tutup

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </template>
    </div>

</x-app-layout>