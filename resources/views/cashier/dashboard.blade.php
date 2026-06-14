@extends('layouts.cashier')

@section('content')

    <div x-data="cashierOrders()" x-init="startPolling()" class="min-h-screen flex flex-col lg:flex-row">

        {{-- Main Area --}}
        <div class="flex-1 p-4 sm:p-6">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

                <div>

                    <h1 class="text-3xl sm:text-4xl font-brand text-brand-600">
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
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                {{-- Orders --}}
                <button
                    class="h-28 sm:h-32 lg:h-40 rounded-3xl bg-brand-500 hover:bg-brand-600 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-cart-shopping text-3xl sm:text-4xl lg:text-5xl mb-3"></i>

                        <span class="text-sm sm:text-base lg:text-lg">
                            Orders
                        </span>

                    </div>

                </button>

                {{-- Tables --}}
                <button
                    class="h-28 sm:h-32 lg:h-40 rounded-3xl bg-brand-400 hover:bg-brand-500 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-table text-3xl sm:text-4xl lg:text-5xl mb-3"></i>

                        <span class="text-sm sm:text-base lg:text-lg">
                            Tables
                        </span>

                    </div>

                </button>

                {{-- Refill --}}
                <button
                    class="h-28 sm:h-32 lg:h-40 rounded-3xl bg-amber-500 hover:bg-amber-600 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-box-open text-3xl sm:text-4xl lg:text-5xl mb-3"></i>

                        <span class="text-sm sm:text-base lg:text-lg">
                            Refill Stock
                        </span>

                    </div>

                </button>

                {{-- Waste --}}
                <button
                    class="h-28 sm:h-32 lg:h-40 rounded-3xl bg-red-500 hover:bg-red-600 text-white transition shadow-card">

                    <div class="flex flex-col items-center justify-center h-full">

                        <i class="fa-solid fa-trash text-3xl sm:text-4xl lg:text-5xl mb-3"></i>

                        <span class="text-sm sm:text-base lg:text-lg">
                            Waste
                        </span>

                    </div>

                </button>

            </div>

        </div>

        {{-- Live Orders --}}
        <div class="
                w-full
                lg:w-[420px]
                border-t
                lg:border-t-0
                lg:border-l
                border-orange-100
                bg-white
            ">

            {{-- Header --}}
            <div class="p-6 border-b">

                <div class="flex items-center justify-between">

                    <h2 class="text-2xl font-bold text-brand-600">
                        Live Orders
                    </h2>

                    <span class="px-3 py-1 rounded-full bg-brand-100 text-brand-700 text-sm" x-text="orders.length"></span>

                </div>

            </div>

            {{-- Order List --}}
            <div class="
                    overflow-y-auto
                    max-h-[500px]
                    lg:h-[calc(100vh-90px)]
                    lg:max-h-none
                ">

                {{-- Loading --}}
                <div x-show="loading" class="p-6 text-center text-slate-400">

                    Memuat order...

                </div>

                {{-- Empty State --}}
                <div x-show="orders.length === 0 && !loading" class="p-10 text-center text-slate-400">

                    Belum ada order masuk.

                </div>

                {{-- Orders --}}
                <template x-for="order in orders" :key="order.id">

                    <div class="
                            p-4
                            border-b
                            hover:bg-orange-50
                            transition
                            cursor-pointer
                        ">

                        <div class="flex justify-between">

                            <div>

                                <h3 class="font-bold" x-text="order.order_number"></h3>

                                <p class="text-sm text-slate-500" x-text="order.customer.name"></p>

                                <p class="text-xs text-slate-400 mt-1" x-text="
                                        order.table
                                        ? 'Meja ' + order.table.number
                                        : 'Take Away'
                                    "></p>

                            </div>

                            <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs h-fit">

                                Pending

                            </span>

                        </div>

                        <div class="mt-3">

                            <p class="font-semibold text-brand-600"
                                x-text="'Rp ' + Number(order.subtotal).toLocaleString('id-ID')"></p>

                        </div>

                        <div class="mt-4">

                            <button class="
                                    w-full
                                    py-2
                                    rounded-xl
                                    bg-brand-600
                                    hover:bg-brand-700
                                    text-white
                                    text-sm
                                    transition
                                ">

                                Detail Order

                            </button>

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

                    previousCount: @json(count($orders)),

                    async fetchOrders() {
                        try {

                            this.loading = true;

                            const response =
                                await fetch(
                                    '/cashier/orders/pending'
                                );

                            const result =
                                await response.json();

                            if (
                                result.data.length >
                                this.previousCount
                            ) {

                                // nanti tinggal tambahin notif mp3
                                console.log(
                                    'Order baru masuk'
                                );

                            }

                            this.previousCount =
                                result.data.length;

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