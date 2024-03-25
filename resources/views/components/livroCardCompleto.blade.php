@props(['livro'])

<div class="card p-2" style="height: 100%">
    <div class="d-flex justify-content-center">
        <img style="width: 150px; height: 150px; object-fit: cover;"
            src="{{ $livro->foto ? asset('storage' . '/' . $livro->foto) : asset('storage/fotografiasLivros/semLivro.jpg') }}"
            class="card-img-top object-fit-cover rounded-circle" alt="capa do livro">
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $livro->nome }}</h5>
        <p class="card-text">{{ $livro->ISBN }}</p>
        @if ($livro->ativo == true)
            <div class="row g-1">
                <div class="col-6">
                    <a href="/livros/{{ $livro->id }}"><button class="btn btn-outline-secondary w-100 mb-2">Ver</button></a>
                </div>
                <div class="col-6">
                    <a href="/alterar/{{ $livro->id }}"><button class="btn btn-outline-secondary w-100 mb-2">Alterar</button></a>
                </div>
            </div>
            <div class="row">
                <a href="/desativarAtivar/{{ $livro->id }}"><button class="btn btn-secondary w-100">Desativar</button></a>
            </div>
        @else
            <div class="row">
                <a href="/desativarAtivar/{{ $livro->id }}"><button class="btn btn-success w-100">Ativar</button></a>
            </div>
        @endif
    </div>
</div>
