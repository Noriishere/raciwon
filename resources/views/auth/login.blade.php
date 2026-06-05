<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-4xl font-extrabold text-orange-600 tracking-wider">RACIWON</h1>
        <p class="text-amber-500 font-medium mt-1">Kelola Kuliner Lebih Cerdas</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"
        class="bg-white p-6 shadow-md rounded-xl border-t-4 border-orange-600">
        @csrf

        <div>
            <x-input-label for="email" value="Email Akses" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 focus:border-orange-600 focus:ring-orange-600" type="email"
                name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Kata Sandi" />

            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 focus:border-orange-600 focus:ring-orange-600" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-600" name="remember">
                <span class="ms-2 text-sm text-gray-600">Ingat Saya</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-orange-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600"
                    href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif

            <button type="submit"
                class="ms-3 inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2 transition ease-in-out duration-150">
                Masuk
            </button>
        </div>
    </form>
</x-guest-layout>