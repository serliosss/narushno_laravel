@props(['sort', 'status'])

<div class="mb-6 flex flex-col sm:flex-row gap-4 sm:gap-10">
    <div class="flex-column bg-blue-100 p-4 border rounded-lg w-full sm:w-auto">
        <span class="block mb-2">Сортировать по дате создания:</span>
        <div class="flex gap-4">
            <a href="{{ route('reports.index', [ 'sort' => 'desc', 'status' => $status ]) }}" class="hover:text-blue-500 transition-colors text-sm sm:text-base">Сначала новые</a>
            <a href="{{ route('reports.index', [ 'sort' => 'asc', 'status' => $status ]) }}" class="hover:text-blue-500 transition-colors text-sm sm:text-base">Сначала старые</a>
        </div>
    </div>

    <div class="flex-column bg-blue-100 p-4 border rounded-lg w-full sm:w-auto">
        <span class="block mb-2">Сортировать по статусу заявки:</span>
        <ul class="flex flex-wrap gap-2 sm:gap-4">
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('reports.index', [ 'sort' => $sort, 'status' => $status->id]) }}" class="hover:text-blue-500 transition-colors text-sm sm:text-base whitespace-nowrap">{{ $status->name }}</a>   
                </li> 
            @endforeach
        </ul>
    </div>
</div>