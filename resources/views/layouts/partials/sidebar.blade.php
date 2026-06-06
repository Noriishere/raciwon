<aside :class="sidebarOpen ? 'w-72' : 'w-20'"
    class="hidden lg:flex bg-brand-700 text-white flex-col transition-all duration-300">

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

        <a href="{{ route('dashboard') }}" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'" class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('dashboard')
    ? 'bg-white text-brand-700 font-semibold shadow-md'
    : 'hover:bg-brand-600 text-orange-50' }}">

            <i class="fa-solid fa-chart-pie w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Dashboard
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-receipt w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Orders
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-utensils w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Menu
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-layer-group w-5 text-center"></i>

            <span x-show="sidebarOpen" x-transition>
                Categories
            </span>

        </a>

        <a href="#" :class="sidebarOpen ? 'justify-start gap-3' : 'justify-center'"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-brand-600 transition">

            <i class="fa-solid fa-boxes-stacked w-5 text-center"></i>

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