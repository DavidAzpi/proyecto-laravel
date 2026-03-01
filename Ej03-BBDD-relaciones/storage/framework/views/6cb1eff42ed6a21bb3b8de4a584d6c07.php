<h1><?php echo e($fruta->nombre); ?></h1>

<p><?php echo e($fruta->descripcion); ?></p>
<p>Precio: <?php echo e($fruta->precio); ?></p>
<p>Fecha: <?php echo e($fruta->fecha); ?></p>

<a href="<?php echo e(action([App\Http\Controllers\FrutaController::class, 'delete'], $fruta->id)); ?>">
    Eliminar
</a>
<a href="<?php echo e(action([App\Http\Controllers\FrutaController::class, 'edit'], $fruta->id)); ?>">
    Editar
</a>

<?php /**PATH C:\xampp\htdocs\02-DWES\Practica7.1-Laravel\Ej03-BBDD-relaciones\resources\views/fruta/detail.blade.php ENDPATH**/ ?>