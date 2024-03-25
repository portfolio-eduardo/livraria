<x-layout>
    <section>
        Todos os autores

        @if (count($todosAutores) == 0)
            <p>Ups! Não foram encontrados nenhuns autores.</p>
        @endif

        @foreach ($todosAutores as $autor)
            <h1>{{ $autor->nome }}</h1>
        @endforeach
    </section>
</x-layout>
