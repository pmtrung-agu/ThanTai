@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Chính sách bảo hành</h2>
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
                                        <h2 class="blog_entry-title">CHÍNH SÁCH BẢO HÀNH</h2>
                                    </div>
                                    <!--blog_entry-header-inner-->
                                </header>
                                <!--blog_entry-header clearfix-->
                                <div class="entry-content">
                                    <div class="entry-content" style="text-align:justify;font-size:18px;color:#000;">
                                        <p><b>Chỉ áp dụng đối với hàng hóa có quy định phải bảo hành của người bán hoặc nhà cung cấp:</b></p>
                                        <ul>
                                            <li>Khi tiến hành giao dịch người mua cần tìm hiểu về chính sách bảo hành hàng hóa của người bán/nhà cung cấp). Người mua phải trực tiếp liên hệ người bán/nhà cung cấp để được hỗ trợ bảo hành trong thời gian nhanh nhất. Người bán/nhà cung cấp có trách nhiệm tiếp nhận bảo hành sản phẩm dịch vụ cho người mua như trong cam kết giấy bảo hành sản phẩm. Mọi thông tin của người bán/nhà cung cấp được ghi trên phiếu biên nhận giao hàng/hóa đơn được đính kèm trong thùng hàng. Nếu người mua gặp khó khăn trong việc liên hệ người bán/nhà cung cấp, có thể gửi yêu cầu về bộ phận quản trị website sanphamangiang theo địa chỉ email sanphamangiang@gmail.com để được hỗ trợ.</li>
                                            <li>Người mua có quyền khiếu nại, khiếu kiện người bán/nhà cung cấp trong trường hợp người bán/nhà cung cấp từ chối bảo hành bảo trì sản phẩm khi đang còn trong thời hạn bảo hành bảo trì ghi trên giấy bảo hành.</li>
                                        </ul>
                                        <p>Sanphamangiang khuyến cáo người mua hàng cần kiểm tra các chính sách bảo hành, báo trì đối với hàng hóa dự định mua. sanphamangiang sẽ không chịu trách nhiệm chính trong việc bảo hành bất kỳ sản phẩm nào. Sanphamangiang chỉ hỗ trợ trong khả năng cho phép để sản phẩm của người mua được bảo hành theo chế độ của người bán/nhà cung cấp.</p>
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
