

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Category</h1>
</div>

<?php if(session()->has ('success')): ?>
  <div class="alert alert-success col-lg-7" role="alert">
    <?php echo e(session('success')); ?>

  </div>  
<?php endif; ?>


<div class="table-responsive col-lg-7">
  <a href="/admin/categories/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Create New Category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($category->name); ?></td>
        <td>
          <a href="/admin/categories/<?php echo e($category->id); ?>" class="badge bg-info">
          <span data-feather="eye"></span></a>
          <a href="/admin/categories/<?php echo e($category->id); ?>/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/admin/categories/<?php echo e($category->id); ?>" method="post" class="d-inline">
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\Akatara-Outdoor\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>