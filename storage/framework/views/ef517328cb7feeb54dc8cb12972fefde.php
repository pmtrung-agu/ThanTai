
<?php $__env->startSection('body'); ?>
<div class="page-heading">
    <div class="page-title">
        <h2><?php echo e($category_title); ?></h2>
    </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3 product-grid">
         <div class="pro-coloumn">
            <?php if($products): ?>
            <article class="col-main">
               <div class="category-products">
                  <ul class="products-grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $total_discount = 0;
                      $current_date = App\Http\Controllers\ObjectController::setDate();
                      $pro = App\Models\Promotion::where('id_products',$p['_id'])->where('date_from','<=', $current_date)->where('date_to', '>=', $current_date)->first();
                      if($pro && $pro->count() > 0){
                        if($pro['discount'] == '%'){
                            $total_discount = $pro['amount'] . '%';
                        } else {
                            $total_discount = number_format($pro['amount'],0,",",".");
                        }
                      }
                    ?>
                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                        <div class="item-inner">
                           <div class="item-img">
                              <div class="item-img-info">
                                 <a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>" title="<?php echo e($p['title']); ?>" class="product-image">
                                    <?php if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']): ?>
                                    <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($p['photos'][0]['aliasname']); ?>" alt="<?php echo e($p['title']); ?>">
                                    <?php else: ?>
                                       <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p1.jpg" alt="<?php echo e($p['title']); ?>">
                                    <?php endif; ?>
                                 </a>
                                 <?php if($total_discount > 0): ?>
                                  <div class="sale-label sale-top-right" style="background:#fece00;color:#ff0000;font-size:15px;border:1px solid #ff0000;font-weight:bold;">-<?php echo e($total_discount); ?></div>
                                 <?php endif; ?>
                                 <div class="item-box-hover">
                                    <div class="box-inner">
                                       <div class="product-detail-bnt"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>" class="button detail-bnt" type="button"><span>Xem nhanh</span></a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item-info">
                              <div class="info-inner">
                                 <div class="item-title"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>" title="<?php echo e($p['title']); ?>"><?php echo e($p['title']); ?></a> </div>
                                 <div class="item-content">
                                    <div class="item-price">
                                       <div class="price-box">
                                        <?php if($p['prices'] == 0): ?>
                                          <span class="regular-price" id="product-price-1"><span class="price">Giá: Liên hệ</span></span>
                                        <?php else: ?>
                                          
                                          <span class="regular-price" id="product-price-1"><span class="price"><?php echo e(number_format($p['prices'],0,",",".")); ?> VNĐ</span></span>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                      <button class="button btn-cart add-to-cart" type="button" name="<?php echo e($p['_id']); ?>/1"><span>Mua hàng</span></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </div>
               <div class="toolbar">
                  <div class="pager" style="width:100%;">
                     <div class="pages">
                        <label>Trang:</label>
                        <?php echo e($products->withPath(env('APP_URL').'san-pham/'.$slug)); ?>

                     </div>
                  </div>
               </div>
            </article>
            <?php endif; ?>
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
      </aside>
      <!--col-right sidebar-->
   </div>
   <!--row-->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/script.js"></script>
   <script type="text/javascript">
      jQuery(document).ready(function(){
         add_to_cart("<?php echo e(env('APP_URL')); ?>");
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Frontend/products.blade.php ENDPATH**/ ?>