<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявки</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<header class="bg-white shadow-sm border-b border-gray-200 p-2">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div>
                    <a href="{{ route('reports.index') }}" class="text-3xl font-bold text-blue-700">НАРУШЕНИЙ<span class="text-red-600">.НЕТ</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<body class="bg-[#e6f3ff] font-sans min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('reports.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-colors">
                <i class="bi bi-arrow-left text-lg"></i>
                <span>Назад к списку</span>
            </a>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Создание новой заявки</h2>
                
                <form method="POST" action="{{ route('reports.store') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="number" class="block text-sm font-medium text-gray-700 mb-2">
                            Номер автомобиля <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="number" 
                               name="number" 
                               value="{{ old('number') }}"
                               placeholder="Например: А123ВС777" 
                               class="w-full px-4 py-2.5 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition @error('number') border-red-500 @enderror">
                        @error('number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Описание заявки <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="5" 
                                  placeholder="Опишите проблему или заявку подробнее..." 
                                  class="w-full px-4 py-2.5 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none resize-none transition @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit" 
                                class="bg-[#dc2626] hover:bg-[#b91c1c] text-white px-6 py-2.5 rounded-md text-sm font-medium flex items-center gap-2 transition-colors shadow-sm">
                            <i class="bi bi-check-lg text-lg"></i>
                            Создать заявку
                        </button>
                        <a href="{{ route('reports.index') }}" 
                           class="text-gray-500 hover:text-gray-700 text-sm font-medium transition-colors">
                            Отмена
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-4 text-xs text-gray-400 text-center">
                Все поля обязательны для заполнения
            </div>
        </div>
    </div>
</body>
</html>