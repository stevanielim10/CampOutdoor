

<?php $__env->startSection('container'); ?>

    <h2><?php echo e($order_barang->title); ?></h2>
    <p> By. Theo Felix | <a href="/categories/<?php echo e($order_barang->category->slug); ?>"><?php echo e($order_barang->category->name); ?></a></p>
    <h5><?php echo e($order_barang->Author); ?></h5>
    <?php echo e($order_barang->body); ?>


    <a href="/order">back to order</a>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/order_barang.blade.php ENDPATH**/ ?>