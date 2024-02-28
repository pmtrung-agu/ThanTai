@extends('Admin.layout')
@section('body')
<div class="row">
  	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/shopping/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Điểm mua sắm đạt chuẩn phục vụ khách du lịch</h3>
    		<table id="datatable" class="table table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:11px;">
    			<thead>
		         	<tr>
		            	<th data-sort-initial="true" data-toggle="true">STT</th>
		            	<th>Tên</th>
		            	<th>Địa chỉ</th>
		            	<th>Điện thoại</th>
		            	<th>Email</th>
		            	<th data-sort-ignore="true" class="text-center">#</th>
		          	</tr>
		        </thead>
		        <tbody>
		        @if($shopping)
			        @foreach($shopping as $key => $shop)
			        	<tr>
			        		<td>{{ $key+1 }}</td>
			        		<td>{{ $shop['title'] }}</td>
			        		<td>{{ App\Http\Controllers\AddressController::getDiaChi($shop['address']) }}</td>
			        		<td>{{ $shop['phone'] }}</td>
			        		<td>{{ $shop['email'] }}</td>
			        		<td class="text-center">
		                      <a href="{{ env('APP_URL') }}admin/shopping/delete/{{ $shop['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i></a>
		                      <a href="{{ env('APP_URL') }}admin/shopping/edit/{{ $shop['_id'] }}" class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i></a>
		                  </td>
			        	</tr>
			        @endforeach
		        @endif
		        </tbody>
    		</table>
    	</div>
	</div>
</div>
@endsection