        @props(['sort', 'status'])

        <div class="mb-6 flex gap-10 text-center">
            <div class="flex-column bg-blue-100 p-4 border">
                <span class="">Сортировать по дате создания:</span>
                <div class="flex gap-4">
                    <a href="{{ route('reports.index', [ 'sort' => 'desc', 'status' => $status ]) }}" class="hover:text-blue-500 transition-colors">Сначала новые</a>
                    <a href="{{ route('reports.index', [ 'sort' => 'asc', 'status' => $status ]) }}" class="hover:text-blue-500 transition-colors">Сначала старые</a>
                </div>
            </div>

            <div class="flex-column bg-blue-100 p-4 border">
                <span class="">Сортировать по статусу заявки:</span>
                <ul class="flex gap-4">
                    @foreach ($statuses as $status)
                        <li>
                            <a href="{{ route('reports.index', [ 'sort' => $sort, 'status' => $status->id]) }}" class="hover:text-blue-500 transition-colors">{{ $status->name }}</a>   
                        </li> 
                    @endforeach
                </ul>
            </div>
        </div>