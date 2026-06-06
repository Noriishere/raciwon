<header
    :class="sidebarOpen ? 'lg:left-72' : 'lg:left-20'"
    class="fixed top-0 right-0 z-30 h-20 bg-white border-b border-orange-100 shadow-sm transition-all duration-300">

    <div class="h-full px-8 flex items-center justify-between">

        <div>

            <h2 class="text-xl font-bold text-slate-800">
                Dashboard
            </h2>

            <p class="text-sm text-slate-500">
                Selamat datang kembali, {{ auth()->user()->name }}
            </p>

        </div>

        <button
            class="w-11 h-11 rounded-xl bg-amber-50 text-brand-600">

            <i class="fa-regular fa-bell"></i>

        </button>

    </div>

</header>