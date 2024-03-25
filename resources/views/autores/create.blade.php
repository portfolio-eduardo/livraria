<x-layout>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <h2>Registar autor</h2>
        </div>
        <div class="row">
            <form action="/registarAutor" enctype="multipart/form-data" method="POST">
                @csrf
                <div>
                    <input type="text" class="form-control mb-2" name="nome" placeholder="Nome" required value="{{old('nome')}}">
        
                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>
        
                <div>
                    <input type="date" class="form-control mb-2" name="dataNascimento"  placeholder="Data nascimento" required value="{{old('dataNascimento')}}">
        
                    @error('dataNascimento')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="nacionalidade" placeholder="Nacionalidade" required value="{{old('nacionalidade')}}">
        
                    @error('nacionalidade')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="biografia" placeholder="Biografia" required value="{{old('biografia')}}">
        
                    @error('biografia')
                        {{ $message }}
                    @enderror
                </div>
    
                <div>
                    <input type="file" class="form-control mb-2" name="foto">
        
                    @error('foto')
                        {{ $message }}
                    @enderror
                </div>
        
                <button class="btn btn-secondary btn-block w-100">Adicionar autor</button>
            </form>
        </div>
    </div>
</x-layout>