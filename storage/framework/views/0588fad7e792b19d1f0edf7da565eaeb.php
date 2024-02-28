<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <title>Chiếu UZU | <?php echo $__env->yieldContent('title'); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="Chiếu UZU Tân Châu Long" name="description" />
      <meta content="Phan Minh Trung" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="/assets/images/favicon.ico">
      <!-- App css -->
      <?php $__env->startSection('css'); ?> <?php echo $__env->yieldSection(); ?>
      <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/metismenu.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />
      <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="<?php echo e(env('APP_URL')); ?>/admin" class="logo">
                            <span>
                                <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                                <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" style="margin-top:70px;">
                        <ul class="metismenu" id="side-menu">
                            <!--<li class="menu-title">Navigation</li>-->
                            <li><a href="<?php echo e(env('APP_URL')); ?>" target="_blank"><i class="mdi mdi-earth"></i> <span> Xem trang </span></span></a></li>
                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/dashboard"><i class="fi-air-play"></i> <span> Dashboard </span></span></a></li>
                            <?php if(in_array('Admin', Session::get('user.roles'))): ?>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Danh mục </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/address">Địa chỉ</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/product-category">Danh mục sản phẩm</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/mail-list">Email</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-user-circle-o"></i> <span> Khách hàng</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/customer">Tất cả</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/customer/1">Hoạt động</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/customer/0">Tạm ngưng hoạt động</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="mdi mdi-account-card-details"></i> <span> Doanh nghiệp</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/seller">Tất cả</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/seller/1">Hoạt động</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/seller/0">Tạm ngưng hoạt động</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Sản phẩm</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/product">Tất cả</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/product/1">Hoạt động</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/product/0">Tạm ngưng</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/promotion"><i class="fa fa-opencart"></i> <span> Khuyến mãi</span></a></li>
                            <li>
                                <a href="javascript: void(0);"><i class="mdi mdi-cart"></i> <span> Đơn hàng</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/order">Tất cả</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/order/0">Đơn hàng chờ xử lý</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/order/1">Đơn hàng Hoàn thành</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/order/2">Đơn hàng Hủy</a></li>
                                </ul>
                            </li>
                            
                            <?php if(in_array('Admin', Session::get('user.roles'))): ?>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i> <span> Báo cáo </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/logs">Logs</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Top Bar Start -->
                <div class="topbar">
                    <nav class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="hide-phone app-search">
                                <form action="<?php echo e(env('APP_URL')); ?>admin/search" method="GET">
                                    <input type="text" placeholder="Search..." class="form-control" name="keyword" id="keyword" required="required">
                                    <button type="submit" name="submit" value="OK"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo_sm.png" alt="user" class="rounded-circle"> <span class="ml-1"><?php echo e(Session::get('user.email')); ?><i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/user/change-password" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>Thay đổi mật khẩu</span>
                                    </a>
                                    <!-- item-->
                                    <?php if(in_array('Admin', Session::get('user.roles'))): ?>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/user" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Quản lý tài khoản</span>
                                    </a>
                                    <?php endif; ?>
                                    <!-- item-->
                                    <a href="<?php echo e(env('APP_URL')); ?>auth/logout" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Đăng xuất</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                  <?php $__env->startSection('title_box'); ?>
                                    <h4 class="page-title">Chiếu UZU Tân Châu Long</h4>
                                  <?php echo $__env->yieldSection(); ?>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Top Bar End -->
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                    <?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2024 Trung tâm Tin học Trường Đại học An Giang
                </footer>
            </div>
    <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/popper.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/bootstrap.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/metisMenu.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/waves.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.slimscroll.js"></script>
        <!-- App js -->
        
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.app.js"></script>
        <?php $__env->startSection('js'); ?> <?php echo $__env->yieldSection(); ?>
    </body>
</html>
<?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/layout.blade.php ENDPATH**/ ?>