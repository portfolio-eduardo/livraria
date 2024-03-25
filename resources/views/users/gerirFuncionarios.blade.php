<x-layout>
    <div class="container">

        <div class="row">
            <ul class="nav nav-tabs mt-3 mb-3">
                <li class="nav-item">
                  <a class="nav-link active" id="tabAtivos" aria-current="page" onclick="mostrarSeccao('funcionariosAtivos')">Funcionarios ativos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="tabInativos" onclick="mostrarSeccao('funcionariosInativos')">Funcionarios inativos</a>
                </li>
              </ul>
        </div>

        <section id="funcionariosAtivos">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <h2>Funcionarios ativos</h2>
                </div>

                <div class="col-auto ms-auto">
                    <a href="/adicionarFuncionario"><button class="btn btn-secondary">Adicionar funcionario</button></a>
                </div>
            </div>

            @if (count($todosFuncionariosAtivos) == 0)
                    <div class="row">
                        <p class="text-muted">Ups! Não foram encontrados nenhuns funcionarios!</p>
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
                        @foreach ($todosFuncionariosAtivos as $funcionario)
                            <tr>
                                <td class="d-none d-sm-block"><img style="object-fit:cover; width: 100px; height: 100px;"
                                    src="{{ $funcionario->foto ? asset('storage' . '/' . $funcionario->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                                    class="card-img-top object-fit-cover rounded-circle" alt="capa do funcionario"></td>
                                <td>{{ $funcionario->nome }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>
                                    <a href="/utilizadores/{{ $funcionario->id }}"><button class="btn btn-primary w-100 mb-2">Ver</button></a>
                                    <a href="/desativarAtivarUsers/{{ $funcionario->id }}"><button class="btn btn-danger w-100">Desativar</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-2">
                        {{$todosFuncionariosAtivos->links()}}
                    </div>
                    @endif
        </section>

        <section id="funcionariosInativos" style="display: none">

            <div class="row  mb-3 mt-3">
                <h2>Funcionarios inativos</h2>
            </div>
            

            @if (count($todosFuncionariosInativos) == 0)
                    <div class="row">
                        <p class="text-muted">Ups! Não foram encontrados nenhuns funcionario!</p>
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
                        @foreach ($todosFuncionariosInativos as $funcionario)
                            <tr>
                                <td class="d-none d-sm-block"><img style="object-fit:cover; width: 100px; height: 100px;"
                                    src="{{ $funcionario->foto ? asset('storage' . '/' . $funcionario->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                                    class="card-img-top object-fit-cover rounded-circle" alt="capa do funcionario"></td>
                                <td>{{ $funcionario->nome }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>
                                    <a href="/desativarAtivarUsers/{{ $funcionario->id }}"><button class="btn btn-danger w-100">Ativar</button></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                    <div class="mt-2">
                        {{$todosFuncionariosInativos->links()}}
                    </div>
                    @endif
        </section>
    </div>

    {{-- script para mostrar e esconder os funcionarios ativos e inativos --}}
    <script>
        const seccaoAtivos = document.getElementById("funcionariosAtivos");
        const seccaoInativos = document.getElementById("funcionariosInativos");

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
            
            if (seccao === "funcionariosAtivos") {
                tabAtivos.classList.add('active');
                tabInativos.classList.remove('active');

                seccaoAtivos.style.display = "block";
                seccaoInativos.style.display = "none";
            }
            else if(seccao === "funcionariosInativos") {
                tabAtivos.classList.remove('active');
                tabInativos.classList.add('active');

                seccaoAtivos.style.display = "none";
                seccaoInativos.style.display = "block";
            }
        }
    </script>
</x-layout>