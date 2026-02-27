@if(session('status'))
    <p style="background:green; color:white;">
        {{ session('status') }}
    </p>
@endif
<h3>
    <a href="{{ action([App\Http\Controllers\FrutaController::class, 'create']) }}">
        Crear fruta
    </a>
</h3>

<h1>Listado de frutas</h1>
@foreach($frutas as $fruta)
    <p>
        <a href="{{ action([App\Http\Controllers\FrutaController::class, 'detail'], $fruta->id) }}">
            {{ $fruta->nombre }}
        </a>
    </p>
@endforeach



