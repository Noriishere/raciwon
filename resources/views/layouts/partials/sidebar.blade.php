<aside class="hidden lg:flex lg:w-72 bg-brand-700 text-white flex-col">

    {{-- Logo --}}
    <div class="h-20 px-6 flex items-center border-b border-white/10">

        <div>

            <h1 class="font-brand text-4xl leading-none text-white">
                RACIWON
            </h1>

            <p class="text-xs text-orange-100 tracking-wide mt-1">
                Smart Culinary Management
            </p>

        </div>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 p-4 space-y-1">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('dashboard')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-chart-pie w-5"></i>

            <span>
                Dashboard
            </span>

        </a>

        {{-- Orders --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-receipt w-5"></i>

            <span>
                Orders
            </span>

        </a>

        {{-- Menu --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-utensils w-5"></i>

            <span>
                Menu
            </span>

        </a>

        {{-- Categories --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-layer-group w-5"></i>

            <span>
                Categories
            </span>

        </a>

        {{-- Inventory --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-boxes-stacked w-5"></i>

            <span>
                Inventory
            </span>

        </a>

        {{-- Stock Movement --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-arrow-right-arrow-left w-5"></i>

            <span>
                Stock Movements
            </span>

        </a>

        {{-- Expenses --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-wallet w-5"></i>

            <span>
                Expenses
            </span>

        </a>

        <div class="my-4 border-t border-white/10"></div>

        {{-- Reports --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-file-lines w-5"></i>

            <span>
                Reports
            </span>

        </a>

        {{-- Analytics --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-chart-line w-5"></i>

            <span>
                Analytics
            </span>

        </a>

        @if(auth()->user()?->role === 'owner')

            <div class="my-4 border-t border-white/10"></div>

            {{-- Users --}}
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-brand-600 transition">

                <i class="fa-solid fa-users w-5"></i>

                <span>
                    Users
                </span>

            </a>

        @endif

    </nav>

    {{-- User --}}
    <div class="p-4 border-t border-white/10">

        <div class="bg-brand-600 rounded-2xl p-4">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-full bg-white text-brand-700 flex items-center justify-center font-bold">

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

            <form method="POST" action="{{ route('logout') }}" class="mt-4">

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