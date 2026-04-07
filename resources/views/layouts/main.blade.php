<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite([ 'resources/css/app.css', 'resources/js/app.js' ])
</head>
<body>
    <header class="bg-white shadow-sm border-b border-gray-200 p-2">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-150">
                    <div>
                        <a href="{{ route('dashboard') }}" class="text-3xl font-bold text-blue-700">НАРУШЕНИЙ<span class="text-red-600">.НЕТ</span></a>
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

    <main>
        {{ $slot }}
    </main>

    <footer>

    </footer>
</body>
</html>