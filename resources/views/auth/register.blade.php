<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center mb-8">
            <h1 class="text-2xl font-weight-700 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                РЕГИСТРАЦИЯ
            </h1>
        </div>

        <!-- Name -->
        <div>
            <x-text-input id="name" class="block mt-1 w-full text-gray-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Имя"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Middlename -->
         <div class="mt-4">
            <x-text-input id="middlename" class="block mt-1 w-full text-gray-400" type="text" name="middlename" :value="old('middlename')" required autocomplete="middlename" placeholder="Фамилия"/>
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
         </div>

         <!-- Lastname -->
         <div class="mt-4">
            <x-text-input id="lastname" class="block mt-1 w-full text-gray-400" type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" placeholder="Отчество"/>
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
         </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full text-gray-400" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Почта"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Login -->
         <div class="mt-4">
            <x-text-input id="login" class="block mt-1 w-full text-gray-400" type="text" name="login" :value="old('login')" required autocomplete="login" placeholder="Логин"/>
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
         </div>

         <!-- Tel -->
         <div class="mt-4">
            <x-text-input id="tel" class="block mt-1 w-full text-gray-400" type="text" name="tel" :value="old('tel')" required autocomplete="tel" placeholder="Телефон"/>
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
         </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full text-gray-400"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="Пароль"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-gray-400"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="Повторите пароль"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                {{ __('Зарегистрироваться') }}
            </x-primary-button>
        </div>
        
        <div class="mt-4 text-center">
            <a class="text-sm text-gray-600 hover:text-blue-600 hover:underline transition duration-200" href="{{ route('login') }}">
                {{ __('Уже зарегистрированы?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
