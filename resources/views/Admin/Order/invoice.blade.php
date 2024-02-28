@extends('Admin.layout')
@section('title', 'Thông tin đơn hàng')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="clearfix">
                <div class="pull-left mb-3">
                    <img src="{{ env('APP_URL') }}assets/backend/images/logo.png" alt="" height="28">
                </div>
                <div class="pull-right">
                    <h4 class="m-0 d-print-none">Đơn hàng</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                  <div class="pull-left mt-3">
                    <p><b>Xin chào, {{ $order['customer']['hoten'] }}</b></p>
                    <p class="text-muted">Cảm ơn rất nhiều vì bạn tiếp tục mua sản phẩm của chúng tôi. Công ty chúng tôi hứa sẽ cung cấp các sản phẩm chất lượng cao cho bạn cũng như dịch vụ khách hàng xuất sắc cho mọi giao dịch.. </p>
                  </div>

                </div>
                <!-- end col -->
                <div class="col-4 offset-2">
                  <div class="mt-3 pull-right">
                    <p class="m-b-10"><strong>Mã đơn hàng: </strong> {{ $order['code'] }}</p>
                    <p class="m-b-10"><strong>Ngày đặt hàng: </strong> {{ Carbon\Carbon::parse($order['created_at'])->format('d/m/Y H:i') }}</p>
                  </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row mt-3">
                <div class="col-6">
                  <h6>Thông tin đơn hàng</h6>
                  <address class="line-h-24">
                    {{ $order['customer']['hoten'] }}<br>
                    Địa chỉ: {{ $order['customer']['diachi'] }}<br>
                    Điện thoại: {{ $order['customer']['dienthoai'] }}<br>
                    Email: {{ $order['customer']['email'] }}
                  </address>
                </div>
                <div class="col-6">
                  <h6>Ghi chú đơn hàng</h6>
                  <address class="line-h-24">
                    {{ $order['customer']['ghichu'] }}
                  </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @php $total = 0; @endphp
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th class="text-right">Thành tiền</th>
                                    @if(in_array('Admin', Session::get('user.roles')))
                                      <th>Người bán</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                              @if($order['products'])
                              @foreach($order['products'] as $k => $p)
                              @php
                                if($p['status'] == 0) $text = 'text-primary';
                                if($p['status'] == 1) $text = 'text-success';
                                if($p['status'] == 2) $text = 'text-danger';
                                $total += $p['total'];
                              @endphp
                              @if($p['id_seller'] == Session::get('user._id') || App\Http\Controllers\AuthController::isRole('Admin'))
                                <tr class="{{ $text }}">
                                    <td>{{ $k+1 }}
                                      <input type="hidden" name="key_sanpham[]" value="{{ $k }}">
                                    </td>
                                    <td><b>{{ $p['title'] }}</b></td>
                                    <td>{{ $p['quantity'] }}</td>
                                    <td>
                                      @if(isset($p['discount_amount']) && $p['discount_amount'] > 0)
                                        <span style="color:rgb(33, 37, 41);"><strike>{{ number_format($p['prices'],0,",",".") }}</strike></span>
                                        {{ number_format($p['prices'] - $p['discount_amount'],0,",",".") }}
                                      @else
                                        {{ number_format($p['prices'],0,",",".") }}
                                      @endif
                                    </td>
                                    <td class="text-right">{{ number_format($p['total'],0,",",".") }}</td>
                                    @if(in_array('Admin', Session::get('user.roles')))
                                    @php
                                      $seller = App\Models\User::find($p['id_seller']);
                                    @endphp
                                      <td>
                                        <a href="{{ env('APP_URL') }}doanh-nghiep/{{ $seller['slug'] }}" target="_blank">
                                          {{ $seller['store'] }} [{{ $seller['email'] }}]
                                        </a>
                                      </td>
                                    @endif
                                </tr>
                              @endif
                              @endforeach
                              @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @php
              $shipping = isset($order['shipping']) ? $order['shipping'] : 0;
            @endphp
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <div class="float-right">
                      <h5>Tổng đơn hàng: {{ number_format($total,0,",",".") }} VNĐ</h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="float-right">
                      <h5>Phí vận chuyển: {{ number_format($shipping,0,",",".") }} VNĐ</h5>
                    </div>
                    <div class="clearfix"></div>
                    <div class="float-right">
                        <h3>TỔNG CỘNG: {{ number_format($total+$shipping,0,",",".") }} VNĐ</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="hidden-print mt-4 mb-4">
                <div class="text-right">
                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
@endsection