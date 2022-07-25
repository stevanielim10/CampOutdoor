<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SewaBAE | Administrator</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('css/sb-admin-2.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('admin')); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fab fa-gitlab"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SewaBAE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('admin')); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.barang')); ?>">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Barang</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.kategori')); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Kategori</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.transaksi')); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transaksi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.payment')); ?>">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Payment</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.payment_method')); ?>">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Payment Method</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.denda')); ?>">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Denda</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('admin.user')); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e($profile->nama_lengkap); ?></span>
                                <i class="far fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">


                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($jml_barang); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($jml_transaksi); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Denda
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($jml_denda); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($jml_user); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark"><?php echo $__env->yieldContent('content-title'); ?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo $__env->yieldContent('content'); ?>
                                </div>



                            </div>


                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer mt-5">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; SewaBAE <?php echo e(date('Y')); ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Pilih "Logout" di bawah ini jika ingin mengakhiri sesi saat ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?php echo e(route('auth.logout')); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/sweetalert2/dist/sweetalert2.all.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('js/custom.js')); ?>"></script>


</body>

</html>
<?php /**PATH D:\Laravel\Akatara-Outdoor - Copy\resources\views/admin.blade.php ENDPATH**/ ?>