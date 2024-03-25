<x-layout>

    <div class="container d-flex flex-column align-items-center">
        <div class="row">
            <h1>Adicionar um novo livro</h1>
        </div>

        <div class="row">
            <form action="/registar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <input class="form-control" type="text" name="nome" placeholder="Nome do livro" required value="{{ old('nome') }}">
    
                        @error('nome')
                            {{ $message }}
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input class="form-control" type="text" name="ISBN" placeholder="ISBN" required value="{{ old('ISBN') }}">
    
                        @error('ISBN')
                            {{ $message }}
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input class="form-control" type="date" name="dataPublicacao" placeholder="Data publicação" required
                            value="{{ old('dataPublicacao') }}">
    
                        @error('dataPublicacao')
                            {{ $message }}
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input class="form-control" type="text" name="numeroPaginas" placeholder="Número de páginas" required
                            value="{{ old('numeroPaginas') }}">
    
                        @error('numeroPaginas')
                            {{ $message }}
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input class="form-control" type="file" name="foto">
    
                        @error('foto')
                            {{ $message }}
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input class="form-control" type="texto" name="seccao" placeholder="Secção" required value="{{ old('seccao') }}">
    
                        @error('seccao')
                            {{ $message }}
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input class="form-control" type="texto" name="descricao" placeholder="Sinopse" required
                            value="{{ old('descricao') }}">
    
                        @error('descricao')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                
                <div class="col">
                    <div class="mb-3">
                        <label for="">Autores</label>
                        <select class="form-select" multiple name="autores[]" id="">
                            @foreach ($todosAutores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="">Generos</label>
                        <select class="form-select" multiple name="generos[]" id="">
                            @foreach ($todosGeneros as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <button class="btn btn-secondary btn-block w-100">Adicionar livro</button>
            </form>
        </div>
    </div>



</x-layout>
