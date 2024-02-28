@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Chính sách giao nhận - vận chuyển</h2>
    </div>
</div>
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-left sidebar col-sm-3 blog-side">
                @include('Frontend.Page.widget_tin_tuc')
            </div>
            <div class="col-main col-sm-9 wow bounceInUp animated animated" style="visibility: visible;">
                <!--<div class="page-title"><h2></h2></div>-->
                <div id="main" class="blog-wrapper">
                    <div id="primary" class="site-content">
                        <div id="content" role="main">
                            <article id="post-29" class="blog_entry clearfix">
                                <header class="blog_entry-header clearfix">
                                    <div class="blog_entry-header-inner">
                                        <h2 class="blog_entry-title">CHÍNH SÁCH GIAO NHẬN, VẬN CHUYỂN</h2>
                                    </div>
                                    <!--blog_entry-header-inner-->
                                </header>
                                <!--blog_entry-header clearfix-->
                                <div class="entry-content">
                                    <div class="entry-content" style="text-align:justify;font-size:18px;color:#000;">
                                        <p>Người bán/nhà cung cấp khi đăng tin bài rao bán sản phẩm, dịch vụ khuyến mại phải đưa đầy đủ thông tin về chính sách vận chuyển, thanh toán.</p>
                                        <p>Người mua và người bán/nhà cung cấp tự thỏa thuận về phương thức giao nhận sản phẩm/dịch vụ (có thể giao trực tiếp, có thể gửi qua bưu điện, thuê bên thứ ba chuyển phát, tùy thuộc vào 2 bên thỏa thuận với nhau về việc giao nhận).</p>
                                        <p style="text-align:right;"><b>SÀN GIAO DỊCH THƯƠNG MẠI ĐIỆN TỬ TỈNH AN GIANG</b></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
