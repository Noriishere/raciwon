<x-app-layout>

    <div class="space-y-10">

        {{-- Hero --}}
        <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <h1 class="text-3xl lg:text-4xl font-bold">
                        Selamat Datang, {{ auth()->user()->name }}
                    </h1>

                    <p class="mt-3 text-orange-100">
                        Berikut ringkasan performa bisnis RACIWON hari ini.
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center">

                    <i class="fa-solid fa-chart-line text-2xl"></i>

                </div>

            </div>

        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Pendapatan Hari Ini
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            Rp 0
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Belum ada transaksi hari ini
                        </p>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                        <i class="fa-solid fa-wallet text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Pesanan Hari Ini
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            0
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Belum ada pesanan masuk
                        </p>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-receipt text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Laba Bulan Ini
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            Rp 0
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Menunggu data transaksi
                        </p>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                        <i class="fa-solid fa-chart-line text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Pelanggan
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            0
                        </h3>

                        <p class="text-xs text-slate-400 mt-2">
                            Belum ada pelanggan tercatat
                        </p>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center">

                        <i class="fa-solid fa-users text-xl"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- Grafik & Status Pesanan --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <div class="xl:col-span-2">

                <div class="bg-white rounded-3xl shadow-card p-6 h-[420px]">

                    <div class="flex items-center justify-between mb-6">

                        <h3 class="font-semibold text-lg">
                            Ringkasan Penjualan
                        </h3>

                        <span class="px-3 py-1 rounded-full bg-amber-50 text-brand-600 text-sm">

                            Segera Hadir

                        </span>

                    </div>

                    <div
                        class="h-[320px] border-2 border-dashed border-slate-200 rounded-2xl flex items-center justify-center">

                        <div class="text-center">

                            <i class="fa-solid fa-chart-area text-5xl text-slate-300 mb-4">
                            </i>

                            <p class="text-slate-400">
                                Grafik penjualan akan ditampilkan di sini
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div>

                <div class="bg-white rounded-3xl shadow-card p-6 h-[420px]">

                    <h3 class="font-semibold text-lg mb-8">
                        Status Pesanan
                    </h3>

                    <div class="space-y-5">

                        <div class="flex justify-between">
                            <span>Menunggu Konfirmasi</span>
                            <span class="font-semibold">0</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Diproses</span>
                            <span class="font-semibold">0</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Selesai</span>
                            <span class="font-semibold">0</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Dibatalkan</span>
                            <span class="font-semibold">0</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Widget Bawah --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-semibold text-lg mb-6">
                    Menu Terlaris
                </h3>

                <div class="text-center py-12 text-slate-400">

                    <i class="fa-solid fa-bowl-food text-4xl mb-4"></i>

                    <p>
                        Belum ada data penjualan
                    </p>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-semibold text-lg mb-6">
                    Peringatan Stok
                </h3>

                <div class="text-center py-12 text-slate-400">

                    <i class="fa-solid fa-boxes-stacked text-4xl mb-4"></i>

                    <p>
                        Semua stok dalam kondisi aman
                    </p>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-semibold text-lg mb-6">
                    Monitoring Waste
                </h3>

                <div class="text-center py-12 text-slate-400">

                    <i class="fa-solid fa-triangle-exclamation text-4xl mb-4"></i>

                    <p>
                        Belum ada data waste
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>