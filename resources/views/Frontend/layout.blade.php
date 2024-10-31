<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Điện máy Khải Duyên @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="Điện máy Khải Duyên">
<meta name="keywords" content="Điện máy Khải Duyên">
<meta name="robots" content="*">
<link rel="icon" href="{{ env('APP_URL') }}assets/frontend/images/logo.png" type="image/x-icon">
<link rel="shortcut icon" href="{{ env('APP_URL') }}assets/frontend/images/logo.png" type="image/x-icon">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149293891-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-149293891-1');
</script>

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/revslider.css" >
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/jquery.mobile-menu.css">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/plugins/jquery-toastr/jquery.toast.min.css">
@section('css') @show
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
          @if(Session::get('customer._id'))
            Xin chào: {{ Session::get('customer.email') }}
          @endif
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
      <div class="logo"> <a href="{{ env('APP_URL') }}" title="Trạm dừng nghỉ Thần Tài">
        <div><img src="{{ env('APP_URL') }}assets/frontend/images/logo.png" style="" alt="Trạm dừng nghỉ Thần Tài"></div>
        </a> </div>
        <div class="fl-nav-menu">
          <nav>
            <div class="mm-toggle-wrap">
              <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
            </div>
            <div class="nav-inner">
              <!-- BEGIN NAV -->
              <ul id="nav" class="hidden-xs">
                <li id="nav-home" class="level0"><a class="level-top active" href="{{ env('APP_URL') }}"><span>Trang chủ</span></a></li>
                <li class="level0 parent drop-menu"><a href="{{ env('APP_URL') }}san-pham"><span>Sản phẩm</span> </a>
                <!--sub sub category-->
                @if($product_categories)
                  <ul class="level1">
                    @foreach($product_categories as $pc)
                      <li class="level1 first"><a href="{{ env('APP_URL') }}san-pham/{{ $pc['slug'] }}"><span>{{ $pc['title'] }}</span></a></li>
                    @endforeach
                  </ul>
                @endif
                </li>
                {{--<li class="level0"><a href="{{ env('APP_URL') }}doanh-nghiep"><span>Doanh nghiệp</span> </a></li>
                <li class="level0 parent drop-menu"><a href="{{ env('APP_URL') }}tin-tuc-su-kien"><span>Tin tức - Sự kiện</span> </a>
                  @if($categories)
                  <ul class="level1">
                    @foreach($categories as $cat)
                      <li class="level1 nav-10-3"> <a href="{{ env('APP_URL') }}tin-tuc-su-kien/{{ $cat['slug'] }}"> <span>{{ $cat['title'] }}</span> </a> </li>
                      @endforeach
                  </ul>
                  @endif
                </li>
                 <li class="level0 parent drop-menu"><a href="#"><span>Thông tin</span> </a>
                  <ul class="level1">
                    <li><a href="{{ env('APP_URL') }}gia-ca-thi-truong">Giá cả thị trường</a></li>
                    <li><a href="{{ env('APP_URL') }}logistic">Hạ tầng Thương mại biên giới và hệ thống dịch vụ Logistic</a></li>
                    <li><a href="{{ env('APP_URL') }}diem-mua-sam-dat-chuan">Điểm mua sắm đạt chuẩn phục vụ khách du lịch</a></li>
                  </ul>
                </li> --}}
                <li class="level0"><a href="{{ env('APP_URL') }}lien-he"><span>Liên hệ</span> </a></li>
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
                {{-- <li><a href="{{ env('APP_URL') }}tai-khoan" title="Tài khoản">Tài khoản</a></li> --}}
                <li><a href="{{ env('APP_URL') }}thanh-toan" title="Thanh toán">Thanh toán</a></li>
                {{-- <li><a href="{{ env('APP_URL') }}xem-don-hang" title="Xem danh sách đơn hàng"><span>Xem đơn hàng</span></a></li> --}}
                @if(Session::get('customer'))
                  <li class="last"><a href="{{ env('APP_URL') }}dang-xuat" title="Đăng xuất"><span>Đăng xuất</span></a></li>
                @else
                  <li class="last"><a href="{{ env('APP_URL') }}dang-nhap" title="Đăng nhập"><span>Đăng nhập</span></a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="fl-cart-contain">
          <div class="mini-cart">
            <div class="basket"><a href="{{ env('APP_URL') }}gio-hang" id="basket"><span>
              @php $count = 0; $total = 0; @endphp
              @if(Session::get('cart_items'))
              @foreach(Session::get('cart_items') as $item)
              @php
                $p = App\Models\Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
                $count += $item['soluong']; $total += $item['soluong'] * $p['prices'];
              @endphp
              @endforeach
              @endif
              {{ $count }}</span></a></div>
            <div class="fl-mini-cart-content" style="display: none;min-width:200px;z-index:9999;">
              <div class="block-subtitle">
                <div class="top-subtotal" id="top-subtotal">{{ $count }} Sản phẩm, <span class="price">{{ number_format($total,0,",",".") }}VNĐ</span> </div>
              </div>
              <!--block-subtitle-->
              <ul class="mini-products-list" id="cart-sidebar">
                @if(Session::get('cart_items'))
                @foreach(Session::get('cart_items') as $item)
                @php
                  $p = App\Models\Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
                @endphp
                <li class="item_{{ $p['_id'] }} item">
                  <div class="item-inner">
                    <a class="product-image" title="{{ $p['title'] }}" href="#">
                      @if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname'])
                        <img alt="{{ $p['title'] }}" src="{{ env('APP_URL')}}storage/images/thumb_800x800/{{ $p['photos'][0]['aliasname'] }}">
                      @else
                        <img alt="{{ $p['title'] }}" src="{{ env('APP_URL')}}assets/frontend/products-images/p4.jpg">
                      @endif
                    </a>
                    <div class="product-details">
                      <div class="access"><a class="btn-remove remove-cart-item" title="{{ $p['title'] }}" href="{{ env('APP_URL') }}cart/remove/{{ $item['id_sanpham'] }}" name="{{ $p['_id'] }}" onclick="return false;"><span class="glyphicon glyphicon-trash"></span></a></div>
                      <strong>{{ $item['soluong'] }}</strong> x <span class="price">{{ number_format($p['prices'],0,",",".") }}</span>
                      <p class="product-name"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{  $p['slug'] }}">{{ $p['title'] }}</a></p>
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
              <div class="actions">
                <a href="{{ env('APP_URL') }}thanh-toan" class="btn-checkout" title="Checkout" type="button" ><span>Thanh toán</span></a>
              </div>
              <!--actions-->
            </div>
            <!--fl-mini-cart-content-->
          </div>
        </div>
        <!--mini-cart-->
        <div class="collapse navbar-collapse">
            <form class="navbar-form" role="search" action="{{ env('APP_URL') }}tim-kiem-san-pham" method="POST" id="formSearch">
              {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="s" id="input-search" value="{{ isset($s) ? $s : '' }}" required>
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
    @section('body') @show
    <!--container-->
  </div>
    <!--footer-inner-->
    <footer>
    <!-- BEGIN INFORMATIVE FOOTER -->
    {{-- <div class="footer-inner">
        <div class="newsletter-row">
            <div class="container">
                <div class="row">
                    <!-- Footer Newsletter -->
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col1">
                        <div class="newsletter-wrap">
                            <h4>Đăng ký nhận Email</h4>
                            <form action="{{ env('APP_URL') }}mail-list/register" method="post" id="MailListForm">
                                {{ csrf_field() }}
                                <div id="container_form_news">
                                    <div id="container_form_news2">
                                        <input type="email" name="email" id="email" title="Điền địa chỉ email" placeholder="Địa chỉ email" required class="input-text required-entry validate-email" placeholder="Nhập địa chỉ email">
                                        <button type="submit" title="Đăng ký nhận email" class="button subscribe"><span>Đăng ký</span></button>
                                    </div>
                                    <!--container_form_news2-->
                                </div>
                                <!--container_form_news-->
                            </form>
                        </div>
                        <!--newsletter-wrap-->
                    </div>
                </div>
            </div>
            <!--footer-column-last-->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 col-lg-4">
                    <div class="co-info">
                        <div>
                            <a href="index.html"><img src="{{ env('APP_URL') }}assets/frontend/images/logo.png" alt="footer logo"></a>
                        </div>
                        <address>
              <div><em class="icon-location-arrow"></em> <span>10, Lê Triệu Kiết, P. Mỹ Bình, TPLX, An Giang</span></div>
              <div> <em class="icon-mobile-phone"></em><span>  (0296) 3956 701</span></div>
              <div> <em class="icon-envelope"></em><span>sanphamangiang@gmail.com</span></div>
              </address>
                        <div class="social">
                            <ul class="link">
                                <li class="fb pull-left">
                                    <a target="_blank" rel="nofollow" href="https://www.facebook.com/angiangsanphamchatluongantoan/" title="Facebook" target="_blank"></a>
                                </li>
                                <li class="tw pull-left">
                                    <a target="_blank" rel="nofollow" href="#" title="Twitter" onclick="return false;"></a>
                                </li>
                                <li class="googleplus pull-left">
                                    <a target="_blank" rel="nofollow" href="#" title="GooglePlus" onclick="return false;"></a>
                                </li>
                                <li class="rss pull-left">
                                    <a target="_blank" rel="nofollow" href="#" title="RSS" onclick="return false;"></a>
                                </li>
                                <li class="pintrest pull-left">
                                    <a target="_blank" rel="nofollow" href="#" title="PInterest" onclick="return false;"></a>
                                </li>
                                <li class="linkedin pull-left">
                                    <a target="_blank" rel="nofollow" href="#" title="Linkedin" onclick="return false;"></a>
                                </li>
                                <li class="youtube pull-left">
                                    <a target="_blank" rel="nofollow" href="#" title="Youtube" onclick="return false;"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-xs-12 col-lg-8">
                    <div class="footer-column">
                        <h4>Thông tin</h4>
                        <ul>
                          <li><a title="Giới thiệu" href="{{ env('APP_URL') }}gioi-thieu">Giới thiệu</a></li>
                          <li><a title="Hướng dẫn mua hàng" href="{{ env('APP_URL') }}huong-dan-mua-hang">Hướng dẫn mua hàng</a></li>
                        </ul>
                        <a href="http://online.gov.vn/Home/WebDetails/27824" target="_blank" style="list-type-style:none !important;">
                          <img src="{{ env('APP_URL') }}/storage/images/logoCCDV.png" style="width:150px;" />
                        </a>
                    </div>
                    <div class="footer-column">
                        <h4>Thống kê</h4>
                        <ul>
                          <li class="first"><a title="Thống kê lượt truy cập" href="#">Tổng lượt truy cập: {{ Session::get('visits') }}</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Chính sách chung</h4>
                        <ul class="links">
                            <li class="first"><a title="Quy chế hoạt động" href="{{ env('APP_URL') }}quy-che-hoat-dong">Quy chế hoạt động</a></li>
                            <li><a title="Chính sách bảo hành" href="{{ env('APP_URL') }}chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
                            <li><a title=Quy trình thanh toán" href="{{ env('APP_URL') }}quy-trinh-thanh-toan">Quy trình thanh toán</a></li>
                            <li><a title="Chính sách bảo mật thông tin" href="{{ env('APP_URL') }}chinh-sach-bao-mat-thong-tin">Chính sách bảo mật thông tin</a></li>
                            <li><a title="Quy trình xử lý tranh chấp" href="{{ env('APP_URL') }}quy-trinh-xu-ly-tranh-chap">Quy trình xử lý tranh chấp</a></li>
                            <li class="last"><a title="Chính sách giao nhận, vận chuyển" href="{{ env('APP_URL') }}chinh-sach-giao-nhan-van-chuyen">Chính sách giao nhận, vận chuyển</a></li>
                        </ul>
                    </div>
                </div>

                <!--col-sm-12 col-xs-12 col-lg-8-->
                <!--col-xs-12 col-lg-4-->
            </div>
            <!--row-->
        </div>
    </div> --}}

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
            <div class="home"><a href="{{ env('APP_URL') }}"><i class="icon-home"></i>Trang chủ</a> </div>
        </li>
        @if($product_categories )
          @foreach($product_categories  as $pc)
            <li><a href="{{ env('APP_URL') }}san-pham/{{ $pc['slug'] }}">{{ $pc['title'] }}</a></li>
          @endforeach
        @endif
        <li><a href="{{ env('APP_URL') }}lien-he">Liên hệ</a></li>
    </ul>
</div>
</body>
</html>
<!-- JavaScript -->
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/revslider.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/common.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/jquery.mobile-menu.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/plugins/jquery-toastr/jquery.toast.min.js"></script>
@section('js') @show
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
