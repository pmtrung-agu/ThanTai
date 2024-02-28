
<?php $__env->startSection('body'); ?>
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/promotion/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Khuyến mãi</h3>
			<hr />
			<table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-sm" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Từ ngày</th>
						<th>Đến ngày</th>
						<th>Sản phẩm</th>
						<th>Số tiên/%</th>
						<th width="100">#</th>
					</tr>
				</thead>
				<tbody>
					<?php if($promotions): ?>
						<?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e(App\Http\Controllers\ObjectController::getDate($pro['date_from'], "d/m/Y H:i:s")); ?></td>
								<td><?php echo e(App\Http\Controllers\ObjectController::getDate($pro['date_to'], "d/m/Y H:i:s")); ?></td>
								<td>
									<?php $__currentLoopData = $pro['id_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
											$product = App\Models\Product::find($p);
										?>
										<span class="badge badge-success" style="padding: 5px 5px 5px 5px;font-size:12px;margin-top:2px;">
											<?php echo e($product['title']); ?>  - <?php echo e(number_format($product['prices'],0,",",".")); ?>

										</span>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
								<td class="text-center">
									<?php if($pro['discount'] == '%'): ?> <?php echo e($pro['amount']); ?>% <?php else: ?> <?php echo e(number_format($pro['amount'],0,",",".")); ?> <?php endif; ?>
								</td>
								<td class="text-center" style="vertical-align:middle;">
									<a href="<?php echo e(env('APP_URL')); ?>admin/promotion/delete/<?php echo e($pro['_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i></a>
									<a href="<?php echo e(env('APP_URL')); ?>admin/promotion/edit/<?php echo e($pro['_id']); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</tbody>
			</table>
			<?php echo e($promotions->withPath(env('APP_URL').'admin/promotion')); ?>

		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Promotion/list.blade.php ENDPATH**/ ?>