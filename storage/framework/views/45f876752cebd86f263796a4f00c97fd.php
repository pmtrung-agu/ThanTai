
<?php $__env->startSection('title', 'Danh sách địa chỉ'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h3 class="m-t-0"><i class="mdi mdi-city"></i> Danh sách địa chỉ</h3>
      <a href="<?php echo e(env('APP_URL')); ?>admin/address/" class="btn btn-primary"><i class="fa fa-home"></i> Tỉnh</a>
      <?php if($province && isset($province[0]['ma'])): ?>
        <a href="<?php echo e(env('APP_URL')); ?>admin/address/<?php echo e($province[0]['ma']); ?>" class="btn btn-primary"><i class="mdi mdi-city"></i> <?php echo e($province[0]['ten']); ?></a>
      <?php endif; ?>
      <?php if($district && isset($district[0]['ma'])): ?>
        <a href="<?php echo e(env('APP_URL')); ?>admin/address/<?php echo e($district[0]['ma']); ?>" class="btn btn-primary"><i class="mdi mdi-earth"></i> <?php echo e($district[0]['ten']); ?></a>
      <?php endif; ?>
      <hr />
      <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th data-toggle="true">STT</th>
            <th data-sort-initial="true">Mã</th>
            <th>Tên</th>
            <th>Tên tiếng Anh</th>
            <th>Cấp</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php if($addresses): ?>
            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <?php if(isset($address['ma'])): ?>
                  <td><?php echo e($address['ma']); ?></td>
                <?php endif; ?>
                <?php if(isset($address['ma']) && strlen($address['ma']) > 3): ?>
                  <td><?php echo e($address['ten']); ?></td>
                <?php else: ?>
                  <td><a href="<?php echo e(env('APP_URL')); ?>admin/address/<?php echo e($address['ma']); ?>"><?php echo e($address['ten']); ?></a></td>
                <?php endif; ?>
                <td><?php echo e($address['tentienganh']); ?></td>
                <td><?php echo e($address['cap']); ?></td>
                <td class="text-center">
                  
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Admin/Address/list.blade.php ENDPATH**/ ?>