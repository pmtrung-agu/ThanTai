@extends('Frontend.layout')
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Giỏ hàng</h2>
    </div>
</div>
@if(Session::get('cart_items'))
@php
    $total = 0;
@endphp
    <div class="main-container col1-layout wow bounceInUp animated">
        <div class="main">
            <div class="cart wow bounceInUp animated">
                <div class="table-responsive shopping-cart-tbl  container">
                    <form action="{{ env('APP_URL') }}cart/update" method="post">
                        {{ csrf_field()}}
                        <fieldset>
                            <table id="shopping-cart-table" class="data-table cart-table table-striped">
                                <thead>
                                    <tr class="first last">
                                        <th rowspan="1">&nbsp;</th>
                                        <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                                        <th class="a-right" colspan="1"><span class="nobr">Đơn giá</span></th>
                                        <th rowspan="1" class="a-center">Số lượng</th>
                                        <th class="a-right" colspan="1">Thành tiền</th>
                                        <th rowspan="1" class="a-center">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="first last">
                                        <td colspan="50" class="a-right last">
                                            <button type="button" title="Continue Shopping" class="button btn-continue" onClick="window.location='{{ env('APP_URL') }}'"><span><span>Tiếp tục mua hàng</span></span></button>
                                            <button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Cập nhật giỏ hàng</span></span></button>
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach(Session::get('cart_items') as $item)
                                    @php
                                        $thanhtien = 0; $total_discount = 0;
                                        $p = App\Models\Product::where('_id', '=', $item['id_sanpham'])->take(1)->get()->toArray()[0];
                                        if(isset($p['photos'][0]['aliasname']) && $p['photos'][0]['aliasname']){
                                            $img_path = env('APP_URL').'storage/images/thumb_800x800/'.$p['photos'][0]['aliasname'];
                                        } else {
                                            $img_path = env('APP_URL').'assets/frontend/products-images/p8.jpg';
                                        }
                                        $current_date = App\Http\Controllers\ObjectController::setDate();
                                        $pro = App\Models\Promotion::where('id_products',$p['_id'])->where('date_from','<=', $current_date)->where('date_to', '>=', $current_date)->first();
                                        if($pro && $pro->count() > 0){
                                            if($pro['discount'] == '%'){
                                                $total_discount = $p['prices'] * $pro['amount']/100;
                                            } else {
                                                $total_discount = $pro['amount'];
                                            }
                                        }
                                        $thanhtien = $item['soluong'] * ($p['prices'] - $total_discount); $total += $thanhtien;
                                    @endphp
                                    <tr class="item_{{ $p['_id'] }}">
                                        <td class="image hidden-table">
                                            <input type="hidden" name="id_sanpham[]" value="{{ $item['id_sanpham'] }}">
                                            <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}" title="{{ $p['title'] }}" class="product-image"><img src="{{ $img_path }}" width="75" alt="{{ $p['title'] }}"></a></td>
                                        <td>
                                            <h2 class="product-name">
                                                <a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $p['slug'] }}">{{ $p['title'] }}</a>
                                            </h2>
                                        </td>
                                        <td class="a-right hidden-table">
                                            <span class="cart-price">
                                                @if($pro && $pro->count() > 0)
                                                    <span class="price"><strike>{{ number_format($p['prices'],0,",",".") }} VNĐ</strike></span>
                                                    <span class="price"><b>{{ number_format($p['prices']-$total_discount,0,",",".") }} VNĐ</b></span>
                                                @else
                                                    <span class="price">{{ number_format($p['prices'],0,",",".") }} VNĐ</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td class="a-center movewishlist">
                                            <input type="number" name="soluong[]" value="{{ $item['soluong'] }}" min="1" size="4" title="Số lượng" class="input-text qty" maxlength="12">
                                        </td>
                                        <td class="a-right movewishlist">
                                            <span class="cart-price">
                                                <span class="price">{{ number_format($thanhtien,0,",",".") }} VNĐ</span>
                                            </span>
                                        </td>
                                        <td class="a-center last">
                                            <a href="cart/remove/{{ $p['_id'] }}" name="{{ $p['_id'] }}" onclick="return false;" title="Remove item" class="remove-cart-item button remove-item"><span><span>Remove item</span></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div>
                <form action="{{ env('APP_URL') }}thanh-toan" method="post" id="chechoutForm">
                {{ csrf_field() }}
                <!-- BEGIN CART COLLATERALS -->
                <div class="cart-collaterals container">
                    <!-- BEGIN COL2 SEL COL 1 -->
                    <!-- BEGIN TOTALS COL 2 -->
                    <div class="col-sm-4">
                        <div class="shipping">
                            <h3>Thông tin giao hàng</h3>
                            <p>Vui lòng điền đầy đũ thông tin đề giao hàng.</p>
                            <ul class="form-list">
                                <li>
                                    <div class="input-box">
                                        <input class="input-text validate-postcode" type="text" id="hoten" name="hoten" value="{{ Session::get('customer.name') }}" required placeholder="Họ tên">
                                    </div>
                                </li>
                                <li>
                                    <div class="input-box">
                                        <input class="input-text validate-postcode" type="tel" id="dienthoai" name="dienthoai" value="{{ Session::get('customer.phone') }}" required placeholder="Điện thoại">
                                    </div>
                                </li>
                                <li>
                                    <div class="input-box">
                                        <input class="input-text validate-postcode" type="email" id="email" name="email" value="{{ Session::get('customer.email') }}" placeholder="Email">
                                    </div>
                                </li>
                                <p>Địa chỉ</p>
                                <li>
                                    <div class="input-box">
                                        <select name="diachi[]" id="address_1" class="diachi validate-select" title="Tỉnh" required>
                                            <option value="">Chọn tỉnh</option>
                                            @if($provinces)
                                                @foreach($provinces as $tinh)
                                                @php
                                                    $u_tinh = Session::get('customer.address.0') != null ? Session::get('customer.address.0') : '89';
                                                    $selected = $tinh['ma'] == $u_tinh ? ' selected' : '';
                                                @endphp
                                                    <option value="{{ $tinh['ma'] }}" {{ $selected }}>{{ $tinh['ten'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="input-box">
                                        @php
                                            $huyen = App\Models\Address::where('matructhuoc','=',$u_tinh)->get()->toArray();
                                        @endphp
                                        <select name="diachi[]" id="address_2" class="diachi validate-select" title="Huyện" required>
                                            <option value="">Chọn Huyện</option>
                                            @foreach($huyen as $h)
                                                <option value="{{ $h['ma'] }}">{{ $h['ten'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="input-box">
                                        <select name="diachi[]" id="address_3" class="validate-select" title="Xã" required>
                                            <option value="">Chọn Xã</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="input-box">
                                        <input class="input-text validate-postcode" type="text" id="address_4" name="diachi[]" value="{{ Session::get('customer.address.3') }}" required placeholder="Đường, số nhà,">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="discount">
                            <h3>Ghi chú đơn hàng</h3>
                            <label for="coupon_code">Ghi thông tin cần thiết cho đơn hàng.</label>
                            <textarea class="input-text fullwidth" type="text" id="ghichu" name="ghichu" value="" placeholder="Ghi chú đơn hàng" style="width:100%;height:230px;"></textarea>
                            @if(!Session::get('customer'))
                            <h3 style="margin-bottom:5px;">Có tài khoản hoặc chưa</h3>
                            <button type="button" title="Đăng nhập" class="button coupon " onClick="window.location='{{ env('APP_URL') }}dang-nhap?url=gio-hang'"><span>Đăng nhập hoặc đăng ký tài khoản</span></button>
                            @endif
                        </div>
                    </div>
                    <!--col-sm-4-->
                    <div class="col-sm-4">
                        <div class="totals">
                            <div class="inner">
                                <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                                    <colgroup>
                                        <col>
                                        <col width="1">
                                    </colgroup>
                                    <tfoot>
                                        <tr>
                                            <td style="" class="a-left" colspan="1">Phí vận chuyển</td>
                                            <td style="" class="a-right">
                                                <span class="price" id="shipping_text">50.000 VNĐ</span>
                                                <input type="hidden" name="shipping" id="shipping" value="{{ 50000 }}" placeholder="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="" class="a-left" colspan="1">
                                                <strong>Tổng cộng</strong>
                                            </td>
                                            <td style="" class="a-right">
                                                <input type="hidden" name="sub_total" id="sub_total" value="{{ $total }}" placeholder="">
                                                <strong><span class="price" id="total">{{ number_format($total+50000,0,",",".") }} VNĐ</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <ul class="checkout">
                                    <li>
                                        <button type="submit" title="Proceed to Checkout" class="button btn-proceed-checkout"><span>Đồng ý & Đặt hàng</span></button>                                        
                                    </li><br>
                                    <li style="font-weight:bold;color:#ff0000;">Miễn phí giao hàng đối với địa chỉ giao hàng ở Long Xuyên, An Giang và hóa đơn từ 200.000 VNĐ trở lên.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@else
    <div class="main-container col1-layout wow bounceInUp animated">
        <div class="main">
            <div class="cart wow bounceInUp animated">
                <div class="table-responsive shopping-cart-tbl  container">
                    <h1>Không có sản phẩm trong giỏ hàng</h1>
                    <button type="button" title="Continue Shopping" class="button btn-continue" onClick="window.location='{{ env('APP_URL') }}'"><span><span>Tiếp tục mua hàng</span></span></button>
                </div>
            </div>
        </div>
    </div>
@endif
<!--col1-layout-->
@endsection
@section('js')
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/js/script.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            add_to_cart("{{ env('APP_URL') }}");
            @if (Session::get('customer.address.0'))
                jQuery.get("{{ env('APP_URL') }}address/get/{{ Session::get('customer.address.0') }}/{{ Session::get('customer.address.1') }}", function(huyen){
                    jQuery("#address_2").html(huyen);
                });
            @endif
            @if(Session::get('customer.address.1'))
              jQuery.get("{{ env('APP_URL') }}address/get/{{ Session::get('customer.address.1') }}/{{ Session::get('customer.address.2') }}", function(xa){
                jQuery("#address_3").html(xa);
              });
            @endif
            chontinh("{{ env('APP_URL') }}");chonhuyen("{{ env('APP_URL') }}");
            jQuery(".diachi").change(function(){
                var a1 = jQuery("#address_1").val();
                var a2 = jQuery("#address_2").val();
                var sub_total = jQuery("#sub_total").val();
                sub_total = parseFloat(sub_total);
                if(a1 == '89' && a2 == '883' && sub_total >= 200000){
                    var total = sub_total;
                    var shipping = 0;
                } else {
                    var total = sub_total + 50000;
                    var shipping = 50000;
                }
                jQuery("#total").text(numberWithCommas(total) + " VNĐ");
                jQuery("#shipping").val(shipping);
                jQuery("#shipping_text").text(numberWithCommas(shipping) + " VNĐ");
            });
        });
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
@endsection
