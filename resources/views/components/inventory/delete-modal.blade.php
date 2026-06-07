{{-- Modal --}}
<div @click.stop class="relative w-full max-w-[360px] bg-white rounded-3xl shadow-2xl overflow-hidden">

    {{-- Body --}}
    <div class="p-5 text-center">

        <div class="mx-auto w-14 h-14 rounded-full bg-red-100 text-red-600 flex items-center justify-center">

            <i class="fa-solid fa-trash text-xl"></i>

        </div>

        <h3 class="mt-4 text-xl font-bold text-slate-800">
            Hapus Bahan?
        </h3>

        <p class="mt-2 text-sm text-slate-500">

            <span class="font-semibold text-slate-700">
                Beras Premium
            </span>

            akan dihapus dari inventaris.

        </p>

        <div class="mt-4 p-3 rounded-xl bg-red-50 border border-red-100">

            <p class="text-xs text-red-600">

                <i class="fa-solid fa-triangle-exclamation mr-1"></i>

                Tindakan ini tidak dapat dibatalkan.

            </p>

        </div>

    </div>

    {{-- Footer --}}
    <div class="px-5 pb-5">

        <div class="grid grid-cols-2 gap-2">

            <button type="button" @click="openDeleteInventory = false"
                class="py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 transition text-sm font-medium">

                Batal

            </button>

            <button type="submit"
                class="py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white transition text-sm font-medium">

                Hapus

            </button>

        </div>

    </div>

</div>
