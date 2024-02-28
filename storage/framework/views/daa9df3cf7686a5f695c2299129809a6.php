
<?php $__env->startSection('body'); ?>
<div class="page-heading">
    <div class="page-title">
        <h2>Các doanh nghiệp</h2>
    </div>
</div>
<?php if($sellers): ?>
<div class="container">
   <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3">
         <div class="pro-coloumn">
            <article class="col-main">
               <div class="category-products">
                  <ol class="products-list" id="products-list">
                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li class="item">
                        <div class="product-image">
                            <a href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/<?php echo e($seller['slug']); ?>" title="<?php echo e($seller['store']); ?>">
                                <?php if(isset($seller['photos'][0]['aliasname']) && $seller['photos'][0]['aliasname']): ?>
                                    <img class="small-image" src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($seller['photos'][0]['aliasname']); ?>" alt="<?php echo e($seller['store']); ?>">
                                <?php else: ?>
                                    <img class="small-image" src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/default_800x800.jpg" alt="<?php echo e($seller['store']); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="product-shop">
                           <h2 class="product-name"><a href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/<?php echo e($seller['slug']); ?>" title="<?php echo e($seller['store']); ?>"><?php echo e($seller['store']); ?></a></h2>
                           <div class="desc">
                              <p>Địa chỉ: <?php echo e(App\Http\Controllers\AddressController::getDiaChi($seller['address'])); ?></p>
                              <p>Điện thoại: <?php echo e($seller['phone']); ?></p>
                              <p>Email: <?php echo e($seller['email']); ?></p>
                           </div>
                           <div class="actions">
                              <a class="button" href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/<?php echo e($seller['slug']); ?>" title="<?php echo e($seller['store']); ?>" type="button"><span class="glyphicon glyphicon-eye-open"></span> Đến cửa hàng</a>
                              <?php if(isset($seller['gioi_thieu']) && $seller['gioi_thieu']): ?>
                                <a class="button" href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/gioi-thieu/<?php echo e($seller['slug']); ?>" title="<?php echo e($seller['store']); ?>" type="button"><span class="glyphicon glyphicon-eye-open"></span> Giới thiệu</a>
                              <?php endif; ?>
                           </div>
                        </div>
                     </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ol>
               </div>
            </article>
            <div class="toolbar">
              <div class="pager">
                 <div class="pages">
                  <?php echo e($sellers->withPath(env('APP_URL').'doanh-nghiep')); ?>

                    <!--<ul class="pagination">
                       <li><a href="#">&laquo;</a></li>
                       <li class="active"><a href="#">1</a></li>
                       <li><a href="#">2</a></li>
                       <li><a href="#">3</a></li>
                       <li><a href="#">4</a></li>
                       <li><a href="#">5</a></li>
                       <li><a href="#">&raquo;</a></li>
                    </ul>-->
                 </div>
              </div>
           </div>
            <!--  ///*///======    End article  ========= //*/// -->
         </div>
      </div>
      <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
        <!-- BEGIN SIDE-NAV-CATEGORY -->
         <div class="side-nav-categories">
            <div class="block-title"> Danh mục Sản phẩm </div>
            <!--block-title-->
            <!-- BEGIN BOX-CATEGORY -->
            <div class="box-content box-category">
                <?php if($product_categories): ?>
               <ul>
                <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><a class="active" href="<?php echo e(env('APP_URL')); ?>san-pham/<?php echo e($pc['slug']); ?>"><?php echo e($pc['title']); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
               <?php endif; ?>
            </div>
            <!--box-content box-category-->
         </div>
        <?php echo $__env->make('Frontend.widget_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--block block-list block-compare-->
        <?php echo $__env->make('Frontend.widget_lienket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </aside>
   </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Frontend/sellers.blade.php ENDPATH**/ ?>