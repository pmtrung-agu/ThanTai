
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My style -->
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/css/Style.css">
    
    <!-- CSS Bootstrap - Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!--Font family-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet"> 
     <!-- script boostrap -->
    
    <title><?php echo $__env->yieldContent('title'); ?> <?php echo $__env->yieldSection(); ?> - Trạm dừng nghỉ Thần Tài </title>
    <style type="text/css">
        p{
            margin: 0.5rem 0 !important;
        }

        .nav-link{
            font-size: 1rem !important;
        }
        .container-fluid a {
            color: #facf42;
            font-style: unset;
        }
        @font-face
        {
            font-family: font;                           /* đặt tên font */
            src: url(TacOne-Regular.ttf);                            /* tải font chữ */
        }
    </style>
    <?php $__env->startSection('css'); ?> <?php echo $__env->yieldSection(); ?>
</head>
<body>

<!-- --------navbar------- -->
<nav class="navbar navbar-expand-lg " style="background-color: #0f142a;">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo e(env('APP_URL')); ?>"><img class="rounded-circle" src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/LOGO-MOI.png" alt=""></a>
      <button class="navbar-toggler bg-body-tertiary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(env('APP_URL')); ?>gioi-thieu">GIỚI THIỆU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(env('APP_URL')); ?>hinh-anh">HÌNH ẢNH</a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(env('APP_URL')); ?>lien-he">LIÊN HỆ</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-light" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>
<?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
<!--Contact-->
    <div class="container-fluid" style="width: 100% !important;  --bs-gutter-x: 0rem;">
        <div class="social" style="background-image:url(<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/nen.jpg);">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 text-justify">
                            <h1>Liên hệ</h1>
                            <p><i class="bi bi-telephone"></i>
                                <a href="#" class="link-social">
                                    02963 651 333 - 0918 082 264
                                </a>
                            </p>
                            <p><i class="bi bi-envelope"></i><a href="#" class="link-social">thantaiviet@gmail.com</a></p>
                            <p><i class="bi bi-geo-alt"></i><a href="#" class="link-social">Số 679, Quốc lộ 91, ấp Bình Phú I, Xã Bình Hòa, Huyện Châu Thành, Tỉnh An Giang</a></p>
                            
                        </div>
                        <div class="col-md-3 right-social">
                            <h1>Follow</h1>
                            <p><i class="bi bi-facebook"></i><a href="#" class="link-social">Facebook</a></p>
                            <p><i class="bi bi-youtube"></i><a href="#" class="link-social">Youtube</a></p>
                            <p><i class="bi bi-twitter"></i><a href="#" class="link-social">Twitter</a></p>
                            <p><i class="bi bi-instagram"></i><a href="#" class="link-social">Instagram</a></p>
                        </div>
                        <div class="col-md-3">
                            <h1>Thanh toán</h1>
                            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/pay_1.png" alt="">
                            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/pay_2.png" alt="">
                            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/pay_3.png" alt="">
                            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/pay_4.png" alt="">
                            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/pay_5.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d980.9238265709733!2d105.36647122846247!3d10.445735299352538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a125e7d58b401%3A0xfcad49074d313e3f!2zVHLhuqFtIGThu6tuZyBDaMOibiBUaOG6p24gVMOgaQ!5e0!3m2!1svi!2sus!4v1712718883361!5m2!1svi!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php $__env->startSection('js'); ?> <?php echo $__env->yieldSection(); ?>
</body>
</html>
<?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTaiViet/layout.blade.php ENDPATH**/ ?>