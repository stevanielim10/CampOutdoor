<?php $__env->startSection('container'); ?>
<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo e(route('index')); ?>" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h1>Denda</h1>
        <strong>Jumlah Denda yang belum dibayar : <?php echo e('Rp. '.number_format($denda->where('status_denda','unpaid')->sum('jml_denda'),2,',','.')); ?></strong>
        <br>
        <small>*) Silahkan hubungi <a href="<?php echo e(route('about')); ?>">admin</a> untuk membayar denda </small>
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
                        <th scope="col">Jumlah Denda</th>
                        <th scope="col">Status</th>
                        <th scope="col">Waktu</th>

                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $denda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td width="30px"><?php echo e($loop->iteration); ?></td>

                        <td width="180px">
                            <a class="btn btn-link" href="<?php echo e(route('transaksi.show',['code' => $dd->transaction[0]->code])); ?>"><?php echo e($dd->transaction[0]->code); ?></a>
                        </td>
                        <td><?php echo e('Rp '.number_format($dd->jml_denda,2,',','.')); ?></td>
                        <td>
                            <?php if($dd->status_denda == 'paid'): ?>
                                <span class="badge bg-success"><?php echo e(Str::ucfirst($dd->status_denda)); ?></span>
                            <?php endif; ?>

                            <?php if($dd->status_denda == 'unpaid'): ?>
                                <span class="badge bg-secondary"><?php echo e(Str::ucfirst($dd->status_denda)); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($dd->created_at); ?></td>

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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\theofelix\Akatara-Outdoor\resources\views/denda.blade.php ENDPATH**/ ?>