@extends('layouts.auth')

@section('content')
    <div class="min-h-screen grid lg:grid-cols-2">

        {{-- Left Branding --}}
        <div class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-600 to-brand-500">

            {{-- Background Decoration --}}
            <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full bg-white/10 blur-3xl">
            </div>

            <div class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-amber-400/20 blur-3xl">
            </div>

            <div class="relative z-10 flex flex-col justify-between w-full p-12 text-white">

                {{-- Header --}}
                <div>

                    <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/10 backdrop-blur">

                        <i class="fa-solid fa-utensils"></i>

                        <span class="font-medium">
                            RACIKA
                        </span>

                    </div>

                    <h1 class="mt-8 text-5xl font-extrabold leading-tight">
                        RACIWON
                    </h1>

                    <p class="mt-4 text-2xl font-medium text-orange-100">
                        Smart Culinary Management Platform
                    </p>

                    <p class="mt-6 text-lg text-orange-100 max-w-lg">
                        Platform manajemen operasional UMKM kuliner untuk inventaris,
                        penjualan, keuangan, QR ordering, dan analitik bisnis.
                    </p>

                </div>

                {{-- Feature List --}}
                <div class="space-y-4">

                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur rounded-2xl p-4">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                            <i class="fa-solid fa-chart-line text-xl"></i>

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

                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur rounded-2xl p-4">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                            <i class="fa-solid fa-boxes-stacked text-xl"></i>

                        </div>

                        <div>
                            <h4 class="font-semibold">
                                Inventory Tracking
                            </h4>

                            <p class="text-sm text-orange-100">
                                Monitoring stok dan bahan baku secara realtime
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur rounded-2xl p-4">

                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                            <i class="fa-solid fa-wallet text-xl"></i>

                        </div>

                        <div>
                            <h4 class="font-semibold">
                                Financial Report
                            </h4>

                            <p class="text-sm text-orange-100">
                                Revenue, expense, profit dalam satu dashboard
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- Login Form --}}
        <div class="flex items-center justify-center bg-amber-50 px-6 py-12">

            <div class="w-full max-w-md">

                {{-- Mobile Logo --}}
                <div class="lg:hidden text-center mb-10">

                    <div
                        class="mx-auto w-16 h-16 rounded-2xl bg-brand-600 text-white flex items-center justify-center shadow-lg">

                        <i class="fa-solid fa-utensils text-2xl"></i>

                    </div>

                    <h1 class="mt-4 text-3xl font-bold">
                        RACIKA
                    </h1>

                </div>

                <div class="bg-white rounded-3xl shadow-card border border-orange-100 p-8">

                    <div class="mb-8">

                        <h2 class="text-3xl font-bold text-slate-900">
                            Selamat Datang
                        </h2>

                        <p class="mt-2 text-slate-500">
                            Login untuk mengakses dashboard RACIKA
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
                                    class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                            </div>

                            @error('email')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Password --}}
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Password

                            </label>

                            <div class="relative">

                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                </i>

                                <input type="password" name="password" required placeholder="••••••••"
                                    class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                            </div>

                            @error('password')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Remember --}}
                        <div class="flex items-center justify-between mb-8">

                            <label class="flex items-center gap-2">

                                <input type="checkbox" name="remember"
                                    class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">

                                <span class="text-sm text-slate-600">
                                    Remember me
                                </span>

                            </label>

                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-brand-600 hover:text-brand-700 font-medium">

                                    Lupa Password?

                                </a>
                            @endif

                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                            class="w-full py-3 rounded-xl bg-brand-600 hover:bg-brand-700 text-white font-semibold transition-all duration-200 shadow-lg shadow-orange-200">

                            Login

                        </button>

                    </form>

                </div>

                <p class="mt-6 text-center text-sm text-slate-500">
                    © {{ date('Y') }} RACIWON • Smart Culinary Management Platform
                </p>

            </div>

        </div>

    </div>
@endsection