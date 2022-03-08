@if (session()->has('message'))
    <div class="alert alert-success mt-5">
        {{ session('message') }}
    </div>
@endif
