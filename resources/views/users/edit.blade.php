<x-layout>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <h2>Alterar o meu perfil</h2>
        </div>
        <div class="row">
            <form action="/alterarPerfil" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-center mt-3 mb-3">
                    <img style="width: 150px; height: 150px; object-fit: cover; object-position: center;"
                        src="{{ $user->foto ? asset('storage' . '/' . $user->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                        class="card-img-top object-fit-cover rounded-circle" id="imagem">
                </div>


                <div>
                    <input id="foto" type="file" class="form-control mb-2" name="foto">

                    @error('foto')
                        {{ $message }}
                    @enderror
                </div>


                <div>
                    <input type="text" class="form-control mb-2" name="nome" placeholder="Nome" required
                        value="{{ $user->nome }}">

                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="nomeUtilizador"
                        placeholder="Nome de utilizador" required value="{{ $user->nomeUtilizador }}">

                    @error('nomeUtilizador')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="email" class="form-control mb-2" name="email" required placeholder="Email"
                        value="{{ $user->email }}">

                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="morada" placeholder="Morada" required
                        value="{{ $user->morada }}">

                    @error('morada')
                        {{ $message }}
                    @enderror
                </div>


                <button class="btn btn-secondary btn-block w-100 mb-2">Alterar perfil</button>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('foto').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
    
            reader.onload = function(e) {
                document.getElementById('imagem').src = e.target.result;
            }
    
            reader.readAsDataURL(file);
        });
    </script>
</x-layout>
