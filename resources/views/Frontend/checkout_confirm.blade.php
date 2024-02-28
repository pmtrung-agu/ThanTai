@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Đặt hàng thành công</h2>
    </div>
</div>
<div class="main-container col1-layout wow bounceInUp animated">
    <div class="main">
        <div class="cart wow bounceInUp animated">
            <div class="table-responsive shopping-cart-tbl  container">
                <h1>Đặt hành thành công</h1>
                <h3>Quí khách đã đặt hành thành công trên CHIẾU UZU TÂN CHÂU LONG, chúng tôi sẽ liên hệ quí khách sớm nhất có thể để hoàn thành giao dịch của quí khách</h3>
                <h3>Chân thành cám ơn!</h3>
                <button type="button" title="Continue Shopping" class="button btn-continue" onClick="window.location='{{ env('APP_URL') }}'"><span><span>Tiếp tục mua hàng</span></span></button>
            </div>
        </div>
    </div>
</div>
@endsection
