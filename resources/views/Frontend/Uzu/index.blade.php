@extends('Frontend.Uzu.layout')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/uzu/plugins/jquery-toastr/jquery.toast.min.css">
@endsection
@section('body')
  <div id="thm-mart-slideshow" class="thm-mart-slideshow">
    <div class="container">
      <div id="thm_slider_wrapper" class="thm_slider_wrapper fullwidthbanner-container">
        <div id='thm-rev-slider' class='rev_slider fullwidthabanner'>
          <ul>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_0.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_0.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_1.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_1.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_2.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_2.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            {{-- <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_3.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_3.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_4.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_4.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_5.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_5.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_6.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_6.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_7.jpg'><img src='{{ env('APP_URL') }}assets/frontend/uzu/images/banner/slide_7.jpg'  data-bgposition='center center'  data-bgfit='cover' data-bgrepeat='no-repeat'/>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--Category slider Start-->
  <div class="top-cate">
    @if($promotions && count($promotions) > 0)
    <div class="featured-pro container">
      <div class="row">
          <div class="slider-items-products">
              <div class="new_title" style="padding:0px !important;">
                  <h2 style="background:#ffd728;padding:7px 20px 7px 20px;">
                    <a href="{{ env('APP_URL') }}flash-sale"><img src="{{ env('APP_URL') }}assets/frontend/uzu/images/flash_sale.png" style="height:50px;padding:0px;">
                      Chương trình khuyến mãi [11h30 - 13h00 và 20h30 – 22h00 ngày 28/8 - 29/8/2020]
                    </a>
                  </h2>
              </div>
              <div id="top-categories" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                    @foreach($promotions as $pro)
                    @if($pro)
                      @foreach($pro['id_products'] as $key => $value)
                      @php
                        $ph = App\Models\Product::find($value);
                        $date_to = App\Http\Controllers\ObjectController::getDate($pro['date_to'], "Y-m-d H:i:s");
                      @endphp
                        <div class="item">
                            <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $ph['slug'] }}">
                                <div class="pro-img">
                                  @if(isset($ph['photos'][0]['aliasname']) && $ph['photos'][0]['aliasname'])
                                  <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $ph['photos'][0]['aliasname'] }}" alt="{{ $ph['title'] }}">
                                  @else
                                    <img src="{{ env('APP_URL') }}assets/frontend/uzu/products-images/p1.jpg" alt="{{ $ph['title'] }}">
                                  @endif
                                    <div class="pro-info">{{ str_limit($ph['title'],25) }}</div>
                                    <div class="pro-time" data-time="{{ $date_to }}"></div>
                                </div>
                            </a>
                        </div>
                      @endforeach
                    @endif
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
    </div>
    @endif
  </div>
   <div class="top-cate">
    @if($promotions_soon && count($promotions_soon) > 0)
    <div class="featured-pro container">
      <div class="row">
          <div class="slider-items-products">
              <div class="new_title" style="padding:0px !important;">
                  <h2 style="background:#ffd728;padding:7px 20px 7px 20px;font-weight: bold !important;">
                    <a href="{{ env('APP_URL') }}flash-sale-soon"><img src="{{ env('APP_URL') }}assets/frontend/uzu/images/flash_sale.png" style="height:50px;padding:0px;">
                      SẮP DIÊN RA [11h30 - 13h00 và 20h30 – 22h00 ngày 28/8 - 29/8/2020]
                    </a>
                  </h2>
              </div>
              <div id="top-categories" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                    @foreach($promotions_soon as $pro_soon)
                    @if($pro_soon)
                      @foreach($pro_soon['id_products'] as $key => $value)
                      @php
                        $ph = App\Models\Product::find($value);
                        $date_to = App\Http\Controllers\ObjectController::getDate($pro_soon['date_from'], "d/m/Y H:i");
                      @endphp
                        <div class="item">
                            <a href="{{ env('APP_URL') }}flash-sale-soon?date_from={{ $pro_soon['date_from'] }}">
                                <div class="pro-img">
                                  @if(isset($ph['photos'][0]['aliasname']) && $ph['photos'][0]['aliasname'])
                                  <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $ph['photos'][0]['aliasname'] }}" alt="{{ $ph['title'] }}">
                                  @else
                                    <img src="{{ env('APP_URL') }}assets/frontend/uzu/products-images/p1.jpg" alt="{{ $ph['title'] }}">
                                  @endif
                                    <div class="pro-info">{{ str_limit($ph['title'],25) }}</div>
                                    <div style="font-weight: bold;color:#ff0000;">{{ $date_to }}</div>
                                </div>
                            </a>
                        </div>
                      @endforeach
                    @endif
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
    </div>
    @endif
  </div>

<!--Category silder End-->
<!-- best Pro Slider -->
@if($product_categories)
  @foreach($product_categories as $pc)
    @php
      $products = App\Models\Product::where('id_product_category','=',strval($pc['_id']))->where('prices', '>', 0)->where('status','=',1)->orderBy('updated_at', 'desc')->take(12)->get()->toArray();
      $products = App\Http\Controllers\FrontendController::shuffle_assoc($products);
      /*if(isset($pc['photos'][0]['aliasname']) && $pc['photos'][0]['aliasname']){
        $banner_path = env('APP_URL') . 'storage/images/origin/'. $pc['photos'][0]['aliasname'];
      } else {
        $banner_path = env('APP_URL') .'assets/frontend/uzu/images/category-banner.jpg';
      }*/
    @endphp
    @if($products)
    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2><a href="{{ env('APP_URL') }}san-pham/{{ $pc['slug'] }}" style="color:#fff;">{{ $pc['title'] }}</a></h2>
            </div>
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    <!-- Item -->
                    @foreach($products as $p)
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info">
                                    <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" title="{{ $p['title'] }}" class="product-image">
                                      @if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname'])
                                      <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $p['photos'][0]['aliasname'] }}" alt="{{ $p['title'] }}">
                                      @else
                                        <img src="{{ env('APP_URL') }}assets/frontend/uzu/products-images/p1.jpg" alt="{{ $p['title'] }}">
                                      @endif
                                      </a>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" class="button detail-bnt"><span>Xem chi tiết</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" title="{{ $p['title'] }}">{{ Str::limit($p['title'],20) }}</a> </div>
                                    <div class="item-content">
                                        <div class="item-price">
                                            <div class="price-box">
                                              @if($p['prices'] == 0)
                                                <span class="regular-price"><span class="price">Giá: Liên hệ</span></span>
                                              @else
                                                {{-- <span class="disable-price"><span class="price"><strike>300.00</strike></span></span> --}}
                                                <span class="regular-price"><span class="price"><b>{{ number_format($p['prices'],0,",",".") }} VNĐ</b></span></span>
                                              @endif
                                            </div>
                                        </div>
                                        <div class="add_cart">
                                            <button class="button btn-cart add-to-cart" type="button" name="{{ $p['_id'] }}/1"><span>Mua hàng</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Item -->
                </div>
            </div>
        </div>
    </section>
    @endif
  @endforeach
@endif
{{-- @include('Frontend.widget_doanhnghiep') --}}
{{-- @if($articles)
<!-- Home Lastest Blog Block -->
<div class="latest-blog wow bounceInUp animated animated container">
    <!--exclude For version 6 -->
    <div class="new_title">
        <h2>TIN TỨC MỚI</h2>
        <div id="getting-started">Phan Minh Trung</div>
    </div>
    @foreach($articles as $article)
    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
      <div class="blog_inner">
          <div class="blog-img">
              <a href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">
                @if(isset($article['photos'][0]['aliasname']) && $article['photos'][0]['aliasname'])
                  <img src="{{ env('APP_URL') }}storage/images/thumb_785x476/{{ $article['photos'][0]['aliasname'] }}" alt="{{ $article['title'] }}">
                @else
                  <img src="{{ env('APP_URL') }}assets/frontend/uzu/images/default_875x476.jpg" alt="{{ $article['title'] }}">
                @endif
              </a>
              <div class="mask">
                <a class="info" href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">Xem tiếp</a>
              </div>
          </div>
          <!--blog-img-->
          <div class="blog-info">
              <div class="post-date">
                  <time class="entry-date" datetime="{{ $article['updated_at'] }}">{{ Carbon\Carbon::parse($article['updated_at'])->format("d-m") }}<br>{{ Carbon\Carbon::parse($article['updated_at'])->format("Y") }}</time>
              </div>
              <h3 style="height:50px;font-weight:900;"><a href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}" style="font-size:17px;line-height:23px;font-weight:bold !important;">{{ str_limit($article['title'],65) }}</a></h3>
              <div style="height:230px;font-weight:450;text-align:justify;">{!! str_limit($article['description'], 400) !!} </div>
              <a class="readmore" href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">Xem tiếp</a>
          </div>
      </div>
    </div>
    @endforeach
</div>
@endif --}}
{{-- @include('Frontend.widget_intro') --}}
{{--  <div id="modalPopup" class="modal fade" role="dialog" aria-hidden="true"  style="background:none;">
  <div class="modal-dialog modal-lg"  style="background:#ccc;width:80%;max-width: 600px;-webkit-box-shadow: 0px 0px 15px 5px rgba(69,179,99,1);-moz-box-shadow: 0px 0px 15px 5px rgba(69,179,99,1);box-shadow: 0px 0px 15px 5px rgba(69,179,99,1);">
    <a href="#" data-dismiss="modal" style="position:absolute; top:10px;right:10px;font-size:15px;background:#ffb15c;color:#ff3a56;padding:10px;">Đóng</a>
    <a href="{{ env('APP_URL') }}flash-sale">
      <img src="{{ env('APP_URL') }}assets/frontend/uzu/images/popup_flash_sale.jpg" style="width:100%"/>
    </a>
  </div>
</div>--}}

@endsection
@section('js')
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/uzu/plugins/jquery-toastr/jquery.toast.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/uzu/plugins/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/uzu/js/script.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){
      add_to_cart("{{ env('APP_URL') }}");
      {{-- @if(Session::get('popup') == null)  --}}
        {{-- jQuery("#modalPopup").modal("show");
        @php Session::put('popup', true) @endphp --}}
      {{-- @endif  --}}
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
@endsection
