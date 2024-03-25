<x-layout>

    <div class="container">
        <div class="row">
            <h1>Alterar {{$livro->nome}}</h1>
        </div>

        <div class="row">
            <form action="/atualizar/{{$livro->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <input class="form-control" type="text" name="nome" placeholder="Nome do livro" required value="{{$livro->nome}}">
        
                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="mb-3">
                    <input class="form-control" type="text" name="ISBN" placeholder="ISBN" required value="{{$livro->ISBN}}">
        
                    @error('ISBN')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="mb-3">
                    <input class="form-control" type="date" name="dataPublicacao" placeholder="Data publicação" required value="{{$livro->dataPublicacao}}">
        
                    @error('dataPublicacao')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="mb-3">
                    <input class="form-control" type="text" name="numeroPaginas" placeholder="Número de páginas" required value="{{$livro->numeroPaginas}}">
        
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
                    <input class="form-control" type="texto" name="seccao" placeholder="Secção" required value="{{$livro->seccao}}">
        
                    @error('seccao')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="mb-3">
                    <input class="form-control" type="texto" name="descricao" placeholder="Sinopse" required value="{{$livro->descricao}}">
        
                    @error('descricao')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="">Autores</label>
                    <select class="form-select" multiple name="autores[]" id="">
                        @foreach($todosAutores as $autor)
                        <option value="{{ $autor->id }}" {{ $livro->autor->contains($autor) ? 'selected' : '' }}>{{ $autor->nome }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="">Generos</label>
                    <select class="form-select" multiple name="generos[]" id="">
                        @foreach($todosGeneros as $genero)
                            <option value="{{ $genero->id }}" {{ $livro->genero->contains($genero) ? 'selected' : '' }}>{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>
        
                <button class="btn btn-secondary btn-block w-100">Alterar livro</button>
            </form>
        </div>
    </div>
</x-layout>