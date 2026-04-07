<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="text-center mb-8">
            <h1 class="text-2xl font-weight-700 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                АВТОРИЗАЦИЯ
            </h1>
        </div>

        <!-- Email Address -->
        <div>
            <x-text-input id="login" class="block mt-1 w-full placeholder:text-gray-400" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" placeholder="Логин"/>
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full placeholder:text-gray-400"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="Пароль"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Запомнить меня') }}</span>
            </label>
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                {{ __('Войти') }}
            </x-primary-button>
        </div>

        <!-- Ссылка "Забыли пароль?" -->
        @if (Route::has('password.request'))
            <div class="mt-4 text-center">
                <a class="text-sm text-gray-600 hover:text-blue-600 hover:underline transition duration-200" href="{{ route('password.request') }}">
                    {{ __('Забыли свой пароль?') }}
                </a>
            </div>
        @endif
        </div>
    </form>
</x-guest-layout>
