@extends('Frontend.layout')
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
        <h2>Hạ tầng Thương mại biên giới và hệ thống dịch vụ Logistic</h2>
    </div>
</div>
<div class="main container col-main" style="padding: 30px 10px 50px 0px;">
    <div class="row">
    	<div class="col-md-12">
    		@if($logistic)
    		<table class="table" style="font-size:15px;">
    			<thead>
    				<tr>
    					<th align="center">STT</th>
    					<th>Tên (Click vào xem chi tiết)</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach($logistic as $key => $log)
    				<tr>
    					<td>{{ $key+1 }}</td>
    					<td>
                            <a href="{{ env('APP_URL') }}logistic-detail/{{ $log['_id'] }}">
                                {{ $log['title'] }}</td>
                            </a>
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