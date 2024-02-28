
<?php $__env->startSection('title', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
        <?php if($id_parent && $level): ?>
          <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/product-category/add/<?php echo e($id_parent); ?>/<?php echo e($level); ?>" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh mục loại sản phẩm</h3>
        <?php else: ?>
          <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/product-category/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Danh mục loại sản phẩm</h3>
        <?php endif; ?>
    		<a href="<?php echo e(env('APP_URL')); ?>admin/product-category" class="btn btn-success"><i class="fa fa-home"></i> ROOT</a>
          <?php if($lv1 && count($lv1) > 0): ?>
            <a href="<?php echo e(env('APP_URL')); ?>admin/product-category/<?php echo e($lv1[0]['_id']); ?>/<?php echo e($level-1); ?>" class="btn btn-info"><i class="mdi mdi-tag"></i> <?php echo e($lv1[0]['title']); ?></a>
          <?php endif; ?>
          <?php if($lv2 && count($lv2) > 0): ?>
            <a href="<?php echo e(env('APP_URL')); ?>admin/product-category/<?php echo e($lv2[0]['_id']); ?>/<?php echo e($level); ?>" class="btn btn-info"><i class="mdi mdi-tag"></i> <?php echo e($lv2[0]['title']); ?></a>
          <?php endif; ?>
          <hr />
          <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th data-toggle="true">STT</th>
                  <th data-sort-initial="true">Hình</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Order</th>
                  <th class="text-center">#</th>
              </tr>
          </thead>
              <tbody>
                <?php if($list): ?>
                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($k+1); ?></td>
                      <td>
                        <?php if(isset($l['photos'][0]['aliasname']) && $l['photos'][0]['aliasname']): ?>
                          <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_300x200/<?php echo e($l['photos'][0]['aliasname']); ?>" height="50"/>
                        <?php else: ?>
                          <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo_sm.png" height="50"/>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="/admin/product-category/<?php echo e($l['_id']); ?>/<?php echo e($level+1); ?>"><?php echo e($l['title']); ?></a>
                        <br /><small><?php echo e($l['slug']); ?></small>
                      </td>
                      <td class="text-center" style="font-size:20px;">
                        <?php if(isset($l['status']) && $l['status'] == 1): ?>
                          <i class="fa fa-check-circle text-primary"></i>
                        <?php else: ?>
                          <i class="fa fa-ban text-danger"></i>
                        <?php endif; ?>
                      </td>
                      <td class="text-center"><?php echo e($l['order']); ?></td>
                      <td class="text-center">
                        <?php if($id_parent && $level): ?>
                          <a href="<?php echo e(env('APP_URL')); ?>admin/product-category/delete/<?php echo e($l['_id']); ?>/<?php echo e($id_parent); ?>/<?php echo e($level); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                          <a href="<?php echo e(env('APP_URL')); ?>admin/product-category/edit/<?php echo e($l['id']); ?>/<?php echo e($id_parent); ?>/<?php echo e($level); ?>" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                        <?php else: ?>
                          <a href="<?php echo e(env('APP_URL')); ?>admin/product-category/delete/<?php echo e($l['_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                          <a href="<?php echo e(env('APP_URL')); ?>admin/product-category/edit/<?php echo e($l['id']); ?>" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                        <?php endif; ?>
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/ProductCategory/list.blade.php ENDPATH**/ ?>