<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Список заявок</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 py-3 sm:px-6">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center flex-1">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-700 whitespace-nowrap">НАРУШЕНИЙ<span class="text-red-600">.НЕТ</span></a>
                </div>
            </div>
            <div>
                <a href="{{ route('reports.create') }}">
                    <button class="bg-[#dc2626] hover:bg-white hover:text-[#dc2626] text-white px-3 sm:px-6 py-2 sm:py-2.5 rounded-md text-xs sm:text-sm font-medium flex items-center gap-1 sm:gap-2 transition-colors shadow-sm whitespace-nowrap">
                        <i class="bi bi-plus-lg text-base sm:text-lg"></i>
                        <span class="hidden sm:inline">создать заявление</span>
                        <span class="sm:hidden">создать</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<body class="bg-[#e6f3ff] font-sans min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 sm:py-6">
        @include('layouts.flash-messages')
        <x-filter :sort=$sort :status=$status></x-filter>

        @if($reports->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                @foreach($reports as $report)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-3 sm:p-4 flex flex-col h-full">
                        <div class="flex justify-between items-start mb-2 sm:mb-3">
                            <div class="flex gap-1.5 sm:gap-2">
                                <a href="{{ route('reports.edit', $report) }}">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                        <i class="bi bi-pencil text-sm sm:text-base"></i>
                                    </button>   
                                </a>
                                <form action=" {{route('reports.destroy', $report->id)}} " method="POST" class="w-100 h-100">
                                    @method('delete')
                                    @csrf
                                    <button class="text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="bi bi-trash3 text-sm sm:text-base"></i>
                                    </button>
                                </form>
                            </div>
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm">{{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}</p>
                            </div>
                        </div>

                        <div class="font-bold text-gray-800 text-base sm:text-lg mb-1.5 sm:mb-2 break-words">
                            {{ $report->number }}
                        </div>

                        <div class="text-gray-600 text-xs sm:text-sm leading-relaxed mb-3 sm:mb-4 flex-grow break-words">
                            {{ $report->description }}
                        </div>

                        <div class="text-xs sm:text-sm mt-auto pt-2 border-t border-gray-50">
                            <x-status :type="$report->status->id">
                                {{$report->status->name}}
                            </x-status>
                        </div>

                        @isset($report->path_img)
                            <img src="{{ Storage::url($report->path_img) }}" class="contact-block__img" alt="">
                        @endisset
                    </div>
                @endforeach
            </div>
            <div class="pt-3 sm:pt-4">
                {{ $reports->appends(request()->query())->links() }}
            </div>

            <div class="text-right mt-3 sm:mt-4 text-gray-500 text-xs sm:text-sm">
                Всего заявок: {{ $reports->count() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8 text-center">
                <p class="text-gray-500 mb-3 text-sm sm:text-base">Пока нет ни одной заявки.</p>
                <a href="{{ route('reports.create') }}" class="text-blue-600 hover:text-blue-800 text-xs sm:text-sm font-medium">
                    Создать первую заявку →
                </a>
            </div>
        @endif
    </div>
</body>
</html>