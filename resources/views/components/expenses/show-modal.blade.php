{{-- Show Expense Modal --}}
<template x-teleport="body">

    <div x-show="openShowExpense" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openShowExpense = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
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
            <div class="shrink-0 bg-gradient-to-r from-brand-600 to-brand-500 px-6 sm:px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold">
                            Detail Pengeluaran
                        </h2>

                        <p class="mt-1 text-orange-100">
                            Informasi lengkap pengeluaran operasional.
                        </p>

                    </div>

                    <button @click="openShowExpense = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-6 sm:p-8">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Detail --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-6">

                            {{-- Information --}}
                            <div class="bg-slate-50 rounded-3xl p-6">

                                <h3 class="font-bold text-lg mb-5">
                                    Informasi Pengeluaran
                                </h3>

                                <div class="grid md:grid-cols-2 gap-5">

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Judul
                                        </p>

                                        <p class="font-semibold mt-1">
                                            Pembelian Beras
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Nominal
                                        </p>

                                        <p class="font-semibold text-red-600 mt-1">
                                            Rp 250.000
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Tanggal
                                        </p>

                                        <p class="font-semibold mt-1">
                                            08 Juni 2026
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Dibuat Oleh
                                        </p>

                                        <p class="font-semibold mt-1">
                                            Owner
                                        </p>

                                    </div>

                                    <div>

                                        <p class="text-sm text-slate-500">
                                            Dibuat Pada
                                        </p>

                                        <p class="font-semibold mt-1">
                                            08 Juni 2026 • 09:30
                                        </p>

                                    </div>

                                </div>

                            </div>

                            {{-- Description --}}
                            <div class="bg-slate-50 rounded-3xl p-6">

                                <h3 class="font-bold text-lg mb-4">
                                    Deskripsi
                                </h3>

                                <p class="text-slate-600 leading-relaxed">

                                    Pembelian stok beras premium untuk kebutuhan
                                    operasional restoran selama satu minggu.

                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Summary --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-52 bg-gradient-to-br from-red-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-wallet text-6xl text-brand-300"></i>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                                    Expense

                                </span>

                                <h4 class="font-bold text-lg mt-4">
                                    Ringkasan
                                </h4>

                                <p class="text-slate-500 text-sm mt-1">
                                    Detail pengeluaran.
                                </p>

                                <div class="mt-5 space-y-3">

                                    <div class="flex justify-between">

                                        <span class="text-sm text-slate-500">
                                            Nominal
                                        </span>

                                        <span class="font-bold text-red-600">
                                            Rp 250.000
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-sm text-slate-500">
                                            Tanggal
                                        </span>

                                        <span class="font-semibold">
                                            08 Jun 2026
                                        </span>

                                    </div>

                                </div>

                                <div class="mt-5 rounded-2xl border border-red-200 bg-red-50 p-4">

                                    <div class="flex gap-3">

                                        <i class="fa-solid fa-circle-info text-red-500 mt-0.5">
                                        </i>

                                        <p class="text-xs text-red-700">

                                            Pengeluaran ini telah tercatat
                                            dalam laporan keuangan dan
                                            perhitungan profit bisnis.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="shrink-0 px-6 sm:px-8 py-4 bg-slate-50 border-t flex justify-end">

                <button @click="openShowExpense = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Tutup

                </button>

            </div>

        </div>

    </div>

</template>