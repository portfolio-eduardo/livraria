<x-layout>
    <div class="d-flex flex-column align-items-center">
        <div class="row">
            <h1>Adicionar um genero</h1>
        </div>

        <div class="row">
            <form action="/registarGenero" method="POST">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="nome" placeholder="Nome do genero" required
                        value="{{ old('nome') }}">

                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>

                <div class="mb-3">
                    <input class="form-control" type="text" name="descricao" placeholder="Descricao" required
                        value="{{ old('descricao') }}">

                    @error('descricao')
                        {{ $message }}
                    @enderror
                </div>

                <button class="btn btn-secondary btn-block w-100">Adicionar genero</button>
            </form>
        </div>
    </div>
</x-layout>
