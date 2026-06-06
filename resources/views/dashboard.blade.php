<x-app-layout>

    <div class="space-y-6">

        {{-- Page Header --}}
        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Dashboard Analytics
            </h1>

            <p class="text-slate-500 mt-1">
                Monitor performa bisnis kuliner Anda secara realtime.
            </p>
        </div>

        {{-- Statistic Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl shadow-card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">
                            Revenue Today
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            Rp 0
                        </h3>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                        <i class="fa-solid fa-wallet text-xl"></i>

                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Orders Today
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            0
                        </h3>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-receipt text-xl"></i>

                    </div>

                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Profit This Month
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            Rp 0
                        </h3>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                        <i class="fa-solid fa-chart-line text-xl"></i>

                    </div>

                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">
                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-slate-500">
                            Customers
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            0
                        </h3>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center">

                        <i class="fa-solid fa-users text-xl"></i>

                    </div>

                </div>
            </div>

        </div>

        {{-- Chart Section --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <div class="xl:col-span-2">

                <div class="bg-white rounded-3xl shadow-card p-6 h-[400px]">

                    <div class="flex items-center justify-between mb-6">

                        <h3 class="font-semibold text-lg">
                            Sales Overview
                        </h3>

                        <span
                            class="px-3 py-1 rounded-full bg-amber-50 text-brand-600 text-sm">

                            Coming Soon

                        </span>

                    </div>

                    <div
                        class="h-[300px] border-2 border-dashed border-slate-200 rounded-2xl flex items-center justify-center">

                        <div class="text-center">

                            <i
                                class="fa-solid fa-chart-area text-5xl text-slate-300 mb-4">
                            </i>

                            <p class="text-slate-400">
                                Grafik Penjualan Akan Ditampilkan Di Sini
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div>

                <div class="bg-white rounded-3xl shadow-card p-6 h-[400px]">

                    <h3 class="font-semibold text-lg mb-6">
                        Order Status
                    </h3>

                    <div class="space-y-4">

                        <div class="flex justify-between">
                            <span>Pending</span>
                            <span class="font-semibold">0</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Confirmed</span>
                            <span class="font-semibold">0</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Completed</span>
                            <span class="font-semibold">0</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Cancelled</span>
                            <span class="font-semibold">0</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Bottom Widgets --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-semibold text-lg mb-6">
                    Top Selling Menu
                </h3>

                <div class="text-center py-10 text-slate-400">

                    <i class="fa-solid fa-bowl-food text-4xl mb-4"></i>

                    <p>Belum Ada Data</p>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-semibold text-lg mb-6">
                    Low Stock Alert
                </h3>

                <div class="text-center py-10 text-slate-400">

                    <i class="fa-solid fa-boxes-stacked text-4xl mb-4"></i>

                    <p>Belum Ada Data</p>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <h3 class="font-semibold text-lg mb-6">
                    Waste Monitoring
                </h3>

                <div class="text-center py-10 text-slate-400">

                    <i class="fa-solid fa-triangle-exclamation text-4xl mb-4"></i>

                    <p>Belum Ada Data</p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>