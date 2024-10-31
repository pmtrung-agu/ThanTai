
<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery-toastr/jquery.toast.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
  <div id="thm-mart-slideshow" class="thm-mart-slideshow">
    <div class="container">
      <div id="thm_slider_wrapper" class="thm_slider_wrapper fullwidthbanner-container">
        <div id='thm-rev-slider' class='rev_slider fullwidthabanner'>
          <ul>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='<?php echo e(env('APP_URL')); ?>assets/frontend/images/banner/slide_0.jpg'><img src='<?php echo e(env('APP_URL')); ?>assets/frontend/images/banner/slide_0.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--Category slider Start-->
  <div class="top-cate">
    <?php if($promotions && count($promotions) > 0): ?>
    <div class="featured-pro container">
      <div class="row">
          <div class="slider-items-products">
              <div class="new_title" style="padding:0px !important;">
                  <h2 style="background:#ffd728;padding:7px 20px 7px 20px;">
                    <a href="<?php echo e(env('APP_URL')); ?>flash-sale"><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/flash_sale.png" style="height:50px;padding:0px;">
                      Chương trình khuyến mãi [11h30 - 13h00 và 20h30 – 22h00 ngày 28/8 - 29/8/2020]
                    </a>
                  </h2>
              </div>
              <div id="top-categories" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                    <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($pro): ?>
                      <?php $__currentLoopData = $pro['id_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $ph = App\Models\Product::find($value);
                        $date_to = App\Http\Controllers\ObjectController::getDate($pro['date_to'], "Y-m-d H:i:s");
                      ?>
                        <div class="item">
                            <a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($ph['slug']); ?>">
                                <div class="pro-img">
                                  <?php if(isset($ph['photos'][0]['aliasname']) && $ph['photos'][0]['aliasname']): ?>
                                  <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($ph['photos'][0]['aliasname']); ?>" alt="<?php echo e($ph['title']); ?>">
                                  <?php else: ?>
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p1.jpg" alt="<?php echo e($ph['title']); ?>">
                                  <?php endif; ?>
                                    <div class="pro-info"><?php echo e(str_limit($ph['title'],25)); ?></div>
                                    <div class="pro-time" data-time="<?php echo e($date_to); ?>"></div>
                                </div>
                            </a>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
   <div class="top-cate">
    <?php if($promotions_soon && count($promotions_soon) > 0): ?>
    <div class="featured-pro container">
      <div class="row">
          <div class="slider-items-products">
              <div class="new_title" style="padding:0px !important;">
                  <h2 style="background:#ffd728;padding:7px 20px 7px 20px;font-weight: bold !important;">
                    <a href="<?php echo e(env('APP_URL')); ?>flash-sale-soon"><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/flash_sale.png" style="height:50px;padding:0px;">
                      SẮP DIÊN RA [11h30 - 13h00 và 20h30 – 22h00 ngày 28/8 - 29/8/2020]
                    </a>
                  </h2>
              </div>
              <div id="top-categories" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                    <?php $__currentLoopData = $promotions_soon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_soon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($pro_soon): ?>
                      <?php $__currentLoopData = $pro_soon['id_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $ph = App\Models\Product::find($value);
                        $date_to = App\Http\Controllers\ObjectController::getDate($pro_soon['date_from'], "d/m/Y H:i");
                      ?>
                        <div class="item">
                            <a href="<?php echo e(env('APP_URL')); ?>flash-sale-soon?date_from=<?php echo e($pro_soon['date_from']); ?>">
                                <div class="pro-img">
                                  <?php if(isset($ph['photos'][0]['aliasname']) && $ph['photos'][0]['aliasname']): ?>
                                  <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($ph['photos'][0]['aliasname']); ?>" alt="<?php echo e($ph['title']); ?>">
                                  <?php else: ?>
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p1.jpg" alt="<?php echo e($ph['title']); ?>">
                                  <?php endif; ?>
                                    <div class="pro-info"><?php echo e(str_limit($ph['title'],25)); ?></div>
                                    <div style="font-weight: bold;color:#ff0000;"><?php echo e($date_to); ?></div>
                                </div>
                            </a>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <?php endif; ?>
  </div>

<!--Category silder End-->
<!-- best Pro Slider -->
<?php if($product_categories): ?>
  <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $products = App\Models\Product::where('id_product_category','=',strval($pc['_id']))->where('prices', '>', 0)->where('status','=',1)->orderBy('updated_at', 'desc')->take(12)->get()->toArray();
      $products = App\Http\Controllers\FrontendController::shuffle_assoc($products);
      /*if(isset($pc['photos'][0]['aliasname']) && $pc['photos'][0]['aliasname']){
        $banner_path = env('APP_URL') . 'storage/images/origin/'. $pc['photos'][0]['aliasname'];
      } else {
        $banner_path = env('APP_URL') .'assets/frontend/images/category-banner.jpg';
      }*/
    ?>
    <?php if($products): ?>
    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2><a href="<?php echo e(env('APP_URL')); ?>san-pham/<?php echo e($pc['slug']); ?>" style="color:#fff;"><?php echo e($pc['title']); ?></a></h2>
            </div>
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    <!-- Item -->
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
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
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>" class="button detail-bnt"><span>Xem chi tiết</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>" title="<?php echo e($p['title']); ?>"><?php echo e(Str::limit($p['title'],20)); ?></a> </div>
                                    <div class="item-content">
                                        <div class="item-price">
                                            <div class="price-box">
                                              <?php if($p['prices'] == 0): ?>
                                                <span class="regular-price"><span class="price">Giá: Liên hệ</span></span>
                                              <?php else: ?>
                                                
                                                <span class="regular-price"><span class="price"><b><?php echo e(number_format($p['prices'],0,",",".")); ?> VNĐ</b></span></span>
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
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- End Item -->
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery-toastr/jquery.toast.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/script.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){
      add_to_cart("<?php echo e(env('APP_URL')); ?>");
      
        
      
      /*jQuery("#getting-started").countdown("2020-08-20 20:10:20", function(event) {
        jQuery(this).text(event.strftime('%H:%M:%S'));
      });*/
      jQuery(".pro-time").each(function(){
        var _this = jQuery(this);
        var time = _this.attr("data-time");
        _this.countdown(time, function(event) {
          _this.text(event.strftime('%H:%M:%S'));
        });
      });

      jQuery('#thm-rev-slider').show().revolution({
          dottedOverlay: 'none',
          delay: 5000,
          startwidth: 0,
          startheight:900,

          hideThumbs: 200,
          thumbWidth: 200,
          thumbHeight: 50,
          thumbAmount: 2,

          navigationType: 'thumb',
          navigationArrows: 'solo',
          navigationStyle: 'round',

          touchenabled: 'on',
          onHoverStop: 'on',

          swipe_velocity: 0.7,
          swipe_min_touches: 1,
          swipe_max_touches: 1,
          drag_block_vertical: false,

          spinner: 'spinner0',
          keyboardNavigation: 'off',

          navigationHAlign: 'center',
          navigationVAlign: 'bottom',
          navigationHOffset: 0,
          navigationVOffset: 20,

          soloArrowLeftHalign: 'left',
          soloArrowLeftValign: 'center',
          soloArrowLeftHOffset: 20,
          soloArrowLeftVOffset: 0,

          soloArrowRightHalign: 'right',
          soloArrowRightValign: 'center',
          soloArrowRightHOffset: 20,
          soloArrowRightVOffset: 0,

          shadow: 0,
          fullWidth: 'on',
          fullScreen: 'on',

          stopLoop: 'off',
          stopAfterLoops: -1,
          stopAtSlide: -1,

          shuffle: 'off',

          autoHeight: 'on',
          forceFullWidth: 'off',
          fullScreenAlignForce: 'off',
          minFullScreenHeight: 0,
          hideNavDelayOnMobile: 1500,

          hideThumbsOnMobile: 'off',
          hideBulletsOnMobile: 'off',
          hideArrowsOnMobile: 'off',
          hideThumbsUnderResolution: 0,

          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 0,
          hideAllCaptionAtLilmit: 0,
          startWithSlide: 0,
          fullScreenOffsetContainer: ''
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/index.blade.php ENDPATH**/ ?>