@if(session()->has('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif
