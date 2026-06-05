@extends('layouts.auth')

@section('content')

    <div class="min-h-screen grid lg:grid-cols-2">

        ```
        {{-- Left Branding --}}
        <div class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-600 to-brand-500">

            {{-- Decoration --}}
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white/10 blur-3xl">
            </div>

            <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] rounded-full bg-amber-400/20 blur-3xl">
            </div>

            <div class="relative z-10 flex flex-col justify-between w-full p-14 text-white">

                {{-- Brand --}}
                <div>

                    <div
                        class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/10 backdrop-blur border border-white/10">

                        <div class="w-8 h-8 rounded-lg bg-white text-brand-600 flex items-center justify-center font-black">
                            R
                        </div>

                        <span class="font-semibold tracking-widest">
                            RACIWON
                        </span>

                    </div>

                    <h1 class="mt-10 text-6xl font-black tracking-tight leading-none">
                        RACIWON
                    </h1>

                    <p class="mt-4 text-2xl font-medium text-orange-100">
                        Smart Culinary Management Platform
                    </p>

                    <p class="mt-6 max-w-xl text-orange-100 text-lg leading-relaxed">
                        Platform manajemen operasional UMKM kuliner untuk
                        inventaris, penjualan, keuangan, QR Ordering,
                        customer analytics, dan monitoring bisnis secara realtime.
                    </p>

                </div>

                {{-- Features --}}
                <div class="space-y-4">

                    <div class="flex items-center gap-4 rounded-2xl bg-white/10 backdrop-blur p-4 border border-white/10">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                            <i class="fa-solid fa-chart-line text-lg"></i>

                        </div>

                        <div>
                            <h4 class="font-semibold">
                                Sales Analytics
                            </h4>

                            <p class="text-sm text-orange-100">
                                Monitoring penjualan harian hingga bulanan
                            </p>
                        </div>

                    </div>

                    <div class="flex items-center gap-4 rounded-2xl bg-white/10 backdrop-blur p-4 border border-white/10">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                            <i class="fa-solid fa-boxes-stacked text-lg"></i>

                        </div>

                        <div>
                            <h4 class="font-semibold">
                                Inventory Tracking
                            </h4>

                            <p class="text-sm text-orange-100">
                                Monitoring stok bahan baku secara realtime
                            </p>
                        </div>

                    </div>

                    <div class="flex items-center gap-4 rounded-2xl bg-white/10 backdrop-blur p-4 border border-white/10">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                            <i class="fa-solid fa-wallet text-lg"></i>

                        </div>

                        <div>
                            <h4 class="font-semibold">
                                Financial Report
                            </h4>

                            <p class="text-sm text-orange-100">
                                Revenue, expense, dan profit dalam satu dashboard
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Dummy Stats --}}
                <div class="grid grid-cols-3 gap-4 mt-10">

                    <div class="rounded-2xl bg-white/10 backdrop-blur p-4 border border-white/10">

                        <p class="text-xs uppercase tracking-wider text-orange-100">
                            Orders
                        </p>

                        <p class="text-2xl font-bold mt-2">
                            128
                        </p>

                    </div>

                    <div class="rounded-2xl bg-white/10 backdrop-blur p-4 border border-white/10">

                        <p class="text-xs uppercase tracking-wider text-orange-100">
                            Revenue
                        </p>

                        <p class="text-2xl font-bold mt-2">
                            8.2M
                        </p>

                    </div>

                    <div class="rounded-2xl bg-white/10 backdrop-blur p-4 border border-white/10">

                        <p class="text-xs uppercase tracking-wider text-orange-100">
                            Low Stock
                        </p>

                        <p class="text-2xl font-bold mt-2">
                            24
                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- Right Form --}}
        <div class="flex items-center justify-center bg-amber-50 px-6 py-12">

            <div class="w-full max-w-md">

                {{-- Mobile --}}
                <div class="lg:hidden text-center mb-10">

                    <div
                        class="mx-auto w-16 h-16 rounded-2xl bg-brand-600 text-white flex items-center justify-center shadow-lg">

                        <span class="font-black text-2xl">
                            R
                        </span>

                    </div>

                    <h1 class="mt-4 text-4xl font-black tracking-wider text-brand-600">
                        RACIWON
                    </h1>

                </div>

                <div class="bg-white rounded-3xl border border-orange-100 shadow-xl p-8">

                    <div class="mb-8 text-center">

                        <h2 class="text-3xl font-bold text-slate-900">
                            Welcome Back
                        </h2>

                        <p class="mt-2 text-slate-500">
                            Login untuk mengakses dashboard RACIWON
                        </p>

                    </div>

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        {{-- Email --}}
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Email
                            </label>

                            <div class="relative">

                                <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                </i>

                                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                    placeholder="nama@email.com"
                                    class="w-full rounded-xl border border-slate-200 py-3 pl-12 pr-4 focus:border-brand-500 focus:ring-2 focus:ring-brand-500">

                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Password --}}
                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                </i>

                                <input id="password" type="password" name="password" required placeholder="••••••••"
                                    class="w-full rounded-xl border border-slate-200 py-3 pl-12 pr-12 focus:border-brand-500 focus:ring-2 focus:ring-brand-500">

                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">

                                    <i id="passwordIcon" class="fa-regular fa-eye">
                                    </i>

                                </button>

                            </div>

                            @error('password')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <div class="flex items-center justify-between mb-8">

                            <label class="flex items-center gap-2 text-sm text-slate-600">

                                <input type="checkbox" name="remember"
                                    class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">

                                Remember me

                            </label>

                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-brand-600 hover:text-brand-700">

                                    Lupa Password?

                                </a>
                            @endif

                        </div>

                        <button type="submit"
                            class="w-full rounded-xl bg-brand-600 py-3 text-white font-semibold hover:bg-brand-700 transition">

                            Login

                        </button>

                    </form>

                </div>

                <p class="mt-6 text-center text-sm text-slate-500">
                    © {{ date('Y') }} RACIWON • Smart Culinary Management Platform
                </p>

            </div>

        </div>
        ```

    </div>

    @push('scripts')

        <script>
            function togglePassword() {
                const input = document.getElementById('password');
                const icon = document.getElementById('passwordIcon');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }
        </script>

    @endpush

@endsection