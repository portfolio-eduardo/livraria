<x-layout>

    <div class="container">
        @if (count($todosGeneros) == 0)
            <div class="row">
                <p>Ups! Não foram encontrados nenhuns generos.</p>
            </div>
        @endif

        <div class="row">
            @foreach ($todosGeneros as $genero)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mt-3 mb-3">
                    <x-generoCard :genero="$genero" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
