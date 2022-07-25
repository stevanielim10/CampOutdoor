

<?php $__env->startSection('container'); ?>

    <h2><?php echo e($post["title"]); ?></h2>
    <h5><?php echo e($post["Author"]); ?></h5>
    <p><?php echo e($post["body"]); ?></p>

        <a href="/order">back to order</a>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/post.blade.php ENDPATH**/ ?>