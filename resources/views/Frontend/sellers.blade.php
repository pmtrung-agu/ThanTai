@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Các doanh nghiệp</h2>
    </div>
</div>
@if($sellers)
<div class="container">
   <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3">
         <div class="pro-coloumn">
            <article class="col-main">
               <div class="category-products">
                  <ol class="products-list" id="products-list">
                    @foreach($sellers as $seller)
                     <li class="item">
                        <div class="product-image">
                            <a href="{{ env('APP_URL') }}doanh-nghiep/{{ $seller['slug'] }}" title="{{ $seller['store'] }}">
                                @if(isset($seller['photos'][0]['aliasname']) && $seller['photos'][0]['aliasname'])
                                    <img class="small-image" src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $seller['photos'][0]['aliasname'] }}" alt="{{ $seller['store'] }}">
                                @else
                                    <img class="small-image" src="{{ env('APP_URL') }}assets/frontend/images/default_800x800.jpg" alt="{{ $seller['store'] }}">
                                @endif
                            </a>
                        </div>
                        <div class="product-shop">
                           <h2 class="product-name"><a href="{{ env('APP_URL') }}doanh-nghiep/{{ $seller['slug'] }}" title="{{ $seller['store'] }}">{{ $seller['store'] }}</a></h2>
                           <div class="desc">
                              <p>Địa chỉ: {{ App\Http\Controllers\AddressController::getDiaChi($seller['address']) }}</p>
                              <p>Điện thoại: {{ $seller['phone'] }}</p>
                              <p>Email: {{ $seller['email'] }}</p>
                           </div>
                           <div class="actions">
                              <a class="button" href="{{ env('APP_URL') }}doanh-nghiep/{{ $seller['slug'] }}" title="{{ $seller['store'] }}" type="button"><span class="glyphicon glyphicon-eye-open"></span> Đến cửa hàng</a>
                              @if(isset($seller['gioi_thieu']) && $seller['gioi_thieu'])
                                <a class="button" href="{{ env('APP_URL') }}doanh-nghiep/gioi-thieu/{{ $seller['slug'] }}" title="{{ $seller['store'] }}" type="button"><span class="glyphicon glyphicon-eye-open"></span> Giới thiệu</a>
                              @endif
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
                  {{ $sellers->withPath(env('APP_URL').'doanh-nghiep') }}
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
