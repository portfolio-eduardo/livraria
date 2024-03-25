<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8b1d1b66fd.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/base.css') }}"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
   

    {{-- navbar --}}
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="50" height="50" class="d-inline-block align-top">
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @guest
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/livros"><i class="fa-solid fa-book"></i> Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/generos"><i class="fa-solid fa-list"></i> Categorias</a>
                    </li>
                  </ul>
                  <a href="/login"><button class="btn btn-secondary me-2">Entrar</button></a>
                  <a href="/registar"><button class="btn btn-outline-secondary">Registar</button></a>
            </div>
        @endguest

        @auth
        @if(auth()->user()->tipoUtilizador == 0)
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/livros"><i class="fa-solid fa-book"></i> Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/generos"><i class="fa-solid fa-list"></i> Categorias</a>
                    </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-lg-none" href="/verperfil"><i class="fa-solid fa-user"></i> Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="/verperfil" class="nav-link d-none d-lg-block"><i class="fa-solid fa-user"></i> Bem-vinda/o {{auth()->user()->nome}}</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-danger d-none d-lg-block" type="submit">Sair</button>
                                <button type="submit" class="btn btn-link d-lg-none link-danger">Sair</button>
                            </form>
                        </li>
                    </ul>
            </div>
        @elseif(auth()->user()->tipoUtilizador == 1)
            <div class="collapse navbar-collapse" id="navbarText">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/gerir"><i class="fa-solid fa-book"></i> Gerir livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gerirClientes"><i class="fa-solid fa-book"></i> Gerir clientes</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="/verperfil"><i class="fa-solid fa-user"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a href="/verperfil" class="nav-link d-none d-lg-block"><i class="fa-solid fa-user"></i> Bem-vinda/o {{auth()->user()->nome}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger d-none d-lg-block" type="submit">Sair</button>
                            <button type="submit" class="btn btn-link d-lg-none link-danger">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        @elseif(auth()->user()->tipoUtilizador == 2)
            <div class="collapse navbar-collapse" id="navbarText">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/gerirFuncionarios"><i class="fa-solid fa-book"></i> Gerir funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gerirGeneros"><i class="fa-solid fa-book"></i> Gerir generos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gerirAutores"><i class="fa-solid fa-book"></i> Gerir autores</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="/verperfil"><i class="fa-solid fa-user"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a href="/verperfil" class="nav-link d-none d-lg-block"><i class="fa-solid fa-user"></i> Bem-vinda/o {{auth()->user()->nome}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger d-none d-lg-block" type="submit">Sair</button>
                            <button type="submit" class="btn btn-link d-lg-none link-danger">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
        @endauth
    </div>
    </nav>

     {{-- aviso --}}
     <x-aviso />
     
    {{-- Vai aparecer aqui o codigo embrulhado --}}
    {{ $slot }}

    {{-- footer
    <footer class="container-fluid bg-dark text-white pt-3 pb-3 mt-3 fixed-bottom">
        &copy Copyright 2024, Biblioteca municipal de Viseu. All rights reserved.
    </footer>
     --}}

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
