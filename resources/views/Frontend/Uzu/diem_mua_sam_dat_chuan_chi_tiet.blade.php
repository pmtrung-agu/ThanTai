@extends('Frontend.Uzu.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/plugins/photobox/photobox.min.css">
@endsection
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Điểm mua sắm đạt chuẩn phục vụ khách du lịch</h2>
    </div>
</div>
<div class="main container col-main" style="padding: 30px 10px 50px 0px;">
    <div class="row">
        <div class="col-md-12" style="font-size: 20px;font-family:Quicksand;">
            <h1>{{ $shop['title'] }}</h1>
                <ul>
                    <li>Địa chỉ: {{ App\Http\Controllers\AddressController::getDiaChi($shop['address']) }}</li>
                    <li>Điện thoại: <b>{{ $shop['phone'] }}</b></li>
                    <li>Email: <a href="mailto:{{ $shop['email'] }}"><b>{{ $shop['email'] }}</b></a></li>
                </ul>
            {!! $shop['gioi_thieu'] !!}
            @if($shop['photos'])
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
                                            @foreach($shop['photos'] as $photo)
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
@include('Frontend.widget_doanhnghiep')
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
