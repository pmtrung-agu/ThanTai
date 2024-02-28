
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="col-12">
  <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Thống kê tổng quan</h3>
  <hr />
  <div class="row">
    <div class="col-4">
      <div class="card-box ribbon-box">
        <div class="ribbon ribbon-custom">Sản phẩm</div>
        <p class="m-b-0" style="font-size:20px;"><?php echo e($products); ?></p>
      </div>
    </div>
    
    <div class="col-4">
      <div class="card-box ribbon-box">
        <div class="ribbon ribbon-pink">Đơn hàng</div>
        <p class="m-b-0" style="font-size:20px;"><?php echo e($orders); ?></p>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
          $(document).ready(function(){
            $("#datatable").dataTable();
          });
      </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Report/dashboard.blade.php ENDPATH**/ ?>