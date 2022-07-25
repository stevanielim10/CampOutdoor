

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3"><?php echo e($beranda->title); ?></h2>
            
            <p> Kategori | <a href="/?category=<?php echo e($beranda->category->slug); ?>" class="text-decoration-none">
                <?php echo e($beranda->category->name); ?></a></p>
                
                <img src="https://source.unsplash.com/700x300?<?php echo e($beranda->category->name); ?>"
                alt="<?php echo e($beranda->category->name); ?>" class="img-fluid">

    <div class="my-3 fs-6">
        <?php echo e($beranda->body); ?>

    </div>
                <p><a href="/" class="text-decoration-none">back to home</a></p>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor - Copy\resources\views/home.blade.php ENDPATH**/ ?>