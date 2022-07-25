<?php $__env->startSection('container'); ?>
<?php
$auth = DB::table('users')->where('id', session()->get('id_user'))->first();
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Hello, <?php echo e($auth->name); ?></h1>
</div>

<div class="row">
    <div class="col-lg-3 mb-2 mx-auto">
        <div class="card bg-primary text-white">

            <div class="card-body">
                <h4>Total Post</h4>
                <div class="float-end">
                    <span data-feather="file"></span>
                    <h6><?php echo e($jml_post); ?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2 mx-auto">
        <div class="card bg-primary text-white">

            <div class="card-body">
                <h4>Total Category</h4>
                <div class="float-end">
                    <span data-feather="folder-plus"></span>
                    <h6><?php echo e($jml_category); ?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2 mx-auto">
        <div class="card bg-primary text-white">

            <div class="card-body">
                <h4>Total Payment Method</h4>
                <div class="float-end">
                    <i class="fa fa-money-bill"></i>
                    <h6>
                        <?php echo e($jml_payment_method); ?>

                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2 mx-auto">
        <div class="card bg-primary text-white">

            <div class="card-body">
                <h4>Total Transaction</h4>
                <div class="float-end">
                    <i class="fa fa-paper-plane"></i>
                    <h6>

                        <?php echo e($jml_transaction); ?>

                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-2 mx-auto">
        <div class="card bg-primary text-white">

            <div class="card-body">
                <h4>Total Denda</h4>
                <div class="float-end">
                    <i class="fa fa-money-bill"></i>
                    <h6>
                        <?php echo e($jml_denda); ?>

                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-2 mx-auto">
        <div class="card bg-primary text-white">

            <div class="card-body">
                <h4>Total User</h4>
                <div class="float-end">
                    <span data-feather="users"></span>
                    <h6>

                        <?php echo e($jml_user); ?>

                    </h6>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\prowebapp-master\resources\views/admin/admin.blade.php ENDPATH**/ ?>