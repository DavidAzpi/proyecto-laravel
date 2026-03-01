<?php if(isset($fruta)): ?>
    <h1>Editar fruta</h1>
<?php else: ?>
    <h1>Crear fruta</h1>
<?php endif; ?>

<form action="<?php echo e(isset($fruta)
    ? action([App\Http\Controllers\FrutaController::class, 'update'])
    : action([App\Http\Controllers\FrutaController::class, 'save'])); ?>"
      method="POST">

    <?php echo csrf_field(); ?>
    <?php if(isset($fruta)): ?>
        <input type="hidden" name="id" value="<?php echo e($fruta->id); ?>">
    <?php endif; ?>

    <label>Nombre</label>
    <input type="text" name="nombre"
           value="<?php echo e(isset($fruta) ? $fruta->nombre : ''); ?>">

    <label>Descripción</label>
    <input type="text" name="descripcion"
           value="<?php echo e(isset($fruta) ? $fruta->descripcion : ''); ?>">
    <label>Precio</label>
    <input type="number" name="precio"
           value="<?php echo e(isset($fruta) ? $fruta->precio : ''); ?>">
    <input type="submit" value="Guardar">

</form>
<?php /**PATH C:\xampp\htdocs\02-DWES\Practica7.1-Laravel\Ej02-BBDD-clase\resources\views/fruta/create.blade.php ENDPATH**/ ?>