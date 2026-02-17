<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявок</title>
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-[#e6f3ff] font-sans min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        {{-- Красная кнопка слева сверху --}}
        <div class="mb-6">
            <button class="bg-[#dc2626] hover:bg-[#b91c1c] text-white px-6 py-2.5 rounded-md text-sm font-medium flex items-center gap-2 transition-colors shadow-sm">
                <i class="bi bi-plus-lg text-lg"></i>
                создать заявление
            </button>
        </div>

        @if($reports->count() > 0)
            {{-- Сетка в 3 столбца --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($reports as $report)
                    {{-- Белая карточка --}}
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex flex-col h-full">
                        {{-- Верхняя часть с датой и иконками --}}
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex gap-2">
                                <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <i class="bi bi-pencil text-base"></i>
                                </button>
                                <button class="text-gray-400 hover:text-red-600 transition-colors">
                                    <i class="bi bi-trash3 text-base"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Номер автомобиля --}}
                        <div class="font-bold text-gray-800 text-lg mb-2">
                            {{ $report->number }}
                        </div>

                        {{-- Описание --}}
                        <div class="text-gray-600 text-sm leading-relaxed mb-4 flex-grow">
                            {{ $report->description }}
                        </div>

                        {{-- Статус --}}
                        <div class="text-sm mt-auto pt-2 border-t border-gray-50">
                            @php
                                $statusText = match($report->status_id) {
                                    1 => 'новое',
                                    2 => 'отклонено',
                                    3 => 'подтверждено',
                                    default => 'неизвестно'
                                };
                                $statusColor = match($report->status_id) {
                                    1 => 'text-gray-600',
                                    2 => 'text-red-600',
                                    3 => 'text-green-600',
                                    default => 'text-gray-600'
                                };
                            @endphp
                            <span class="font-medium text-gray-700">Статус заявления - </span>
                            <span class="{{ $statusColor }}">{{ $statusText }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Счетчик заявок --}}
            <div class="text-right mt-4 text-gray-500 text-sm">
                Всего заявок: {{ $reports->count() }}
            </div>
        @else
            {{-- Сообщение, если заявок нет --}}
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 text-center">
                <p class="text-gray-500 mb-3">Пока нет ни одной заявки.</p>
                <a href="{{ route('reports.create') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Создать первую заявку →
                </a>
            </div>
        @endif
    </div>
</body>
</html>