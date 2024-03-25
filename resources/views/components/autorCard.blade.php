@props(['autor']) {{-- Props serve para passar dados para os componentes --}}

<div class="card text-center me-3 mb-3" style="width:18rem;">
    <img style="width: 100%; height: 250px; object-fit: cover; object-position: center;" src="{{ $autor->foto ? asset('storage' . '/' . $autor->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"  class="card-img-top object-fit-cover rounded" alt="foto do autor">
    <div class="card-body">
      <h5 class="card-title">{{$autor->nome}}</h5>
      <a href="/autores/{{$autor->id}}"><button class="btn btn-outline-secondary">Ver mais sobre o autor</button></a>
    </div>
  </div>