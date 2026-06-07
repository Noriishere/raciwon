<aside :class="sidebarOpen ? 'w-72' : 'w-20'"
    class="hidden lg:flex fixed left-0 top-0 h-screen z-40 bg-brand-700 text-white flex-col transition-all duration-300">

    <div class="h-20 px-4 flex items-center border-b border-white/10"
        :class="sidebarOpen ? 'justify-between' : 'justify-center'">

        <div x-show="sidebarOpen" x-transition.opacity class="overflow-hidden">

            <h1 class="font-brand text-4xl leading-none text-white">
                RACIWON
            </h1>

            <p class="text-xs text-orange-100 tracking-wide mt-1">
                Smart Culinary Management
            </p>

        </div>

        <button @click="sidebarOpen = !sidebarOpen"
            class="w-10 h-10 rounded-lg hover:bg-brand-600 transition flex items-center justify-center">

            <i class="fa-solid fa-bars"></i>

        </button>

    </div>

    <nav class="flex-1 p-4 space-y-1">

        <a href="{{ route('admin.dashboard') }}" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'" class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('admin.dashboard')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-chart-pie w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Dashboard
            </span>

        </a>

        <a href="{{ route('admin.orders') }}" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'" class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('admin.orders')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-receipt w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Orders
            </span>

        </a>

        <a href="{{ route('admin.menu') }}" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'" class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('admin.menu')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-utensils w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Menu
            </span>

        </a>

        <a href="{{ route('admin.categories') }}" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('admin.categories')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-layer-group w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Categories
            </span>

        </a>

        <a href="{{ route('admin.inventory') }}" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('admin.inventory')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-layer-group w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Inventory
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-arrow-right-arrow-left w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Stock Movements
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-wallet w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Expenses
            </span>

        </a>

        <div class="my-4 border-t border-white/10"></div>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-file-lines w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Reports
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-chart-line w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Analytics
            </span>

        </a>

        @if(auth()->user()?->role === 'owner')

            <div class="my-4 border-t border-white/10"></div>

            <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                <i class="fa-solid fa-users w-5 text-center"></i>

                <span x-show="sidebarOpen" x-transition>
                    Users
                </span>

            </a>

        @endif

    </nav>

    <div class="p-4 border-t border-white/10">

        <div class="bg-brand-600 rounded-2xl p-4">

            <div class="flex items-center" :class="sidebarOpen ? 'gap-3' : 'justify-center'">

                <div class="w-11 h-11 rounded-full bg-white text-brand-700 flex items-center justify-center font-bold">

                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                </div>

                <div x-show="sidebarOpen" x-transition>

                    <p class="font-semibold">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-orange-100 capitalize">
                        {{ auth()->user()->role }}
                    </p>

                </div>

            </div>

            <form x-show="sidebarOpen" x-transition method="POST" action="{{ route('logout') }}" class="mt-4">

                @csrf

                <button type="submit"
                    class="w-full py-2 rounded-xl bg-white text-brand-700 font-medium hover:bg-orange-50 transition">

                    <i class="fa-solid fa-right-from-bracket mr-2"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

</aside>
{{-- MOBILE SIDEBAR --}}
<template x-teleport="body">

    <div
        x-show="mobileMenuOpen"
        x-cloak
        class="fixed inset-0 z-[99999] lg:hidden">

        {{-- Backdrop --}}
        <div
            @click="mobileMenuOpen = false"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"

            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"

            x-transition:leave="transition-opacity ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
        </div>

        {{-- Sidebar --}}
        <aside
            class="absolute left-0 top-0 h-full w-72 bg-brand-700 text-white flex flex-col shadow-2xl"

            x-transition:enter="transform transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"

            x-transition:leave="transform transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">

            {{-- Header --}}
            <div
                class="h-20 px-5 flex items-center justify-between border-b border-white/10">

                <div>

                    <h1 class="font-brand text-4xl leading-none text-white">
                        RACIWON
                    </h1>

                    <p class="text-xs text-orange-100 tracking-wide mt-1">
                        Smart Culinary Management
                    </p>

                </div>

                <button
                    @click="mobileMenuOpen = false"
                    class="w-10 h-10 rounded-xl hover:bg-brand-600 transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            {{-- Navigation --}}
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">

                <a
                    href="{{ route('admin.dashboard') }}"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-white text-brand-700 font-semibold shadow-md'
                        : 'hover:bg-brand-600 text-orange-50' }}">

                    <i class="fa-solid fa-chart-pie w-5 text-center"></i>

                    <span>Dashboard</span>

                </a>

                <a
                    href="{{ route('admin.orders') }}"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition {{ request()->routeIs('admin.orders')
                        ? 'bg-white text-brand-700 font-semibold shadow-md'
                        : 'hover:bg-brand-600 text-orange-50' }}">

                    <i class="fa-solid fa-receipt w-5 text-center"></i>

                    <span>Orders</span>

                </a>

                <a
                    href="{{ route('admin.menu') }}"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition {{ request()->routeIs('admin.menu')
                        ? 'bg-white text-brand-700 font-semibold shadow-md'
                        : 'hover:bg-brand-600 text-orange-50' }}">

                    <i class="fa-solid fa-utensils w-5 text-center"></i>

                    <span>Menu</span>

                </a>

                <a
                    href="{{ route('admin.categories') }}"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition {{ request()->routeIs('admin.categories')
                        ? 'bg-white text-brand-700 font-semibold shadow-md'
                        : 'hover:bg-brand-600 text-orange-50' }}">

                    <i class="fa-solid fa-layer-group w-5 text-center"></i>

                    <span>Categories</span>

                </a>

                <a
                    href="#"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                    <i class="fa-solid fa-boxes-stacked w-5 text-center"></i>

                    <span>Inventory</span>

                </a>

                <a
                    href="#"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                    <i class="fa-solid fa-arrow-right-arrow-left w-5 text-center"></i>

                    <span>Stock Movements</span>

                </a>

                <a
                    href="#"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                    <i class="fa-solid fa-wallet w-5 text-center"></i>

                    <span>Expenses</span>

                </a>

                <div class="my-4 border-t border-white/10"></div>

                <a
                    href="#"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                    <i class="fa-solid fa-file-lines w-5 text-center"></i>

                    <span>Reports</span>

                </a>

                <a
                    href="#"
                    @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                    <i class="fa-solid fa-chart-line w-5 text-center"></i>

                    <span>Analytics</span>

                </a>

                @if(auth()->user()?->role === 'owner')

                    <div class="my-4 border-t border-white/10"></div>

                    <a
                        href="#"
                        @click="mobileMenuOpen = false"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                        <i class="fa-solid fa-users w-5 text-center"></i>

                        <span>Users</span>

                    </a>

                @endif

            </nav>

            {{-- User Card --}}
            <div class="p-4 border-t border-white/10">

                <div class="bg-brand-600 rounded-2xl p-4">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-11 h-11 rounded-full bg-white text-brand-700 flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                        </div>

                        <div>

                            <p class="font-semibold">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-orange-100 capitalize">
                                {{ auth()->user()->role }}
                            </p>

                        </div>

                    </div>

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="mt-4">

                        @csrf

                        <button
                            type="submit"
                            class="w-full py-2 rounded-xl bg-white text-brand-700 font-medium hover:bg-orange-50 transition">

                            <i class="fa-solid fa-right-from-bracket mr-2"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </aside>

    </div>

</template>