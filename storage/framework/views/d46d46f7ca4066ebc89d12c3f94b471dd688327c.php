

<?php $__env->startSection('container'); ?>
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3"><?php echo e($beranda->title); ?></h2>
            <a href="/admin/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Post</a>
            <a href="/admin/posts/<?php echo e($beranda->id); ?>/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/admin/posts/ <?php echo e($beranda->id); ?>" method="post" class="d-inline">
                <?php echo method_field('delete'); ?>
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span>Delete</button>
            </form>
             
            <?php if($beranda->image): ?>
                <div style="max-height: 350px; overflow:hidden">
                    <img src="<?php echo e(asset('storage/'. $beranda->image)); ?>"
                    alt="<?php echo e($beranda->category->name); ?>" class="img-fluid mt-4">
                </div> 
            <?php else: ?>
                <img src="https://source.unsplash.com/700x300?<?php echo e($beranda->category->name); ?>"
                alt="<?php echo e($beranda->category->name); ?>" class="img-fluid mt-4">   
            <?php endif; ?>
                

    <div class="my-3 fs-6">
        <?php echo $beranda->body; ?>

    </div>
        </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/admin/posts/show.blade.php ENDPATH**/ ?>