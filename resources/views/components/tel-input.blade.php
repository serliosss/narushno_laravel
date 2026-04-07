@props(['disabled' => false])

<input
    x-data="{ phone: '' }"
    x-mask="+7(999)999-99-99"
    type="tel"
    x-model="phone"
    @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
>