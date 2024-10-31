
<?php $__env->startSection('title', 'Hình ảnh'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/photobox/photobox.css"> 
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/photobox/photobox.ie.css"> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

<!--Hinh anh title-->
<div class="container-fluid text-light text-center position-relative" style="height: 20rem; background-image: url(<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/nen.jpg);">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 style="font-family: font; font-size: 5rem; color: #fdcb44;">HÌNH ẢNH</h1>
    </div>
</div>

<!--Hinh anh list-->
<div class="container">
    <div class="row"  id="gallery">
        <?php for($i=1; $i<=25; $i++): ?>
        <div class="col-md-3">
            <a href="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/chuyen-doi-so/h<?php echo e($i); ?>.jpg" title="Tập huấn chuyển đổi số tại Trạm dừng nghỉ Thần Tài">
                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/chuyen-doi-so/h<?php echo e($i); ?>.jpg" class="img-fluid img-thumbnail" title="Tập huấn chuyển đổi số tại Trạm dừng nghỉ Thần Tài">
            </a>
        </div>
        <?php endfor; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/jquery.min.js"></script>
        <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/js/jquery-ui.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantai/photobox/jquery.photobox.js"></script>
    <script>
        $(document).ready(function(){
            $('#gallery').photobox('a',{ time:0 });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTaiViet.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTaiViet/hinh-anh.blade.php ENDPATH**/ ?>