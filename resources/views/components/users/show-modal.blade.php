{{-- Show User Modal --}}
<template x-teleport="body">

    <div x-show="openShowUser" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openShowUser = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop class="relative w-full
                   max-w-sm
                   sm:max-w-2xl
                   lg:max-w-4xl
                   bg-white rounded-3xl shadow-2xl overflow-hidden
                   flex flex-col
                   max-h-[90vh]" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-6 sm:px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold">
                            Detail User
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Informasi lengkap pengguna sistem.
                        </p>

                    </div>

                    <button @click="openShowUser = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-6 sm:p-8">

                <div class="grid lg:grid-cols-3 gap-6">

                    {{-- Information --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-6">

                            <div class="bg-slate-50 rounded-3xl p-6">

                                <h3 class="font-bold text-lg mb-5">
                                    Informasi Pengguna
                                </h3>

                                <div class="grid md:grid-cols-2 gap-5">

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Nama Lengkap
                                        </p>

                                        <p class="font-semibold mt-1">
                                            Nori
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Email
                                        </p>

                                        <p class="font-semibold mt-1">
                                            nori@raciwon.com
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Role
                                        </p>

                                        <p class="font-semibold mt-1 text-blue-600">
                                            Owner
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Status
                                        </p>

                                        <p class="font-semibold mt-1 text-green-600">
                                            Active
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Dibuat Pada
                                        </p>

                                        <p class="font-semibold mt-1">
                                            08 Juni 2026
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Last Login
                                        </p>

                                        <p class="font-semibold mt-1">
                                            Hari Ini, 09:30
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <div class="bg-slate-50 rounded-3xl p-6">

                                <h3 class="font-bold text-lg mb-4">
                                    Activity Summary
                                </h3>

                                <div class="space-y-4">

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Total Login
                                        </span>

                                        <span class="font-semibold">
                                            256
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Orders Managed
                                        </span>

                                        <span class="font-semibold">
                                            1.245
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Last Activity
                                        </span>

                                        <span class="font-semibold">
                                            5 Menit Lalu
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Profile Card --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-52 bg-gradient-to-br from-brand-50 to-orange-100 flex items-center justify-center">

                                <div class="w-28 h-28 rounded-full bg-white shadow-lg flex items-center justify-center">

                                    <i class="fa-solid fa-user text-5xl text-brand-500">
                                    </i>

                                </div>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                    Owner

                                </span>

                                <h4 class="font-bold text-xl mt-4">
                                    Nori
                                </h4>

                                <p class="text-slate-500 text-sm mt-1">
                                    nori@raciwon.com
                                </p>

                                <div class="mt-5">

                                    <div class="rounded-2xl bg-green-50 border border-green-200 p-4">

                                        <div class="flex gap-3">

                                            <i class="fa-solid fa-circle-check text-green-600 mt-0.5">
                                            </i>

                                            <p class="text-sm text-green-700">

                                                Akun aktif dan memiliki akses penuh
                                                ke sistem RACIWON.

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 sm:px-8 py-4 bg-slate-50 border-t flex justify-end">

                <button @click="openShowUser = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Tutup

                </button>

            </div>

        </div>

    </div>

</template>