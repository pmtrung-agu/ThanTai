@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Quy trình thanh toán</h2>
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
                                        <h2 class="blog_entry-title">QUY TRÌNH THANH TOÁN</h2>
                                    </div>
                                    <!--blog_entry-header-inner-->
                                </header>
                                <!--blog_entry-header clearfix-->
                                <div class="entry-content">
                                    <div class="entry-content" style="text-align:justify;font-size:18px;color:#000;">
                                        <p><b>Người mua và người bán có thể tham khảo các phương thức thanh toán sau đây và lựa chọn phương thức áp dụng phù hợp (theo thỏa thuận giữa 02 bên):</b></p>
                                        <ul>
                                            <li><b>Cách 1:</b> Thanh toán khi nhận hàng (COD – giao hàng và thu tiền tận nơi);</li>
                                            <li><b>Cách 2:</b> Thanh toán qua thẻ tín dụng, thẻ ghi nợ;</li>
                                            <li><b>Cách 3:</b> Thanh toán bằng thẻ ATM nội địa;</li>
                                            <li><b>Cách 4:</b> Chuyển tiền trực tiếp vào tài khoản người bán;</li>
                                            <li><b>Cách 5:</b> Thanh toán trực tiếp bằng tiền mặt tại cửa hàng;</li>
                                            <li><b>Cách 6:</b> Thanh toán qua đơn vị trung gian.</li>
                                        </ul>
                                        <p>Với mỗi phương thức thanh toán được lựa chọn, Người mua thực hiện thanh toán tiền và chi phí mua hàng (gọi là “tiền hàng”) cho người giao hàng bằng tiền mặt hoặc thực hiện thanh toán thông qua thẻ thanh toán, tài khoản ngân hàng,…</p>
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
