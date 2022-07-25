<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Denda</h1>
</div>


<div class="table-responsive col-lg-12">

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
                <th scope="col">User</th>
                <th scope="col">Jumlah Denda</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu</th>
                <td scope="col" class="text-center"><i class="fa fa-cog"></i></td>
            </tr>
        </thead>
        <tbody>
            
            <?php $__currentLoopData = $denda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width="30px"><?php echo e($loop->iteration); ?></td>

                <td width="180px">
                    <a class="btn btn-link" href="<?php echo e(route('admin.transaction.show',['code' => $dd->transaction[0]->code])); ?>"><?php echo e($dd->transaction[0]->code); ?></a>
                </td>
                <td><?php echo e($dd->transaction[0]->user->name); ?></td>
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
                <td class="text-center">
                    <?php if($dd->status_denda == 'unpaid'): ?>

                    <a href="<?php echo e(route('admin.denda.proccess',['id' => $dd->id])); ?>" class="btn btn-success"> <i class="fa fa-money-bill"></i> Bayar</a>
                    <?php else: ?>
                    <button type="button" class="btn btn-success" disabled> <i class="fa fa-money-bill"></i> Bayar</button>

                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\akatara-main\resources\views/admin/denda/index.blade.php ENDPATH**/ ?>