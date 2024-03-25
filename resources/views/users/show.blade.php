<x-layout>
    <div class="d-flex flex-column align-items-center">
        <h2 class="mt-3">Perfil do cliente</h2>
        <div class="card mt-2" style="width: 20rem;">
            <img src="{{ $User->foto ? asset('storage' . '/' . $User->foto) : asset('storage/fotografiasUtilizadores/semLivro.jpg') }}"
                class="card-img-top object-fit-cover" alt="capa do cliente">
            <div class="card-body">
                <h5 class="card-title">{{ $User->nome }}</h5>
                <p class="text-muted"><strong>@</strong>{{ $User->nomeUtilizador }}</p>
                <p class="card-text"><strong>Email: </strong>{{ $User->email }}</p>
                <p class="card-text"><strong>Morada: </strong>{{ $User->morada }}</p>
            </div>
        </div>
    </div>
</x-layout>
