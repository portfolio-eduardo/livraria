<x-layout>

    <div class="container">

        <div class="d-flex justify-content-center">
            <div class="card text-center mt-4 mb-4" style="width: 25rem;">
                <img src="{{ $autor->foto ? asset('storage' . '/' . $autor->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                    class="card-img-top object-fit-cover rounded" style="width: 100%; height: 250px; object-fit: cover; object-position: center;" alt="foto do autor">
                <div class="card-body">
                    <h5 class="card-title">{{ $autor->nome }}</h5>
                    <p class="card-text">{{ $autor->biografia }}</p>
                    <hr>
                    <p class="card-text">{{ $autor->dataNascimento }} - {{ $autor->nacionalidade }}</p>
                    <p class="card-text">{{ $autor->descricao }}</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-3 mt-3">
            <h2> Livros do autor</h2>
        </div>
        
        <div class="row">
            @if(count($livrosAutor) == 0)
                <p>Este autor ainda não possui livros nesta biblioteca</p>

            @else
            @foreach ($livrosAutor as $livro)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <x-livroCard :livro="$livro" />
                </div>
            @endforeach
            @endif
        </div>
    </div>

    <section>
       

        
    </section>
</x-layout>
