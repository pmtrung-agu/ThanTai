
<?php $__env->startSection('title', 'Hình ảnh hoạt động'); ?>

<?php $__env->startSection('body'); ?>
<div class="inner-page-banner bg-image">
    <div class="shape-all">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/1.png" alt="Shape Image">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/2.png" alt="Shape Image">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/inner-p-banner/3.png" alt="Shape Image">
    </div>
    <div class="container" style="padding-top:90px;">
        <div class="banner-content">
            <h1>Hình ảnh</h1>
        </div>
    </div>
</div>

<div class="single-shop-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="right-aside"> 
                    <div class="shop-product-wrap">
                        <div class="all-product">
                            <div id="gallery" class="row justify-content-center">
                                <?php for($i=1;$i<=25;$i++): ?>
                                <div class="col-lg-3 col-sm-4 col-md-4">
                                    <div class="single-product">
                                        <div class="image-wrap">
                                            <a href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/chuyen-doi-so/h<?php echo e($i); ?>.jpg"><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/image/chuyen-doi-so/h<?php echo e($i); ?>.jpg" alt="Tập huấn chuyển đổi số tại Trạm dừng nghỉ Thần Tài"></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTai.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTai/hinh-anh.blade.php ENDPATH**/ ?>