<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RACIWON') }}</title>

    {{-- Hearty Sacred --}}
    <style>
        @font-face {
            font-family: 'Hearty Sacred';
            src: url('/fonts/HeartySacred.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
    </style>

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {

                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        brand: ['Hearty Sacred', 'cursive'],
                    },

                    colors: {

                        brand: {
                            DEFAULT: '#EA580C',
                            50: '#FFF7ED',
                            100: '#FFEDD5',
                            200: '#FED7AA',
                            300: '#FDBA74',
                            400: '#FB923C',
                            500: '#F97316',
                            600: '#EA580C',
                            700: '#C2410C',
                            800: '#9A3412',
                            900: '#7C2D12',
                        },

                        amber: {
                            50: '#FFFBEB',
                            500: '#F59E0B',
                        },

                        success: '#16A34A',
                        warning: '#D97706',
                        danger: '#DC2626',
                        info: '#2563EB',
                    },

                    boxShadow: {
                        card: '0 10px 25px rgba(0,0,0,.08)',
                    },
                }
            }
        }
    </script>

    @stack('styles')
</head>

<body class="font-sans bg-amber-50 text-slate-800 antialiased">

    <div x-data="{ sidebarOpen: true }" class="min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main Wrapper --}}
        <div :class="sidebarOpen ? 'ml-72' : 'ml-20'" class="transition-all duration-300 min-h-screen">

            {{-- Navbar --}}
            @include('layouts.partials.navbar')

            {{-- Content --}}
            <main class="px-6 pb-6 pt-28 lg:px-8">

                @isset($header)
                    <div class="mb-6">
                        {{ $header }}
                    </div>
                @endisset

                {{ $slot }}

            </main>

        </div>

    </div>

    @stack('scripts')

</body>

</html>