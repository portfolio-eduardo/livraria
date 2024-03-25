<x-layout>
    <div class="container">
        <div class="d-flex justify-content-center m-3">
            <div class="card text-center" style="width: 25rem">
                <div class="d-flex justify-content-center">
                    <img style="width: 150px; height: 150px; object-fit:cover;"
                        src="{{ $livro->foto ? asset('storage' . '/' . $livro->foto) : asset('storage/fotografiasLivros/semLivro.jpg') }}"
                        class="card-img-top object-fit-cover rounded-circle" alt="capa do livro">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $livro->nome }}</h5>
                    <p class="card-text">{{ $livro->descricao }}</p>
                    <p class="card-text"><small class="text-muted">{{ $livro->numeroPaginas }} páginas</small></p>
                    <p class="card-text">Publicado a {{ $livro->dataPublicacao }}</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="d-flex justify-content-center">
            <h2>Autores do livro</h2>
        </div>

        @if (count($autoresLivro) == 0)
            <div class="row">
                <p>Ups! Este livro não tem nenhum autor associado!</p>
            </div>
        @else
            <div class="d-flex justify-content-center flex-wrap">
                @foreach ($autoresLivro as $autor)
                    <x-autorCard :autor="$autor" />
                @endforeach
            </div>
        @endif

    </div>
    </div>
</x-layout>
