
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Logs</h3>
        <hr />
        <table id="datatable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Date</th>
        			<th>Action</th>
        			<th>Name</th>
        		</tr>
        	</thead>
        	<tbody>
        	</tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#datatable').DataTable( {
	        	"processing": true,
	          	"serverSide": true,
	          	"ajax": "<?php echo e(env('APP_URL')); ?>admin/logs/datatable"
	        });
    	});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Report/logs.blade.php ENDPATH**/ ?>