
<?php $__env->startSection('title', 'Danh sách tài khoản khách hàng'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/switchery/switchery.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/customer/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Danh sách Khách hàng</h3>
      <table id="responsive-datatable" class="table table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th data-sort-initial="true" data-toggle="true">STT</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th class="text-center">Tình trạng</th>
            <th data-sort-ignore="true" class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php if($customers): ?>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e(isset($user['email']) ? $user['email'] : ''); ?></td>
                  <td><?php echo e(isset($user['name']) ? $user['name'] : ''); ?></td>
                  <td class="text-center">
                  	<input type="checkbox" name="<?php echo e($user['_id']); ?>" class="js-switch status" data-plugin="switchery" <?php if($user['active'] == 1): ?> checked="checked" <?php endif; ?> data-size="small" data-color="#009efb" value="1"/>
                  </td>
                  <td class="text-center">
                      <a href="<?php echo e(env('APP_URL')); ?>admin/customer/delete/<?php echo e($user['_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                      <a href="<?php echo e(env('APP_URL')); ?>admin/customer/edit/<?php echo e($user['_id']); ?>" class="btn btn-sm btn-info"><i class="mdi mdi-account-edit"></i> Sửa</a>
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
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/switchery/switchery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
      $(".status").change(function(){
        var id = $(this).attr("name");
        $.get("<?php echo e(env('APP_URL')); ?>admin/customer/update-status/"+id);
      });
      $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Customer/list.blade.php ENDPATH**/ ?>