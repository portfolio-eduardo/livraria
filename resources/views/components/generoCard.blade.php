@props(['genero']) {{-- Props serve para passar dados para os componentes --}}

<div class="card text-white bg-dark text-center">
    <div class="card-body">
        <a class="link-light" href="/generos/{{$genero->id}}"><h5 class="card-title">{{$genero->nome}}</h5></a>
    </div>
</div>
