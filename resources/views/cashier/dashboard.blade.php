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
                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin ingin logout?')">
                    @csrf

                    <button type="submit" class="
                                                                                                h-11 w-11
                                                                                                rounded-xl
                                                                                                bg-red-500
                                                                                                hover:bg-red-600
                                                                                                text-white
                                                                                                transition
                                                                                                flex
                                                                                                items-center
                                                                                                justify-center
                                                                                            " title="Logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>

                </form>

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
            {{-- Processing Orders --}}
            <div class="mt-8">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-2xl font-bold text-blue-600">
                        Sedang Diproses
                    </h2>

                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm" x-text="processingOrders.length">
                    </span>

                </div>

                <div x-show="processingOrders.length === 0" class="text-center py-10 text-slate-400">
                    Tidak ada pesanan diproses.
                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">

                    <template x-for="(order,index) in processingOrders" :key="order.id">

                        <div class="bg-white rounded-3xl shadow-card border border-blue-100 p-5">

                            <div class="flex justify-between items-start">

                                <div>

                                    <div class="flex items-center gap-3">

                                        <div class="w-8 h-8 rounded-full bg-brand-600 text-white flex items-center justify-center font-bold text-sm"
                                            x-text="index + 1">
                                        </div>

                                        <div>

                                            <h3 class="font-bold" x-text="order.order_number">
                                            </h3>

                                            <p class="text-sm text-slate-500" x-text="order.customer.name">
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">
                                    Processing
                                </span>

                            </div>

                            <div class="mt-3">

                                <p class="text-sm text-slate-500" x-text="
                                                    order.table
                                                    ? 'Meja ' + order.table.number
                                                    : 'Take Away'
                                                ">
                                </p>

                            </div>

                            <div class="mt-4">

                                <p class="font-semibold text-brand-600" x-text="
                                                    'Rp ' +
                                                    Number(order.subtotal)
                                                    .toLocaleString('id-ID')
                                                ">
                                </p>

                            </div>

                            <button class="mt-4 w-full py-2 rounded-xl bg-green-600 hover:bg-green-700 text-white">
                                Selesaikan Pesanan
                            </button>

                        </div>

                    </template>

                </div>

            </div>
        </div>
        {{-- Live Orders --}}
        <div
            class="w-full lg:w-[420px] lg:sticky lg:top-0 h-screen border-t lg:border-t-0 lg:border-l border-orange-100 bg-white flex flex-col">

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
            <div
                class="
                                                                                                                                        overflow-y-auto
                                                                                                                                        max-h-[500px]
                                                                                                                                        lg:h-[calc(100vh-90px)]
                                                                                                                                        lg:max-h-none
                                                                                                                                    ">

                {{-- Empty State --}}
                <div x-show="orders.length === 0 && !loading" class="p-10 text-center text-slate-400">

                    Belum ada order masuk.

                </div>

                {{-- Orders --}}
                <template x-for="(order,index) in orders" :key="order.id">

                    <div
                        class="
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

                                <p class="text-xs text-slate-400 mt-1"
                                    x-text="
                                                                                                                                                            order.table
                                                                                                                                                            ? 'Meja ' + order.table.number
                                                                                                                                                            : 'Take Away'
                                                                                                                                                        ">
                                </p>

                            </div>

                            <span class="px-2 py-1 rounded-full text-xs h-fit" :class="
                                                                                            order.status === 'pending'
                                                                                                ? 'bg-yellow-100 text-yellow-700'
                                                                                                : 'bg-blue-100 text-blue-700'
                                                                                        " x-text="
                                                                                            order.status.charAt(0).toUpperCase()
                                                                                            + order.status.slice(1)
                                                                                        "></span>

                        </div>

                        <div class="mt-3">

                            <p class="font-semibold text-brand-600"
                                x-text="'Rp ' + Number(order.subtotal).toLocaleString('id-ID')"></p>

                        </div>

                        <div class="mt-4">

                            <button @click="openDetail(order)" class="
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

        <div x-show="selectedOrder" x-cloak class="
                                                                                                                        fixed inset-0 z-50
                                                                                                                        flex items-center justify-center
                                                                                                                        p-4
                                                                                                                    "
            x-transition.opacity>

            {{-- Backdrop --}}
            <div @click="closeDetail()" class="
                                                                                                                            absolute inset-0
                                                                                                                            bg-black/50
                                                                                                                            backdrop-blur-sm
                                                                                                                        ">
            </div>

            {{-- Modal --}}
            <div class="
                                                                                                                            relative
                                                                                                                            bg-white
                                                                                                                            w-full
                                                                                                                            max-w-2xl
                                                                                                                            rounded-3xl
                                                                                                                            shadow-2xl
                                                                                                                            overflow-hidden
                                                                                                                        ">

                {{-- Header --}}
                <div
                    class="
                                                                                                                                bg-brand-600
                                                                                                                                text-white
                                                                                                                                p-6
                                                                                                                            ">

                    <div class="flex justify-between">

                        <div>

                            <h2 class="text-2xl font-bold" x-text="selectedOrder?.order_number"></h2>

                            <p class="text-orange-100" x-text="selectedOrder?.customer?.name"></p>

                        </div>

                        <button @click="closeDetail()">

                            <i class="fa-solid fa-xmark text-xl"></i>

                        </button>

                    </div>

                </div>

                {{-- Body --}}
                <div class="p-6">

                    <div class="mb-5">

                        <p class="text-sm text-slate-500">
                            Jenis Order
                        </p>

                        <p class="font-semibold" x-text="selectedOrder?.order_type"></p>

                    </div>

                    <div class="mb-5">

                        <p class="text-sm text-slate-500">
                            Lokasi
                        </p>

                        <p
                            x-text="
                                                                                                                                        selectedOrder?.table
                                                                                                                                        ? 'Meja ' + selectedOrder.table.number
                                                                                                                                        : 'Take Away'
                                                                                                                                    ">
                        </p>

                    </div>

                    <div>

                        <h3 class="font-bold mb-3">
                            Daftar Pesanan
                        </h3>

                        <template x-for="item in (selectedOrder?.items || [])" :key="item.id">

                            <div
                                class="
                                                                                                                                            flex justify-between
                                                                                                                                            py-3 border-b
                                                                                                                                        ">

                                <div>

                                    <p class="font-medium" x-text="item.menu.name"></p>

                                    <p class="text-sm text-slate-500" x-text="'Qty: ' + item.quantity"></p>

                                </div>

                                <div class="font-semibold"
                                    x-text="
                                                                                                                                                'Rp ' +
                                                                                                                                                Number(item.subtotal)
                                                                                                                                                .toLocaleString('id-ID')
                                                                                                                                            ">
                                </div>

                            </div>

                        </template>

                    </div>

                    <div
                        class="
                                                                                                                                    mt-6
                                                                                                                                    pt-4
                                                                                                                                    border-t
                                                                                                                                    flex justify-between
                                                                                                                                    items-center
                                                                                                                                ">

                        <span class="text-slate-500">
                            Total
                        </span>

                        <span
                            class="
                                                                                                                                        text-2xl
                                                                                                                                        font-bold
                                                                                                                                        text-brand-600
                                                                                                                                    "
                            x-text="
                                                                                                                                        'Rp ' +
                                                                                                                                        Number(selectedOrder?.subtotal ?? 0)
                                                                                                                                        .toLocaleString('id-ID')
                                                                                                                                    "></span>

                    </div>
                    <div x-show="selectedOrder?.status === 'pending'" class="mt-6 border-t pt-6">

                        <h3 class="font-bold mb-4">
                            Metode Pembayaran
                        </h3>

                        <div class="grid grid-cols-3 gap-3">

                            <button @click="paymentMethod = 'cash'" :class="
                                                                                            paymentMethod === 'cash'
                                                                                            ? 'border-brand-600 bg-brand-50'
                                                                                            : 'border-slate-200'
                                                                                        " class="
                                                                                            border-2
                                                                                            rounded-2xl
                                                                                            p-4
                                                                                            transition
                                                                                        ">
                                💵 Cash
                            </button>

                            <button @click="paymentMethod = 'transfer'" :class="
                                                                                            paymentMethod === 'transfer'
                                                                                            ? 'border-brand-600 bg-brand-50'
                                                                                            : 'border-slate-200'
                                                                                        " class="
                                                                                            border-2
                                                                                            rounded-2xl
                                                                                            p-4
                                                                                            transition
                                                                                        ">
                                🏦 Transfer
                            </button>

                            <button @click="paymentMethod = 'qris'" :class="
                                                                                            paymentMethod === 'qris'
                                                                                            ? 'border-brand-600 bg-brand-50'
                                                                                            : 'border-slate-200'
                                                                                        " class="
                                                                                            border-2
                                                                                            rounded-2xl
                                                                                            p-4
                                                                                            transition
                                                                                        ">
                                📱 QRIS
                            </button>

                        </div>

                    </div>
                </div>

                {{-- Footer --}}
                <div
                    class="
                                                                                                                                p-6
                                                                                                                                border-t
                                                                                                                                flex gap-3
                                                                                                                                justify-end
                                                                                                                            ">

                    <button @click="closeDetail()"
                        class="
                                                                                                                                    px-4 py-2
                                                                                                                                    rounded-xl
                                                                                                                                    bg-slate-200
                                                                                                                                ">

                        Tutup

                    </button>

                    <button x-show="selectedOrder?.status === 'pending'" @click="processPayment()" class="
                                                            px-4 py-2
                                                            rounded-xl
                                                            bg-blue-600
                                                            text-white
                                                        ">
                        Proses Pembayaran
                    </button>
                </div>

            </div>
        </div>

    </div>
    @push('scripts')

        <script>
            function cashierOrders() {
                return {
                    selectedOrder: null,
                    paymentMethod: 'cash',

                    loading: false,
                    firstLoad: true,
                    orders: @js($orders),
                    processingOrders: @js($processingOrders),
                    openDetail(order) {

                        this.selectedOrder = order;

                    },

                    closeDetail() {

                        this.selectedOrder = null;

                    },
                    previousCount: @json(count($orders)),
                    async processPayment() {
                        try {

                            const response =
                                await fetch(
                                    `/cashier/orders/${this.selectedOrder.id}/payment`,
                                    {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN':
                                                document
                                                    .querySelector(
                                                        'meta[name="csrf-token"]'
                                                    )
                                                    .content,
                                        },
                                        body: JSON.stringify({
                                            payment_method:
                                                this.paymentMethod
                                        }),
                                    }
                                );

                            await response.json();

                            this.closeDetail();

                            await this.fetchOrders();

                            await this.fetchProcessingOrders();

                        } catch (error) {

                            console.error(error);

                        }
                    },
                    async fetchOrders() {
                        try {

                            if (this.firstLoad) {
                                this.loading = true;
                            }

                            const response =
                                await fetch('/cashier/orders/pending');

                            const result =
                                await response.json();

                            this.orders = result.data;

                            this.previousCount =
                                result.data.length;

                        } catch (error) {

                            console.error(error);

                        } finally {

                            this.loading = false;

                            this.firstLoad = false;
                        }
                    },
                    async fetchProcessingOrders() {
                        const response =
                            await fetch(
                                '/cashier/orders/processing'
                            );

                        const result =
                            await response.json();

                        this.processingOrders =
                            result.data;
                    },

                    startPolling() {
                        this.fetchOrders();

                        this.fetchProcessingOrders();

                        setInterval(() => {

                            this.fetchOrders();

                            this.fetchProcessingOrders();

                        }, 3000);
                    }
                }
            }

        </script>

    @endpush

@endsection