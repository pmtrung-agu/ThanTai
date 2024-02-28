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
            <h1 class="widget-title">{{ $logistic['title'] }}</h1>
    		@if($logistic['dinhkem'])
            <ul>
                @foreach($logistic['dinhkem'] as $key => $dk)
                    <li style="font-size:20px;"><a href="{{ env('APP_URL') }}logistic-download/{{ $logistic['_id'] }}/{{ $key }}">{{ $dk['title'] }}</a></li>
                @endforeach
            </ul>
            @endif
    		@else 
    			<h3>Đang cập nhật, vui lòng quay lại sau.</h3>
    		@endif
    	</div>
    </div>
</div>
@endsection