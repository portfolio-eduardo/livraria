<x-layout>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <h2>Alterar autor</h2>
        </div>
        <div class="row">
            <form action="/atualizarAutor/{{$autor->id}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div class="d-flex justify-content-center mt-3 mb-3">
                    <img style="width: 150px; height: 150px; object-fit: cover; object-position: center;"
                        src="{{ $autor->foto ? asset('storage' . '/' . $autor->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                        class="card-img-top object-fit-cover rounded-circle" id="imagem">
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="nome" placeholder="Nome" required value="{{$autor->nome}}">
        
                    @error('nome')
                        {{ $message }}
                    @enderror
                </div>
        
                <div>
                    <input type="date" class="form-control mb-2" name="dataNascimento"  placeholder="Data nascimento" required value="{{$autor->dataNascimento}}">
        
                    @error('dataNascimento')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="nacionalidade" placeholder="Nacionalidade" required value="{{$autor->nacionalidade}}">
        
                    @error('nacionalidade')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <input type="text" class="form-control mb-2" name="biografia" placeholder="Biografia" required value="{{$autor->biografia}}">
        
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
        
                <button class="btn btn-secondary btn-block w-100">Alterar autor</button>
            </form>
        </div>
    </div>
</x-layout>