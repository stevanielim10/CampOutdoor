<?php $__env->startSection('container'); ?>
<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo e(route('index')); ?>" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h1>Transaction</h1>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">

            <?php if(session()->has ('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>


            <table class="table table-striped table-sm" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status</th>
                        <td scope="col" class="text-center"><i class="fa fa-cog"></i></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($tr->code); ?></td>
                        <td>
                            <a href="<?php echo e(route('detail.post',['home' => $tr->post->slug])); ?>"><?php echo e($tr->post->title); ?></a>
                        </td>
                        <td><?php echo e($tr->tgl_pinjam); ?></td>
                        <td><?php echo e($tr->tgl_kembali); ?></td>
                        <td><?php echo e($tr->status_transaksi); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('transaksi.show',['code' => $tr->code])); ?>" class="btn btn-info"> <i class="fa fa-pencil-alt"></i> Action</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap5.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>

"></script>
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap5.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>

<small class="d-block mt-5 text-muted text-center">&copy; 2021 | Akatara Outdoor</small>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\theofelix\Akatara-Outdoor\resources\views/transaction.blade.php ENDPATH**/ ?>