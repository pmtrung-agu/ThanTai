@extends('Frontend.Uzu.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Điểm mua sắm đạt chuẩn phục vụ khách du lịch</h2>
    </div>
</div>
@if($shopping)
<div class="container">
   <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3">
         <div class="pro-coloumn">
            <article class="col-main">
               <div class="category-products">
                  <ol class="products-list" id="products-list">
                    @foreach($shopping as $seller)
                     <li class="item">
                        <div class="product-image">
                            <a href="{{ env('APP_URL') }}diem-mua-sam-dat-chuan/{{ $seller['slug'] }}" title="{{ $seller['title'] }}">
                                @if(isset($seller['photos'][0]['aliasname']) && $seller['photos'][0]['aliasname'])
                                    <img class="small-image" src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $seller['photos'][0]['aliasname'] }}" alt="{{ $seller['title'] }}">
                                @else
                                    <img class="small-image" src="{{ env('APP_URL') }}assets/frontend/images/default_800x800.jpg" alt="{{ $seller['title'] }}">
                                @endif
                            </a>
                        </div>
                        <div class="product-shop">
                           <h2 class="product-name"><a href="{{ env('APP_URL') }}diem-mua-sam-dat-chuan/{{ $seller['slug'] }}" title="{{ $seller['title'] }}">{{ $seller['title'] }}</a></h2>
                           <div class="desc">
                              <p>Địa chỉ: {{ App\Http\Controllers\AddressController::getDiaChi($seller['address']) }}</p>
                              <p>Điện thoại: {{ $seller['phone'] }}</p>
                              <p>Email: {{ $seller['email'] }}</p>
                           </div>
                           <div class="actions">
                              <a class="button" href="{{ env('APP_URL') }}diem-mua-sam-dat-chuan/{{ $seller['slug'] }}" title="{{ $seller['title'] }}" type="button"><span class="glyphicon glyphicon-eye-open"></span> Xem chi tiết</a>
                           </div>
                        </div>
                     </li>
                    @endforeach
                  </ol>
               </div>
            </article>
            <div class="toolbar">
              <div class="pager">
                 <div class="pages">
                  {{ $shopping->withPath(env('APP_URL').'diem-mua-sam-dat-chuan') }}
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
        <!--block block-list block-compare-->
        @include('Frontend.widget_lienket')
      </aside>
   </div>
</div>
@endif
@endsection
