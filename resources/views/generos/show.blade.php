<x-layout>
    <div class="container">
        <div class="row py-5">
            <h1>{{$genero->nome}}</h1>
            <h5 class="text-muted">{{$genero->descricao}}</h5>
        </div>

        <hr>


        <div class="row">
           
            @if (count($livrosDoGenero) == 0)  
                <p>Ups! Não foram encontrados nenhuns livro de {{$genero->nome}}</p>
            @endif

            @foreach ($livrosDoGenero as $livro)
                <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
                    <x-livroCard :livro="$livro" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>