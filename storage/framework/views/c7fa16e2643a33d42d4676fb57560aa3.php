
<?php $__env->startSection('title', 'Giới thiệu'); ?>
<?php $__env->startSection('body'); ?>
<div class="inner-page-banner bg-image">
    <div class="shape-all">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/1.png" alt="Shape Image">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/2.png" alt="Shape Image">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/3.png" alt="Shape Image">
    </div>
    <div class="container" style="padding-top:90px;">
        <div class="banner-content">
            <h1>Liên hệ</h1>
        </div>
    </div>
</div>
<div class="contact-us-section-wrapper ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="get-in-touch">
                    <div class="section-title text-start">
                        <h2>Trạm dừng nghỉ Thần Tài</h2>
                        <p>Công ty TNHH Khải Duyên</p>
                        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/about/about-3/1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="direct-contact">
                    <ul>
                        <li>
                            <p>Điện thoại</p>
                            <h3><a href="tel:02963 651 333">02963.651.333 </a> - <a href="tel:0918 082 264">0918.082.264</a></h3>
                            
                            <div class="icon">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/contact/call-icon.png" alt="Icon Image">
                            </div>
                        </li>
                        <li>
                            <p>Địa chỉ</p>
                            <h3>Số 679, Quốc lộ 91, ấp Bình Phú I, Xã Bình Hòa, Huyện Châu Thành, Tỉnh An Giang</h3>
                            <div class="icon">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/contact/location.png" alt="Icon Image">
                            </div>
                        </li>
                        <li>
                            <p>Email</p>
                            <a href="mailto:thantaiviet@gmail.com"><h3>thantaiviet@gmail.com</h3></a>
                            <div class="icon">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/contact/envelope.png" alt="Icon Image">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTai.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTai/contacts.blade.php ENDPATH**/ ?>