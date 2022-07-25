

<?php $__env->startSection('container'); ?>


<h3 class="mb-4 text-center"><?php echo e($title); ?></h3>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/">
            <?php if(request('category')): ?>
            <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                
            <?php endif; ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" 
                value="<?php echo e(request('search')); ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-end">
<?php echo e($beranda->links()); ?>

</div>


<?php if($beranda->count()): ?>
    <div class="card mb-3">
        <a href="/beranda/<?php echo e($beranda[0]->slug); ?>" class="text-decoration-none text text-dark">
            <img src="https://source.unsplash.com/1200x400?<?php echo e($beranda[0]->category->name); ?>" 
            class="card-img-top" alt="<?php echo e($beranda[0]->category->name); ?>"></a>
            
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/beranda/<?php echo e($beranda[0]->slug); ?>" 
                    class="text-decoration-none text text-dark"><?php echo e($beranda[0]->title); ?></a></h3>
                    <p> 
                        <small class="text-muted">
                            Kategori | <a href="/?category=<?php echo e($beranda[0]->category->slug); ?>" class="text-decoration-none"><?php echo e($beranda[0]->category->name); ?></a> 
                            <?php echo e($beranda[0]->created_at->diffForHumans()); ?>

                        </small>
                    </p>
                    <p class="card-text"><?php echo e($beranda[0]->excerpt); ?></p>
                    <a href="/beranda/<?php echo e($beranda[0]->slug); ?>" class="text-decoration-none btn btn-primary"> Click Me </a>
            </div>
    </div>
     
    
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $beranda->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beranda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color:rgba(0, 0, 0, 0.5)">
                        <a href="/?category=<?php echo e($beranda->category->slug); ?>" class="text-decoration-none text-white"><?php echo e($beranda->category->name); ?></a></div>
                        
                        <a href="/beranda/<?php echo e($beranda->slug); ?>"><img src="https://source.unsplash.com/500x450?
                            <?php echo e($beranda->category->name); ?>" class="card-img-top" alt="<?php echo e($beranda->category->name); ?>"></a>

                        <div class="card-body">
                            <h5 class="card-title"><a href="/beranda/<?php echo e($beranda->slug); ?>" 
                                class="text-decoration-none text text-dark"><?php echo e($beranda->title); ?></a></h5>
                            <p> 
                                <small class="text-muted">
                                    Kategori | <a href="/?category=<?php echo e($beranda->category->slug); ?>" class="text-decoration-none"><?php echo e($beranda->category->name); ?></a> 
                                    <?php echo e($beranda->created_at->diffForHumans()); ?>

                                </small>
                            </p>
                            <p class="card-text"><?php echo e($beranda->excerpt); ?></p>
                            <a href="/beranda/<?php echo e($beranda->slug); ?>" class="btn btn-primary">Click Me</a>
                        </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    
    <?php else: ?>
        <p class="text-center fs-5">Post Tidak Ditemukan</p>
    <?php endif; ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor - Copy\resources\views/beranda.blade.php ENDPATH**/ ?>