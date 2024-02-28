
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/summernote/summernote-lite.css" rel="stylesheet" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/switchery/switchery.min.css">
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="/admin/product" class="btn btn-info"><i class="mdi mdi-reply-all"></i></a> Thêm sản phẩm</h3>
    		<form action="<?php echo e(env('APP_URL')); ?>admin/product/update" method="post" id="dinhkemform" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="id" id="id" value="<?php echo e($product['_id']); ?>">
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
                      <label class="control-label col-md-2 text-right p-t-10">Mã sản phẩm</label>
                      <div class="col-md-4 input-group">
                        <div class="input-group-prepend" name="<?php echo e(strtoupper(uniqid())); ?>" id="qrcode">
                            <div class="input-group-text"><i class="fa fa-qrcode"></i></div>
                        </div>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Mã sản phẩm" value="<?php echo e(old('code') !== null ? old('code') : $product['code']); ?>" required />
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Tên sản phẩm</label>
                      <div class="col-md-10">
                          <input type="text" id="title" name="title" class="form-control" placeholder="Tên sản phẩm" required value="<?php echo e(old('title') !== null ? old('ten') : $product['title']); ?>">
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10">Slug</label>
                        <div class="col-md-10">
                            <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" value="<?php echo e(old('slug') !== null ? old('slug') : $product['slug']); ?>" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Thuộc loại sản phẩm</label>
                      <div class="col-md-10">
                          <select name="id_product_category[]" multiple="multiple" id="id_product_category" class="form-control select2" required data-placeholder="Chọn loại sản phẩm">
                            <option value="">Chọn loại sản phẩm</option>
                            <?php if($product_categories): ?>
                            <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($cat['_id']); ?>" <?php if(in_array($cat['_id'], $product['id_product_category'])): ?> selected <?php endif; ?>><?php echo e($cat['title']); ?></option>
                              <?php if($cat['level_1']): ?>
                                <?php $__currentLoopData = $cat['level_1']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($l1['_id']); ?>" <?php if(in_array($l1['_id'], $product['id_product_category'])): ?> selected <?php endif; ?>>---| <?php echo e($l1['title']); ?></option>
                                    <?php if($l1['level_2']): ?>
                                      <?php $__currentLoopData = $l1['level_2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($l2['_id']); ?>" <?php if(in_array($l2['_id'], $product['id_product_category'])): ?> selected <?php endif; ?>>---|---| <?php echo e($l2['title']); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
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
                      <label class="control-label col-md-2 text-right p-t-10">Mô tả</label>
                      <div class="col-md-10">
                        <textarea name="description" id="description" required placeholder="Mô tả sản phẩm" class="form-control"><?php echo e(old('description') !== null ? old('description') : $product['description']); ?></textarea>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Chi tiết</label>
                    <div class="col-md-10">
                      <textarea name="contents" id="contents" placeholder="Mô tả chi tiết" class="form-control summernote"><?php echo e(old('contents') !== null ? old('contents') : $product['contents']); ?></textarea>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Giá</label>
                    <div class="col-md-4">
                      <input type="text" id="prices" name="prices" class="form-control number" placeholder="Giá" value="<?php echo e(old('prices') !== null ? old('prices') : $product['prices']); ?>" required />
                    </div>
                    <div class="col-md-3 switchery-demo">
                      Hoạt động:&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="status" id="status" class="js-switch" data-plugin="switchery" <?php if($product['status'] == 1): ?> checked="checked" <?php endif; ?> data-color="#009efb" value="1"/>
                    </div>
                    <div class="col-md-3 switchery-demo">
                      Sản phẩm nổi bật:&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="hot" id="hot" class="js-switch" data-plugin="switchery" <?php if($product['hot'] == 1): ?> checked="checked" <?php endif; ?> data-color="#009efb" value="1"/>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Hình ảnh</label>
                    <div class="col-md-2">
                      <label class="btn btn-info">
                          <input type="file" name="dinhkem[]" class="dinhkem btn btn-info" multiple accept="image/*" placeholder="Pictures" style="display:none;" />
                          <i class="fa fa-file-photo-o"></i> Size 800x800
                      </label>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Người bán</label>
                    <div class="col-md-6">
                      <select name="id_seller" id="id_seller" class="form-control select2">
                        <?php if($sellers): ?>
                          <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($seller['_id']); ?>" <?php if($seller['_id']==$product['id_seller']): ?> selected <?php endif; ?>><?php echo e($seller['email']); ?> [<?php echo e($seller['name']); ?>]</option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
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
                          <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_300x200/<?php echo e($hinhanh); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
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
            <?php else: ?>
              <?php if($product['photos']): ?>
                 <?php $__currentLoopData = $product['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-sm-6 col-md-4 items draggable-element text-center">
                    <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e($photo['aliasname']); ?>" readonly/>
                    <input type="hidden" name="hinhanh_filename[]" value="<?php echo e($photo['filename']); ?>" class="form-control"/>
                    <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($photo['aliasname']); ?>" class="image-popup">
                      <div class="portfolio-masonry-box">
                        <div class="portfolio-masonry-img">
                          <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_300x200/<?php echo e($photo['aliasname']); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                        </div>
                        <div class="portfolio-masonry-detail">
                          <p><?php echo e($photo['aliasname']); ?></p>
                        </div>
                      </div>
                    </a>
                    <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e($photo['aliasname']); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                      <i class="fa fa-trash"></i>
                    </a>
                    <input type="text" name="hinhanh_title[]" value="<?php echo e($photo['filename']); ?>" class="form-control"/>
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="form-actions">
              <a href="<?php echo e(env('APP_URL')); ?>admin/product" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
              <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
          </div>
        </form>
    	</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/summernote/summernote-lite.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/switchery/switchery.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/plugins/number/jquery.number.min.js"></script>
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
        $.get('<?php echo e(env('SLUG_URL')); ?>slug/'+$("#code").val()+ " " + $("#title").val(), function(data){
          $("#slug").val(data);
        });
      });
      $('.number').number(true, 0, ',', '.');
      $('.summernote').summernote({
        height: 300, dialogsInBody: true
      });
      $("#qrcode").click(function(){
        $("#code").val($(this).attr("name"));
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Admin/Product/edit.blade.php ENDPATH**/ ?>