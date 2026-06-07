{{-- Create Menu Modal --}}
<template x-teleport="body">

    <div x-show="openCreateMenu" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openCreateMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop
            class="relative w-full max-w-5xl max-h-[90vh]
                   bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Tambah Menu Baru
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Tambahkan menu makanan atau minuman baru.
                        </p>

                    </div>

                    <button type="button" @click="openCreateMenu = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="p-8 overflow-y-auto max-h-[calc(90vh-150px)]">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Form --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-5">

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Nama Menu
                                </label>

                                <input type="text" placeholder="Contoh: Nasi Goreng Spesial"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500">

                            </div>

                            <div class="grid md:grid-cols-2 gap-4">

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Harga
                                    </label>

                                    <input type="number" placeholder="25000"
                                        class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Kategori
                                    </label>

                                    <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                        <option>Makanan</option>
                                        <option>Minuman</option>
                                        <option>Snack</option>

                                    </select>

                                </div>

                            </div>

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Status
                                </label>

                                <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                    <option>Aktif</option>
                                    <option>Nonaktif</option>

                                </select>

                            </div>

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Deskripsi
                                </label>

                                <textarea rows="6" class="w-full rounded-xl border border-slate-200 px-4 py-3"></textarea>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-52 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                <i class="fa-solid fa-image text-6xl text-brand-300">
                                </i>

                            </div>

                            <div class="p-5">

                                <button type="button"
                                    class="w-full py-3 border-2 border-dashed border-slate-300 rounded-xl hover:border-brand-400 transition">

                                    <i class="fa-solid fa-upload mr-2"></i>

                                    Upload Gambar

                                </button>

                                <span
                                    class="inline-block mt-5 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                    Aktif

                                </span>

                                <h4 class="font-bold text-lg mt-4">

                                    Preview Menu

                                </h4>

                                <p class="text-slate-500 text-sm mt-1">

                                    Nama menu akan tampil di sini.

                                </p>

                                <p class="mt-4 text-3xl font-bold text-brand-600">

                                    Rp 0

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-8 py-3 bg-slate-50 border-t flex justify-end gap-3">

                <button type="button" @click="openCreateMenu = false"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button type="submit"
                    class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan Menu

                </button>

            </div>

        </div>

    </div>

</template>
