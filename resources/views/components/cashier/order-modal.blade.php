<div x-show="selectedOrder" x-cloak class="fixed inset-0 z-50">

    {{-- Backdrop --}}
    <div @click="closeDetail()" class="absolute inset-0 bg-black/50 backdrop-blur-sm" x-transition.opacity></div>

    {{-- Bottom Sheet --}}
    <div x-show="selectedOrder" x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
        x-transition:leave="transform transition ease-in duration-200" x-transition:leave-start="translate-y-0"
        x-transition:leave-end="translate-y-full" class="
            absolute
            bottom-0
            left-0
            right-0
            bg-white
            rounded-t-[32px]
            shadow-2xl
            max-h-[90vh]
            overflow-hidden
        ">

        {{-- Drag Handle --}}
        <div class="flex justify-center py-3">

            <div class="
                    w-16
                    h-1.5
                    rounded-full
                    bg-slate-300
                "></div>

        </div>

        {{-- Header --}}
        <div class="px-6 pb-4 border-b">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="
                            text-2xl
                            font-bold
                            text-brand-600
                        " x-text="selectedOrder?.order_number"></h2>

                    <p class="text-slate-500" x-text="selectedOrder?.customer?.name"></p>

                </div>

                <button @click="closeDetail()" class="
                        w-10
                        h-10
                        rounded-xl
                        hover:bg-slate-100
                        transition
                    ">
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </div>

        </div>

        {{-- Content --}}
        <div class="
                overflow-y-auto
                max-h-[65vh]
                p-6
            ">

            {{-- Order Info --}}
            <div class="
                    grid
                    md:grid-cols-2
                    gap-4
                    mb-6
                ">

                <div class="
                        bg-slate-50
                        rounded-2xl
                        p-4
                    ">

                    <p class="text-sm text-slate-500">
                        Jenis Order
                    </p>

                    <p class="font-semibold" x-text="selectedOrder?.order_type"></p>

                </div>

                <div class="
                        bg-slate-50
                        rounded-2xl
                        p-4
                    ">

                    <p class="text-sm text-slate-500">
                        Lokasi
                    </p>

                    <p class="font-semibold" x-text="
                            selectedOrder?.table
                            ? 'Meja ' + selectedOrder.table.number
                            : 'Take Away'
                        "></p>

                </div>

            </div>

            {{-- Order Items --}}
            <div>

                <h3 class="
                        font-bold
                        text-lg
                        mb-4
                    ">
                    Daftar Pesanan
                </h3>

                <template x-for="item in (selectedOrder?.items || [])" :key="item.id">

                    <div class="
                            flex
                            justify-between
                            items-center
                            py-4
                            border-b
                        ">

                        <div>

                            <p class="font-medium" x-text="item.menu.name"></p>

                            <p class="
                                    text-sm
                                    text-slate-500
                                " x-text="'Qty : ' + item.quantity"></p>

                        </div>

                        <div class="
                                font-semibold
                                text-brand-600
                            " x-text="
                                'Rp ' +
                                Number(item.subtotal)
                                .toLocaleString('id-ID')
                            "></div>

                    </div>

                </template>

            </div>

            {{-- Total --}}
            <div class="
                    mt-6
                    flex
                    justify-between
                    items-center
                ">

                <span class="text-slate-500">
                    Total Pembayaran
                </span>

                <span class="
                        text-3xl
                        font-bold
                        text-brand-600
                    " x-text="
                        'Rp ' +
                        Number(selectedOrder?.subtotal ?? 0)
                        .toLocaleString('id-ID')
                    "></span>

            </div>

            {{-- Payment Method --}}
            <div x-show="selectedOrder?.status === 'pending'" class="
                    mt-8
                    pt-6
                    border-t
                ">

                <h3 class="
                        font-bold
                        text-lg
                        mb-4
                    ">
                    Metode Pembayaran
                </h3>

                <div class="
                        grid
                        grid-cols-3
                        gap-3
                    ">

                    <button @click="paymentMethod='cash'" :class="
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

                    <button @click="paymentMethod='transfer'" :class="
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

                    <button @click="paymentMethod='qris'" :class="
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
        <div class="
                border-t
                p-6
                bg-white
                flex
                justify-end
                gap-3
            ">

            <button @click="closeDetail()" class="
                    px-4
                    py-2
                    rounded-xl
                    bg-slate-200
                    hover:bg-slate-300
                    transition
                ">
                Tutup
            </button>

            <button x-show="selectedOrder?.status === 'pending'" @click="processPayment()" class="
                    px-5
                    py-2
                    rounded-xl
                    bg-brand-600
                    hover:bg-brand-700
                    text-white
                    transition
                ">
                Proses Pembayaran
            </button>

        </div>

    </div>

</div>