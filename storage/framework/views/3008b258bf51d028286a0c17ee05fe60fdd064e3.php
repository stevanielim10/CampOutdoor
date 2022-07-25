<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Account</h1>
</div>

<?php if(session()->has ('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
     <?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>



<div class="table-responsive">
    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Account</a>
  <table class="table table-striped table-sm" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col" class="text-center"><i class="fa fa-cogs"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo ($user->role_id == 1) ? '<span class="badge bg-primary">Admin</span>' : '<span class="badge bg-secondary">User</span>'; ?></td>
        <td class="text-center">
          

            <a href="<?php echo e(route('admin.pass.update',['user' => $user->id])); ?>" class="btn btn-warning"><i class="fa fa-lock"></i></a>

          <a href="/admin/users/<?php echo e($user->id); ?>/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
          <form action="/admin/users/<?php echo e($user->id); ?>" method="post" class="d-inline">
            <?php echo method_field('delete'); ?>
            <?php echo csrf_field(); ?>
            <button class="btn btn-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\theofelix\Akatara-Outdoor\resources\views/admin/users/index.blade.php ENDPATH**/ ?>