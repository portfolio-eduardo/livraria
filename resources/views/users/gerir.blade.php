<x-layout>
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs mt-3 mb-3">
                <li class="nav-item">
                    <a class="nav-link active" id="tabAtivos" aria-current="page"
                        onclick="mostrarSeccao('clientesAtivos')">Clientes ativos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabInativos" onclick="mostrarSeccao('clientesInativos')">Clientes
                        inativos</a>
                </li>
            </ul>
        </div>
        <section id="clientesAtivos">
            <h2>Clientes ativos</h2>

            @if (count($todosClientesAtivos) == 0)
                <div class="row">
                    <p>Ups! Não foram encontrados nenhuns clientes!</p>
                </div>
            @else
                <div class="row">
                    <table class="table table-striped align-middle">
                        <tr>
                            <th class="d-none d-sm-block">Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        @foreach ($todosClientesAtivos as $cliente)
                            <tr>
                                <td class="d-none d-sm-block"><img style="width: 100px; height: 100px; object-fit:cover;"
                                        src="{{ $cliente->foto ? asset('storage' . '/' . $cliente->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                                        class="card-img-top object-fit-cover rounded-circle" alt="capa do cliente"></td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a href="/utilizadores/{{ $cliente->id }}"><button
                                            class="btn btn-primary w-100 mb-2">Ver</button></a>
                                    <a href="/desativarAtivarUsers/{{ $cliente->id }}"><button
                                            class="btn btn-danger w-100">Desativar</button></a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="mt-2">
                        {{ $todosClientesAtivos->links() }}
                    </div>
            @endif

        </section>

        <section id="clientesInativos" style="display: none">
            <h2>Clientes inativos</h2>

            @if (count($todosClientesInativos) == 0)
                <div class="row">
                    <p>Ups! Não foram encontrados nenhuns clientes!</p>
                </div>
            @else
                <div class="row">
                    <table class="table table-striped align-middle">
                        <tr>
                            <th class="d-none d-sm-block">Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        @foreach ($todosClientesInativos as $cliente)
                            <tr>
                                <td class="d-none d-sm-block"><img style="width: 100px; height: 100px; object-fit:cover;"
                                        src="{{ $cliente->foto ? asset('storage' . '/' . $cliente->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                                        class="card-img-top object-fit-cover rounded-circle" alt="capa do cliente"></td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a href="/desativarAtivarUsers/{{ $cliente->id }}"><button
                                            class="btn btn-danger w-100">Ativar</button></a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="mt-2">
                        {{ $todosClientesInativos->links() }}
                    </div>
            @endif
        </section>
    </div>
    </div>

    {{-- script para mostrar e esconder os clientes ativos e inativos --}}
    <script>
        const seccaoAtivos = document.getElementById("clientesAtivos");
        const seccaoInativos = document.getElementById("clientesInativos");

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

            if (seccao === "clientesAtivos") {
                tabAtivos.classList.add('active');
                tabInativos.classList.remove('active');

                seccaoAtivos.style.display = "block";
                seccaoInativos.style.display = "none";
            } else if (seccao === "clientesInativos") {
                tabAtivos.classList.remove('active');
                tabInativos.classList.add('active');

                seccaoAtivos.style.display = "none";
                seccaoInativos.style.display = "block";
            }
        }
    </script>
</x-layout>
