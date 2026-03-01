<?php if(session('status')): ?>
    <p style="background:green; color:white;">
        <?php echo e(session('status')); ?>

    </p>
<?php endif; ?>
<h3>
    <a href="<?php echo e(action([App\Http\Controllers\FrutaController::class, 'create'])); ?>">
        Crear fruta
    </a>
</h3>

<h1>Listado de frutas</h1>
<?php $__currentLoopData = $frutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p>
        <a href="<?php echo e(action([App\Http\Controllers\FrutaController::class, 'detail'], $fruta->id)); ?>">
            <?php echo e($fruta->nombre); ?>

        </a>
    </p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php /**PATH C:\xampp\htdocs\02-DWES\Practica7.1-Laravel\Ej03-BBDD-relaciones\resources\views/fruta/index.blade.php ENDPATH**/ ?>