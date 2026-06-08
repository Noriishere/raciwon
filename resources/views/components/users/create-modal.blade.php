{{-- Create User Modal --}}
<template x-teleport="body">

    <div x-show="openCreateUser" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center p-4 sm:p-6"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        {{-- Backdrop --}}
        <div @click="openCreateUser = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md">
        </div>

        {{-- Modal --}}
        <div @click.stop class="relative w-full
                   max-w-sm
                   sm:max-w-2xl
                   lg:max-w-4xl
                   bg-white rounded-3xl shadow-2xl overflow-hidden
                   flex flex-col
                   max-h-[90vh]" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 px-6 sm:px-8 py-6 text-white">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold">
                            Tambah User
                        </h2>

                        <p class="text-orange-100 mt-1">
                            Tambahkan pengguna baru ke sistem.
                        </p>

                    </div>

                    <button @click="openCreateUser = false"
                        class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-6 sm:p-8">

                <div class="grid lg:grid-cols-3 gap-6">

                    {{-- Form --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-5">

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Nama Lengkap
                                </label>

                                <input type="text" placeholder="Masukkan nama lengkap"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                            </div>

                            <div>

                                <label class="block mb-2 text-sm font-medium">
                                    Email
                                </label>

                                <input type="email" placeholder="user@email.com"
                                    class="w-full rounded-xl border border-slate-200 px-4 py-3">

                            </div>

                            <div class="grid md:grid-cols-2 gap-4">

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Role
                                    </label>

                                    <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                        <option>
                                            Owner
                                        </option>

                                        <option>
                                            Cashier
                                        </option>

                                    </select>

                                </div>

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Status
                                    </label>

                                    <select class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                        <option>
                                            Active
                                        </option>

                                        <option>
                                            Inactive
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <div class="grid md:grid-cols-2 gap-4">

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Password
                                    </label>

                                    <input type="password" class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                                <div>

                                    <label class="block mb-2 text-sm font-medium">
                                        Confirm Password
                                    </label>

                                    <input type="password" class="w-full rounded-xl border border-slate-200 px-4 py-3">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Preview --}}
                    <div>

                        <div class="border border-slate-200 rounded-3xl overflow-hidden">

                            <div
                                class="h-48 bg-gradient-to-br from-brand-50 to-orange-100 flex items-center justify-center">

                                <div class="w-24 h-24 rounded-full bg-white shadow flex items-center justify-center">

                                    <i class="fa-solid fa-user text-4xl text-brand-500">
                                    </i>

                                </div>

                            </div>

                            <div class="p-5">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                    Owner

                                </span>

                                <h4 class="font-bold text-lg mt-4">
                                    Preview User
                                </h4>

                                <p class="text-slate-500 text-sm mt-1">
                                    Informasi akun pengguna.
                                </p>

                                <div class="mt-5 space-y-3">

                                    <div class="flex justify-between">

                                        <span class="text-slate-500 text-sm">
                                            Status
                                        </span>

                                        <span class="font-medium text-green-600">
                                            Active
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="px-6 sm:px-8 py-4 bg-slate-50 border-t flex flex-col-reverse sm:flex-row justify-end gap-3">

                <button @click="openCreateUser = false" type="button"
                    class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                    Batal

                </button>

                <button type="submit"
                    class="px-5 py-3 rounded-xl bg-brand-600 text-white hover:bg-brand-700 transition">

                    <i class="fa-solid fa-floppy-disk mr-2"></i>

                    Simpan User

                </button>

            </div>

        </div>

    </div>

</template>