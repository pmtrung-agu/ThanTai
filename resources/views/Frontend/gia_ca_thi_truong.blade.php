@extends('Frontend.Uzu.layout')
@section('css')
<style type="text/css">
	.table td {
		padding: 15px 10px 15px 10px !important;
	}
</style>
@endsection
@section('body')
<div class="page-heading">
    <div class="page-title">
        <h2>Giá cả thị trường</h2>
    </div>
</div>
<div class="main container col-main" style="padding: 30px 10px 50px 0px;">
    <div class="row">
    	<div class="col-md-12">
    		@if($marketprice)
    		<table class="table" style="font-size:15px;">
    			<thead>
    				<tr>
    					<th align="center">STT</th>
    					<th>Tên</th>
    					<th>Từ ngày</th>
    					<th>Đến ngày</th>
    					<th>Xem</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($marketprice as $key => $mp)
    				<tr>
    					<td>{{ $key+1 }}</td>
    					<td>{{ $mp['title'] }}</td>
    					<td>{{ $mp['tungay'] }}</td>
    					<td>{{ $mp['denngay'] }}</td>
    					<td>
    						<a href="{{ env('APP_URL') }}gia-ca-thi-truong/download/{{ $mp['_id'] }}" class="button">Xem</a>
    					</td>
    				</tr>
    				@endforeach
    			</tbody>
    		</table>
    		@else 
    			<h3>Đang cập nhật, vui lòng quay lại sau.</h3>
    		@endif
    	</div>
    </div>
</div>
@endsection