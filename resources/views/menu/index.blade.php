<x-app-layout>

    <div x-data="{
    openCreateMenu:false,
    openEditMenu:false,
    openShowMenu:false,
    openDeleteMenu:false
}">

        <div class="space-y-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h1 class="text-3xl font-bold">
                            Manajemen Menu
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Kelola seluruh menu makanan dan minuman yang tersedia pada bisnis Anda.
                        </p>

                    </div>

                    <div class="flex gap-3">

                        <button class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition">

                            <i class="fa-solid fa-file-import mr-2"></i>
                            Import

                        </button>

                        <button @click="openCreateMenu = true"
                            class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Menu

                        </button>

                    </div>

                </div>

            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Menu
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                48
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-600 flex items-center justify-center">

                            <i class="fa-solid fa-utensils text-xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Menu Aktif
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                42
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                            <i class="fa-solid fa-circle-check text-xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Nonaktif
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                6
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-ban text-xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Kategori
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                8
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <i class="fa-solid fa-layer-group text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="flex flex-col lg:flex-row gap-4">

                    <div class="flex-1 relative">

                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                        </i>

                        <input type="text" placeholder="Cari nama menu..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                    </div>

                    <div class="flex flex-wrap gap-2">

                        <button class="px-4 py-3 rounded-xl bg-brand-600 text-white font-medium">

                            Semua

                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                            Makanan

                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                            Minuman

                        </button>

                        <button class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                            Snack

                        </button>

                    </div>

                </div>

            </div>

            {{-- Grid Menu --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Card --}}
                @for($i = 0; $i < 8; $i++)

                    <div
                        class="bg-white rounded-3xl shadow-card overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-200">

                        <div class="h-48 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                            <i class="fa-solid fa-bowl-food text-6xl text-brand-400">
                            </i>

                        </div>

                        <div class="p-5">

                            <div class="flex justify-between items-start">

                                <div>

                                    <h3 class="font-bold text-lg text-slate-800">
                                        Nasi Goreng Spesial
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Makanan
                                    </p>

                                </div>

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                    Aktif

                                </span>

                            </div>

                            <p class="mt-4 text-2xl font-bold text-brand-600">

                                Rp 25.000

                            </p>

                            <p class="mt-2 text-sm text-slate-500 line-clamp-2">

                                Nasi goreng dengan topping ayam, telur, dan sayuran segar.

                            </p>

                            <div class="mt-5 flex gap-2">

                                <button @click="openEditMenu = true"
                                    class="flex-1 py-2.5 rounded-xl bg-brand-600 text-white font-medium hover:bg-brand-700 transition">

                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                    Edit

                                </button>

                                <button @click="openShowMenu = true"
                                    class="w-11 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                @endfor

            </div>

            {{-- Pagination Dummy --}}
            <div class="flex justify-center">

                <div class="bg-white rounded-2xl shadow-card p-2 flex gap-2">

                    <button class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200">

                        <i class="fa-solid fa-chevron-left"></i>

                    </button>

                    <button class="w-10 h-10 rounded-xl bg-brand-600 text-white">

                        1

                    </button>

                    <button class="w-10 h-10 rounded-xl hover:bg-slate-100">

                        2

                    </button>

                    <button class="w-10 h-10 rounded-xl hover:bg-slate-100">

                        3

                    </button>

                    <button class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200">

                        <i class="fa-solid fa-chevron-right"></i>

                    </button>

                </div>

            </div>
            {{-- Edit Menu Modal --}}
            <template x-teleport="body">

                <div x-show="openEditMenu" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    {{-- Backdrop --}}
                    <div @click="openEditMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
                    </div>

                    {{-- Modal --}}
                    <div @click.stop class="relative w-full max-w-5xl mx-auto my-10
           bg-white rounded-3xl overflow-hidden shadow-2xl" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-8 py-6 text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h2 class="text-2xl font-bold">
                                        Edit Menu
                                    </h2>

                                    <p class="text-orange-100 mt-1">
                                        Perbarui informasi menu yang tersedia.
                                    </p>

                                </div>

                                <div class="flex items-center gap-3">

                                    <span class="px-3 py-1 rounded-full bg-white/20 text-white text-xs font-semibold">

                                        ID #MENU001

                                    </span>

                                    <button type="button" @click="openEditMenu = false"
                                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                                        <i class="fa-solid fa-xmark"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="p-8 overflow-y-auto max-h-[calc(90vh-160px)]">

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                                {{-- Form --}}
                                <div class="lg:col-span-2">

                                    <div class="space-y-3">

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Nama Menu
                                            </label>

                                            <input type="text" value="Nasi Goreng Spesial"
                                                class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500">

                                        </div>

                                        <div class="grid md:grid-cols-2 gap-4">

                                            <div>

                                                <label class="block mb-2 text-sm font-medium">
                                                    Harga
                                                </label>

                                                <input type="number" value="25000"
                                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                            </div>

                                            <div>

                                                <label class="block mb-2 text-sm font-medium">
                                                    Kategori
                                                </label>

                                                <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                    <option selected>
                                                        Makanan
                                                    </option>

                                                    <option>
                                                        Minuman
                                                    </option>

                                                    <option>
                                                        Snack
                                                    </option>

                                                </select>

                                            </div>

                                        </div>

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Status
                                            </label>

                                            <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                <option selected>
                                                    Aktif
                                                </option>

                                                <option>
                                                    Nonaktif
                                                </option>

                                            </select>

                                        </div>

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Deskripsi
                                            </label>

                                            <textarea rows="6"
                                                class="w-full rounded-xl border border-slate-200 px-4 py-3">Nasi goreng dengan topping ayam, telur, dan sayuran segar.</textarea>

                                        </div>

                                    </div>

                                </div>

                                {{-- Preview --}}
                                <div>

                                    <div class="border border-slate-200 rounded-3xl overflow-hidden">

                                        <div
                                            class="h-52 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                            <i class="fa-solid fa-bowl-food text-6xl text-brand-400"></i>

                                        </div>

                                        <div class="p-5">

                                            <button type="button"
                                                class="w-full py-3 border-2 border-dashed border-slate-300 rounded-xl hover:border-brand-400 transition">

                                                <i class="fa-solid fa-camera mr-2"></i>

                                                Ganti Gambar

                                            </button>

                                            <div class="mt-5 flex items-center gap-2">

                                                <span
                                                    class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                                    Aktif

                                                </span>

                                                <span
                                                    class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                                    Makanan

                                                </span>

                                            </div>

                                            <h4 class="font-bold text-lg mt-4">
                                                Nasi Goreng Spesial
                                            </h4>

                                            <p class="text-slate-500 text-sm mt-1">
                                                Menu favorit pelanggan.
                                            </p>

                                            <p class="mt-4 text-3xl font-bold text-brand-600">
                                                Rp 25.000
                                            </p>

                                            <div class="mt-6 pt-4 border-t">

                                                <div class="flex justify-between text-sm">

                                                    <span class="text-slate-500">
                                                        Dibuat
                                                    </span>

                                                    <span class="font-medium">
                                                        12 Jun 2025
                                                    </span>

                                                </div>

                                                <div class="flex justify-between text-sm mt-2">

                                                    <span class="text-slate-500">
                                                        Diubah
                                                    </span>

                                                    <span class="font-medium">
                                                        20 Jun 2025
                                                    </span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="px-8 py-2 bg-slate-50 border-t">

                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

                                <button type="button" @click="
                                        openEditMenu = false;
                                        openDeleteMenu = true;
                                    " class="px-5 py-3 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition">

                                    <i class="fa-solid fa-trash mr-2"></i>
                                    Hapus Menu

                                </button>

                                <div class="flex gap-3">

                                    <button type="button" @click="openEditMenu = false"
                                        class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                                        Batal

                                    </button>

                                    <button type="submit"
                                        class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                                        <i class="fa-solid fa-floppy-disk mr-2"></i>

                                        Update Menu

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </template>
            {{-- Create Menu Modal --}}
            <template x-teleport="body">

                <div x-show="openCreateMenu" x-cloak
                    class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    {{-- Backdrop --}}
                    <div @click="openCreateMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
                    </div>

                    {{-- Modal --}}
                    <div @click.stop class="relative w-full max-w-5xl max-h-[90vh]
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-8 py-6 text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h2 class="text-2xl font-bold">
                                        Tambah Menu Baru
                                    </h2>

                                    <p class="text-orange-100 mt-1">
                                        Tambahkan menu makanan atau minuman baru.
                                    </p>

                                </div>

                                <button type="button" @click="openCreateMenu = false"
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
                                                Nama Menu
                                            </label>

                                            <input type="text" placeholder="Contoh: Nasi Goreng Spesial"
                                                class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500">

                                        </div>

                                        <div class="grid md:grid-cols-2 gap-4">

                                            <div>

                                                <label class="block mb-2 text-sm font-medium">
                                                    Harga
                                                </label>

                                                <input type="number" placeholder="25000"
                                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                            </div>

                                            <div>

                                                <label class="block mb-2 text-sm font-medium">
                                                    Kategori
                                                </label>

                                                <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                    <option>Makanan</option>
                                                    <option>Minuman</option>
                                                    <option>Snack</option>

                                                </select>

                                            </div>

                                        </div>

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Status
                                            </label>

                                            <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                <option>Aktif</option>
                                                <option>Nonaktif</option>

                                            </select>

                                        </div>

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Deskripsi
                                            </label>

                                            <textarea rows="6"
                                                class="w-full rounded-xl border border-slate-200 px-4 py-3"></textarea>

                                        </div>

                                    </div>

                                </div>

                                {{-- Preview --}}
                                <div>

                                    <div class="border border-slate-200 rounded-3xl overflow-hidden">

                                        <div
                                            class="h-52 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                            <i class="fa-solid fa-image text-6xl text-brand-300">
                                            </i>

                                        </div>

                                        <div class="p-5">

                                            <button type="button"
                                                class="w-full py-3 border-2 border-dashed border-slate-300 rounded-xl hover:border-brand-400 transition">

                                                <i class="fa-solid fa-upload mr-2"></i>

                                                Upload Gambar

                                            </button>

                                            <span
                                                class="inline-block mt-5 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                                Aktif

                                            </span>

                                            <h4 class="font-bold text-lg mt-4">

                                                Preview Menu

                                            </h4>

                                            <p class="text-slate-500 text-sm mt-1">

                                                Nama menu akan tampil di sini.

                                            </p>

                                            <p class="mt-4 text-3xl font-bold text-brand-600">

                                                Rp 0

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="px-8 py-3 bg-slate-50 border-t flex justify-end gap-3">

                            <button type="button" @click="openCreateMenu = false"
                                class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                                Batal

                            </button>

                            <button type="submit"
                                class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                                <i class="fa-solid fa-floppy-disk mr-2"></i>

                                Simpan Menu

                            </button>

                        </div>

                    </div>

                </div>

            </template>
            <template x-teleport="body">

                <div x-show="openShowMenu" x-cloak class="fixed inset-0 z-[99999]">

                    {{-- Backdrop --}}
                    <div @click="openShowMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md"
                        x-transition.opacity>
                    </div>

                    {{-- Drawer --}}
                    <div class="absolute right-0 top-0 h-full w-full max-w-xl bg-white shadow-2xl"
                        x-transition:enter="transform transition ease-out duration-300"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in duration-200"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-brand-600 to-brand-500 p-6 text-white">

                            <div class="flex justify-between items-start">

                                <div>

                                    <p class="text-orange-100 text-sm">
                                        Detail Menu
                                    </p>

                                    <h2 class="text-2xl font-bold mt-1">
                                        Nasi Goreng Spesial
                                    </h2>

                                </div>

                                <button @click="openShowMenu = false"
                                    class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20">

                                    <i class="fa-solid fa-xmark"></i>

                                </button>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="h-[calc(100%-88px)] overflow-y-auto">

                            {{-- Image --}}
                            <div
                                class="h-64 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-bowl-food text-7xl text-brand-400"></i>

                            </div>

                            <div class="p-6 space-y-6">

                                {{-- Status --}}
                                <div class="flex gap-2">

                                    <span
                                        class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                        Aktif

                                    </span>

                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                        Makanan

                                    </span>

                                </div>

                                {{-- Harga --}}
                                <div>

                                    <p class="text-sm text-slate-500">
                                        Harga Jual
                                    </p>

                                    <h3 class="text-4xl font-bold text-brand-600 mt-2">
                                        Rp 25.000
                                    </h3>

                                </div>

                                {{-- Deskripsi --}}
                                <div>

                                    <p class="text-sm font-semibold text-slate-700 mb-2">
                                        Deskripsi
                                    </p>

                                    <p class="text-slate-500 leading-relaxed">
                                        Nasi goreng dengan topping ayam, telur,
                                        dan sayuran segar.
                                    </p>

                                </div>

                                {{-- Recipe --}}
                                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

                                    <div class="flex justify-between items-center">

                                        <div>

                                            <h4 class="font-semibold">
                                                Recipe
                                            </h4>

                                            <p class="text-sm text-slate-500">
                                                Terhubung dengan inventory
                                            </p>

                                        </div>

                                        <span
                                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-medium">

                                            Tersedia

                                        </span>

                                    </div>

                                </div>

                                {{-- Metadata --}}
                                <div class="border-t pt-4 space-y-3">

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Dibuat
                                        </span>

                                        <span>
                                            12 Jun 2025
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Terakhir Diubah
                                        </span>

                                        <span>
                                            20 Jun 2025
                                        </span>

                                    </div>

                                </div>

                                {{-- Actions --}}
                                <div class="pt-4">

                                    <button @click="
                                openShowMenu = false;
                                openEditMenu = true;
                            " class="w-full py-3 rounded-xl bg-brand-600 text-white font-medium hover:bg-brand-700">

                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                        Edit Menu

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </template>
            <template x-teleport="body">

                <div x-show="openDeleteMenu" x-cloak
                    class="fixed inset-0 z-[99999] flex items-center justify-center p-4"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    {{-- Backdrop --}}
                    <div @click="openDeleteMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
                    </div>

                    {{-- Modal --}}
                    <div @click.stop class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                        <div class="p-8 text-center">

                            {{-- Icon --}}
                            <div
                                class="mx-auto w-20 h-20 rounded-full bg-red-100 text-red-600 flex items-center justify-center">

                                <i class="fa-solid fa-trash text-3xl"></i>

                            </div>

                            <h3 class="mt-6 text-2xl font-bold text-slate-800">
                                Hapus Menu?
                            </h3>

                            <p class="mt-3 text-slate-500 leading-relaxed">

                                Menu

                                <span class="font-semibold text-slate-700">
                                    Nasi Goreng Spesial
                                </span>

                                akan dihapus secara permanen.

                            </p>

                            <div class="mt-3 p-3 rounded-2xl bg-red-50 text-red-600 text-sm">

                                Tindakan ini tidak dapat dibatalkan.

                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="px-6 pb-6">

                            <div class="grid grid-cols-2 gap-3">

                                <button type="button" @click="openDeleteMenu = false"
                                    class="py-3 rounded-xl bg-slate-100 hover:bg-slate-200 transition font-medium">

                                    Batal

                                </button>

                                <button type="submit"
                                    class="py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-medium transition">

                                    <i class="fa-solid fa-trash mr-2"></i>

                                    Hapus

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </template>
        </div>

</x-app-layout>