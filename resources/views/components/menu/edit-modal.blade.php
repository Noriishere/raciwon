 {{-- Edit Menu Modal --}}
            <template x-teleport="body">

                <div x-show="openEditMenu" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-6"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    {{-- Backdrop --}}
                    <div @click="openEditMenu = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
                    </div>

                    {{-- Modal --}}
                    <div @click.stop class="relative w-full max-w-5xl mx-auto my-10
           bg-white rounded-3xl overflow-hidden shadow-2xl" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                        {{-- Header --}}
                        <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-8 py-6 text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h2 class="text-2xl font-bold">
                                        Edit Menu
                                    </h2>

                                    <p class="text-orange-100 mt-1">
                                        Perbarui informasi menu yang tersedia.
                                    </p>

                                </div>

                                <div class="flex items-center gap-3">

                                    <span class="px-3 py-1 rounded-full bg-white/20 text-white text-xs font-semibold">

                                        ID #MENU001

                                    </span>

                                    <button type="button" @click="openEditMenu = false"
                                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                                        <i class="fa-solid fa-xmark"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="p-8 overflow-y-auto max-h-[calc(90vh-160px)]">

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                                {{-- Form --}}
                                <div class="lg:col-span-2">

                                    <div class="space-y-3">

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Nama Menu
                                            </label>

                                            <input type="text" value="Nasi Goreng Spesial"
                                                class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-brand-500">

                                        </div>

                                        <div class="grid md:grid-cols-2 gap-4">

                                            <div>

                                                <label class="block mb-2 text-sm font-medium">
                                                    Harga
                                                </label>

                                                <input type="number" value="25000"
                                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                            </div>

                                            <div>

                                                <label class="block mb-2 text-sm font-medium">
                                                    Kategori
                                                </label>

                                                <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                    <option selected>
                                                        Makanan
                                                    </option>

                                                    <option>
                                                        Minuman
                                                    </option>

                                                    <option>
                                                        Snack
                                                    </option>

                                                </select>

                                            </div>

                                        </div>

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Status
                                            </label>

                                            <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                                <option selected>
                                                    Aktif
                                                </option>

                                                <option>
                                                    Nonaktif
                                                </option>

                                            </select>

                                        </div>

                                        <div>

                                            <label class="block mb-2 text-sm font-medium">
                                                Deskripsi
                                            </label>

                                            <textarea rows="6"
                                                class="w-full rounded-xl border border-slate-200 px-4 py-3">Nasi goreng dengan topping ayam, telur, dan sayuran segar.</textarea>

                                        </div>

                                    </div>

                                </div>

                                {{-- Preview --}}
                                <div>

                                    <div class="border border-slate-200 rounded-3xl overflow-hidden">

                                        <div
                                            class="h-52 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">

                                            <i class="fa-solid fa-bowl-food text-6xl text-brand-400"></i>

                                        </div>

                                        <div class="p-5">

                                            <button type="button"
                                                class="w-full py-3 border-2 border-dashed border-slate-300 rounded-xl hover:border-brand-400 transition">

                                                <i class="fa-solid fa-camera mr-2"></i>

                                                Ganti Gambar

                                            </button>

                                            <div class="mt-5 flex items-center gap-2">

                                                <span
                                                    class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                                    Aktif

                                                </span>

                                                <span
                                                    class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                                    Makanan

                                                </span>

                                            </div>

                                            <h4 class="font-bold text-lg mt-4">
                                                Nasi Goreng Spesial
                                            </h4>

                                            <p class="text-slate-500 text-sm mt-1">
                                                Menu favorit pelanggan.
                                            </p>

                                            <p class="mt-4 text-3xl font-bold text-brand-600">
                                                Rp 25.000
                                            </p>

                                            <div class="mt-6 pt-4 border-t">

                                                <div class="flex justify-between text-sm">

                                                    <span class="text-slate-500">
                                                        Dibuat
                                                    </span>

                                                    <span class="font-medium">
                                                        12 Jun 2025
                                                    </span>

                                                </div>

                                                <div class="flex justify-between text-sm mt-2">

                                                    <span class="text-slate-500">
                                                        Diubah
                                                    </span>

                                                    <span class="font-medium">
                                                        20 Jun 2025
                                                    </span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Footer --}}
                        <div class="px-8 py-2 bg-slate-50 border-t">

                            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

                                <button type="button" @click="
                                        openEditMenu = false;
                                        openDeleteMenu = true;
                                    " class="px-5 py-3 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition">

                                    <i class="fa-solid fa-trash mr-2"></i>
                                    Hapus Menu

                                </button>

                                <div class="flex gap-3">

                                    <button type="button" @click="openEditMenu = false"
                                        class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                                        Batal

                                    </button>

                                    <button type="submit"
                                        class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                                        <i class="fa-solid fa-floppy-disk mr-2"></i>

                                        Update Menu

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </template>