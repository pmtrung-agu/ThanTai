<!DOCTYPE html>
<html>
<head>
    <title>Email Order Invoice</title>
    <meta charset="UTF-8">
    <style type="text/css">
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #ffffcc;
            padding: 30px;
            font-family: 'Roboto', sans-serif;
            color:#33cc99;
        }
        table {
            border: 1px solid #33cc99;
        }
        .container  a{
           color:#33cc99 !important;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{ env('APP_URL') }}assets/frontend/images/logo.png" style="float:right" />
    <h2>Thông tin đơn hàng</h2>
    <h4>Mã đơn hàng: {{ $code }}</h4>
    <h4>Họ tên khách hàng: {{ $customer['hoten'] }}</h4>
    <h4>Email: {{ $customer['email'] }}</h4>
    <h4>Điện thoại: {{ $customer['dienthoai'] }}</h4>
    <h4>Ngày đặt hàng: {{ App\Http\Controllers\ObjectController::getDate($customer['ngaydathang'], "d/m/Y H:i") }}</h4>
    <h4>Ghi chú: {{ $customer['ghichu'] }}</h4>
    <h2>Sản phẩm</h2>
    @if($products)
    @php
        $thanhtien = 0;
    @endphp
    <table border="1" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
        </tr>
        @foreach($products as $key => $product)
        @php
            $thanhtien += $product['total'];
        @endphp
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $product['title'] }}</td>
            <td align="right">{{ number_format($product['quantity'],0,",",".") }}</td>
            <td align="right">{{ number_format($product['prices'],0,",",".") }}</td>
            <td align="right">{{ number_format($product['discount_amount'],0,",",".") }}</td>
            <td align="right">{{ number_format($product['total'],0,",",".") }}</td>
        </tr>
        @endforeach
    </table>
    @endif
    <h2 style="text-align:right;">Tổng cộng: {{ number_format($thanhtien,0,",",".") }} VNĐ</h2>
    <h2 style="text-align:center;">Cám ơn bạn đã đặt hàng trên <b>CHIẾU UZU TÂN CHÂU LONG</b></h2>
</div>
</body>
</html>

