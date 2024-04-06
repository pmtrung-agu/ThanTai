<div id="secondary" class="widget_wrapper13" role="complementary">
    <div id="recent-posts-4" class="popular-posts widget widget__sidebar wow bounceInUp animated animated" style="visibility: visible;">
        <h2 class="widget-title">Tin tức mới</h2>
        <div class="widget-content">
            @if(isset($relates) && $relates)
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
