
<?php $__env->startSection('body'); ?>
<!-- ---carousel------- -->
<div id="carouselExampleIndicators" class="carousel slide">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/banner.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/banner.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/thantaiviet/images/banner.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>
  
  <!-- jumbotron -->
  <div class="container-fluid text-center" style="background-color: #0f142a !important; padding: 20px 0 20px 0 ;">
    <h3 class="font-weight-bold" style="color:#facf42">
        <a href="<?php echo e(env('APP_URL')); ?>gioi-thieu">GIỚI THIỆU</a> - <a href="<?php echo e(env('APP_URL')); ?>lien-he">LIÊN HỆ</a> - <a href="<?php echo e(env('APP_URL')); ?>hinh-anh">HÌNH ẢNH</a> 
    </h3>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.ThanTaiViet.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/ThanTaiViet/index.blade.php ENDPATH**/ ?>