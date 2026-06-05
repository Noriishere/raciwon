<header class="h-20 bg-white border-b border-orange-100 flex items-center justify-between px-8">

    <div>

        <h2 class="text-xl font-bold text-slate-800">
            {{ $title ?? 'Dashboard' }}
        </h2>

        <p class="text-sm text-slate-500">
            Selamat datang kembali, {{ auth()->user()->name }}
        </p>

    </div>

    <div class="flex items-center gap-4">

        <button class="w-11 h-11 rounded-xl bg-amber-50 text-brand-600">

            <i class="fa-regular fa-bell"></i>

        </button>

    </div>

</header>