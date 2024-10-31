<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Start All Css Link -->
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/all.css">
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/remixicon.css">
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/owl.carousel.min.css"> 
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/fancybox.css">
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/animate.css"> 
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/nice-select.css">       
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/style.css">
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/css/responsive.css">
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/photobox/photobox.css"> 
        <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/photobox/photobox.ie.css"> 
        <!-- End All Css Link -->
        <!-- Title -->
        <title> <?php echo $__env->yieldContent('title'); ?> <?php echo $__env->yieldSection(); ?>- Trạm dừng nghỉ Thần Tài, Công ty TNHH Khải Duyên</title>
        <link rel="icon" type="image/png" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/favicon.png">
    </head>
    <body> 
        <!-- Start Preloader Area -->
        <div class="preloader"> 
            <span class="loader"></span> 
        </div>
        <!-- End Preloader Area -->
        <!-- Start Header & Navbar Area -->
        <div class="header-wrapper"> 
            <div class="navbar-area navbar-two">    
                <div class="main-nav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-expand-lg"> 
                            <div class="logo">
                                <a class="navbar-brand" href="<?php echo e(env('APP_URL')); ?>">
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/Logo.png" alt="Logo Image">
                                </a> 
                            </div>  
                            <button class="btn side-menu d-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/icons/humberg-menu.svg" alt="Menu">
                            </button>                             
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item"><a href="<?php echo e(env('APP_URL')); ?>gioi-thieu" class="nav-link">Giới thiệu</a></li>
                                    <li class="nav-item"><a href="<?php echo e(env('APP_URL')); ?>hinh-anh" class="nav-link">Hình ảnh</a></li>
                                    
                                    <li class="nav-item">
                                        <a href="<?php echo e(env('APP_URL')); ?>lien-he" class="nav-link">Liên hệ</a>
                                    </li>
                                </ul>
                                <div class="others-options d-flex align-items-center">
                                    <ul class="option-item">
                                        
                                        <li class="button-wrap">
                                            <a href="#" class="custom-btn">free trial</a>
                                        </li>
                                        <li class="side-menu-wrap">
                                            <button class="btn side-menu side-m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/icons/humberg-menu.svg" alt="Menu">
                                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/icons/humberg-menu-hover.svg" alt="Menu Hover">
                                            </button> 
                                        </li>
                                    </ul>   
                                </div> 
                            </div> 
                        </nav>                  
                    </div>
                </div>  
            </div>  
        </div>  
        <!-- End Header & Navbar Area -->

        <!-- Start Search Form Area -->
        <div class="offcanvas search-form offcanvas-top" tabindex="-1" id="offcanvasTop"> 
            <div class="offcanvas-header"> 
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="offcanvas-body small">
                <div class="container">
                    <form class="src-form">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                        <button type="submit" class="src-btn">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Search Form Area -->
        <!-- Start Mobile Menu Area --> 
        <div class="offcanvas offcanvas-end for-mobile-nav" tabindex="-1" id="offcanvasRight"> 
            <div class="offcanvas-header">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="logo">
                            <a class="navbar-brand" href="index.html">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/Logo.png" alt="Logo Image">
                            </a> 
                        </div> 
                    </div>
                    
                </div>  
                <button type="button" class="close-btn text-right" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="ri-close-line"></i>
                </button>  
            </div>
            <div class="offcanvas-body">
                <div class="accordion" id="navbarAccordion">
					<div class="accordion-item">
					</div> 
					<div class="accordion-item"> 
                        <a class="accordion-button without-icon" href="<?php echo e(env('APP_URL')); ?>gioi-thieu">Giới thiệu</a> 
					</div> 
					<div class="accordion-item"> 
                        <a class="accordion-button without-icon" href="<?php echo e(env('APP_URL')); ?>">Hình ảnh</a> 
					</div> 
                    
                    
                    <div class="accordion-item"> 
                        <a class="accordion-button without-icon" href="<?php echo e(env('APP_URL')); ?>lien-he">Liên hệ</a> 
					</div> 

					<div class="others-options">
                        <div class="option-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="side-menu-wrap">
                                        <button class="btn side-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/icons/humberg-menu.svg" alt="Menu">
                                        </button> 
                                    </div>
                                </div>
                            </div> 
                        </div>  
                    </div>
				</div> 
            </div>
            <div class="offcanvas-footer">
                <div class="sroll-down">
                    <h3>Scroll</h3>
                    <i class="ri-mouse-fill"></i> 
                </div>
            </div>
        </div>
        <!-- End Mobile Menu Area -->
        <?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
        
        <!-- Start Footer -->
        <footer class="footer-area">
            <div class="footer-top ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="single-widget">
                                <div class="contact-area">
                                    <div class="logo">
                                    <a href="#"><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/Logo.png" alt="Logo Image"></a>
                                    </div>
                                    <ul class="quick-links">
                                        <li style="color: #fff;">Điện thoại: 02963 651 333 - 0918 082 264 </li>
                                        <li style="color: #fff;">Email:  thantaiviet@gmail.com</li>
                                        <li style="color: #fff;">Điạ chỉ: Số 679, Quốc lộ 91, ấp Bình Phú I, Xã Bình Hòa, Huyện Châu Thành, Tỉnh An Giang</li>
                                    </ul>
                                    <br />
                                    <form class="form-wrap"> 
                                        <input type="email" class="form-control" id="email2" placeholder="Đăng ký email nhận tin" required=""> 
                                        <div class="button-wrap">
                                            <button type="submit" class="submit-btn">Đồng ý</button>  
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-4">
                            <div class="single-widget ml-20">
                                <h2>Về chúng tôi</h2>
                                <ul class="quick-links">
                                    <li>
                                        <a href="<?php echo e(env('APP_URL')); ?>gioi-thieu"><i class="ri-arrow-drop-right-fill"></i>Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(env('APP_URL')); ?>hinh-anh"><i class="ri-arrow-drop-right-fill"></i>Hình ảnh</a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo e(env('APP_URL')); ?>lien-he"><i class="ri-arrow-drop-right-fill"></i>Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="single-widget">
                                <h2>Bản đồ</h2>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.695239801421!2d105.36454137564198!3d10.445740565205021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a125e7d58b401%3A0xfcad49074d313e3f!2zVHLhuqFtIGThu6tuZyBDaMOibiBUaOG6p24gVMOgaQ!5e0!3m2!1sen!2s!4v1712363850042!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer --> 

        <!-- Start Go To Top -->
        <div class="go-to-top"> 
            <p>to Top<i class="ri-arrow-right-line"></i></p>  
        </div> 
        <!-- End Go To Top -->
        <!-- Start All Js Link -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/jquery.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/jquery-ui.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/bootstrap.bundle.min.js"></script> 
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/isotope.js"></script> 
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/owl.carousel.min.js"></script>  
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/owl-thumb.js"></script>  
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/wow.min.js"></script> 
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/waypoints.min.js"></script> 
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/counterup.min.js"></script>  
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/fancybox.js"></script>  
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/jquery.nice-select.js"></script>  
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/photobox/jquery.photobox.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/custom.js"></script>
        <!-- End All Js Link -->
        <?php $__env->startSection('js'); ?> <?php echo $__env->yieldSection(); ?>
    </body>
</html>
<?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTai/layout.blade.php ENDPATH**/ ?>