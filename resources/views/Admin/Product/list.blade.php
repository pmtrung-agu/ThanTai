@extends('Admin.layout')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.css">
@endsection
@section('body')
<div class="row">
	<div class="col-12">
    	<div class="card-box">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/product/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách sản phẩm</h3>
        {{ $products->withPath(env('APP_URL').'admin/product') }}
    		<table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-sm" cellspacing="0">
          	<thead>
          		<tr>
          			<th>STT</th>
          			<th>Hình</th>
                <th>Mã sản phẩm</th>
          			<th>Tên</th>
          			<th>Giá</th>
          			<th>Tình trạng</th>
                @if(in_array('Admin', Session::get('user.roles')) ||in_array('Manager', Session::get('user.roles')))
                  <th>Người bán</th>
                @endif
          			<th>#</th>
          		</tr>
          	</thead>
          	<tbody>
            @if($products)
              @foreach($products as $k => $product)
          		<tr>
          			<td>{{ $k+1 }}</td>
          			<td class="text-center">
                  @if(isset($product['photos'][0]['aliasname']) && $product['photos'][0]['aliasname'])
                    <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{ $product['photos'][0]['aliasname'] }}" style="height:30px;"/>
                  @else
                    <img src="{{ env('APP_URL') }}assets/backend/images/logo_sm.png" style="height:30px;"/>
                  @endif
                </td>
                <td><a href="{{ env('APP_URL') }}chi-tiet-san-pham/{{ $product['slug'] }}" target="_blank">{{ $product['code'] }}</a></td>
          			<td>{{ $product['title'] }}</td>
          			<td class="text-right">{{ number_format($product['prices'],0, ",", ".") }}</td>
          			<td class="text-center">
                  <input type="checkbox" name="{{ $product['_id'] }}" class="js-switch status" data-plugin="switchery" @if($product['status'] == 1) checked="checked" @endif data-size="small" data-color="#009efb" value="1"/>
                </td>
                @if(in_array('Admin', Session::get('user.roles')) ||in_array('Manager', Session::get('user.roles')))
                  <td>
                    @php
                      $seller = App\Models\User::find($product['id_seller']);
                      echo $seller['store'] ? $seller['store'] : $seller['email'];
                    @endphp
                  </td>
                @endif
          			<td class="text-center">
                  <a href="{{ env('APP_URL') }}admin/product/delete/{{ $product['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                  <a href="{{ env('APP_URL') }}admin/product/edit/{{ $product['_id'] }}" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                </td>
          		</tr>
              @endforeach
            @endif
          </tbody>
        </table>
        {{ $products->withPath(env('APP_URL').'admin/product') }}
    	</div>
    </div>
</div>
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
      /*$('#responsive-datatable').DataTable();*/
      $(".status").change(function(){
        var id = $(this).attr("name");
        $.get("{{ env('APP_URL') }}admin/product/update-status/"+id);
      });
      
    });
  </script>
@endsection
