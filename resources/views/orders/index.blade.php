<x-app-layout>

    <div class="space-y-8">

        {{-- Header --}}
        <div
            class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <h1 class="text-3xl font-bold">
                        Manajemen Pesanan
                    </h1>

                    <p class="mt-2 text-orange-100">
                        Pantau seluruh transaksi pelanggan secara realtime.
                    </p>

                </div>

                <div class="flex gap-3">

                    <button
                        class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-filter mr-2"></i>
                        Filter

                    </button>

                    <button
                        class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                        <i class="fa-solid fa-file-export mr-2"></i>
                        Export

                    </button>

                </div>

            </div>

        </div>

        {{-- Summary --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Pesanan
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            128
                        </h3>

                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-receipt text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Menunggu
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            12
                        </h3>

                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                        <i class="fa-solid fa-clock text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Diproses
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            8
                        </h3>

                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                        <i class="fa-solid fa-kitchen-set text-xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">
                            Selesai
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            108
                        </h3>

                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                        <i class="fa-solid fa-circle-check text-xl"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- Search --}}
        <div class="bg-white rounded-3xl shadow-card p-5">

            <div class="flex flex-col lg:flex-row gap-4">

                <div class="flex-1 relative">

                    <i
                        class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    </i>

                    <input
                        type="text"
                        placeholder="Cari nomor pesanan atau nama pelanggan..."
                        class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-500">

                </div>

                <div class="flex flex-wrap gap-2">

                    <button
                        class="px-4 py-3 rounded-xl bg-brand-600 text-white font-medium">

                        Semua

                    </button>

                    <button
                        class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                        Dine In

                    </button>

                    <button
                        class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                        Take Away

                    </button>

                    <button
                        class="px-4 py-3 rounded-xl bg-slate-100 hover:bg-slate-200">

                        QR Order

                    </button>

                </div>

            </div>

        </div>

        {{-- Orders Layout --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- Order List --}}
            <div class="xl:col-span-1">

                <div class="bg-white rounded-3xl shadow-card p-5">

                    <h3 class="font-semibold text-lg mb-5">
                        Daftar Pesanan
                    </h3>

                    <div class="space-y-4">

                        {{-- Card --}}
                        <div
                            class="border border-brand-200 bg-brand-50 rounded-2xl p-4 cursor-pointer">

                            <div class="flex justify-between">

                                <h4 class="font-bold">
                                    #ORD-001
                                </h4>

                                <span
                                    class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">

                                    Diproses

                                </span>

                            </div>

                            <p class="mt-3 font-medium">
                                Nori
                            </p>

                            <p class="text-sm text-slate-500">
                                Dine In • Meja A3
                            </p>

                            <div class="mt-3 flex justify-between">

                                <span class="text-sm text-slate-500">
                                    3 Item
                                </span>

                                <span class="font-bold">
                                    Rp 78.000
                                </span>

                            </div>

                        </div>

                        <div
                            class="border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-brand-300">

                            <div class="flex justify-between">

                                <h4 class="font-bold">
                                    #ORD-002
                                </h4>

                                <span
                                    class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs">

                                    Menunggu

                                </span>

                            </div>

                            <p class="mt-3 font-medium">
                                Walk In
                            </p>

                            <p class="text-sm text-slate-500">
                                Take Away
                            </p>

                            <div class="mt-3 flex justify-between">

                                <span class="text-sm text-slate-500">
                                    2 Item
                                </span>

                                <span class="font-bold">
                                    Rp 45.000
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Detail --}}
            <div class="xl:col-span-2">

                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex justify-between items-start">

                        <div>

                            <h2 class="text-2xl font-bold">
                                Order #ORD-001
                            </h2>

                            <p class="text-slate-500 mt-1">
                                05 Juni 2025 • 14:35
                            </p>

                        </div>

                        <span
                            class="px-4 py-2 rounded-xl bg-blue-100 text-blue-700 font-medium">

                            Diproses

                        </span>

                    </div>

                    <div class="grid md:grid-cols-3 gap-6 mt-8">

                        <div>

                            <p class="text-sm text-slate-500">
                                Pelanggan
                            </p>

                            <p class="font-semibold mt-1">
                                Nori
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-slate-500">
                                Tipe Pesanan
                            </p>

                            <p class="font-semibold mt-1">
                                Dine In
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-slate-500">
                                Meja
                            </p>

                            <p class="font-semibold mt-1">
                                A3
                            </p>

                        </div>

                    </div>

                    <div class="mt-8 border-t border-slate-200 pt-6">

                        <h3 class="font-semibold mb-4">
                            Item Pesanan
                        </h3>

                        <div class="space-y-4">

                            <div class="flex justify-between">

                                <div>
                                    <p class="font-medium">
                                        Nasi Goreng Spesial
                                    </p>
                                    <p class="text-sm text-slate-500">
                                        2 x Rp 25.000
                                    </p>
                                </div>

                                <p class="font-semibold">
                                    Rp 50.000
                                </p>

                            </div>

                            <div class="flex justify-between">

                                <div>
                                    <p class="font-medium">
                                        Es Teh Manis
                                    </p>
                                    <p class="text-sm text-slate-500">
                                        1 x Rp 5.000
                                    </p>
                                </div>

                                <p class="font-semibold">
                                    Rp 5.000
                                </p>

                            </div>

                            <div class="flex justify-between">

                                <div>
                                    <p class="font-medium">
                                        Ayam Geprek
                                    </p>
                                    <p class="text-sm text-slate-500">
                                        1 x Rp 23.000
                                    </p>
                                </div>

                                <p class="font-semibold">
                                    Rp 23.000
                                </p>

                            </div>

                        </div>

                    </div>

                    <div
                        class="mt-8 border-t border-slate-200 pt-6 space-y-3">

                        <div class="flex justify-between">

                            <span class="text-slate-500">
                                Subtotal
                            </span>

                            <span>
                                Rp 78.000
                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-slate-500">
                                Pajak
                            </span>

                            <span>
                                Rp 0
                            </span>

                        </div>

                        <div
                            class="flex justify-between text-lg font-bold pt-3 border-t">

                            <span>Total</span>

                            <span>
                                Rp 78.000
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>