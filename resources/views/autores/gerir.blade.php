<x-layout>
    <div class="container">

        <div class="row">
            <ul class="nav nav-tabs mt-3 mb-3">
                <li class="nav-item">
                    <a class="nav-link active" id="tabAtivos" aria-current="page"
                        onclick="mostrarSeccao('autoresAtivos')">Autores ativos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabInativos" onclick="mostrarSeccao('autoresInativos')">Autores inativos</a>
                </li>
            </ul>
        </div>

        <section id="autoresAtivos">
            <div class="row mb-4 mt-4">
                <div class="col">
                    <h2>Autores ativos</h2>
                </div>

                <div class="col-auto ms-auto">
                    <a href="/adicionarAutor"><button class="btn btn-secondary">Adicionar autor</button></a>
                </div>
            </div>

            @if (count($todosAutoresAtivos) == 0)
                <div class="row">
                    <p>Ups! Não foram encontrados nenhuns autores!</p>
                </div>
            @else
                <div class="row">

                    @foreach ($todosAutoresAtivos as $autor)
                        <div class="col-xs-12 col-md-6 col-lg-4 mb-5">
                            <x-autorCardCompleto :autor="$autor" />
                        </div>
                    @endforeach

                    <div class="mt-2">
                        {{ $todosAutoresAtivos->links() }}
                    </div>
                </div>
            @endif
        </section>

        <section id="autoresInativos" style="display: none">

            <div class="row mb-4 mt-4">
                <h2>Autores inativos</h2>
            </div>

            @if (count($todosAutoresInativos) == 0)
                <div class="row">
                    <p>Ups! Não foram encontrados nenhuns autores!</p>
                </div>
            @else
                <div class="row">

                    @foreach ($todosAutoresInativos as $autor)
                        <div class="col-xs-12 col-md-6 col-lg-4 mb-5">
                            <x-autorCardCompleto :autor="$autor" />
                        </div>
                    @endforeach

                    <div class="mt-2">
                        {{ $todosAutoresInativos->links() }}
                    </div>
                </div>
            @endif
        </section>
    </div>

    {{-- script para mostrar e esconder os funcionarios ativos e inativos --}}
    <script>
        const seccaoAtivos = document.getElementById("autoresAtivos");
        const seccaoInativos = document.getElementById("autoresInativos");

        const tabAtivos = document.getElementById("tabAtivos");
        const tabInativos = document.getElementById("tabInativos");

        /*
        document.addEventListener('DOMContentLoaded', function() {
            seccaoAtivos.classList.add('active');
            seccaoAtivos.style.display = "block";
            seccaoInativos.style.display = "none";
        });
        */

        function mostrarSeccao(seccao) {

            if (seccao === "autoresAtivos") {
                tabAtivos.classList.add('active');
                tabInativos.classList.remove('active');

                seccaoAtivos.style.display = "block";
                seccaoInativos.style.display = "none";
            } else if (seccao === "autoresInativos") {
                tabAtivos.classList.remove('active');
                tabInativos.classList.add('active');

                seccaoAtivos.style.display = "none";
                seccaoInativos.style.display = "block";
            }
        }
    </script>
</x-layout>
