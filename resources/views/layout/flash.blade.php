@if (session('success'))
    <div class="alert alert-success flash">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger flash">
        {{ session('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger flash">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
