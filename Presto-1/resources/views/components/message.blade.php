@if(session()->has('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success mt-5">
        {{ session('success') }}
    </div>
@endif