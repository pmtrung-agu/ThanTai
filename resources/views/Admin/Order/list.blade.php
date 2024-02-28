@extends('Admin.layout')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/jquery-toastr/jquery.toast.min.css" rel="stylesheet" />
@endsection
@section('body')
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/order" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Đơn hàng</h3>
    		<table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          	<thead>
          		<tr>
          			<th>STT</th>
                <th>Ngày đặt</th>
          			<th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng sản phẩm</th>
          			<th>Đã giao hàng</th>
          			<th>Đang chờ xử lý</th>
          			<th>Hủy</th>
          			<th class="text-center">Cập nhật tình trạng</th>
                <th class="text-center"><i class="fa fa-print"></th>
                @if(in_array('Admin', Session::get('user.roles')))
                  <th>#</th>
                @endif
          		</tr>
          	</thead>
          	<tbody>
            @if($orders)
              @foreach($orders as $key => $order)
              @php
                $quantity = 0; $quantity_delivery = 0; $quantity_cancel = 0; $quantity_processing = 0;
                if($order['products']) {
                  foreach($order['products'] as $p){
                    $quantity += $p['quantity'];
                    if($p['status'] == 0)$quantity_processing += $p['quantity'];
                    if($p['status'] == 1)$quantity_delivery += $p['quantity'];
                    if($p['status'] == 2)$quantity_cancel += $p['quantity'];
                  }
                }
              @endphp
              <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-center">{{ date("d/m/Y H:i", strtotime($order['created_at'])) }}</td>
                <td>{{ $order['code'] }}</td>
                <td>{{ $order['customer']['hoten']}}</td>
                <td class="text-right">{{ $quantity }}</td>
                <td class="text-right text-success"><b>{{ number_format($quantity_delivery,0,",",".") }}</b></td>
                <td class="text-right text-primary"><b>{{ number_format($quantity_processing,0,",",".")}}</b></td>
                <td class="text-right text-danger"><b>{{ number_format($quantity_cancel,0,",",".") }}</b></td>
                <td class="text-center"><a href="{{ env('APP_URL') }}admin/order/detail/{{ $order['_id'] }}"><i class="fa fa-truck text-info" style="font-size:20px;"></i></a></td>
                <td class="text-center"><a href="{{ env('APP_URL') }}admin/order/invoice/{{ $order['_id'] }}"><i class="fa fa-print" style="font-size:20px;"></a></td>
                  @if(in_array('Admin', Session::get('user.roles')))
                  <td class="text-center"><a href="{{ env('APP_URL') }}admin/order/delete/{{ $order['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" style="font-size:20px;"><i class="fa fa-trash text-danger"></i></a></td>
                @endif
              </tr>
              @endforeach
            @endif
          	</tbody>
         </table>
    	</div>
    </div>
</div>
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
      @if(Session::has('msg') && Session::get('msg'))
        $.toast({
          heading: 'Thông báo',
          text: '{{ Session::get('msg') }}',
          position: 'top-right',
          loaderBg: '#da8609',
          icon: 'info',
          hideAfter: 3000,
          stack: 1
        });
      @endif
    });
  </script>
@endsection