

<?php $__env->startSection('container'); ?>

<h1 class="mb-5">Category : <?php echo e($category); ?></h1>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $home): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <h2>
        <a href="/beranda/<?php echo e($home->slug); ?>"><?php echo e($home->title); ?></a>
    </h2>
    <h5><?php echo e($home->Author); ?></h5>
    <p><?php echo e($home->excerpt); ?></p>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/category.blade.php ENDPATH**/ ?>