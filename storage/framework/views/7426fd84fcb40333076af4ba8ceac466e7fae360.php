<?php $__env->startSection('container'); ?>
<div class="row">
    <div class="col-lg-12">

        <a href="<?php echo e(route('transaksi')); ?>" class="btn btn-danger"> <i class="fas fa-arrow-left"></i> Kembali</a>
        <hr>
        <h1>Transaction | # <?php echo e($transaction->code); ?></h1>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <h6>Produk</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th width="200px">Code</th>
                    <td>:</td>
                    <td><?php echo e($transaction->code); ?></td>
                </tr>
                <tr>
                    <th width="200px">Produk</th>
                    <td>:</td>
                    <td><?php echo e($transaction->post->title); ?></td>
                </tr>
                <tr>
                    <th width="200px">Gambar</th>
                    <td>:</td>
                    <td>
                        <?php if($transaction->post->image): ?>
                        <img src="<?php echo e(asset('storage/'.$transaction->post->image)); ?>" width="500px" alt="">

                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th width="200px">Tanggal Pinjam</th>
                    <td>:</td>
                    <td><?php echo e($transaction->tgl_pinjam); ?></td>
                </tr>
                <tr>
                    <th width="200px">Tanggal Kembali</th>
                    <td>:</td>
                    <td><?php echo e($transaction->tgl_kembali); ?></td>
                </tr>
                <tr>
                    <th width="200px">Status</th>
                    <td>:</td>
                    <td><?php echo e($transaction->status_transaksi); ?></td>
                </tr>
                <tr>
                    <th width="200px">Waktu</th>
                    <td>:</td>
                    <td><?php echo e($transaction->created_at); ?></td>
                </tr>
            </table>
        </div>
        <div class="mb-4"></div>
        <h6>Data Peminjam</h6>
        <div class="table-responsive">
            <table class="table table-striped">

                <tr>
                    <th width="200px">User</th>
                    <td>:</td>
                    <td><?php echo e($transaction->user->name); ?></td>
                </tr>
                <tr>
                    <th width="200px">Email</th>
                    <td>:</td>
                    <td><?php echo e($transaction->user->email); ?></td>
                </tr>
                <tr>
                    <th width="200px">Alamat</th>
                    <td>:</td>
                    <td><?php echo e($transaction->user->alamat); ?></td>
                </tr>

            </table>
        </div>
        <div class="mb-4"></div>
        <h6>Pembayaran</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th width="200px">Harga</th>
                    <td>:</td>
                    <td><?php echo e('Rp. '.number_format($transaction->post->harga,2,',','.').'/hari'); ?></td>
                </tr>
                <tr>
                    <th width="200px">Total</th>
                    <td>:</td>
                    <td><?php echo e('Rp. '.number_format($total,2,',','.')); ?></td>
                </tr>
                <tr>
                    <th width="200px">Payment Method</th>
                    <td>:</td>
                    <td><?php echo e($payment->paymentmethod->method); ?></td>
                </tr>
                <tr>
                    <th width="200px">Bukti Transaksi</th>
                    <td>:</td>
                    <td>
                        <?php if($payment->bukti_transaksi): ?>
                        <img src="<?php echo e(asset('storage/'.$payment->bukti_transaksi)); ?>" width="500px" alt="">

                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th width="200px">Status</th>
                    <td>:</td>
                    <td>
                        <?php if($payment->payment_status == 'paid'): ?>
                        <span class="badge bg-success">Paid</span>
                        <?php endif; ?>

                        <?php if($payment->payment_status == 'unpaid'): ?>
                        <span class="badge bg-danger">Unpaid</span>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>

        <hr>
        <form action="<?php echo e(route('transaksi.pay')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="payment_id" value="<?php echo e($payment->id); ?>">
            <div class="form-group">
                <label for="image" class="form-label">Upload Bukti Pembayaran</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" id="image" name="image"
                    onchange="previewImage()">
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="btn btn-dark mt-2"> <i class="fa fa-upload"></i> Upload</button>
        </form>
        <hr>




    </div>
</div>

<small class="d-block mt-5 text-muted text-center">&copy; 2021 | Akatara Outdoor</small>

<?php $__env->startSection('script'); ?>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\theofelix\Akatara-Outdoor\resources\views/transaction_show.blade.php ENDPATH**/ ?>