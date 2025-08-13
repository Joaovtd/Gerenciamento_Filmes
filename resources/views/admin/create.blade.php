<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme - Admin</title>
    <style>
        :root {
            --bg-dark: #141414;
            --bg-light: #1f1f1f;
            --accent: #E50914;
            --text-main: #ffffff;
            --text-muted: #b3b3b3;
            --input-bg: #333;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
        }
        header {
            background-color: var(--bg-light);
            padding: 1rem 2rem;
            font-size: 1.5rem;
            font-weight: bold;
        }
        main {
            max-width: 900px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: var(--bg-light);
            border-radius: 8px;
        }
        h1 {
            margin-bottom: 1rem;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }
        input, select, textarea, button {
            padding: 0.6rem 1rem;
            border-radius: 4px;
            border: none;
            outline: none;
            font-size: 1rem;
        }
        input, select, textarea {
            background-color: var(--input-bg);
            color: var(--text-main);
        }
        textarea {
            flex-basis: 100%;
            min-height: 100px;
        }
        button {
            background-color: var(--accent);
            color: var(--text-main);
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover {
            background-color: #b10610;
        }
        .form-group {
            flex: 1 1 200px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <header>🎬 Capybara Cinema - Adicionar Filme</header>
    <main>
        <h1>Cadastrar Novo Filme</h1>
        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" placeholder="Título do filme" required>
            </div>
            <div class="form-group">
                <label for="year">Ano</label>
                <input type="number" name="year" id="year" placeholder="Ano" required>
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="link">Trailer Link</label>
                <input type="text" name="link" id="link" placeholder="URL do trailer">
            </div>
            <div class="form-group" style="flex-basis: 100%;">
                <label for="synopsis">Sinopse</label>
                <textarea name="synopsis" id="synopsis" placeholder="Descrição do filme"></textarea>
            </div>
            <div class="form-group">
                <label for="cover">Capa</label>
                <input type="file" name="cover" id="cover">
            </div>
            <div class="form-group">
                <label for="banner">Banner</label>
                <input type="file" name="banner" id="banner">
            </div>
            <div style="flex-basis: 100%; display: flex; gap: 1rem;">
                <button type="reset">Resetar</button>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </main>
</body>
</html>