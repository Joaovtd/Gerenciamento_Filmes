<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-900 text-white min-h-screen">

    <header class="bg-gray-800 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-500">Resultados da Pesquisa</h1>
            <a href="{{ route('movie.index') }}" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition">
                Voltar
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        @if($movies->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($movies as $movie)
                    <a href="{{ route('movie.show', $movie->id) }}" class="group relative bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:scale-105 transform transition duration-300">
                        @if($movie->cover)
                            <img src="{{ asset('storage/' . $movie->cover) }}" alt="{{ $movie->title }}">
                        @else
                            <div class="w-full h-64 bg-gray-700 flex items-center justify-center text-gray-400">
                                Sem imagem
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition flex flex-col justify-center items-center text-center p-4">
                            <h2 class="text-lg font-bold">{{ $movie->title }}</h2>
                            <p class="text-sm text-gray-300">{{ $movie->year }}</p>
                            @if(isset($movie->category->name))
                                <span class="bg-red-500 px-2 py-1 rounded text-xs mt-2">{{ $movie->category->name }}</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-400 text-lg mt-10">Nenhum filme encontrado para os critérios de pesquisa.</p>
        @endif
    </main>
</body>
</html>