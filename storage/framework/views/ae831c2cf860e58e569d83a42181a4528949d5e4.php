<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Posts</h1>
</div>

<?php if(session()->has ('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<div class="table-responsive col-lg-9">
  <a href="/admin/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Post</a>
  <table class="table table-striped table-sm" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col" class="text-center"><i class="fa fa-cogs"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beranda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($beranda->title); ?></td>
        <td><?php echo e($beranda->category->name); ?></td>
        <td><?php echo e('Rp. '.number_format($beranda->harga,2,',',',')); ?></td>
        <td><?php echo e($beranda->stok); ?></td>
        <td class="text-center">
          <a href="/admin/posts/<?php echo e($beranda->id); ?>" class="badge bg-info">
          <span data-feather="eye"></span></a>
          <a href="/admin/posts/<?php echo e($beranda->id); ?>/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/admin/posts/<?php echo e($beranda->id); ?>" method="post" class="d-inline">
            <?php echo method_field('delete'); ?>
            <?php echo csrf_field(); ?>
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span data-feather="x-circle"></span></button>
          </form>
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
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>