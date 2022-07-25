<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Camp Outdoor | Admin</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="w-100"></div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
          <?php echo csrf_field(); ?>
          <button type="submit" class="nav-link px-2 border-0 bg-dark"> Logout <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>
  </header>
<?php /**PATH C:\laragon\www\prowebapp-master\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>