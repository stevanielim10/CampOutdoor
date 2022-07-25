<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"># <?php echo e($transaction->code); ?> | <?php echo e($transaction->post->title); ?></h1>
</div>



<div class="row">
    <div class="col-lg-6">
        <?php if(session()->has ('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

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
            <form action="<?php echo e(route('admin.transaction.process',['code' => $transaction->code])); ?>" method="post">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>


                <input type="hidden" name="payment_id" value="<?php echo e($payment->id); ?>">

                <div class="form-group">
                    <label for="payment_status" class="form-label">Payment Status</label>
                    <select name="payment_status" class="form-select">
                        <?php $__currentLoopData = $payment_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($payment->payment_status == 'paid'): ?>

                            <option value="<?php echo e($ps); ?>" <?php echo e(($payment->payment_status == $ps) ? 'selected' : ''); ?>><?php echo e($ps); ?></option>
                            <?php break; ?>
                            <?php else: ?>

                            <option value="<?php echo e($ps); ?>" <?php echo e(($payment->payment_status == $ps) ? 'selected' : ''); ?>><?php echo e($ps); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status_transaksi" class="form-label">Status Transaksi</label>
                    <select name="status_transaksi" class="form-select">
                        <?php $__currentLoopData = $status_transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($st); ?>" <?php echo e(($transaction->status_transaksi == $st) ? 'selected' : ''); ?>><?php echo e($st); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-success mt-2">Proccess</button>
            </form>
        <hr>



    </div>
</div>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\akatara-main\resources\views/admin/transaction/show.blade.php ENDPATH**/ ?>