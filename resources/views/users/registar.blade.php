<x-layout>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <h2 class="mt-2">Registar na Biblioteca</h2>
        </div>
        <div class="row">
            <form action="/registarUtilizador" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="d-flex justify-content-center mt-3 mb-3">
                    <img style="width: 150px; height: 150px; object-fit: cover;"
                        src="{{asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                        class="card-img-top object-fit-cover rounded-circle" id="imagem">
                </div>
                
                <div>
                    <input type="text" class="form-control mb-2" name="nome" placeholder="Nome" required value="{{old('nome')}}">
        
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div>
                    <input type="text" class="form-control mb-2" name="nomeUtilizador"  placeholder="Nome de utilizador" required value="{{old('nomeUtilizador')}}">
        
                    @error('nomeUtilizador')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div>
                    <input type="email" class="form-control mb-2" name="email" required  placeholder="Email" value="{{old('email')}}">
        
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <input type="password" class="form-control mb-2" name="password"  placeholder="Palavra-passe" required>
        
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div>
                    <input type="password" class="form-control mb-2" name="password_confirmation"  placeholder="Repetir palavra-passe" required>
        
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div>
                    <input type="text" class="form-control mb-2" name="morada" placeholder="Morada" required value="{{old('morada')}}">
        
                    @error('morada')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <input type="file" id="escolherImagem" class="form-control mb-2" name="foto">
        
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <button class="btn btn-secondary btn-block w-100">Criar</button>
                <p class="text-muted mt-2">Já tem conta? <a class="link-secondary" href="/login">Entrar</a></p>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('escolherImagem').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
    
            reader.onload = function(e) {
                document.getElementById('imagem').src = e.target.result;
            }
    
            reader.readAsDataURL(file);
        });
    </script>
</x-layout>