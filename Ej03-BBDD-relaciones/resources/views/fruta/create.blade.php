@if(isset($fruta))
    <h1>Editar fruta</h1>
@else
    <h1>Crear fruta</h1>
@endif

<form action="{{
    isset($fruta)
    ? action([App\Http\Controllers\FrutaController::class, 'update'])
    : action([App\Http\Controllers\FrutaController::class, 'save']) }}"
      method="POST">

    @csrf
    @if(isset($fruta))
        <input type="hidden" name="id" value="{{ $fruta->id }}">
    @endif

    <label>Nombre</label>
    <input type="text" name="nombre"
           value="{{ isset($fruta) ? $fruta->nombre : '' }}">

    <label>Descripción</label>
    <input type="text" name="descripcion"
           value="{{ isset($fruta) ? $fruta->descripcion : '' }}">
    <label>Precio</label>
    <input type="number" name="precio"
           value="{{ isset($fruta) ? $fruta->precio : '' }}">

    <label>Categoría:</label>
    <select name="categoria_id">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ isset($fruta) && $fruta->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <input type="submit" value="Guardar">

</form>
