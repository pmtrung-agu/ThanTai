<div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div class="new_title">
                    <h2>Liên kết Đơn vị</h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        <div class="item">
                            <a href="http://angiang.gov.vn" target="_blank">
                                <div class="pro-img">
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/banner/ubnd.jpg" alt="">
                                    <div class="pro-info">Cổng thông tin điện tử</div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://socongthuong.angiang.gov.vn" target="_blank">
                                <div class="pro-img">
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/banner/socongthuong.jpg" alt="">
                                    <div class="pro-info">Sở Công Thương</div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://angiangfood.com" target="_blank">
                                <div class="pro-img">
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/banner/truyxuat.jpg" alt="">
                                    <div class="pro-info">Truy xuất nguồn gốc sản phẩm</div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://angiangexport.com/" target="_blank">
                                <div class="pro-img">
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/banner/angiangexport.jpg" alt="">
                                    <div class="pro-info">An Giang Export</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($doanhnghiep): ?>
  <div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div class="new_title">
                    <h2>Liên kết Doanh nghiệp</h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                      <?php $__currentLoopData = $doanhnghiep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($dn['website']) && $dn['website']): ?>
                        <div class="item">
                            <a href="<?php echo e($dn['website']); ?>" target="_blank">
                                <div class="pro-img">
                                  <?php if(isset($dn['photos'][0]['aliasname']) && $dn['photos'][0]['aliasname']): ?>
                                  <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($dn['photos'][0]['aliasname']); ?>" alt="<?php echo e($dn['title']); ?>">
                                  <?php else: ?>
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p1.jpg" alt="<?php echo e($dn['store']); ?>">
                                  <?php endif; ?>
                                    <div class="pro-info"><?php echo e(Str::limit($dn['store'],25)); ?></div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Frontend/widget_doanhnghiep.blade.php ENDPATH**/ ?>