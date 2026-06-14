@extends('layouts.cashier')
@section('content')
    <div x-data="cashierOrders()" x-init="startPolling()" class="min-h-screen flex">

        {{-- Main Area --}}
        <div class="flex-1 p-6">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-8">

                <div>

                    <h1 class="text-4xl font-brand text-brand-600">
                        RACIWON POS
                    </h1>

                    <p class="text-slate-500">
                        Selamat datang, Cashier!
                    </p>

                </div>

                <div class="flex items-center gap-3">

                    <span class="px-4 py-2 rounded-xl bg-white shadow border border-slate-100">

                        {{ auth()->user()->name }}

                    </span>

                </div>

            </div>

            {{-- Quick Actions --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

                <button class="h-40 rounded-3xl bg-brand-500 hover:bg-brand-600 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-cart-shopping text-5xl mb-4"></i>

                        <span class="text-lg">
                            Orders
                        </span>

                    </div>

                </button>

                <button class="h-40 rounded-3xl bg-brand-400 hover:bg-brand-500 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-table text-5xl mb-4"></i>

                        <span class="text-lg">
                            Tables
                        </span>

                    </div>

                </button>

                <button class="h-40 rounded-3xl bg-amber-500 hover:bg-amber-600 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-box-open text-5xl mb-4"></i>

                        <span class="text-lg">
                            Refill Stock
                        </span>

                    </div>

                </button>

                <button class="h-40 rounded-3xl bg-red-500 hover:bg-red-600 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-trash text-5xl mb-4"></i>

                        <span class="text-lg">
                            Waste
                        </span>

                    </div>

                </button>

            </div>

        </div>
        {{-- Live Orders --}}
        <div class="w-[420px] border-l border-orange-100 bg-white">

            <div class="p-6 border-b">

                <div class="flex items-center justify-between">

                    <h2 class="text-2xl font-bold text-brand-600">
                        Live Orders
                    </h2>

                    <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm" x-text="orders.length"></span>

                </div>

            </div>

            <div class="overflow-y-auto h-[calc(100vh-90px)]">
                <div x-show="loading" class="p-6 text-center text-slate-400">

                    Memuat order...

                </div>
                <div x-show="orders.length === 0" class="p-10 text-center text-slate-400">

                    Belum ada order masuk.

                </div>
                <template x-for="order in orders" :key="order.id">

                    <div class="p-5 border-b hover:bg-orange-50 transition">

                        <div class="flex justify-between">

                            <div>

                                <h3 class="font-bold" x-text="order.order_number"></h3>

                                <p class="text-sm text-slate-500" x-text="order.customer.name"></p>

                            </div>

                            <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">

                                Pending

                            </span>

                        </div>

                        <div class="mt-3">

                            <p class="font-semibold text-brand-600"
                                x-text="'Rp ' + Number(order.subtotal).toLocaleString('id-ID')"></p>

                        </div>

                    </div>

                </template>

            </div>

        </div>

    </div>
    @push('scripts')

        <script>

            function cashierOrders() {
                return {
                    loading: false,
                    orders: @js($orders),

                    async fetchOrders() {
                        try {

                            this.loading = true;

                            const response =
                                await fetch(
                                    '/cashier/orders/pending'
                                );

                            const result =
                                await response.json();

                            this.orders =
                                result.data;

                        } catch (error) {

                            console.error(error);

                        } finally {

                            this.loading = false;

                        }
                    },

                    startPolling() {
                        this.fetchOrders();

                        setInterval(() => {

                            this.fetchOrders();

                        }, 3000);
                    }
                }
            }

        </script>

    @endpush
@endsection