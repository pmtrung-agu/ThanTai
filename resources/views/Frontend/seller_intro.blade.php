@extends('Frontend.Uzu.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/plugins/photobox/photobox.min.css">
@endsection
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Giới thiệu doanh nghiệp</h2>
    </div>
</div>
<div class="main container col-main" style="padding: 30px 10px 50px 0px;">
    <div class="row">
    	<div class="col-md-12" style="font-size: 20px;font-family:Quicksand;">
    		<h1>{{ $seller['store'] }}</h1>
    		{!! $seller['gioi_thieu'] !!}
    		@if($seller['photos'])
                <h3 class="blog_entry-title">Một số hình ảnh</h3>
                <div class="product-view wow bounceInUp animated" itemscope="" id="photos">
                    <div id="messages_product_view"></div>
                    <!--product-next-prev-->
                    <div class="product-essential container" style="width:100% !important;">
                        <div class="row">
                            <div class="product-img-box col-sm-12 col-md-12 col-xs-12">
                                <div>
                                    <div class="flexslider flexslider-thumb">
                                        <ul class="previews-list slides">
                                            @foreach($seller['photos'] as $photo)
                                            <li>
                                                <a href='{{ env('APP_URL') }}storage/images/origin/{{ $photo['aliasname'] }}' class='photos'>
                                                    <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{ $photo['aliasname'] }}" alt="{{ $photo['title'] }}" title="{{ $photo['title'] }}" style="height:70px;"/>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
    	</div>
  	</div>
</div>
@if($products)
  <div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div class="new_title">
                    <h2>Sản phẩm của doanh nghiệp</h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                      @foreach($products as $p)
                        <div class="item">
                            <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}">
                                <div class="pro-img">
                                  @if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname'])
                                  <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $p['photos'][0]['aliasname'] }}" alt="{{ $p['title'] }}">
                                  @else
                                    <img src="{{ env('APP_URL') }}assets/frontend/products-images/p1.jpg" alt="{{ $p['title'] }}">
                                  @endif
                                    <div class="pro-info">{{ str_limit($p['title'],25) }}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($relates)
  <div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div class="new_title">
                    <h2>Doanh nghiệp liên quan</h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                      @foreach($relates as $ph)
                        <div class="item">
                            <a href="{{ env('APP_URL') }}doanh-nghiep/gioi-thieu/{{ $ph['slug'] }}">
                                <div class="pro-img">
                                  @if(isset($ph['photos'][0]['aliasname']) && $ph['photos'][0]['aliasname'])
                                  <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $ph['photos'][0]['aliasname'] }}" alt="{{ $ph['store'] }}">
                                  @else
                                    <img src="{{ env('APP_URL') }}assets/frontend/products-images/p1.jpg" alt="{{ $ph['store'] }}">
                                  @endif
                                    <div class="pro-info">{{ str_limit($ph['store'],25) }}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Frontend.widget_doanhnghiep')
@endif
@endsection
@section('js')
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/cloud-zoom.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/plugins/photobox/jquery.photobox.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#photos').photobox('a.photos');
        });
    </script>
@endsection