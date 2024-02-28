
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery-toastr/jquery.toast.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/flexslider.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="page-heading">
    <div class="page-title">
        <h2>Chi tiết sản phẩm</h2>
    </div>
</div>
<?php if($product): ?>
<div class="main-container col1-layout wow bounceInUp animated">
    <div class="main">
        <div class="col-main">
            <!-- Endif Next Previous Product -->
            <div class="product-view wow bounceInUp animated" itemscope="" itemtype="http://schema.org/Product" itemid="#product_base">
                <div id="messages_product_view"></div>
                <!--product-next-prev-->
                <div class="product-essential container">
                    <div class="row">
                        
                        <form action="" method="post" id="product_addtocart_form">
                            <!--End For version 1, 2, 6 -->
                            <!-- For version 3 -->
                            <div class="product-img-box col-sm-6 col-xs-12">
                                <div class="product-image">
                                    <div class="large-image">
                                        <?php if(isset($product['photos'][0]['aliasname']) && $product['photos'][0]['aliasname']): ?>
                                            <a href="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($product['photos'][0]['aliasname']); ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($product['photos'][0]['aliasname']); ?>"></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p15.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p15.jpg"></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flexslider flexslider-thumb">
                                        <?php if($product['photos']): ?>
                                        <ul class="previews-list slides">
                                            <?php $__currentLoopData = $product['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href='<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($photo['aliasname']); ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($photo['aliasname']); ?>' "><img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($photo['aliasname']); ?>" alt="<?php echo e($photo['title']); ?>" /></a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <!--End For version 1,2,6-->
                            <!-- For version 3 -->
                            <div class="product-shop col-sm-6 col-xs-12">
                                <div class="product-name">
                                    <h1 itemprop="name"><?php echo e($product['title']); ?></h1>
                                </div>
                                <div class="price-block">
                                    <div class="price-box">
                                        <?php if($promotion && $promotion->count() > 0): ?>
                                             <?php
                                                $date_to = App\Http\Controllers\ObjectController::getDate($promotion['date_to'], "Y-m-d H:i:s");
                                            ?>
                                            <span id="pro-time" data-time="<?php echo e($date_to); ?>" style="font-size:20px;float:right;background-color: #ff0000;color:#fff;line-height:40px;padding:0px 10px 0px 10px;font-weight:bold;width:100px;text-align:center;"><?php echo e($date_to); ?></span>
                                        <?php endif; ?>
                                        <?php if($product['prices'] == 0): ?>
                                            <span class="regular-price" id="product-price-123"> <span class="price">Giá: Liên hệ</span> </span>
                                        <?php else: ?>
                                            <?php if($promotion && $promotion->count() > 0): ?>
                                                <?php
                                                    $total_discount = 0;
                                                    if($promotion['discount'] == '%'){
                                                        $total_discount = $product['prices'] * $promotion['amount']/100;
                                                    } else {
                                                        $total_discount = $promotion['amount'];
                                                    }
                                                ?>
                                                <span class="regular-price" id="product-price-123">
                                                    <span class="price-disable"><strike><?php echo e(number_format($product['prices'],0,",",".")); ?> VNĐ</strike></span>
                                                    <span class="price"><?php echo e(number_format($product['prices'] - $total_discount,0,",",".")); ?> VNĐ</span>
                                                </span>
                                            <?php else: ?>
                                                <span class="regular-price" id="product-price-123"> <span class="price"><?php echo e(number_format($product['prices'],0,",",".")); ?> VNĐ</span> </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!--price-block-->
                                <div class="short-description">
                                    <h2>Mô tả</h2>
                                    <p style="font-size:18px;"><?php echo e($product['description']); ?></p>
                                </div>
                                <div class="add-to-box">
                                    <div>
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Quantity:" class="input-text qty" style="width:50px;">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                            </div>
                                            <!--custom pull-left-->
                                        </div>
                                        <!--pull-left-->
                                        <button type="button" title="Add to Cart" class="button btn-cart add-to-cart" name="<?php echo e($product['_id']); ?>"><span><i class="icon-basket"></i>Mua hàng</span></button>
                                    </div>
                                    <!--add-to-cart-->
                                    
                                    <!--email-addto-box-->
                                </div>
                                <!-- thm-mart Social Share Close-->
                            </div>
                <!--product-shop-->
                <!--Detail page static block for version 3-->
                </form>
            </div>
        </div>
        <!--product-essential-->
        <div class="product-collateral container">
            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Mô tả chi tiết</a> </li>
                <li> <a href="#product_seller" data-toggle="tab">Thông tin Đơn vị bán</a> </li>
            </ul>
            <div id="productTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std" style="font-size:18px;color:#000;">
                        <?php echo $product['contents']; ?>

                    </div>
                </div>
                <div class="tab-pane fade in" id="product_seller">
                    <div class="std" style="font-size:18px;color:#000;">
                        <?php
                            $s = App\Models\User::find($product['id_seller']);
                        ?>
                        <?php if(isset($s['photos'][0]['aliasname']) && $s['photos'][0]['aliasname']): ?>
                            <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_300x200/<?php echo e($s['photos'][0]['aliasname']); ?>" style="float:left;margin-right:20px;height:150px;"/>
                        <?php endif; ?>
                        <h3><?php echo e($s['store']); ?></h3>
                        <p>Địa chỉ: <?php echo e(App\Http\Controllers\AddressController::getDiaChi($s['address'])); ?></p>
                        <p>Điện thoại: <a href="tel:<?php echo e($s['phone']); ?>"><?php echo e($s['phone']); ?></a></p>
                        <p>Email: <a href="mailto:<?php echo e($s['email']); ?>"><?php echo e($s['email']); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--product-collateral-->
        <div class="box-additional">
            <!-- BEGIN RELATED PRODUCTS -->
            <div class="related-pro container">
                <div class="slider-items-products">
                    <div class="new_title center">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                    <?php if($relate_products): ?>
                    <div id="related-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php $__currentLoopData = $relate_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($rp['slug']); ?>" title="<?php echo e($rp['title']); ?>" class="product-image">
                                                <?php if(isset($rp['photos'][0]['aliasname']) && $rp['photos'][0]['aliasname']): ?>
                                                    <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($rp['photos'][0]['aliasname']); ?>" alt="<?php echo e($rp['title']); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p1.jpg" alt="<?php echo e($rp['title']); ?>">
                                                <?php endif; ?>
                                            </a>
                                            <div class="item-box-hover">
                                                <div class="box-inner">
                                                    <div class="product-detail-bnt"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($rp['slug']); ?>" class="button detail-bnt" type="button"><span>Quick View</span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($rp['slug']); ?>" title="<?php echo e($rp['title']); ?>"><?php echo e(Str::limit($rp['title'],20)); ?></a> </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price"><?php echo e(number_format($rp['prices'],0,",",".")); ?> VNĐ</span> </span>
                                                    </div>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart add-to-cart" name="<?php echo e($rp['_id']); ?>" type="button"><span>Mua hàng</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- end related product -->

        </div>
        <!-- end related product -->
    </div>
    <!--box-additional-->
    <!--product-view-->
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/cloud-zoom.js"></script>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery.countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/script.js"></script>
   <script type="text/javascript">
      jQuery(document).ready(function(){
         add_to_cart_detail("<?php echo e(env('APP_URL')); ?>");
         <?php if($promotion && $promotion->count() > 0): ?>
            var time = jQuery("#pro-time").attr("data-time");
            jQuery("#pro-time").countdown(time, function(event) {
                jQuery(this).text(event.strftime('%H:%M:%S'));
            });
         <?php endif; ?>
      });
   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ChieuUZU\resources\views/Frontend/product_detail.blade.php ENDPATH**/ ?>