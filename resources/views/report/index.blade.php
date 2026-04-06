<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявок</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<header class="bg-white shadow-sm border-b border-gray-200 p-2">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-150">
                <div>
                    <a href="{{ route('reports.index') }}" class="text-3xl font-bold text-blue-700">НАРУШЕНИЙ<span class="text-red-600">.НЕТ</span></a>
                </div>
            </div>
            <div>
                <a href="{{ route('reports.create') }}">
                    <button class="bg-[#dc2626] hover:bg-white hover:text-[#dc2626] text-white px-6 py-2.5 rounded-md text-sm font-medium flex items-center gap-2 transition-colors shadow-sm">
                        <i class="bi bi-plus-lg text-lg"></i>
                                    создать заявление
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<body class="bg-[#e6f3ff] font-sans min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <x-filter :sort=$sort :status=$status></x-filter>

        @if($reports->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($reports as $report)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 flex flex-col h-full">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex gap-2">
                                <a href="{{ route('reports.edit', $report) }}">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors">
                                        <i class="bi bi-pencil text-base"></i>
                                    </button>   
                                </a>
                                <form action=" {{route('reports.destroy', $report->id)}} " method="POST" class="w-100 h-100">
                                    @method('delete')
                                    @csrf
                                    <button class="text-gray-400 hover:text-red-600 transition-colors">
                                        <i class="bi bi-trash3 text-base"></i>
                                    </button>
                                </form>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm">{{ $report->created_at }}</p>
                            </div>
                        </div>

                        <div class="font-bold text-gray-800 text-lg mb-2">
                            {{ $report->number }}
                        </div>

                        <div class="text-gray-600 text-sm leading-relaxed mb-4 flex-grow">
                            {{ $report->description }}
                        </div>

                        <div class="text-sm mt-auto pt-2 border-t border-gray-50">
                            <x-status :type="$report->status->id">
                                {{$report->status->name}}
                            </x-status>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pt-3">
                {{ $reports->appends(request()->query())->links() }}
            </div>

            <div class="text-right mt-4 text-gray-500 text-sm">
                Всего заявок: {{ $reports->count() }}
            </div>
        @else
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