<x-layout>

    <div class="container">

        <div class="row">
            <ul class="nav nav-tabs mt-3 mb-3">
                <li class="nav-item">
                  <a class="nav-link active" id="tabAtivos" aria-current="page" onclick="mostrarSeccao('livrosAtivos')">Livros ativos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="tabInativos" onclick="mostrarSeccao('livrosInativos')">Livros inativos</a>
                </li>
              </ul>
        </div>

        <div class="row">
            
            <section id="livrosAtivos">
                
                <div class="row align-items-center mt-3 mb-3">
                    <div class="col">
                        <h1>Livros ativos</h1>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="/adicionar"><button class="btn btn-secondary">Adicionar novo livro</button></a>
                    </div>
                </div>

                <div class="row mb-3">
                    <form action="/gerir" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Procurar livro / ISBN" name="procurar">
                            </div>
                            <div class="col-auto ms-auto">
                                <button type="submit" class="btn btn-secondary">Procurar</button>
                            </div>
                        </div>
                    </form>   
                </div>

                @if (count($livrosAtivos) == 0)
                    <div class="row">
                        <p>Ups! Não foram encontrados nenhuns livros!</p>
                    </div>
                @else
                <div class="row">
                    @foreach ($livrosAtivos as $livro)
                        <div class="col-xs-12 col-md-6 col-lg-4 mb-5">
                            <x-livroCardCompleto :livro="$livro" />
                        </div>
                    @endforeach
                </div>
                <div class="mt-2">
                    {{$livrosAtivos->links()}}
                </div>
                @endif
            </section>
        </div>

        <div class="row">
            <section id="livrosInativos" style="display: none">
                <div class="row">
                    <h1>Livros inativos</h1>
                </div>

                @if (count($livrosInativos) == 0)
                    <div class="row">
                        <p>Ups! Não foram encontrados nenhuns livros!</p>
                    </div>
                @else

                <div class="row">
                    @foreach ($livrosInativos as $livro)
                        <div class="col-xs-12 col-md-6 col-lg-4 mb-5">
                            <x-livroCardCompleto :livro="$livro" />
                        </div>
                    @endforeach
                </div>

                @endif
            </section>
        </div>
    </div>

    {{-- script para mostrar e esconder os livros ativos e inativos --}}
    <script>
        const seccaoAtivos = document.getElementById("livrosAtivos");
        const seccaoInativos = document.getElementById("livrosInativos");

        const tabAtivos = document.getElementById("tabAtivos");
        const tabInativos = document.getElementById("tabInativos");

        function mostrarSeccao(seccao) {
            
            if (seccao === "livrosAtivos") {
                tabAtivos.classList.add('active');
                tabInativos.classList.remove('active');

                seccaoAtivos.style.display = "block";
                seccaoInativos.style.display = "none";
            }
            else if(seccao === "livrosInativos") {
                tabAtivos.classList.remove('active');
                tabInativos.classList.add('active');

                seccaoAtivos.style.display = "none";
                seccaoInativos.style.display = "block";
            }
        }
    </script>
</x-layout>
