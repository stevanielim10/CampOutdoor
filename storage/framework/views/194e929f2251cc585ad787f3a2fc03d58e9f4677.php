

<?php $__env->startSection('container'); ?>
<link rel="stylesheet" href="style.css">
<div class = "content">
    <h1> Halaman About </h1>
    <img src="img/<?php echo e($image); ?>" alt="<?php echo e($name); ?>" width="250" class="img-thumbnail-rounded-circle">
    <h3><?php echo e($name); ?></h3>
    <p><?php echo e($nomor); ?></p>
    <small class="d-block mt-5 text-muted text-center">&copy <script>document.write(new Date().getFullYear())</script> | Akatara Outdoor</small>
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/about.blade.php ENDPATH**/ ?>