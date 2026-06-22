<div x-show="showOrderModal" x-cloak class="fixed inset-0 z-50">

    <div @click="closeOrderModal()" class="absolute inset-0 bg-black/50"></div>

    <div class="
            absolute
            bottom-0
            left-0
            right-0
            bg-white
            rounded-t-[32px]
            max-h-[90vh]
            overflow-y-auto
        ">

        <div class="p-6 border-b">

            <div class="flex justify-between">

                <h2 class="text-2xl font-bold text-brand-600">
                    Buat Pesanan
                </h2>

                <button @click="closeOrderModal()">
                    ✕
                </button>

            </div>

        </div>

        <div class="p-6">

            {{-- Order Type --}}
            <div class="mb-6">

                <label class="font-semibold">
                    Tipe Order
                </label>

                <select x-model="newOrder.order_type" class="w-full mt-2 rounded-xl border-slate-300">

                    <option value="dine_in">
                        Dine In
                    </option>

                    <option value="take_away">
                        Take Away
                    </option>

                </select>

            </div>

            {{-- Table --}}
            <div x-show="newOrder.order_type === 'dine_in'" class="mb-6">

                <label class="font-semibold">
                    Pilih Meja
                </label>

                <select x-model="newOrder.table_id" class="w-full mt-2 rounded-xl border-slate-300">

                    <option value="">
                        Pilih Meja
                    </option>

                    <template x-for="table in tables" :key="table.id">

                        <option :value="table.id" x-text="'Meja ' + table.number">
                        </option>

                    </template>

                </select>

            </div>

            {{-- Menu --}}
            <div>

                <h3 class="font-bold mb-3">
                    Daftar Menu
                </h3>

                <div class="grid md:grid-cols-2 gap-3">

                    <template x-for="menu in menus" :key="menu.id">

                        <button @click="addMenu(menu)" type="button" class="
                                border
                                rounded-xl
                                p-4
                                text-left
                                hover:border-brand-500
                            ">

                            <div class="font-semibold" x-text="menu.name"></div>

                            <div class="text-brand-600" x-text="
                                    'Rp ' +
                                    Number(menu.price)
                                    .toLocaleString('id-ID')
                                "></div>

                        </button>

                    </template>

                </div>

            </div>

            {{-- Cart --}}
            <div class="mt-8">

                <h3 class="font-bold mb-3">
                    Keranjang
                </h3>

                <template x-for="item in newOrder.items" :key="item.menu_id">

                    <div class="
                            flex
                            justify-between
                            py-3
                            border-b
                        ">

                        <div>

                            <p x-text="item.name"></p>

                            <p class="text-sm text-slate-500" x-text="'Qty: ' + item.quantity"></p>

                        </div>

                        <div x-text="
                                'Rp ' +
                                Number(item.subtotal)
                                .toLocaleString('id-ID')
                            "></div>

                    </div>

                </template>

            </div>

        </div>

        <div class="p-6 border-t">

            <button @click="submitOrder()" class="
                    w-full
                    py-3
                    rounded-xl
                    bg-brand-600
                    text-white
                ">
                Buat Pesanan
            </button>

        </div>

    </div>

</div>