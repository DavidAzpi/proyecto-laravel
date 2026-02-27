<h1>Categorías</h1>

@foreach($categorias as $categoria)
    <h3>{{ $categoria->nombre }}</h3>

    <ul>
        @foreach($categoria->frutas as $fruta)
            <li>{{ $fruta->nombre }}</li>
        @endforeach
    </ul>
@endforeach
