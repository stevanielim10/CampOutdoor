

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3"><?php echo e($beranda->title); ?></h2>
            
            <p> Kategori | <a href="/?category=<?php echo e($beranda->category->slug); ?>" class="text-decoration-none">
                <?php echo e($beranda->category->name); ?></a></p>
                
                <?php if($beranda->image): ?>
                <div style="max-height: 500px; overflow:hidden">
                    <img src="<?php echo e(asset('storage/'. $beranda->image)); ?>"
                    alt="<?php echo e($beranda->category->name); ?>" class="img-fluid">
                </div> 
                <?php else: ?>
                    <img src="https://source.unsplash.com/700x300?<?php echo e($beranda->category->name); ?>"
                    alt="<?php echo e($beranda->category->name); ?>" class="img-fluid">   
                <?php endif; ?>
                
    <div class="my-3 fs-6">
        <?php echo $beranda->body; ?>

    </div>
                <a href="/" class="bi bi-arrow-left btn btn-primary"> Back to Home</a>
                
                <?php if(auth()->guard()->check()): ?>
                <a href="" class="bi bi-basket btn btn-success"> Pesan</a>
                <?php endif; ?>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/home.blade.php ENDPATH**/ ?>