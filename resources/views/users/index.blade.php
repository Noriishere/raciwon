<x-app-layout>

    <div x-data="{
        openCreateUser: false,
        openShowUser: false,
        openEditUser: false,
        openDeleteUser: false,
    }">

        <div class="space-y-8">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-brand-600 to-brand-500 rounded-3xl p-8 text-white shadow-card">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>

                        <h1 class="text-3xl font-bold">
                            User Management
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Kelola akun pengguna dan hak akses sistem RACIWON.
                        </p>

                    </div>

                    <button @click="openCreateUser = true"
                        class="px-5 py-3 rounded-xl bg-white text-brand-700 font-semibold hover:bg-orange-50 transition">

                        <i class="fa-solid fa-user-plus mr-2"></i>

                        Tambah User

                    </button>

                </div>

            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Total Users --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Total Users
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                8
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-brand-100 text-brand-600 flex items-center justify-center">

                            <i class="fa-solid fa-users text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Owners --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Owners
                            </p>

                            <h3 class="text-3xl font-bold mt-2 text-blue-600">
                                1
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center">

                            <i class="fa-solid fa-user-shield text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Cashiers --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Cashiers
                            </p>

                            <h3 class="text-3xl font-bold mt-2 text-green-600">
                                7
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">

                            <i class="fa-solid fa-cash-register text-xl"></i>

                        </div>

                    </div>

                </div>

                {{-- Active Users --}}
                <div class="bg-white rounded-3xl shadow-card p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-slate-500">
                                Active Users
                            </p>

                            <h3 class="text-3xl font-bold mt-2 text-amber-600">
                                8
                            </h3>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">

                            <i class="fa-solid fa-user-check text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Role Distribution --}}
            <div class="bg-white rounded-3xl shadow-card p-6">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h3 class="font-bold text-lg">
                            Role Distribution
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Distribusi pengguna berdasarkan role dalam sistem.
                        </p>

                    </div>

                </div>

                <div class="space-y-6">

                    {{-- Owner --}}
                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Owner
                            </span>

                            <span class="font-semibold text-blue-600">
                                12%
                            </span>

                        </div>

                        <div class="h-3 bg-slate-100 rounded-full">

                            <div class="h-3 w-[12%] rounded-full bg-blue-500">
                            </div>

                        </div>

                    </div>

                    {{-- Cashier --}}
                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Cashier
                            </span>

                            <span class="font-semibold text-green-600">
                                88%
                            </span>

                        </div>

                        <div class="h-3 bg-slate-100 rounded-full">

                            <div class="h-3 w-[88%] rounded-full bg-green-500">
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-card p-5">

                <div class="grid lg:grid-cols-3 gap-4">

                    <input type="text" placeholder="Cari nama atau email..."
                        class="rounded-xl border border-slate-200 px-4 py-3">

                    <select class="rounded-xl border border-slate-200 px-4 py-3">

                        <option>
                            Semua Role
                        </option>

                        <option>
                            Owner
                        </option>

                        <option>
                            Cashier
                        </option>

                    </select>

                    <select class="rounded-xl border border-slate-200 px-4 py-3">

                        <option>
                            Semua Status
                        </option>

                        <option>
                            Active
                        </option>

                        <option>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            {{-- Users Table --}}
            <div class="bg-white rounded-3xl shadow-card overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-100">

                    <h3 class="font-bold text-lg">
                        Daftar Pengguna
                    </h3>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-6 py-4 text-left">
                                    User
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Role
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Created At
                                </th>

                                <th class="px-6 py-4 text-center">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @for ($i = 0; $i < 8; $i++)

                                <tr class="hover:bg-slate-50 transition">

                                    {{-- User --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-11 h-11 rounded-2xl bg-brand-100 text-brand-600 flex items-center justify-center font-semibold">

                                                N

                                            </div>

                                            <div>

                                                <p class="font-medium">
                                                    Nori
                                                </p>

                                                <p class="text-sm text-slate-500">
                                                    System User
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    {{-- Email --}}
                                    <td class="px-6 py-4 text-slate-600">

                                        nori@raciwon.com

                                    </td>

                                    {{-- Role --}}
                                    <td class="px-6 py-4">

                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                                            Owner

                                        </span>

                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                                            Active

                                        </span>

                                    </td>

                                    {{-- Created --}}
                                    <td class="px-6 py-4 text-slate-500">

                                        08 Jun 2026

                                    </td>

                                    {{-- Action --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-center items-center gap-2">

                                            <button @click="openShowUser = true"
                                                class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200 transition">

                                                <i class="fa-solid fa-eye"></i>

                                            </button>

                                            <button @click="openEditUser = true"
                                                class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 hover:bg-amber-200 transition">

                                                <i class="fa-solid fa-pen"></i>

                                            </button>

                                            <button @click="openDeleteUser = true"
                                                class="w-10 h-10 rounded-xl bg-red-100 text-red-600 hover:bg-red-200 transition">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </div>

                                    </td>

                                </tr>

                            @endfor

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">

                <div class="bg-white rounded-2xl shadow-card p-2 flex gap-2">

                    <button class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200">

                        <i class="fa-solid fa-chevron-left"></i>

                    </button>

                    <button class="w-10 h-10 rounded-xl bg-brand-600 text-white">

                        1

                    </button>

                    <button class="w-10 h-10 rounded-xl hover:bg-slate-100">

                        2

                    </button>

                    <button class="w-10 h-10 rounded-xl hover:bg-slate-100">

                        3

                    </button>

                    <button class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200">

                        <i class="fa-solid fa-chevron-right"></i>

                    </button>

                </div>

            </div>

            {{-- Modals --}}
            <x-users.create-modal />
            <x-users.show-modal />
            <x-users.edit-modal />
            <x-users.delete-modal />

        </div>

    </div>

</x-app-layout>