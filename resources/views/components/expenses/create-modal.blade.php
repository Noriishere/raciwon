{{-- Create Expense Modal --}}
<template x-teleport="body">

    <div x-show="openCreateExpense" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openCreateExpense = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
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
                            Tambah Pengeluaran
                        </h2>

                        <p class="mt-1 text-orange-100">
                            Catat pengeluaran operasional bisnis.
                        </p>

                    </div>

                    <button type="button" @click="openCreateExpense = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-6 sm:p-8">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Form --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-5">

                            {{-- Date --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium text-slate-700">
                                    Tanggal Pengeluaran
                                </label>

                                <input type="date"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                            </div>

                            {{-- Title --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium text-slate-700">
                                    Judul Pengeluaran
                                </label>

                                <input type="text" placeholder="Contoh: Pembelian Beras"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                            </div>

                            {{-- Amount --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium text-slate-700">
                                    Nominal
                                </label>

                                <input type="number" placeholder="250000"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500">

                            </div>

                            {{-- Description --}}
                            <div>

                                <label class="block mb-2 text-sm font-medium text-slate-700">
                                    Deskripsi
                                </label>

                                <textarea rows="6" placeholder="Tambahkan catatan pengeluaran..."
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500 focus:border-brand-500"></textarea>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-48 bg-gradient-to-br from-red-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-wallet text-5xl text-brand-300"></i>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                                    Expense

                                </span>

                                <h4 class="font-bold text-lg mt-4">
                                    Preview
                                </h4>

                                <p class="text-sm text-slate-500 mt-1">
                                    Ringkasan pengeluaran.
                                </p>

                                <div class="mt-5 space-y-3">

                                    <div class="flex justify-between">

                                        <span class="text-sm text-slate-500">
                                            Tanggal
                                        </span>

                                        <span class="font-medium">
                                            Hari Ini
                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span class="text-sm text-slate-500">
                                            Nominal
                                        </span>

                                        <span class="font-bold text-red-600">
                                            Rp 0
                                        </span>

                                    </div>

                                </div>

                                <div class="mt-5 p-4 rounded-2xl bg-amber-50 border border-amber-200">

                                    <div class="flex gap-3">

                                        <i class="fa-solid fa-circle-info text-amber-500 mt-0.5">
                                        </i>

                                        <p class="text-xs text-amber-700">

                                            Pengeluaran akan masuk ke laporan
                                            keuangan dan analitik profit.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div
                class="shrink-0 px-6 sm:px-8 py-4 bg-slate-50 border-t flex flex-col-reverse sm:flex-row justify-end gap-3">

                <button type="button" @click="openCreateExpense = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button type="submit"
                    class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan Pengeluaran

                </button>

            </div>

        </div>

    </div>

</template>