
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('body'); ?>
<!-- Start Banner Area -->
<div class="banner-two-section"> 
    <div class='particle-network-animation d-none'></div> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h1>TRẠM DỪNG NGHỈ THẦN TÀI</h1>
                    <h3>CÔNG TY TNHH KHẢI DUYÊN</h3>
                    
                </div>
            </div>
        </div>
        <div class="art-shape">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/banner/banner-2/1.png" alt="Image One">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/banner/banner-2/2.png" alt="Image Two">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/banner/banner-2/3.png" alt="Image Three">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/banner/banner-2/4.png" alt="Image Four">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/banner/banner-2/shape.png" alt="Shape">
        </div>
    </div>
</div>
<!-- End Banner Area -->

<!-- Start Headline Section -->
<div class="headline-section">
    <ul>
        <li>
            <a href="<?php echo e(env('APP_URL')); ?>gioi-thieu">Giới thiệu</a> 
        </li>
        
        <li> 
            <a href="<?php echo e(env('APP_URL')); ?>lien-he">Liên hệ</a> 
        </li>
        <li> 
            <a href="<?php echo e(env('APP_URL')); ?>hinh-anh">Hình ảnh</a> 
        </li>
        
    </ul>
</div>
<!-- End Headline Section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTai.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTai/index.blade.php ENDPATH**/ ?>