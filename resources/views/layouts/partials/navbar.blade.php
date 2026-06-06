<header
    :class="{
        'lg:left-72': sidebarOpen,
        'lg:left-20': !sidebarOpen
    }"
    class="fixed top-0 left-0 right-0 z-30 h-20 bg-white border-b border-orange-100 flex items-center justify-between px-4 lg:px-8 transition-all duration-300">

    {{-- Left Section --}}
    <div>

        <div class="flex items-center gap-3">

            {{-- Mobile Menu --}}
            <button
                @click="mobileMenuOpen = true"
                class="lg:hidden w-11 h-11 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 transition flex items-center justify-center">

                <i class="fa-solid fa-bars"></i>

            </button>

            {{-- Title --}}
            <h2 class="text-xl lg:text-2xl font-bold text-slate-800">
                {{ $title ?? 'Dashboard' }}
            </h2>

        </div>

        {{-- Welcome Text --}}
        <p class="hidden sm:block text-sm text-slate-500 mt-1">
            Selamat datang kembali, {{ auth()->user()->name }}
        </p>

    </div>

    {{-- Right Section --}}
    <div class="flex items-center gap-3">

        {{-- Notification --}}
        <button
            class="relative w-11 h-11 rounded-xl bg-amber-50 text-brand-600 hover:bg-amber-100 transition flex items-center justify-center">

            <i class="fa-regular fa-bell"></i>

            {{-- Badge --}}
            <span
                class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full">
            </span>

        </button>

        {{-- User Info Desktop --}}
        <div class="hidden md:flex items-center gap-3">

            <div class="text-right">

                <p class="font-semibold text-sm text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-500 capitalize">
                    {{ auth()->user()->role }}
                </p>

            </div>

            <div
                class="w-11 h-11 rounded-full bg-brand-100 text-brand-700 font-bold flex items-center justify-center">

                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

            </div>

        </div>

    </div>

</header>