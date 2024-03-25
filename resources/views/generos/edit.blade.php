<x-layout>
    <div class="d-flex flex-column align-items-center">
        <div class="row">
            <h1>Alterar {{$genero->nome}}</h1>
        </div>

        <div class="row">
            <form action="/atualizarGenero/{{$genero->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <input class="form-control" type="text" placeholder="Nome do genero" name="nome" value="{{$genero->nome}}" required>

                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>

                <div class="mb-3">
                    <input class="form-control" type="text" name="descricao" placeholder="Descricao" value="{{$genero->descricao}}" required>

                    @error('descricao')
                        {{ $message }}
                    @enderror
                </div>

                <button class="btn btn-secondary btn-block w-100">Alterar genero</button>
            </form>
        </div>
    </div>
</x-layout>
