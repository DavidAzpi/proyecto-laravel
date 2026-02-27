<h1>Pedidos</h1>

<a href="{{ route('pedido.create') }}">Crear Pedido</a>

@foreach($pedidos as $pedido)
    <h3>Cliente: {{ $pedido->cliente }}</h3>

    <ul>
        @foreach($pedido->frutas as $fruta)
            <li>
                {{ $fruta->nombre }}
                (Cantidad: {{ $fruta->pivot->cantidad }})
            </li>
        @endforeach
    </ul>
@endforeach
