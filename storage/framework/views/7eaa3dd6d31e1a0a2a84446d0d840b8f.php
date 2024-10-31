<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Điện máy Khải Duyên <?php echo $__env->yieldContent('title'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="Điện máy Khải Duyên">
<meta name="keywords" content="Điện máy Khải Duyên">
<meta name="robots" content="*">
<link rel="icon" href="<?php echo e(env('APP_URL')); ?>assets/frontend/images/logo.png" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo e(env('APP_URL')); ?>assets/frontend/images/logo.png" type="image/x-icon">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149293891-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-149293891-1');
</script>

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/revslider.css" >
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/jquery.mobile-menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery-toastr/jquery.toast.min.css">
<?php $__env->startSection('css'); ?> <?php echo $__env->yieldSection(); ?>
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
<meta name="viewport" content="initial-scale=1.0, width=device-width">
</head>
<body>
<div id="page">
 <header>
  <div class="header-banner">
    <div class="assetBlock">
      <div class="row">
        <div class="col-md-5">
          <?php if(Session::get('customer._id')): ?>
            Xin chào: <?php echo e(Session::get('customer.email')); ?>

          <?php endif; ?>
        </div>
        <div class="col-md-7">
          <div style="height: 20px; overflow: hidden;" id="slideshow">
            <p style="display: block;">Điện máy Khải Duyên - <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> dienmaykhaiduyenkd@gmail.com <span class="glyphicon glyphicon-phone"></span> 0918 082 264</p>
            <p style="display: none;">Điện máy Khải Duyên  - <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> dienmaykhaiduyenkd@gmail.com <span class="glyphicon glyphicon-phone"></span>0918 082 264</p>
          </div>
        </div>
      </div>
     </div>
  </div>
  <div id="header">
    <div class="header-container container">
     <div class="row">
      <div class="logo"> <a href="<?php echo e(env('APP_URL')); ?>" title="Trạm dừng nghỉ Thần Tài">
        <div><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/logo.png" style="" alt="Trạm dừng nghỉ Thần Tài"></div>
        </a> </div>
        <div class="fl-nav-menu">
          <nav>
            <div class="mm-toggle-wrap">
              <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
            </div>
            <div class="nav-inner">
              <!-- BEGIN NAV -->
              <ul id="nav" class="hidden-xs">
                <li id="nav-home" class="level0"><a class="level-top active" href="<?php echo e(env('APP_URL')); ?>"><span>Trang chủ</span></a></li>
                <li class="level0 parent drop-menu"><a href="<?php echo e(env('APP_URL')); ?>san-pham"><span>Sản phẩm</span> </a>
                <!--sub sub category-->
                <?php if($product_categories): ?>
                  <ul class="level1">
                    <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li class="level1 first"><a href="<?php echo e(env('APP_URL')); ?>san-pham/<?php echo e($pc['slug']); ?>"><span><?php echo e($pc['title']); ?></span></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                <?php endif; ?>
                </li>
                
                <li class="level0"><a href="<?php echo e(env('APP_URL')); ?>lien-he"><span>Liên hệ</span> </a></li>
              </ul>
              <!--nav-->
              </div>
              </nav>
        </div>
        <!--row-->
      </div>
      <div class="fl-header-right">
        <div class="fl-links">
          <div class="no-js"> <a title="Company" class="clicker"></a>
            <div class="fl-nav-links">
              <ul class="links">
                
                <li><a href="<?php echo e(env('APP_URL')); ?>thanh-toan" title="Thanh toán">Thanh toán</a></li>
                
                <?php if(Session::get('customer')): ?>
                  <li class="last"><a href="<?php echo e(env('APP_URL')); ?>dang-xuat" title="Đăng xuất"><span>Đăng xuất</span></a></li>
                <?php else: ?>
                  <li class="last"><a href="<?php echo e(env('APP_URL')); ?>dang-nhap" title="Đăng nhập"><span>Đăng nhập</span></a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="fl-cart-contain">
          <div class="mini-cart">
            <div class="basket"><a href="<?php echo e(env('APP_URL')); ?>gio-hang" id="basket"><span>
              <?php $count = 0; $total = 0; ?>
              <?php if(Session::get('cart_items')): ?>
              <?php $__currentLoopData = Session::get('cart_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $p = App\Models\Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
                $count += $item['soluong']; $total += $item['soluong'] * $p['prices'];
              ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
              <?php echo e($count); ?></span></a></div>
            <div class="fl-mini-cart-content" style="display: none;min-width:200px;z-index:9999;">
              <div class="block-subtitle">
                <div class="top-subtotal" id="top-subtotal"><?php echo e($count); ?> Sản phẩm, <span class="price"><?php echo e(number_format($total,0,",",".")); ?>VNĐ</span> </div>
              </div>
              <!--block-subtitle-->
              <ul class="mini-products-list" id="cart-sidebar">
                <?php if(Session::get('cart_items')): ?>
                <?php $__currentLoopData = Session::get('cart_items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $p = App\Models\Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
                ?>
                <li class="item_<?php echo e($p['_id']); ?> item">
                  <div class="item-inner">
                    <a class="product-image" title="<?php echo e($p['title']); ?>" href="#">
                      <?php if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']): ?>
                        <img alt="<?php echo e($p['title']); ?>" src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_800x800/<?php echo e($p['photos'][0]['aliasname']); ?>">
                      <?php else: ?>
                        <img alt="<?php echo e($p['title']); ?>" src="<?php echo e(env('APP_URL')); ?>assets/frontend/products-images/p4.jpg">
                      <?php endif; ?>
                    </a>
                    <div class="product-details">
                      <div class="access"><a class="btn-remove remove-cart-item" title="<?php echo e($p['title']); ?>" href="<?php echo e(env('APP_URL')); ?>cart/remove/<?php echo e($item['id_sanpham']); ?>" name="<?php echo e($p['_id']); ?>" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a></div>
                      <strong><?php echo e($item['soluong']); ?></strong> x <span class="price"><?php echo e(number_format($p['prices'],0,",",".")); ?></span>
                      <p class="product-name"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($p['slug']); ?>"><?php echo e($p['title']); ?></a></p>
                    </div>
                  </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </ul>
              <div class="actions">
                <a href="<?php echo e(env('APP_URL')); ?>thanh-toan" class="btn-checkout" title="Checkout" type="button" ><span>Thanh toán</span></a>
              </div>
              <!--actions-->
            </div>
            <!--fl-mini-cart-content-->
          </div>
        </div>
        <!--mini-cart-->
        <div class="collapse navbar-collapse">
            <form class="navbar-form" role="search" action="<?php echo e(env('APP_URL')); ?>tim-kiem-san-pham" method="POST" id="formSearch">
              <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="s" id="input-search" value="<?php echo e(isset($s) ? $s : ''); ?>" required>
                    <span class="input-group-btn">
                          <button type="submit" name="submit" value="OK" class="search-btn"> <span class="glyphicon glyphicon-search"> <span class="sr-only">Tìm kiếm</span> </span>
                    </button>
                    </span>
                </div>
            </form>
        </div>
        <!--links-->
      </div>
    </div>
    </div>
  </header>
  <!--container-->
  <div class="content">
    <?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
    <!--container-->
  </div>
    <!--footer-inner-->
    <footer>
    <!-- BEGIN INFORMATIVE FOOTER -->
    

    <div class="footer-middle">
      <div class="container">
        <div class="row">
          <div class="row"> </div>
        </div>
        <!--row-->
      </div>
      <!--container-->
    </div>
    <!--footer-middle-->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright">
            © 2024 Điện máy Khải Duyên <br />
            Địa chỉ: 679 QL91 - xã Bình Hòa, huyện Châu Thành, tỉnh An. <br />
            Điện thoại: 0918 082 264
          </div>
        </div>
        <!--row-->
      </div>
      <!--container-->
    </div>
    <!--footer-bottom-->
    <!-- BEGIN SIMPLE FOOTER -->
  </footer>
  <!-- End For version 1,2,3,4,6 -->
</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
    <ul>
        <li>
            <div class="home"><a href="<?php echo e(env('APP_URL')); ?>"><i class="icon-home"></i>Trang chủ</a> </div>
        </li>
        <?php if($product_categories ): ?>
          <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(env('APP_URL')); ?>san-pham/<?php echo e($pc['slug']); ?>"><?php echo e($pc['title']); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <li><a href="<?php echo e(env('APP_URL')); ?>lien-he">Liên hệ</a></li>
    </ul>
</div>
</body>
</html>
<!-- JavaScript -->
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/revslider.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/common.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery.mobile-menu.min.js"></script>
<script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/frontend/plugins/jquery-toastr/jquery.toast.min.js"></script>
<?php $__env->startSection('js'); ?> <?php echo $__env->yieldSection(); ?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("#MailListForm").submit(function(event){
      event.preventDefault();
      var form = jQuery(this);
      var path = form.attr("action");
      jQuery.ajax({
        url: path, type: "post",
        data: form.serialize(),
        success: function(data){
          jQuery.toast({
            heading: 'Thông báo',
            text: data,
            showHideTransition: 'slide',
            icon: 'info',
            position: 'mid-center'
          });
        }
      });
    });
  });
</script>
<?php /**PATH E:\Lara_Projects\ThanTai\resources\views/Frontend/layout.blade.php ENDPATH**/ ?>