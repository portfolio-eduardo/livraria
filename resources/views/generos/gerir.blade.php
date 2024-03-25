<x-layout>
    <div class="container">
        <div class="row align-items-center mt-3 mb-3">
            <div class="col">
                <h1>Generos</h1>
            </div>
            <div class="col-auto ms-auto">
                <a href="/adicionarGenero"><button class="btn btn-secondary">Adicionar novo genero</button></a>
            </div>
        </div>
        <div class="row">
            @if (count($todosGeneros) == 0)
                    <div class="row">
                        <p>Ups! Não foram encontrados nenhuns generos!</p>
                    </div>
                @else
               
                <div class="row">
                    <table class="table table-striped align-middle">
                        <tr>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Ações</th>
                        </tr>
                        @foreach ($todosGeneros as $genero)
                            <tr>
                                <td>{{ $genero->nome }}</td>
                                <td>{{ $genero->descricao }}</td>
                                <td><a href="/alterarGenero/{{ $genero->id }}"><button class="btn btn-warning w-100 mb-2">Alterar</button></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mt-2">
                    {{$todosGeneros->links()}}
                </div>
                @endif
        </div>
    </div>
</x-layout>