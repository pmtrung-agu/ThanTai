@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Tin tức - Sự kiện</h2>
    </div>
</div>
@if($articles)
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="latest-blog wow bounceInUp animated animated container">
            <!--exclude For version 6 -->
            <div class="new_title">
                <h2>Tin tức sự kiện</h2>
            </div>
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                <div class="blog_inner">
                    <div class="blog-img">
                        <a href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">
                            @if(isset($article['photos'][0]['aliasname']) && $article['photos'][0]['aliasname'])
                                <img src="{{ env('APP_URL') }}storage/images/thumb_785x476/{{ $article['photos'][0]['aliasname'] }}" alt="{{ $article['title'] }}" title="{{ $article['title'] }}">
                            @else
                                <img src="{{ env('APP_URL') }}assets/frontend/images/default_875x476.jpg" alt="{{ $article['title'] }}" title="{{ $article['title'] }}">
                            @endif
                        </a>
                        <div class="mask"> <a class="info" href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">Xem tiếp</a> </div>
                    </div>
                    <div class="blog-info">
                        <div class="post-date">
                            <time class="entry-date">{{ Carbon\Carbon::parse($article['updated_at'])->format("d.m") }}<br />{{ Carbon\Carbon::parse($article['updated_at'])->format("Y") }}</time>
                        </div>
                        <h3 style="height:50px;"><a href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">{{ str_limit($article['title'],65) }}</a></h3>
                        <div style="height:200px;text-align:justify;">{!! str_limit($article['description'],400) !!}</div>
                        <a class="readmore" href="{{ env('APP_URL') }}chi-tiet-tin-tuc/{{ $article['slug'] }}">Xem tiếp</a> </div>
                </div>
            </div>
            @endforeach

        </div>
        </div>
    </div>
</div>
@endif
@include('Frontend.widget_doanhnghiep')
<!--col2-layout-->
@endsection