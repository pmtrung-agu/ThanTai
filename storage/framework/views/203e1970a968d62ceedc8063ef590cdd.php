
<?php $__env->startSection('body'); ?>
<div class="row">
  	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/shopping/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Điểm mua sắm đạt chuẩn phục vụ khách du lịch</h3>
    		<table id="datatable" class="table table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:11px;">
    			<thead>
		         	<tr>
		            	<th data-sort-initial="true" data-toggle="true">STT</th>
		            	<th>Tên</th>
		            	<th>Địa chỉ</th>
		            	<th>Điện thoại</th>
		            	<th>Email</th>
		            	<th data-sort-ignore="true" class="text-center">#</th>
		          	</tr>
		        </thead>
		        <tbody>
		        <?php if($shopping): ?>
			        <?php $__currentLoopData = $shopping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        	<tr>
			        		<td><?php echo e($key+1); ?></td>
			        		<td><?php echo e($shop['title']); ?></td>
			        		<td><?php echo e(App\Http\Controllers\AddressController::getDiaChi($shop['address'])); ?></td>
			        		<td><?php echo e($shop['phone']); ?></td>
			        		<td><?php echo e($shop['email']); ?></td>
			        		<td class="text-center">
		                      <a href="<?php echo e(env('APP_URL')); ?>admin/shopping/delete/<?php echo e($shop['_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i></a>
		                      <a href="<?php echo e(env('APP_URL')); ?>admin/shopping/edit/<?php echo e($shop['_id']); ?>" class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i></a>
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
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Shopping/list.blade.php ENDPATH**/ ?>