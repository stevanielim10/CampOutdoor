

<?php $__env->startSection('container'); ?>

<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <h2>
        <a href="/order/<?php echo e($order->slug); ?>"><?php echo e($order->title); ?></a>
    </h2>
    <h5><?php echo e($order->Author); ?></h5>
    <p><?php echo e($order->excerpt); ?></p>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/order.blade.php ENDPATH**/ ?>