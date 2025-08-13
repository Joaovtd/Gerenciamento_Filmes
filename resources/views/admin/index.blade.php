<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Filmes</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        :root {
            --bg-light: #141414;
            --bg-dark: #1f1f1f;
            --bg-white: #fff;
            --primary: #e50914;
            --secondary: #b3b3b3;
            --text-main: #fff;
            --text-muted: #888;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg-light);
            color: var(--text-main);
            margin: 0;
            padding: 0;
        }

        header {
            background: var(--bg-dark);
            padding: 1rem;
            text-align: center;
        }

        header h1 {
            color: var(--primary);
            margin: 0;
        }

        table {
            width: 90%;
            margin: 2rem auto;
            border-collapse: collapse;
            background: var(--bg-dark);
            color: var(--text-main);
            border-radius: 8px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 0.8rem 1rem;
            text-align: left;
        }

        table th {
            background: var(--bg-light);
            color: var(--text-main);
        }

        table tr:nth-child(even) {
            background: #222;
        }

        table tr:hover {
            background: #2a2a2a;
        }

        .action-buttons button {
            padding: 0.3rem 0.6rem;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .edit-btn {
            background: #f1c40f;
            color: #000;
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            background: #d4ac0d;
        }

        .delete-btn {
            background: #e74c3c;
            color: #fff;
        }

        .delete-btn:hover {
            transform: translateY(-2px);
            background: #c0392b;
        }

        /* Cards display like index */
        .movie-page .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .movie-card {
            display: flex;
            flex-direction: column;
            background: var(--bg-dark);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .movie-card .cover {
            width: 100%;
            background-size: cover;
            background-position: center;
            height: 400px;
        }

        .movie-card .info {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .movie-card .title {
            font-size: 1.4rem;
            margin: 0 0 0.5rem;
            color: var(--primary);
        }

        .movie-card .category {
            font-weight: bold;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }

        .movie-card .synopsis {
            margin: 0.5rem 0 1rem;
            color: var(--text-muted);
            flex-grow: 1;
        }

        .btn-primary {
            display: inline-block;
            background: var(--primary);
            color: var(--bg-white);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            transition: background 0.2s;
        }

        .btn-primary:hover {
            background: #f6121d;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin - Gerenciamento de Filmes</h1>
        <div style="margin-top:1rem; text-align:center;">
            <button id="showTable">Tabela</button>
            <button id="showCards">Cards</button>
        </div>
    </header>

    <!-- Table -->
    <table id="moviesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->category->name }}</td>
                <td>{{ $movie->year }}</td>
                <td class="action-buttons">
                    <a href="{{ route('movie.edit', $movie->id) }}"><button class="edit-btn">Editar</button></a>
                    <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Cards -->
    <main class="movie-page" id="moviesCards">
        <div class="container">
            @foreach($movies as $movie)
            <div class="movie-card">
                <div class="cover" style="background-image: url('{{ asset('storage/'.$movie->cover) }}')"></div>
                <div class="info">
                    <h2 class="title">{{ $movie->title }}</h2>
                    <p class="category">{{ $movie->category->name }}</p>
                    <p class="synopsis">{{ $movie->synopsis }}</p>
                    <a href="{{ $movie->link }}" class="btn-primary" target="_blank">🎥 Watch Trailer</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <script>
        const table = document.getElementById('moviesTable');
        const cards = document.getElementById('moviesCards');
        const showTableBtn = document.getElementById('showTable');
        const showCardsBtn = document.getElementById('showCards');

        table.style.display = 'table';
        cards.style.display = 'none';

        showTableBtn.addEventListener('click', () => {
            table.style.display = 'table';
            cards.style.display = 'none';
        });

        showCardsBtn.addEventListener('click', () => {
            table.style.display = 'none';
            cards.style.display = 'grid';
        });
    </script>
</body>

</html>