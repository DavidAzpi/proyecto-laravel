<h1>Pedidos</h1>

<a href="<?php echo e(route('pedido.create')); ?>">Crear Pedido</a>

<?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h3>Cliente: <?php echo e($pedido->cliente); ?></h3>

    <ul>
        <?php $__currentLoopData = $pedido->frutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($fruta->nombre); ?>

                (Cantidad: <?php echo e($fruta->pivot->cantidad); ?>)
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\02-DWES\Practica7.1-Laravel\Ej03-BBDD-relaciones\resources\views/pedido/index.blade.php ENDPATH**/ ?>