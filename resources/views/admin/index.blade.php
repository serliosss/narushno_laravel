<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель - Список заявок</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<header class="bg-white shadow-sm border-b border-gray-200 p-2">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-150">
                <div>
                    <a href="{{ route('admin.index') }}" class="text-3xl font-bold text-blue-700">НАРУШЕНИЙ<span class="text-red-600">.НЕТ</span></a>
                </div>
            </div>
            <div>
                <span class="text-sm text-gray-600">Административная панель</span>
            </div>
        </div>
    </div>
</header>

<body class="bg-[#e6f3ff] font-sans min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Административная панель</h1>
            <p class="text-gray-600 mt-1">Управление заявками пользователей</p>
        </div>

        @if($reports->count() > 0)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ФИО
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Текст заявления
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Номер автомобиля
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Статус
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reports as $report)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $report->user->name ?? 'Пользователь удален' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-md truncate" title="{{ $report->description }}">
                                            {{ Str::limit($report->description, 100) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-mono">
                                            {{ $report->number }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{route('reports.status.update',$report->id)}}" class="status-form" method="POST">
                                            @method('patch')
                                            @csrf
                                            <select name="status_id" id="status_id" class="px-2 py-1 text-xs leading-5 font-semibold rounded-full border-0 focus:ring-2 focus:ring-offset-2">
                                                @foreach($statuses as $status)
                                                <option value="{{$status->id}}" {{ $status->id === $report->status_id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>   
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    {{ $reports->appends(request()->query())->links() }}
                </div>
                
                <div class="px-6 py-3 bg-white text-right text-sm text-gray-500">
                    Всего заявок: {{ $reports->total() }}
                </div>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 text-center">
                <i class="bi bi-inbox text-5xl text-gray-400 mb-3 block"></i>
                <p class="text-gray-500 mb-3">Пока нет ни одной заявки.</p>
            </div>
        @endif
    </div>
</body>
</html>