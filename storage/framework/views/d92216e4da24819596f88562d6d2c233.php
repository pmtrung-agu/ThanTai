
<?php $__env->startSection('title', 'Giới thiệu'); ?>
<?php $__env->startSection('body'); ?>
<div class="inner-page-banner bg-image">
    <div class="shape-all">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/1.png" alt="Shape Image">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/2.png" alt="Shape Image">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/3.png" alt="Shape Image">
    </div>
    <div class="container">
        <div class="banner-content" style="padding-top:80px;">
            <h1>Giới thiệu</h1>    
        </div>
    </div>
</div>
<div class="about-section ptb-100 about-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="single-about">
                    <div class="image-wrap image-wrap-3">
                        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/about/about-3/1.png" alt="About Image">
                        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/about/about-3/2.png" alt="About Image"> 
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="single-about">
                    <div class="section-title title-two">
                        <span>Trạm dừng nghỉ Thần Tài</span>
                        <h2>Thông tin Giới thiệu</h2>
                        <p>Trạm dừng nghỉ Thần Tài xin giới thiệu thông tin</p>
                    </div>
                    <ul class="feature-list">
                        <li>
                            <i class="ri-check-line"></i>Dịch vụ nhà hàng (ăn uống)
                        </li>
                        <li>
                            <i class="ri-check-line"></i>Siêu thị các mặt hàng thủ công mỹ nghệ
                        </li>
                        <li>
                            <i class="ri-check-line"></i> Siêu thị, các mặt hàng đặc sản địa phương
                        </li>
                        <li>
                            <i class="ri-check-line"></i> Trạm cấp phát xăng dầu
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTai.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTai/gioi-thieu.blade.php ENDPATH**/ ?>