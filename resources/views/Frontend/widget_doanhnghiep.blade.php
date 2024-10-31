<div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div class="new_title">
                    <h2>Liên kết Đơn vị</h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        <div class="item">
                            <a href="http://angiang.gov.vn" target="_blank">
                                <div class="pro-img">
                                    <img src="{{ env('APP_URL') }}assets/frontend/images/banner/ubnd.jpg" alt="">
                                    <div class="pro-info">Cổng thông tin điện tử</div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://socongthuong.angiang.gov.vn" target="_blank">
                                <div class="pro-img">
                                    <img src="{{ env('APP_URL') }}assets/frontend/images/banner/socongthuong.jpg" alt="">
                                    <div class="pro-info">Sở Công Thương</div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://angiangfood.com" target="_blank">
                                <div class="pro-img">
                                    <img src="{{ env('APP_URL') }}assets/frontend/images/banner/truyxuat.jpg" alt="">
                                    <div class="pro-info">Truy xuất nguồn gốc sản phẩm</div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://angiangexport.com/" target="_blank">
                                <div class="pro-img">
                                    <img src="{{ env('APP_URL') }}assets/frontend/images/banner/angiangexport.jpg" alt="">
                                    <div class="pro-info">An Giang Export</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($doanhnghiep)
  <div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div class="new_title">
                    <h2>Liên kết Doanh nghiệp</h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                      @foreach($doanhnghiep as $dn)
                        @if(isset($dn['website']) && $dn['website'])
                        <div class="item">
                            <a href="{{ $dn['website'] }}" target="_blank">
                                <div class="pro-img">
                                  @if(isset($dn['photos'][0]['aliasname']) && $dn['photos'][0]['aliasname'])
                                  <img src="{{ env('APP_URL') }}storage/images/thumb_800x800/{{ $dn['photos'][0]['aliasname'] }}" alt="{{ $dn['title'] }}">
                                  @else
                                    <img src="{{ env('APP_URL') }}assets/frontend/products-images/p1.jpg" alt="{{ $dn['store'] }}">
                                  @endif
                                    <div class="pro-info">{{ Str::limit($dn['store'],25) }}</div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif