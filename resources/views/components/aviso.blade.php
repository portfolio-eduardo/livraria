 @if (session()->has('message'))
     <div class="d-flex justify-content-center">
        <div class="alert alert-primary fixed-top" role="alert" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show">
            {{ session('message') }}
        </div>
     </div>
 @endif
