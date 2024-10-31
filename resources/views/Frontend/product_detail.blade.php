@extends('Frontend.Uzu.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/plugins/jquery-toastr/jquery.toast.min.css">
	<link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/flexslider.css">
@endsection
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Chi tiết sản phẩm</h2>
    </div>
</div>
@if($product)
<div class="main-container col1-layout wow bounceInUp animated">
    <div class="main">
        <div class="col-main">
            <!-- Endif Next Previous Product -->
            <div class="product-view wow bounceInUp animated" itemscope="" itemtype="http://schema.org/Product" itemid="#product_base">
                <div id="messages_product_view"></div>
                <!--product-next-prev-->
                <div class="product-essential container">
                    <div class="row">
                        {{-- <div class="product-next-prev"> <a class="product-next" title="Next" href="#"><span></span></a> <a class="product-prev" title="Previous" href="#"><span></span></a> </div> --}}
                        <form action="" method="post" id="product_addtocart_form">
                            <!--End For version 1, 2, 6 -->
                            <!-- For version 3 -->
                            <div class="product-img-box col-sm-6 col-xs-12">
                                <div class="product-image">
                                    <div class="large-image">
                                        @if(isset($product['photos'][0]['aliasname']) && $product['photos'][0]['aliasname'])
                                            <a href="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $product['photos'][0]['aliasname'] }}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $product['photos'][0]['aliasname'] }}"></a>
                                        @else
                                            <a href="{{ env('APP_URL') }}assets/frontend/products-images/p15.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img src="{{ env('APP_URL') }}assets/frontend/products-images/p15.jpg"></a>
                                        @endif
                                    </div>
                                    <div class="flexslider flexslider-thumb">
                                        @if($product['photos'])
                                        <ul class="previews-list slides">
                                            @foreach($product['photos'] as $photo)
                                            <li>
                                                <a href='{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $photo['aliasname'] }}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $photo['aliasname'] }}' "><img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $photo['aliasname'] }}" alt="{{ $photo['title'] }}" /></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <!--End For version 1,2,6-->
                            <!-- For version 3 -->
                            <div class="product-shop col-sm-6 col-xs-12">
                                <div class="product-name">
                                    <h1 itemprop="name">{{ $product['title'] }}</h1>
                                </div>
                                <div class="price-block">
                                    <div class="price-box">
                                        @if($promotion && $promotion->count() > 0)
                                             @php
                                                $date_to = App\Http\Controllers\ObjectController::getDate($promotion['date_to'], "Y-m-d H:i:s");
                                            @endphp
                                            <span id="pro-time" data-time="{{ $date_to }}" style="font-size:20px;float:right;background-color: #ff0000;color:#fff;line-height:40px;padding:0px 10px 0px 10px;font-weight:bold;width:100px;text-align:center;">{{ $date_to }}</span>
                                        @endif
                                        @if($product['prices'] == 0)
                                            <span class="regular-price" id="product-price-123"> <span class="price">Giá: Liên hệ</span> </span>
                                        @else
                                            @if($promotion && $promotion->count() > 0)
                                                @php
                                                    $total_discount = 0;
                                                    if($promotion['discount'] == '%'){
                                                        $total_discount = $product['prices'] * $promotion['amount']/100;
                                                    } else {
                                                        $total_discount = $promotion['amount'];
                                                    }
                                                @endphp
                                                <span class="regular-price" id="product-price-123">
                                                    <span class="price-disable"><strike>{{ number_format($product['prices'],0,",",".") }} VNĐ</strike></span>
                                                    <span class="price">{{ number_format($product['prices'] - $total_discount,0,",",".") }} VNĐ</span>
                                                </span>
                                            @else
                                                <span class="regular-price" id="product-price-123"> <span class="price">{{ number_format($product['prices'],0,",",".") }} VNĐ</span> </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <!--price-block-->
                                <div class="short-description">
                                    <h2>Mô tả</h2>
                                    <p style="font-size:18px;">{{ $product['description'] }}</p>
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
                                        <button type="button" title="Add to Cart" class="button btn-cart add-to-cart" name="{{ $product['_id'] }}"><span><i class="icon-basket"></i>Mua hàng</span></button>
                                    </div>
                                    <!--add-to-cart-->
                                    {{-- <div class="email-addto-box">
                                        <p class="email-friend"><a href="#" title="Email to a Friend"><span>Email to a Friend</span></a></p>
                                        <ul class="add-to-links">
                                            <li> <a class="link-wishlist" href="wishlist.html" onClick="" title="Add To Wishlist"><span>Add To Wishlist</span></a> </li>
                                            <li> <span class="separator">|</span> <a class="link-compare" href="Compare.html" title="Add To Compare"><span>Add To Compare</span></a> </li>
                                        </ul>
                                        <!--add-to-links-->
                                    </div> --}}
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
                        {!! $product['contents'] !!}
                    </div>
                </div>
                <div class="tab-pane fade in" id="product_seller">
                    <div class="std" style="font-size:18px;color:#000;">
                        @php
                            $s = App\Models\User::find($product['id_seller']);
                        @endphp
                        @if(isset($s['photos'][0]['aliasname']) && $s['photos'][0]['aliasname'])
                            <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{ $s['photos'][0]['aliasname'] }}" style="float:left;margin-right:20px;height:150px;"/>
                        @endif
                        <h3>{{ $s['store'] }}</h3>
                        <p>Địa chỉ: {{ App\Http\Controllers\AddressController::getDiaChi($s['address']) }}</p>
                        <p>Điện thoại: <a href="tel:{{ $s['phone'] }}">{{ $s['phone'] }}</a></p>
                        <p>Email: <a href="mailto:{{ $s['email'] }}">{{ $s['email'] }}</a></p>
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
                    @if($relate_products)
                    <div id="related-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            @foreach($relate_products as $rp)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $rp['slug'] }}" title="{{ $rp['title'] }}" class="product-image">
                                                @if(isset($rp['photos'][0]['aliasname']) && $rp['photos'][0]['aliasname'])
                                                    <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $rp['photos'][0]['aliasname'] }}" alt="{{ $rp['title'] }}">
                                                @else
                                                    <img src="{{ env('APP_URL') }}assets/frontend/products-images/p1.jpg" alt="{{ $rp['title'] }}">
                                                @endif
                                            </a>
                                            <div class="item-box-hover">
                                                <div class="box-inner">
                                                    <div class="product-detail-bnt"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $rp['slug'] }}" class="button detail-bnt" type="button"><span>Quick View</span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $rp['slug'] }}" title="{{ $rp['title'] }}">{{ Str::limit($rp['title'],20) }}</a> </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price" id="product-price-1"><span class="price">{{ number_format($rp['prices'],0,",",".") }} VNĐ</span> </span>
                                                    </div>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart add-to-cart" name="{{ $rp['_id'] }}" type="button"><span>Mua hàng</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- end related product -->

        </div>
        <!-- end related product -->
    </div>
    <!--box-additional-->
    <!--product-view-->
</div>
@endif
{{-- @include('Frontend.widget_doanhnghiep') --}}
@endsection
@section('js')
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/cloud-zoom.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/plugins/jquery.countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/script.js"></script>
   <script type="text/javascript">
      jQuery(document).ready(function(){
         add_to_cart_detail("{{ env('APP_URL') }}");
         @if($promotion && $promotion->count() > 0)
            var time = jQuery("#pro-time").attr("data-time");
            jQuery("#pro-time").countdown(time, function(event) {
                jQuery(this).text(event.strftime('%H:%M:%S'));
            });
         @endif
      });
   </script>
@endsection
