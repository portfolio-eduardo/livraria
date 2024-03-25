@props(['livro']) {{-- Props serve para passar dados para os componentes --}}

  <div class="card p-2" style="height: 100%">
    <div class="d-flex justify-content-center">
      <img style="width: 150px; height: 150px; object-fit: cover;" src="{{ $livro->foto ? asset('storage' . '/' . $livro->foto) : asset('storage/fotografiasLivros/semLivro.jpg')  }}" class="card-img-top object-fit-cover rounded-circle" alt="capa do livro">
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$livro->nome}}</h5>
      <p class="card-text">{{$livro->descricao}}</p>
      <p class="card-text"><small class="text-muted">{{$livro->numeroPaginas}} páginas</small></p>
      <a href="/livros/{{$livro->id}}"><button class="btn btn-secondary">Ver livro</button></a>
    </div>
  </div>