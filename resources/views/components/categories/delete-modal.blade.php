{{-- Delete Category Modal --}}
        <template x-teleport="body">

            <div x-show="openDeleteCategory" x-cloak
                class="fixed inset-0 z-[99999] flex items-center justify-center p-4"
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                {{-- Backdrop --}}
                <div @click="openDeleteCategory = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
                </div>

                {{-- Modal --}}
                <div @click.stop class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                    {{-- Body --}}
                    <div class="p-8 text-center">

                        <div
                            class="mx-auto w-20 h-20 rounded-full bg-red-100 text-red-600 flex items-center justify-center">

                            <i class="fa-solid fa-trash text-3xl"></i>

                        </div>

                        <h3 class="mt-6 font-brand text-4xl text-slate-800">
                            Hapus Kategori
                        </h3>

                        <p class="mt-4 text-slate-500 leading-relaxed">

                            Kategori

                            <span class="font-semibold text-slate-700">
                                Makanan
                            </span>

                            akan dihapus secara permanen dari sistem.

                        </p>

                        <div class="mt-5 p-4 rounded-2xl bg-red-50 border border-red-100">

                            <p class="text-sm text-red-600">

                                <i class="fa-solid fa-triangle-exclamation mr-2"></i>

                                Tindakan ini tidak dapat dibatalkan.

                            </p>

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="px-6 pb-6">

                        <div class="grid grid-cols-2 gap-3">

                            <button type="button" @click="openDeleteCategory = false"
                                class="py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 transition font-medium">

                                Batal

                            </button>

                            <button type="submit"
                                class="py-3 rounded-2xl bg-red-600 hover:bg-red-700 text-white font-medium transition">

                                <i class="fa-solid fa-trash mr-2"></i>

                                Hapus

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </template>