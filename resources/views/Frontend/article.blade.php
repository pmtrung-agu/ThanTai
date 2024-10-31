@extends('Frontend.Uzu.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/plugins/photobox/photobox.min.css">
@endsection
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Tin tức</h2>
    </div>
</div>
@if($article)
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-left sidebar col-sm-3 blog-side">
                <div id="secondary" class="widget_wrapper13" role="complementary">
                    <div id="recent-posts-4" class="popular-posts widget widget__sidebar wow bounceInUp animated animated" style="visibility: visible;">
                        <h2 class="widget-title">Tin liên quan</h2>
                        <div class="widget-content">
                            @if($relates)
                            <ul class="posts-list unstyled clearfix">
                                @foreach($relates as $relate)
                                <li>
                                    <figure class="featured-thumb">
                                        <a href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $relate['slug'] }}">
                                         @if(isset($relate['photos'][0]['aliasname']) && $relate['photos'][0]['aliasname'])
                                                <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{ $relate['photos'][0]['aliasname'] }}" alt="{{ $relate['title'] }}" title="{{ $relate['title'] }}">
                                            @else
                                                <img src="{{ env('APP_URL') }}assets/frontend/images/default_875x476.jpg" alt="{{ $relate['title'] }}" title="{{ $relate['title'] }}">
                                            @endif
                                    </figure>
                                    <!--featured-thumb-->
                                    <div class="content-info">
                                        <h4><a href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $relate['slug'] }}" title="{{ $relate['title'] }}" style="font-size: 15px;color:#000;font-weight:700;font-style:normal !important;line-height:20px;">{{ $relate['title'] }}</a></h4>
                                        <p class="post-meta" style="font-size:15px;"><i class="icon-calendar"></i>
                                            <time class="entry-date" datetime="{{ $relate['updated_at'] }}">{{ Carbon\Carbon::parse($relate['updated_at'])->format("d/m/Y H:i") }}</time>
                                            .</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <!--widget-content-->
                    </div>
                </div>
                @include('Frontend.widget_lienket')
            </div>
            <div class="col-main col-sm-9 wow bounceInUp animated animated" style="visibility: visible;">
                <!--<div class="page-title"><h2></h2></div>-->
                <div id="main" class="blog-wrapper">
                    <div id="primary" class="site-content">
                        <div id="content" role="main">
                            <article id="post-29" class="blog_entry clearfix">
                                <header class="blog_entry-header clearfix">
                                    <div class="blog_entry-header-inner">
                                        <h2 class="blog_entry-title">{{ $article['title'] }}</h2>
                                    </div>
                                    <!--blog_entry-header-inner-->
                                </header>
                                <!--blog_entry-header clearfix-->
                                <div class="entry-content">
                                    <div class="entry-content" style="text-align:justify;font-size:18px;color:#000;">
                                        <p><b>{!! $article['description'] !!}</b></p>
                                        {!! $article['contents'] !!}
                                    </div>
                                </div>
                                @if($article['photos'])
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
                                                            @foreach($article['photos'] as $photo)
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
                            </article>
                        </div>
                    </div>
                </div>
                <!--#main wrapper grid_8-->
            </div>
            <!--col-main col-sm-9-->
        </div>
    </div>
    <!--main-container-->
</div>
@include('Frontend.widget_doanhnghiep')
@endif
<!--col2-layout-->
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