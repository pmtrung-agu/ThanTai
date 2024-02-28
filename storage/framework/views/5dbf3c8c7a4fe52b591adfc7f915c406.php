
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Mail List</h3>
        <hr />
        <table id="datatable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Email</th>
        			<th>Date</th>
        			<th>#</th>
        		</tr>
        	</thead>
        	<?php if($emails): ?>
        	<tbody>
        		<?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<tr>
        				<td><?php echo e($key+1); ?></td>
        				<td><?php echo e($email['email']); ?></td>
        				<td><?php echo e(Carbon\Carbon::parse($email['created_at'])->format("d/m/Y H:i")); ?></td>
        				<td class="text-center">
        					<a href="<?php echo e(env('APP_URL')); ?>admin/mail-list/delete/<?php echo e($email['_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i> Xóa</a>
        				</td>
        			</tr>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</tbody>
        	<?php endif; ?>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#datatable').DataTable();
    	});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Report/mail_list.blade.php ENDPATH**/ ?>