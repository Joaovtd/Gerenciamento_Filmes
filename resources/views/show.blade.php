<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->title }}</title>
    <style>
        :root {
            --bg-dark: #121212;
            --bg-card: #1e1e1e;
            --accent: #ff4c4c;
            --text-light: #f5f5f5;
            --text-muted: #aaaaaa;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
        }

        header {
            padding: 20px;
            background-color: var(--bg-card);
            text-align: center;
            font-size: 1.5rem;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 30px;
        }

        .movie-card {
            display: flex;
            background-color: var(--bg-card);
            border-radius: 10px;
            overflow: hidden;
            max-width: 900px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.5);
        }

        .movie-cover img {
            width: 300px;
            height: auto;
            object-fit: cover;
        }

        .movie-info {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .movie-info h1 {
            margin: 0;
            font-size: 2rem;
            color: var(--accent);
        }

        .movie-info p {
            line-height: 1.5;
            color: var(--text-muted);
        }

        .movie-meta {
            margin-top: 20px;
        }

        .movie-meta span {
            display: inline-block;
            margin-right: 15px;
            font-size: 0.9rem;
            color: var(--text-light);
            background: rgba(255,255,255,0.05);
            padding: 6px 12px;
            border-radius: 6px;
        }

        .watch-button {
            display: inline-block;
            background-color: var(--accent);
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            transition: background 0.3s;
        }

        .watch-button:hover {
            background-color: #e64545;
        }
    </style>
</head>
<body>
    <header>
        🎬 Catálogo de Filmes
    </header>

    <div class="container">
        <div class="movie-card">
            <div class="movie-cover">
                <img src="{{ asset('storage/' . $movie->cover) }}" alt="{{ $movie->title }}">
            </div>
            <div class="movie-info">
                <div>
                    <h1>{{ $movie->title }}</h1>
                    <p>{{ $movie->synopsis }}</p>
                    <div class="movie-meta">
                        <span>Ano: {{ $movie->year }}</span>
                        <span>Categoria: {{ $movie->category->name ?? 'N/A' }}</span>
                    </div>
                </div>
                <a href="{{ $movie->link }}" target="_blank" class="watch-button">▶ Assistir Trailer</a>
            </div>
        </div>
    </div>
</body>
</html>