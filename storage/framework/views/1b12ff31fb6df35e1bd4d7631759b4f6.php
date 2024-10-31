
<?php $__env->startSection('title', 'Liên hệ'); ?>
<?php $__env->startSection('body'); ?>
 <!--Lien he title-->
 <div class="container-fluid text-light text-center position-relative" style="height: 20rem; background-image: url(<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/nen.jpg);">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 style="font-family: font; font-size: 5rem; color: #fdcb44;">LIÊN HỆ</h1>
    </div>
</div>

<!--Lien he list-->
<div class="container" style="padding-top: 1rem;">
    <div class="row">
        <div class="col-md-6">
            <h1 class="fw-bold">Trạm Dừng Nghỉ Thần Tài</h1>
            <h3 class="text-secondary">Công ty TNHH Khải Duyên</h3>
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/lienhe/lienhe.png" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-6">
                <p><i class="bi bi-telephone" style="font-size: 2rem;"></i>
                    <a href="#" style="text-decoration: none; font-size: 1rem;" class="link-social text-secondary">02963 651 333 - 0918 082 264</a>
                </p>
                <p>
                    <i class="bi bi-envelope" style="font-size: 2rem;"></i>
                    <a href="#" style="text-decoration: none; font-size: 1rem;" class="link-social text-secondary">thantaiviet@gmail.com</a></p>
                <p>
                    <i class="bi bi-geo-alt" style="font-size: 2rem;"></i>
                    <a href="#" style="text-decoration: none;font-size: 1rem;" class="link-social text-secondary">Số 679, Quốc lộ 91, ấp Bình Phú I, Xã Bình Hòa, Huyện Châu Thành, Tỉnh An Giang</a></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTaiViet.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTaiViet/contacts.blade.php ENDPATH**/ ?>