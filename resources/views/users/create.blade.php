<x-layout>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <h2>Registar funcionario</h2>
        </div>
        <div class="row">
            <form action="/registarFuncionario" enctype="multipart/form-data" method="POST">
                @csrf
                <div>
                    <input type="text" class="form-control mb-2" name="nome" placeholder="Nome" required value="{{old('nome')}}">
        
                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>
        
                <div>
                    <input type="text" class="form-control mb-2" name="nomeUtilizador"  placeholder="Nome de utilizador" required value="{{old('nomeUtilizador')}}">
        
                    @error('nomeUtilizador')
                        {{ $message }}
                    @enderror
                </div>
        
                <div>
                    <input type="email" class="form-control mb-2" name="email" required  placeholder="Email" value="{{old('email')}}">
        
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                
                <div>
                    <input type="password" class="form-control mb-2" name="password"  placeholder="Palavra-passe" required>
        
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
        
                <div>
                    <input type="password" class="form-control mb-2" name="password_confirmation"  placeholder="Repetir palavra-passe" required>
        
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
        
                <div>
                    <input type="text" class="form-control mb-2" name="morada" placeholder="Morada" required value="{{old('morada')}}">
        
                    @error('morada')
                        {{ $message }}
                    @enderror
                </div>
                
                <div>
                    <input type="file" class="form-control mb-2" name="foto">
        
                    @error('foto')
                        {{ $message }}
                    @enderror
                </div>
        
                <button class="btn btn-secondary btn-block w-100">Registar</button>

            </form>
        </div>
    </div>
</x-layout>