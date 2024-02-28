
<?php $__env->startSection('title', 'Thêm danh mục sản phẩm'); ?>
<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/switchery/switchery.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box">
        <h3 class="m-t-0"><a href="/admin/product-category" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Thêm danh mục Sản phẩm</h3>
        <form action="<?php echo e(env('APP_URL')); ?>admin/product-category/create" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Title</label>
                            <div class="col-md-10">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="<?php echo e(old('title')); ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Slug</label>
                            <div class="col-md-10">
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" value="<?php echo e(old('slug')); ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10">Thuộc nhóm</label>
                        <div class="col-md-10">
                          <select name="id_parent" id="id_parent" class="select2">
                            <option value="">Chọn nhóm</option>
                            <?php if($list): ?>
                              <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value=""><?php echo e($l['title']); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Order</label>
                            <div class="col-md-2">
                                <input type="number" id="order" name="order" class="form-control" placeholder="order" value="<?php echo e(old('order') != null ? old('order') : 0); ?>" required />
                            </div>
                            <label class="control-label col-md-2 text-right p-t-10">Icon</label>
                            <div class="col-md-2">
                                <input type="text" id="icon" name="icon" class="form-control" placeholder="icon" value="<?php echo e(old('icon')); ?>" />
                            </div>
                            <div class="col-md-3 switchery-demo">
                              Hoạt động:&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" name="status" id="status" class="js-switch" data-plugin="switchery" checked="checked" data-color="#009efb" value="1"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Picture</label>
                            <div class="col-md-2">
                                <label class="btn btn-info">
                                    <input type="file" name="dinhkem[]" class="dinhkem btn btn-info" multiple accept="image/*" placeholder="Pictures" style="display:none;" />
                                    <i class="fa fa-file-photo-o"></i> Size 900x600
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress m-b-20" id="progressbar">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div id="list_hinhanh" class="form-group row portfolioContainer">
                 <?php if(old('hinhanh_aliasname') !== null): ?>
                    <?php $__currentLoopData = old('hinhanh_aliasname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hinhanh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 items draggable-element text-center">
                      <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e($hinhanh); ?>" readonly/>
                      <input type="hidden" name="hinhanh_filename[]" value="<?php echo e(old('hinhanh_filename.'.$key)); ?>" class="form-control"/>
                      <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($hinhanh); ?>" class="image-popup">
                        <div class="portfolio-masonry-box">
                          <div class="portfolio-masonry-img">
                            <img src="/storage/images/thumb_300x200/<?php echo e($hinhanh); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                          </div>
                          <div class="portfolio-masonry-detail">
                            <p><?php echo e($hinhanh); ?></p>
                          </div>
                        </div>
                      </a>
                      <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e($hinhanh); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                        <i class="fa fa-trash"></i>
                      </a>
                      <input type="text" name="hinhanh_title[]" value="<?php echo e(old('hinhanh_title.'.$key)); ?>" class="form-control"/>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <a href="/admin/product-category" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/drag-arrange.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/switchery/switchery.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
       $(document).ready(function() {
          upload_hinhanh("<?php echo e(env('APP_URL')); ?>image/uploads");delete_hinhanh();
          popup_images();$(".select2").select2();
          $("#progressbar").hide();
          $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
          });
          $("#title").keyup(function(){
            var _this = $(this);
            $.get('<?php echo e(env('SLUG_URL')); ?>slug/'+ $("#title").val(), function(data){
              $("#slug").val(data);
            });
          });
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/ProductCategory/add.blade.php ENDPATH**/ ?>