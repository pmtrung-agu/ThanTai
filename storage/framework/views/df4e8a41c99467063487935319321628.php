<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Điện máy Khải Duyên</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Điện máy Khải Duyên" name="description" />
        <meta content="Phan Minh Trung" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(env('APP_URL')); ?>assets/backend/images/favicon.ico">
        <!-- App css -->
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/modernizr.min.js"></script>
    </head>
    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?php echo e(env('APP_URL')); ?>assets/backend/images/bg.jpg');background-size: cover;"></div>
        <div class="wrapper-page account-page-full">
            <div class="card">
                <div class="card-block">
                    <div class="account-box">
                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="/" class="text-success">
                                    <span><img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo.png" alt="Điện máy Khải Duyên "></span>
                                </a>
                            </h2>
                            <form action="<?php echo e(env('APP_URL')); ?>auth/login" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="destination" value="<?php echo e($destination); ?>">
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required id="password" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">Ghi nhớ đăng nhập</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Đăng nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-t-40 text-center">
                <p class="account-copyright">2024 © Điện máy Khải Duyên</p>
            </div>
        </div>
        <!-- jQuery  -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/popper.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/bootstrap.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/metisMenu.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/waves.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.slimscroll.js"></script>
        <!-- App js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.core.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/jquery.app.js"></script>
    </body>
</html>
<?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Admin/login.blade.php ENDPATH**/ ?>