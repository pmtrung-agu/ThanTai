

<?php $__env->startSection('body'); ?>
 <!--Gioi thieu title-->
 <div class="container-fluid text-light text-center position-relative" style="height: 20rem; background-image: url(<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/nen.jpg);">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 style="font-family: font; font-size: 5rem; color: #fdcb44;">GIỚI THIỆU</h1>
    </div>
</div>
<!--Gioi thieu list-->
<div class="container" style="padding-top: 1rem;">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/lienhe/lienhe.png" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-6">
            <h3 class="text-secondary">Trạm Dừng Nghỉ Thần Tài</h3>
            <h1 class="fw-bold">Thông tin giới thiệu</h1>
            <br>
            <h5 class="text-secondary">Trạm Dừng Nghỉ Thần Tài xin giới thiệu thông tin</h5>
            <br>
            <p>
                <i class="bi bi-check-circle-fill" style="font-size: 1rem;"></i>
                <a href="#" style="text-decoration: none; font-size: 1rem;" class="link-social text-secondary">Dịch vụ Nhà Hàng (Ăn Uống)</a>
            </p>
            <p>
                <i class="bi bi-check-circle-fill" style="font-size: 1rem;"></i>
                <a href="#" style="text-decoration: none; font-size: 1rem;" class="link-social text-secondary">Siêu thị Các Mặt Hàng Thủ Công Mỹ Nghệ</a>
            </p>
            <p>
                <i class="bi bi-check-circle-fill" style="font-size: 1rem;"></i>
                <a href="#" style="text-decoration: none;font-size: 1rem;" class="link-social text-secondary">Siêu Thị Các Mặt Hàng Đặc Sản Địa Phương</a>
            </p>
            <p>
                <i class="bi bi-check-circle-fill" style="font-size: 1rem;"></i>
                <a href="#" style="text-decoration: none;font-size: 1rem;" class="link-social text-secondary">Trạm Cấp Phát Xăng Dầu</a>
            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTaiViet.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTaiViet/gioi-thieu.blade.php ENDPATH**/ ?>