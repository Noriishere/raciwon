<x-app-layout>

    <div x-data="{
        openCreateMenu:false,
        openEditMenu:false,
        openShowMenu:false,
        openDeleteMenu:false,
        openRecipeMenu:false,
        recipeItems:[],

        async loadRecipe(menuId) {

            try {

                const response = await fetch(
                    `/admin/recipe/${menuId}`
                );

                const result = await response.json();

                this.recipeItems = result.data.map(item => ({
                    inventory_id: item.inventory_id,
                    quantity: item.quantity
                }));

            } catch(error) {

                console.error(error);

                this.recipeItems = [];

            }

        }
        selectedMenu:{
            id:null,
            name:''
        }
        selectedMenu:{
            id:null,
            category_id:null,
            name:'',
            image:null,
            description:'',
            price:'',
            status:''
        }
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
                                {{ $stats['total_menu'] }}
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
                                {{ $stats['active_menu'] }}
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
                                {{ $stats['inactive_menu'] }}
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
                                {{ $stats['total_category'] }}
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


                <form method="GET">

                    <div class="flex flex-col lg:flex-row gap-4">

                        {{-- Search --}}
                        <div class="flex-1 relative">

                            <i
                                class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            </i>

                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari nama menu..."
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="px-5 py-3 rounded-xl bg-brand-600 text-white font-medium hover:bg-brand-700 transition">

                            <i class="fa-solid fa-magnifying-glass mr-2"></i>

                            Cari

                        </button>

                    </div>

                    {{-- Category Filter --}}
                    <div class="flex flex-wrap gap-2 mt-4">

                        <a href="{{ route('admin.menu.index') }}" class="px-4 py-3 rounded-xl font-medium transition
            {{ request('category')
    ? 'bg-slate-100 hover:bg-slate-200'
    : 'bg-brand-600 text-white' }}">

                            Semua

                        </a>

                        @foreach ($categories as $category)

                                                <a href="{{ route('admin.menu.index', [
                                'category' => $category->id,
                                'search' => request('search')
                            ]) }}" class="px-4 py-3 rounded-xl font-medium transition
                                                                                                                                                                                                                {{ request('category') == $category->id
                                ? 'bg-brand-600 text-white'
                                : 'bg-slate-100 hover:bg-slate-200' }}">

                                                    {{ $category->name }}

                                                </a>

                        @endforeach

                    </div>

                </form>


            </div>


            {{-- Grid Menu --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                @forelse ($menus as $menu)

                            <div
                                class="bg-white rounded-3xl shadow-card overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-200">

                                @if ($menu->image)

                                    <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}"
                                        class="w-full h-48 object-cover">

                                @else

                                    <div class="h-48 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                        <i class="fa-solid fa-bowl-food text-6xl text-brand-400"></i>

                                    </div>

                                @endif

                                <div class="p-5">

                                    <div class="flex justify-between items-start">

                                        <div>

                                            <h3 class="font-bold text-lg text-slate-800">
                                                {{ $menu->name }}
                                            </h3>

                                            <p class="text-sm text-slate-500">
                                                {{ $menu->category->name }}
                                            </p>

                                        </div>

                                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                                                                                                                    {{ $menu->status === 'available'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-red-100 text-red-700' }}">

                                            {{ $menu->status === 'available' ? 'Aktif' : 'Nonaktif' }}

                                        </span>

                                    </div>
                                    <span class="inline-flex px-2 py-1 rounded-full bg-orange-100 text-orange-700 text-xs">

                                        {{ $menu->recipe_items_count }}
                                        Bahan

                                    </span>
                                    <p class="mt-4 text-2xl font-bold text-brand-600">

                                        Rp {{ number_format($menu->price, 0, ',', '.') }}

                                    </p>

                                    <p class="mt-2 text-sm text-slate-500 line-clamp-2">

                                        {{ $menu->description ?: 'Tidak ada deskripsi.' }}

                                    </p>

                                    <div class="mt-5 grid grid-cols-4 gap-2">

                                        <button
                                            @click="
                                                                                                                                        selectedMenu = @js($menu);
                                                                                                                                        openEditMenu = true;
                                                                                                                                    "
                                            class="flex-1 py-2.5 rounded-xl bg-brand-600 text-white font-medium hover:bg-brand-700 transition">

                                            <i class="fa-solid fa-pen-to-square mr-2"></i>

                                            Edit

                                        </button>
                                        <button @click="
                                    selectedMenu = @js($menu);

                                    await loadRecipe({{ $menu->id }});

                                    openRecipeMenu = true;
                                " class="rounded-xl bg-amber-100 text-amber-700 hover:bg-amber-200 transition">

                                            <i class="fa-solid fa-utensils"></i>

                                        </button>
                                        <button
                                            @click="
                                                                                                                                        selectedMenu = @js($menu);
                                                                                                                                        openShowMenu = true;
                                                                                                                                    "
                                            class="w-11 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

                                            <i class="fa-solid fa-eye"></i>

                                        </button>

                                        <button
                                            @click="
                                                                                                                                        selectedMenu = @js($menu);
                                                                                                                                        openDeleteMenu = true;
                                                                                                                                    "
                                            class="w-11 rounded-xl bg-red-100 text-red-600 hover:bg-red-200 transition">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </div>

                                </div>

                            </div>

                @empty

                    <div class="col-span-full">

                        <div class="bg-white rounded-3xl p-12 text-center shadow-card">

                            <div class="mx-auto w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center">

                                <i class="fa-solid fa-utensils text-4xl text-slate-300"></i>

                            </div>

                            <h3 class="mt-6 text-2xl font-bold text-slate-800">

                                Belum Ada Menu

                            </h3>

                            <p class="mt-2 text-slate-500">

                                Tambahkan menu pertama untuk mulai mengelola produk Anda.

                            </p>

                            <button @click="openCreateMenu = true"
                                class="mt-6 px-5 py-3 rounded-2xl bg-brand-600 text-white hover:bg-brand-700 transition">

                                <i class="fa-solid fa-plus mr-2"></i>

                                Tambah Menu

                            </button>

                        </div>

                    </div>

                @endforelse

            </div>


        </div>

        {{-- Pagination Dummy --}}
        <div class="flex justify-center">

            {{-- Pagination --}}
            @if ($menus->hasPages())

                <div class="mt-8">

                    {{ $menus->links() }}

                </div>

            @endif

        </div>

        <x-menu.create-modal :categories="$categories" />
        <x-menu.edit-modal :categories="$categories" />
        <x-menu.delete-modal />
        <x-menu.show-modal />
        <x-menu.recipe-modal :inventories="$inventories" />
    </div>

</x-app-layout>