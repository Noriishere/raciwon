<x-app-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <h1 class="text-3xl font-bold">
                        Business Analytics
                    </h1>

                    <p class="mt-2 text-orange-100">
                        AI-powered insights untuk membantu pengambilan keputusan bisnis.
                    </p>

                </div>

                <div class="inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-white/10 border border-white/20">

                    <i class="fa-solid fa-brain text-xl"></i>

                    <span class="font-medium">
                        RACIWON Insight Engine
                    </span>

                </div>

            </div>

        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            {{-- Priority Ingredients --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Priority Ingredients
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            12
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">

                        <i class="fa-solid fa-fire text-xl"></i>

                    </div>

                </div>

            </div>

            {{-- Low Stock --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Low Stock Alert
                        </p>

                        <h3 class="text-3xl font-bold mt-2 text-amber-600">
                            5
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                        <i class="fa-solid fa-triangle-exclamation text-xl"></i>

                    </div>

                </div>

            </div>

            {{-- Forecast --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Predicted Demand
                        </p>

                        <h3 class="text-3xl font-bold mt-2 text-blue-600">
                            89%
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-chart-line text-xl"></i>

                    </div>

                </div>

            </div>

            {{-- Recommendation --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Recommended Actions
                        </p>

                        <h3 class="text-3xl font-bold mt-2 text-green-600">
                            7
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                        <i class="fa-solid fa-lightbulb text-xl"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- IPS + Forecast --}}
        <div class="grid xl:grid-cols-3 gap-6">

            {{-- Ingredient Priority Score --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="mb-6">

                    <h3 class="font-bold text-lg">
                        Ingredient Priority Score
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Prioritas bahan berdasarkan penggunaan dan stok.
                    </p>

                </div>

                <div class="space-y-5">

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Beras Premium
                            </span>

                            <span class="font-bold text-red-600">
                                92
                            </span>

                        </div>

                        <div class="h-3 bg-slate-100 rounded-full">

                            <div class="h-3 w-[92%] rounded-full bg-red-500">
                            </div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Ayam Fillet
                            </span>

                            <span class="font-bold text-amber-600">
                                89
                            </span>

                        </div>

                        <div class="h-3 bg-slate-100 rounded-full">

                            <div class="h-3 w-[89%] rounded-full bg-amber-500">
                            </div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Telur
                            </span>

                            <span class="font-bold text-blue-600">
                                81
                            </span>

                        </div>

                        <div class="h-3 bg-slate-100 rounded-full">

                            <div class="h-3 w-[81%] rounded-full bg-blue-500">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Demand Forecast --}}
            <div class="xl:col-span-2 bg-white rounded-3xl shadow-card p-6">

                <div class="mb-6">

                    <h3 class="font-bold text-lg">
                        Demand Forecast
                    </h3>

                    <p class="text-sm text-slate-500">
                        Prediksi permintaan berdasarkan histori penjualan.
                    </p>

                </div>

                <div
                    class="h-96 rounded-2xl border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center">

                    <div class="text-center">

                        <i class="fa-solid fa-chart-line text-6xl text-slate-300"></i>

                        <p class="mt-4 text-slate-400">
                            Forecast Chart.js
                        </p>

                    </div>

                </div>

            </div>

        </div>
        {{-- Recommendation & Association --}}
        <div class="grid xl:grid-cols-2 gap-6">

            {{-- Restock Recommendation --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h3 class="font-bold text-lg">
                            Restock Recommendation
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Rekomendasi pembelian bahan berdasarkan IPS dan forecast.
                        </p>

                    </div>

                </div>

                <div class="space-y-4">

                    {{-- Item --}}
                    <div class="p-4 rounded-2xl border border-red-200 bg-red-50">

                        <div class="flex items-start justify-between">

                            <div>

                                <h4 class="font-semibold text-slate-800">
                                    Beras Premium
                                </h4>

                                <p class="text-sm text-slate-500 mt-1">
                                    Current Stock: 10 Kg
                                </p>

                            </div>

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

                                Urgent

                            </span>

                        </div>

                        <div class="mt-4 flex justify-between text-sm">

                            <span class="text-slate-500">
                                Recommended
                            </span>

                            <span class="font-semibold text-red-700">
                                +50 Kg
                            </span>

                        </div>

                    </div>

                    {{-- Item --}}
                    <div class="p-4 rounded-2xl border border-amber-200 bg-amber-50">

                        <div class="flex items-start justify-between">

                            <div>

                                <h4 class="font-semibold text-slate-800">
                                    Ayam Fillet
                                </h4>

                                <p class="text-sm text-slate-500 mt-1">
                                    Current Stock: 15 Kg
                                </p>

                            </div>

                            <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">

                                Medium

                            </span>

                        </div>

                        <div class="mt-4 flex justify-between text-sm">

                            <span class="text-slate-500">
                                Recommended
                            </span>

                            <span class="font-semibold text-amber-700">
                                +25 Kg
                            </span>

                        </div>

                    </div>

                    {{-- Item --}}
                    <div class="p-4 rounded-2xl border border-blue-200 bg-blue-50">

                        <div class="flex items-start justify-between">

                            <div>

                                <h4 class="font-semibold text-slate-800">
                                    Telur
                                </h4>

                                <p class="text-sm text-slate-500 mt-1">
                                    Current Stock: 40 Butir
                                </p>

                            </div>

                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">

                                Normal

                            </span>

                        </div>

                        <div class="mt-4 flex justify-between text-sm">

                            <span class="text-slate-500">
                                Recommended
                            </span>

                            <span class="font-semibold text-blue-700">
                                +30 Butir
                            </span>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Menu Association --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="mb-6">

                    <h3 class="font-bold text-lg">
                        Menu Association Analysis
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Hasil analisis pola pembelian pelanggan.
                    </p>

                </div>

                <div class="space-y-5">

                    {{-- Association --}}
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">

                        <h4 class="font-semibold">
                            Ramen
                        </h4>

                        <p class="text-sm text-slate-500 mt-1">
                            Pelanggan yang membeli menu ini juga membeli:
                        </p>

                        <div class="flex flex-wrap gap-2 mt-4">

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Egg

                            </span>

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Tea

                            </span>

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Gyoza

                            </span>

                        </div>

                    </div>

                    {{-- Association --}}
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">

                        <h4 class="font-semibold">
                            Chicken Katsu
                        </h4>

                        <p class="text-sm text-slate-500 mt-1">
                            Pelanggan yang membeli menu ini juga membeli:
                        </p>

                        <div class="flex flex-wrap gap-2 mt-4">

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Lemon Tea

                            </span>

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Gyoza

                            </span>

                        </div>

                    </div>

                    {{-- Association --}}
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">

                        <h4 class="font-semibold">
                            Nasi Goreng
                        </h4>

                        <p class="text-sm text-slate-500 mt-1">
                            Pelanggan yang membeli menu ini juga membeli:
                        </p>

                        <div class="flex flex-wrap gap-2 mt-4">

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Es Teh

                            </span>

                            <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm">

                                Kerupuk

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- AI Insight Summary --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-card">

            <div class="flex flex-col lg:flex-row gap-5">

                <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center shrink-0">

                    <i class="fa-solid fa-lightbulb text-2xl"></i>

                </div>

                <div>

                    <h3 class="font-bold text-xl">
                        AI Insight Summary
                    </h3>

                    <p class="mt-4 text-blue-100 leading-relaxed">

                        Berdasarkan pola penjualan 30 hari terakhir,
                        <span class="font-semibold text-white">
                            Beras Premium
                        </span>
                        memiliki skor prioritas tertinggi dan diperkirakan
                        akan habis dalam 5 hari ke depan.

                        Sistem merekomendasikan restock minimal
                        <span class="font-semibold text-white">
                            50 Kg
                        </span>
                        minggu ini untuk menghindari stock-out pada menu utama.

                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>