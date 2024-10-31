@extends('Frontend.Uzu.layout')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/plugins/jquery-toastr/jquery.toast.min.css">
@endsection
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Kết quả tìm kiếm</h2>
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
                                        {{-- <span class="disable-price" ><span class="price"><strike>300.00</strike></span></span> --}}
                                        <span class="regular-price" id="product-price-1"><span class="price">{{ number_format($p['prices'],0,",",".") }} VNĐ</span></span>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                       <button class="button btn-cart add-to-cart" name="{{ $p['_id'] }}/1" type="button"><span>Mua hàng</span></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                    </li>
                    @endforeach
                  </ul>
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
        <!--block block-list block-compare-->
         <div class="block block-poll">
            <div class="block-title">Khảo sát </div>
            <form id="pollForm" action="#" method="post" onSubmit="return validatePollAnswerIsSelected();">
               <div class="block-content">
                  <p class="block-subtitle">Bạn có thường mua nông sản sạch ở đâu?</p>
                  <ul id="poll-answers">
                     <li class="odd">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_1" value="1">
                        <span class="label">
                        <label for="vote_1">Siêu thị</label>
                        </span>
                     </li>
                     <li class="even">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_2" value="2">
                        <span class="label">
                        <label for="vote_2">Cơ sở sản xuất</label>
                        </span>
                     </li>
                     <li class="odd">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_3" value="3">
                        <span class="label">
                        <label for="vote_3">Người trồng cá nhân</label>
                        </span>
                     </li>
                     <li class="last even">
                        <input type="radio" name="vote" class="radio poll_vote" id="vote_4" value="4">
                        <span class="label">
                        <label for="vote_4">Tự trồng</label>
                        </span>
                     </li>
                  </ul>
                  <div class="actions">
                     <button type="submit" title="Vote" class="button button-vote"><span>Đồng ý</span></button>
                  </div>
               </div>
            </form>
         </div>
         <div class="hot-banner"><img src="{{ env('APP_URL') }}assets/frontend/images/hot-trends-banner.jpg" alt="banner"></div>
      </aside>
      <!--col-right sidebar-->
   </div>
   <!--row-->
</div>
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/plugins/jquery-toastr/jquery.toast.min.js"></script>
   <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/script.js"></script>
   <script type="text/javascript">
      jQuery(document).ready(function(){
         add_to_cart("{{ env('APP_URL') }}");
      });
   </script>
@endsection
