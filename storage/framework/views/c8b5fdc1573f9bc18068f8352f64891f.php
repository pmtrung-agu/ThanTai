
<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card-box">
			<h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/promotion" class="btn btn-info"><i class="fa fa-reply-all"></i></a> Thêm Khuyến mãi</h3>
			<form action="<?php echo e(env('APP_URL')); ?>admin/promotion/create" method="POST" id="promotion_form">
				<?php echo e(csrf_field()); ?>

				<div class="form-body">
		            <hr />
		            <?php if($errors->any()): ?>
		                <div class="alert alert-success">
		                    <ul>
		                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                            <li><?php echo e($error); ?></li>
		                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                    </ul>
		                </div>
		            <?php endif; ?>
		            <div class="row form-group">
		            	<label class="control-label col-md-2 text-right p-t-10">Chọn sản phẩm</label>
		            	<div class="col-12 col-md-10">
		            		<select name="id_products[]" id="id_products" multiple required class="form-control select2" data-placeholder="Chọn sản phẩm khuyến mãi">
		            			<option value=""></option>
		            			<?php if($products): ?>
			            			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			            				<option value="<?php echo e($product['_id']); ?>" <?php if(old('id_products') != null && in_array($product['_id'], old('id_products'))): ?> selected <?php endif; ?>><?php echo e($product['title']); ?> - <?php echo e(number_format($product['prices'],0,",",".")); ?> VNĐ</option>
			            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            			<?php endif; ?>
		            		</select>
		            	</div>
		            </div>
		            <div class="row form-group">
		            	<label class="control-label col-md-2 text-right p-t-10">Từ ngày</label>
		            	<div class="col-12 col-md-4">
		            		<input type="text" name="date_from" id="date_from" required value="<?php echo e(old('date_from')); ?>" placeholder="" class="form-control datetimepicker" autocomplete="off">
		            	</div>
		            	<label class="control-label col-md-2 text-right p-t-10">Đến ngày</label>
		            	<div class="col-12 col-md-4">
		            		<input type="text" name="date_to" id="date_to" required value="<?php echo e(old('date_to')); ?>" placeholder="" class="form-control datetimepicker" autocomplete="off">
		            	</div>
		            </div>
		            <?php
		            	$discount = old('discount') != null ? old('discount') : '%';
		            ?>
		            <div class="row form-group">
		            	<label class="control-label col-md-2 text-right p-t-10">Loại khuyến mãi</label>
		            	<div class="col-12 col-md-4">
		            		<select name="discount" id="discount" class="form-control select2">
		            			<option value="%" <?php if($discount == '%'): ?> selected <?php endif; ?>>Phần trăm (%)</option>
		            			<option value="$" <?php if($discount == '$'): ?> selected <?php endif; ?>>Số tiền</option>
		            		</select>
		            	</div>
		            	<label class="control-label col-md-2 text-right p-t-10">Số tiền/Phần trăm</label>
		            	<div class="col-12 col-md-4">
		            		<input type="text" name="amount" value="<?php echo e(old('amount')); ?>" required placeholder="" class="form-control number">
		            	</div>
		            </div>
	        	</div>
	        	<div class="form-actions">
	            	<a href="<?php echo e(env('APP_URL')); ?>admin/promotion" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
	            	<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
	          	</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
	 <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	 <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/number/jquery.number.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".select2").select2();
			$(".datetimepicker").datetimepicker({
            	format: 'yyyy-mm-dd h:i:s'
        	});
        	$('.number').number(true, 0, ',', '.');
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Admin/Promotion/add.blade.php ENDPATH**/ ?>