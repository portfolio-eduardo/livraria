<x-layout>
    <div class="container">
        <form action="/livros" method="GET">
            @csrf
            <div class="row">
                <h3 class="mt-3">Filtrar livros</h3>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                    <label for="nome" class="form-label">Titulo do livro</label>
                    <input id="nome" placeholder="Procurar titulo do livro" type="text" name="procurar" class="form-control" value="{{ old('procurar') }}">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                    <label for="genero" class="form-label">Genero</label>
                    <select class="form-select" name="genero" id="genero">
                        <option value="">---</option>
                        @foreach ($todosGeneros as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                    <label for="dataInicio" class="form-label">Data inicio</label>
                    <input id="dataInicio" type="date" name="dataInicio" class="form-control" value="{{ old('dataInicio') }}">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-2">
                    <label for="dataFim" class="form-label">Data fim</label>
                    <input id="dataFim" type="date" name="dataFim" class="form-control" value="{{ old('dataFim') }}">
                </div>
                
                <div class="col-12 mb-2">
                    <button class="btn btn-secondary" type="submit">Procurar</button>
                </div>
            </div>
            
        </form>

        <div class="row">
            <h3 class="mt-3">Livros</h3>
        </div>
        @if (count($todosLivros) == 0)
            <div class="row">
                <p>Ups! Não foram encontrados nenhuns livros.</p>
            </div>
        @endif

       <div class="row">
            @foreach ($todosLivros as $livro)
            <div class="col-xs-12 col-sm-6 col-md-6 col-xl-3 mb-3">
                <x-livroCard :livro="$livro" />
            </div>
            @endforeach
       </div>
    </div>
</x-layout>
