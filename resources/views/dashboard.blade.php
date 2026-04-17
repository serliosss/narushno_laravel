<x-app-layout>
    @include('layouts.flash-messages')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Дашборд') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            Добро пожаловать, {{ Auth::user()->name }}! 👋
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Рады видеть вас снова. Вы успешно авторизовались в системе "<span class="text-blue-500">НАРУШЕНИЙ</span><span class="text-red-500">.НЕТ</span>"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
