{{-- Detail Category Modal --}}
<template x-teleport="body">

    <div x-show="openShowCategory" x-cloak class="fixed inset-0 z-[99999] overflow-y-auto p-4"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openShowCategory = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        <div class="min-h-full flex items-center justify-center">

            {{-- Modal --}}
            <div @click.stop
                class="relative w-full max-w-xl my-8 max-h-[90vh] overflow-y-auto bg-white rounded-3xl shadow-2xl">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-6 py-5 text-white">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-orange-100 text-xs uppercase tracking-wider">
                                Category Details
                            </p>

                            <h2 class="font-brand text-3xl md:text-4xl mt-1">
                                Detail Kategori
                            </h2>

                        </div>

                        <button @click="openShowCategory = false"
                            class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                </div>

                {{-- Body --}}
                <div class="p-6">

                    {{-- Category Header --}}
                    <div class="bg-orange-50 border border-orange-100 rounded-3xl p-5">

                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                            <div
                                class="w-16 h-16 rounded-2xl bg-orange-100 text-brand-600 flex items-center justify-center text-3xl">

                                🍜

                            </div>

                            <div>

                                <h3 class="text-2xl font-bold text-slate-800">
                                    Makanan
                                </h3>

                                <p class="text-slate-500 text-sm mt-1">
                                    Kategori menu makanan utama
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Statistics --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">

                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">

                            <p class="text-xs uppercase tracking-wide text-slate-500">
                                Total Menu
                            </p>

                            <h4 class="text-3xl font-bold text-slate-800 mt-2">
                                18
                            </h4>

                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">

                            <p class="text-xs uppercase tracking-wide text-slate-500">
                                Status
                            </p>

                            <span
                                class="inline-flex mt-3 px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">

                                Active

                            </span>

                        </div>

                    </div>

                    {{-- Description --}}
                    <div class="mt-6 bg-white border border-slate-200 rounded-2xl p-5">

                        <p class="text-xs uppercase tracking-wide text-slate-500 mb-3">
                            Deskripsi
                        </p>

                        <p class="text-slate-600 leading-relaxed">

                            Kategori untuk menu makanan utama seperti nasi goreng,
                            ayam geprek, mie goreng, dan berbagai menu berat lainnya.

                        </p>

                    </div>

                    {{-- Metadata --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">

                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">

                            <p class="text-xs uppercase tracking-wide text-slate-500">
                                Dibuat
                            </p>

                            <p class="mt-2 font-medium text-slate-800">
                                22 Juli 2025
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">

                            <p class="text-xs uppercase tracking-wide text-slate-500">
                                Terakhir Diubah
                            </p>

                            <p class="mt-2 font-medium text-slate-800">
                                23 Juli 2025
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 border-t border-slate-100 flex flex-col sm:flex-row justify-end gap-3">

                    <button @click="openShowCategory = false"
                        class="w-full sm:w-auto px-5 py-3 rounded-2xl bg-brand-600 hover:bg-brand-700 text-white transition">

                        Tutup

                    </button>

                </div>

            </div>

        </div>

    </div>

</template>
