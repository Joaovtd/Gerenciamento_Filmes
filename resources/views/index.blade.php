<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes</title>
    <style>
        :root {
            --bg-dark: #121212;
            --bg-card: #1e1e1e;
            --accent: #ff4c4c;
            --text-light: #f5f5f5;
            --text-muted: #aaaaaa;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg-dark);
            color: var(--text-light);
            margin: 0;
            padding: 0;
        }

        a {
            color: var(--accent);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .main-header {
            background: var(--bg-card);
            color: var(--text-light);
            padding: 1rem 0;
        }

        .main-header .container {
            max-width: 1100px;
            margin: auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-header .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent);
        }

        .movie-page .container {
            max-width: 1100px;
            margin: auto;
            padding: 2rem 1rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .movie-card {
            display: flex;
            flex-direction: column;
            background: var(--bg-card);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
            height: 100%;
        }

        .movie-card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
        }

        .movie-card .cover {
            width: 100%;
            background-size: cover;
            background-position: center;
            height: 400px;
        }

        .movie-card .info {
            padding: 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .movie-card .title {
            font-size: 1.4rem;
            margin: 0 0 0.5rem;
            color: var(--accent);
        }

        .movie-card .category {
            font-weight: bold;
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        .movie-card .synopsis {
            margin: 0.5rem 0 1rem;
            color: var(--text-muted);
            flex-grow: 1;
        }

        .btn-primary {
            display: inline-block;
            background: var(--accent);
            color: var(--text-light);
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.2s;
            text-align: center;
        }

        .btn-primary:hover {
            background: #e64545;
        }

        @media (max-width: 768px) {
            .movie-card .cover {
                height: 300px;
            }
        }

        /* FORM */

        form {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            margin: 1.5rem 0;
        }

        form input[type="text"],
        form input[type="number"],
        form select {
            padding: 0.6rem 1rem;
            border-radius: 6px;
            border: none;
            outline: none;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
            transition: all 0.2s;
        }

        form input[type="text"]::placeholder,
        form input[type="number"]::placeholder {
            color: #bbb;
        }

        form input[type="text"]:focus,
        form input[type="number"]:focus,
        form select:focus {
            box-shadow: 0 0 5px #e50914;
        }

        form select {
            background-color: #333;
            color: #fff;
        }

        form button {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 6px;
            background-color: #e50914;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
        }

        form button:hover {
            background-color: #f6121d;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <header>
        <h1>Catálogo de Filmes</h1>
        <form action="{{ route('movie.search') }}" method="GET" style="display:flex; gap:10px;">
            <input type="text" name="title" placeholder="Pesquisar por título...">
            <input type="number" name="year" placeholder="Ano">
            <select name="category_id">
                <option value="">Todas categorias</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Buscar</button>
        </form>
    </header>

    <main class="movie-page">
        <div class="container">
            @foreach ($movies as $movie)
            <a href="{{ route('movie.show', $movie->id) }}" class="movie-card">
                <div class="cover" style="background-image: url('{{ asset('storage/'.$movie->cover) }}')"></div>
                <div class="info">
                    <div>
                        <h2 class="title">{{ $movie->title }}</h2>
                        <p class="category">{{ $movie->category->name }}</p>
                        <p class="synopsis">{{ Str::limit($movie->synopsis, 100) }}</p>
                    </div>
                    <div>
                        <span class="btn-primary">🎥 Ver Trailer</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </main>
</body>

</html>