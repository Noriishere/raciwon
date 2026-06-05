<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-orange-600 tracking-wider">RACIWON</h1>
        <p class="text-sm text-amber-500 font-medium mt-1">Kelola Kuliner Lebih Cerdas</p>
    </div>

    @if (session('status'))
        <div class="mb-4 text-sm text-green-600 font-medium text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Akses</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-600 sm:text-sm transition-colors">
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-orange-600 focus:outline-none focus:ring-1 focus:ring-orange-600 sm:text-sm transition-colors">
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4 flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="h-4 w-4 rounded border-gray-300 text-orange-600 focus:ring-orange-600">
            <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                Ingat Saya
            </label>
        </div>

        <div class="mt-6 flex items-center justify-between">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm text-gray-600 hover:text-orange-600 underline focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2 rounded-md">
                    Lupa sandi?
                </a>
            @else
            <div></div> @endif

            <button type="submit"
                class="inline-flex justify-center rounded-md border border-transparent bg-orange-600 py-2 px-6 text-sm font-bold text-white shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-offset-2 transition-colors">
                Masuk
            </button>
        </div>
    </form>
</x-guest-layout>