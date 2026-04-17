<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Создание заявки</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#e6f3ff] font-sans min-h-screen">
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10">
        <div class="px-4 py-3 sm:px-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 sm:gap-3">
                    <div>
                        <a href="{{ route('reports.index') }}" class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-700 whitespace-nowrap">
                            НАРУШЕНИЙ<span class="text-red-600">.НЕТ</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="px-4 sm:px-6 py-4 sm:py-6 pb-20">
        <div class="max-w-7xl mx-auto">
            <div class="mb-4 sm:mb-6">
                <a href="{{ route('reports.index') }}" 
                    class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-colors text-sm sm:text-base">
                    <i class="bi bi-arrow-left text-base sm:text-lg"></i>
                    <span>Назад к списку</span>
                </a>
            </div>

            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 sm:p-6 md:p-8">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 sm:mb-6">
                        Создание новой заявки
                    </h2>
                    
                    <form method="POST" action="{{ route('reports.store') }}" class="space-y-4 sm:space-y-6" enctype="multipart/form-data">
                        @csrf
                        
                        <div>
                            <label for="number" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                Номер автомобиля <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                    id="number" 
                                    name="number" 
                                    value="{{ old('number') }}"
                                    placeholder="Например: А123ВС777" 
                                    class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition @error('number') border-red-500 @enderror">
                            @error('number')
                                <p class="mt-1 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5 sm:mb-2">
                                Описание заявки <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" 
                                        name="description" 
                                        rows="5" 
                                        placeholder="Опишите проблему или заявку подробнее..." 
                                        class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none resize-none transition @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="path_img" :value="__('Фото автомобиля')" class="text-sm font-medium text-gray-700" />
                            
                            <div class="relative">
                                <x-text-input 
                                    id="path_img" 
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer border border-gray-300 rounded-md focus:ring-1 focus:ring-red-500 focus:border-red-500" 
                                    type="file" 
                                    name="path_img" 
                                    required />
                            </div>
                            
                            <x-input-error :messages="$errors->get('path_img')" class="mt-1 text-xs sm:text-sm" />
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-2 sm:pt-4">
                            <button type="submit" 
                                    class="bg-[#dc2626] hover:bg-[#b91c1c] text-white px-4 sm:px-6 py-2.5 rounded-md text-sm font-medium flex items-center justify-center gap-2 transition-colors shadow-sm">
                                <i class="bi bi-check-lg text-base sm:text-lg"></i>
                                <span>Создать заявку</span>
                            </button>
                            <a href="{{ route('reports.index') }}" 
                                class="text-center text-gray-500 hover:text-gray-700 text-sm font-medium transition-colors py-2 sm:py-0">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>

                <div class="mt-3 sm:mt-4 text-xs text-gray-400 text-center">
                    <i class="bi bi-info-circle"></i>
                    <span class="ml-1">Все поля обязательны для заполнения</span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>