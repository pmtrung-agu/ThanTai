@extends('Frontend.Uzu.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>{{ $category_title }}</h2>
    </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3 product-grid">
         <div class="pro-coloumn">
            @if($products)
            <article class="col-main">
               <div class="category-products">
                  <ul class="products-grid">
                    @foreach($products as $p)
                    @php
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
                    @endphp
                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                        <div class="item-inner">
                           <div class="item-img">
                              <div class="item-img-info">
                                 <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" title="{{ $p['title'] }}" class="product-image">
                                    @if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname'])
                                    <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $p['photos'][0]['aliasname'] }}" alt="{{ $p['title'] }}">
                                    @else
                                       <img src="{{ env('APP_URL') }}assets/frontend/products-images/p1.jpg" alt="{{ $p['title'] }}">
                                    @endif
                                 </a>
                                 @if($total_discount > 0)
                                  <div class="sale-label sale-top-right" style="background:#fece00;color:#ff0000;font-size:15px;border:1px solid #ff0000;font-weight:bold;">-{{ $total_discount }}</div>
                                 @endif
                                 <div class="item-box-hover">
                                    <div class="box-inner">
                                       <div class="product-detail-bnt"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" class="button detail-bnt" type="button"><span>Xem nhanh</span></a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="item-info">
                              <div class="info-inner">
                                 <div class="item-title"><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" title="{{ $p['title'] }}">{{ $p['title'] }}</a> </div>
                                 <div class="item-content">
                                    <div class="item-price">
                                       <div class="price-box">
                                        @if($p['prices'] == 0)
                                          <span class="regular-price" id="product-price-1"><span class="price">Giá: Liên hệ</span></span>
                                        @else
                                          {{-- <span class="disable-price" ><span class="price"><strike>300.00</strike></span></span> --}}
                                          <span class="regular-price" id="product-price-1"><span class="price">{{ number_format($p['prices'],0,",",".") }} VNĐ</span></span>
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
                    </li>
                    @endforeach
                  </ul>
               </div>
               <div class="toolbar">
                  <div class="pager" style="width:100%;">
                     <div class="pages">
                        <label>Trang:</label>
                        {{ $products->withPath(env('APP_URL').'san-pham/'.$slug) }}
                     </div>
                  </div>
               </div>
            </article>
            @endif
         </div>
      </div>
      <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
         <!-- BEGIN SIDE-NAV-CATEGORY -->
         <div class="side-nav-categories">
            <div class="block-title"> Danh mục Sản phẩm </div>
            <!--block-title-->
            <!-- BEGIN BOX-CATEGORY -->
            <div class="box-content box-category">
                @if($product_categories)
               <ul>
                @foreach($product_categories as $pc)
                  <li><a class="active" href="{{ env('APP_URL') }}san-pham/{{ $pc['slug'] }}">{{ $pc['title'] }}</a></li>
                @endforeach
               </ul>
               @endif
            </div>
            <!--box-content box-category-->
         </div>
         @include('Frontend.widget_cart')
         {{-- @include('Frontend.widget_lienket') --}}
         <!--block block-list block-compare-->
      </aside>
      <!--col-right sidebar-->
   </div>
   <!--row-->
</div>
{{-- @include('Frontend.widget_doanhnghiep') --}}
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/script.js"></script>
   <script type="text/javascript">
      jQuery(document).ready(function(){
         add_to_cart("{{ env('APP_URL') }}");
      });
  </script>
@endsection
