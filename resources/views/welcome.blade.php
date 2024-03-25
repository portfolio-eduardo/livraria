<x-layout>

    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <h1 class="text-white">Biblioteca Municipal</h1>
                    <h3 class="text-white">Explora um mundo de conhecimento.</h3>
                </div>
            </div>
        </div>
    </div>
    

   <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="my-3">Livros recentes</h1>
            </div>
           <div class="col-auto ms-auto">
                <a href="/livros"> <button class="btn btn-secondary">Encontrar mais livros</button></a>
           </div>
        </div>

        @if (count($cincoLivros) == 0)
            <div class="row">
                <p>Ups! Não foram encontrados nenhuns livros.</p>
            </div>
        @endif

        <div class="row">
            @foreach ($cincoLivros as $livro)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mb-3">
                    <x-livroCard :livro="$livro" />
                </div>
            @endforeach
        </div>
   </div>
</x-layout>

{{-- 
    
    
    <h1>Livros adicionados recentemente</h1>
            
                @foreach ($cincoLivros as $livro)
                    <li>{{ $livro->nome }}</li>
                @endforeach
            
                <a href="/livros">Encontrar mais livros</a>

    
--}}