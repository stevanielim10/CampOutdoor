<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3"><?php echo e($beranda->title); ?></h2>
            <hr>
            <p> <i class="fa fa-list"></i><a href="/?category=<?php echo e($beranda->category->slug); ?>"
                    class="text-decoration-none">
                    <?php echo e($beranda->category->name); ?></a> | <i class="fa fa-clock"></i>
                <?php echo e($beranda->created_at->diffForHumans()); ?>

                | Stok <?php echo e($beranda->stok); ?> | <i class="fa fa-tags"></i> <?php echo e('Rp. '.number_format($beranda->harga,2,',','.')); ?>

             </p>

            <hr>

            <?php if(session()->has ('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

            <?php if(session()->has ('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>


            <?php if($beranda->image): ?>
            <div style="max-height: 500px; overflow:hidden">
                <img src="<?php echo e(asset('storage/'. $beranda->image)); ?>" alt="<?php echo e($beranda->category->name); ?>"
                    class="img-fluid" width="100%">
            </div>
            <?php else: ?>
            <img src="https://source.unsplash.com/700x300?<?php echo e($beranda->category->name); ?>"
                alt="<?php echo e($beranda->category->name); ?>" width="100%" class="img-fluid">
            <?php endif; ?>

            <div class="my-3 fs-6" style="text-align: justify;">
                <?php echo $beranda->body; ?>

            </div>
            <a href="/" class="bi bi-arrow-left btn btn-primary"> Back to Home</a>

            <?php if(session()->has('id_user')): ?>
            <a href="" class="bi bi-basket btn btn-success" data-bs-toggle="modal" data-bs-target="#pinjam"> Pinjam</a>
            <div class="modal fade" id="pinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <span class="text-primary">Pinjam</span>
                                produk ini</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?php echo e(route('pinjam')); ?>" method="post">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="beranda_id" value="<?php echo e($beranda->id); ?>">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pinjam">
                                    <?php $__errorArgs = ['tgl_pinjam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="tgl_kembali">
                                    <?php $__errorArgs = ['tgl_kembali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="payment_method" class="form-label">Payment Method</label>
                                    <select name="payment_method" class="form-select">

                                        <?php $__currentLoopData = $paymentmethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $py): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($py->id); ?>"><?php echo e($py->method); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['tgl_pinjam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php $__env->startSection('script'); ?>
<?php if(Session::get('pinjam_error')): ?>
<script>
    var pinjamModal = new bootstrap.Modal(document.getElementById('pinjam'));
    pinjamModal.show();
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\akatara-main\resources\views/home.blade.php ENDPATH**/ ?>