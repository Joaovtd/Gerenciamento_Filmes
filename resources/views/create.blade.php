@section('head')
    @vite(['resources/css/form.css'])
@endsection

@section('content')
<main class="form-page">
    <section class="page-header">
        <h1>Insira um Filme</h1>
        <p>Preencha os campos!!</p>
    </section>

    <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="input-group">
            <div class="input-field @error('title') error @enderror">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')<p class="error-message">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="input-group">
            <div class="input-field @error('year') error @enderror">
                <label for="year">Ano</label>
                <input type="number" id="year" name="year" min="1900" max="2100" step="1" value="{{ old('year') }}" required>
                @error('year')<p class="error-message">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="input-group">
            <div class="input-field @error('category_id') error @enderror">
                <label for="category_id">Categoria</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="error-message">{{ $message }}</p>@enderror
            </div>

            <div class="input-field @error('link') error @enderror">
                <label for="link">Trailer</label>
                <input type="url" id="link" name="link" value="{{ old('link') }}">
                @error('link')<p class="error-message">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="input-field full-width @error('synopsis') error @enderror">
            <label for="synopsis">Sinopse</label>
            <textarea id="synopsis" name="synopsis" rows="5">{{ old('synopsis') }}</textarea>
            @error('synopsis')<p class="error-message">{{ $message }}</p>@enderror
        </div>

        <div class="input-group">
            <div class="input-field @error('cover') error @enderror">
                <label for="cover">Capa</label>
                <input type="file" id="cover" name="cover" accept="image/*">
                @error('cover')<p class="error-message">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form-buttons">
            <button type="reset" class="btn-reset">Resetar</button>
            <button type="submit" class="btn-submit">Salvar</button>
        </div>
    </form>
</main>
@endsection