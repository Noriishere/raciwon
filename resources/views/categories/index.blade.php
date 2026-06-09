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
    openShowCategory:false,
    selectedCategory:{
    id:null,
    name:'',
    icon:'',
    description:''
}
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
                            {{ $stats['total_categories'] }}
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
                            {{ $stats['used_categories'] }}
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
                            {{ $stats['empty_categories'] }}
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
                            {{ $stats['total_menu'] }}
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

            @foreach ($categories as $category)

            <div class="bg-white rounded-3xl p-6 shadow-card hover:-translate-y-1 transition duration-300">

                <div class="flex items-start justify-between">

                    <div class="w-16 h-16 rounded-2xl bg-orange-100 text-brand-600 flex items-center justify-center">

                        <i class="{{ $category->icon }} text-2xl"></i>

                    </div>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                        {{ $category->menus_count }} Menu

                    </span>

                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800">

                    {{ $category->name }}

                </h3>

                <p class="text-sm text-slate-500 mt-2 leading-relaxed">

                    {{ $category->description }}

                </p>

                <div class="mt-6 flex gap-2">

                    <button @click="
                                    selectedCategory = @js($category);
                                    openShowCategory = true;
                                " class="flex-1 h-11 rounded-xl bg-slate-100 hover:bg-slate-200 transition">
                        <i class="fa-solid fa-eye"></i>
                    </button>

                    <button @click="
                                                                selectedCategory = {
                                                                    id: {{ $category->id }},
                                                                    name: @js($category->name),
                                                                    icon: @js($category->icon),
                                                                    description: @js($category->description)
                                                                };

                                                                openEditCategory = true;
                                                            "
                        class="flex-1 h-11 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200 transition">
                        <i class="fa-solid fa-pen"></i>
                    </button>

                    <button @click="
                        selectedCategory = @js($category);
                        openDeleteCategory = true;
                    " class="flex-1 h-11 rounded-xl bg-red-100 text-red-600 hover:bg-red-200 transition">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </div>

            </div>
            @empty
            <div
                class="col-span-full flex flex-col items-center justify-center p-12 bg-white rounded-3xl shadow-card text-center">
                <div class="w-20 h-20 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mb-4">
                    <i class="fa-solid fa-layer-group text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Ada Kategori</h3>
                <p class="text-slate-500 max-w-md">
                    Data kategori menu masih kosong. Silakan tambah kategori baru untuk mulai mengorganisir menu
                    kuliner.
                </p>
            </div>
            @endforeach

        </div>
        <x-categories.create-modal />
        <x-categories.edit-modal />
        <x-categories.delete-modal />
        <x-categories.show-modal />
    </div>

</x-app-layout>