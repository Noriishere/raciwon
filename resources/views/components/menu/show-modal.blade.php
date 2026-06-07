<template x-teleport="body">

                <div x-show="openShowMenu" x-cloak class="fixed inset-0 z-[99999]">

                    {{-- Backdrop --}}
                    <div @click="openShowMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md"
                        x-transition.opacity>
                    </div>

                    {{-- Drawer --}}
                    <div class="absolute right-0 top-0 h-full w-full max-w-xl bg-white shadow-2xl"
                        x-transition:enter="transform transition ease-out duration-300"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in duration-200"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-brand-600 to-brand-500 p-6 text-white">

                            <div class="flex justify-between items-start">

                                <div>

                                    <p class="text-orange-100 text-sm">
                                        Detail Menu
                                    </p>

                                    <h2 class="text-2xl font-bold mt-1">
                                        Nasi Goreng Spesial
                                    </h2>

                                </div>

                                <button @click="openShowMenu = false"
                                    class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20">

                                    <i class="fa-solid fa-xmark"></i>

                                </button>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="h-[calc(100%-88px)] overflow-y-auto">

                            {{-- Image --}}
                            <div
                                class="h-64 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-bowl-food text-7xl text-brand-400"></i>

                            </div>

                            <div class="p-6 space-y-6">

                                {{-- Status --}}
                                <div class="flex gap-2">

                                    <span
                                        class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                        Aktif

                                    </span>

                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                        Makanan

                                    </span>

                                </div>

                                {{-- Harga --}}
                                <div>

                                    <p class="text-sm text-slate-500">
                                        Harga Jual
                                    </p>

                                    <h3 class="text-4xl font-bold text-brand-600 mt-2">
                                        Rp 25.000
                                    </h3>

                                </div>

                                {{-- Deskripsi --}}
                                <div>

                                    <p class="text-sm font-semibold text-slate-700 mb-2">
                                        Deskripsi
                                    </p>

                                    <p class="text-slate-500 leading-relaxed">
                                        Nasi goreng dengan topping ayam, telur,
                                        dan sayuran segar.
                                    </p>

                                </div>

                                {{-- Recipe --}}
                                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

                                    <div class="flex justify-between items-center">

                                        <div>

                                            <h4 class="font-semibold">
                                                Recipe
                                            </h4>

                                            <p class="text-sm text-slate-500">
                                                Terhubung dengan inventory
                                            </p>

                                        </div>

                                        <span
                                            class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-medium">

                                            Tersedia

                                        </span>

                                    </div>

                                </div>

                                {{-- Metadata --}}
                                <div class="border-t pt-4 space-y-3">

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Dibuat
                                        </span>

                                        <span>
                                            12 Jun 2025
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-slate-500">
                                            Terakhir Diubah
                                        </span>

                                        <span>
                                            20 Jun 2025
                                        </span>

                                    </div>

                                </div>

                                {{-- Actions --}}
                                <div class="pt-4">

                                    <button @click="
                                openShowMenu = false;
                                openEditMenu = true;
                            " class="w-full py-3 rounded-xl bg-brand-600 text-white font-medium hover:bg-brand-700">

                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                        Edit Menu

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </template>