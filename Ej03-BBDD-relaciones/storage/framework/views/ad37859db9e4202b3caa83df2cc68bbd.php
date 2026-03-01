<form action="<?php echo e(route('pedido.save')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <label>Cliente:</label>
    <input type="text" name="cliente">

    <h3>Frutas</h3>

    <?php $__currentLoopData = $frutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <?php echo e($fruta->nombre); ?>

            <input type="number"
                   name="frutas[<?php echo e($fruta->id); ?>]"
                   min="0"
                   value="0">
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <button type="submit">Guardar</button>
</form>
<?php /**PATH C:\xampp\htdocs\02-DWES\Practica7.1-Laravel\Ej03-BBDD-relaciones\resources\views/pedido/create.blade.php ENDPATH**/ ?>