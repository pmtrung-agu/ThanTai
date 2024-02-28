
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/order" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Đơn hàng</h3>
    		<table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          	<thead>
          		<tr>
          			<th>STT</th>
                <th>Ngày đặt</th>
          			<th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng sản phẩm</th>
          			<th>Đã giao hàng</th>
          			<th>Đang chờ xử lý</th>
          			<th>Hủy</th>
          			<th class="text-center">Cập nhật tình trạng</th>
                <th class="text-center"><i class="fa fa-print"></th>
                <?php if(in_array('Admin', Session::get('user.roles'))): ?>
                  <th>#</th>
                <?php endif; ?>
          		</tr>
          	</thead>
          	<tbody>
            <?php if($orders): ?>
              <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $quantity = 0; $quantity_delivery = 0; $quantity_cancel = 0; $quantity_processing = 0;
                if($order['products']) {
                  foreach($order['products'] as $p){
                    $quantity += $p['quantity'];
                    if($p['status'] == 0)$quantity_processing += $p['quantity'];
                    if($p['status'] == 1)$quantity_delivery += $p['quantity'];
                    if($p['status'] == 2)$quantity_cancel += $p['quantity'];
                  }
                }
              ?>
              <tr>
                <td><?php echo e($key + 1); ?></td>
                <td class="text-center"><?php echo e(date("d/m/Y H:i", strtotime($order['created_at']))); ?></td>
                <td><?php echo e($order['code']); ?></td>
                <td><?php echo e($order['customer']['hoten']); ?></td>
                <td class="text-right"><?php echo e($quantity); ?></td>
                <td class="text-right text-success"><b><?php echo e(number_format($quantity_delivery,0,",",".")); ?></b></td>
                <td class="text-right text-primary"><b><?php echo e(number_format($quantity_processing,0,",",".")); ?></b></td>
                <td class="text-right text-danger"><b><?php echo e(number_format($quantity_cancel,0,",",".")); ?></b></td>
                <td class="text-center"><a href="<?php echo e(env('APP_URL')); ?>admin/order/detail/<?php echo e($order['_id']); ?>"><i class="fa fa-truck text-info" style="font-size:20px;"></i></a></td>
                <td class="text-center"><a href="<?php echo e(env('APP_URL')); ?>admin/order/invoice/<?php echo e($order['_id']); ?>"><i class="fa fa-print" style="font-size:20px;"></a></td>
                  <?php if(in_array('Admin', Session::get('user.roles'))): ?>
                  <td class="text-center"><a href="<?php echo e(env('APP_URL')); ?>admin/order/delete/<?php echo e($order['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" style="font-size:20px;"><i class="fa fa-trash text-danger"></i></a></td>
                <?php endif; ?>
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
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
      <?php if(Session::has('msg') && Session::get('msg')): ?>
        $.toast({
          heading: 'Thông báo',
          text: '<?php echo e(Session::get('msg')); ?>',
          position: 'top-right',
          loaderBg: '#da8609',
          icon: 'info',
          hideAfter: 3000,
          stack: 1
        });
      <?php endif; ?>
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Order/list.blade.php ENDPATH**/ ?>