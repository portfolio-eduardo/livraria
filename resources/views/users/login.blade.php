<x-layout>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <h2 class="mt-2">Entrar na sua conta</h2>
        </div>
        <div class="row">
            <form action="/autenticarUtilizador" method="POST">
                @csrf
                <div>
                    <input class="form-control mb-2" type="email" name="email" required  placeholder="Email" value="{{old('email')}}">
        
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                
                <div>
                    <input class="form-control mb-2" type="password" name="password"  placeholder="Palavra-passe" required>
        
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary btn-block w-100">Entrar</button>
                <p class="text-muted">Ainda nao tem conta? <a class="link-secondary" href="/registar">Registar</a></p>
            </form>
        </div>
    </div>
</x-layout>