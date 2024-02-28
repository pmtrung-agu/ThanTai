@extends('Admin.layout')
@section('css')
	<link href="{{ env('APP_URL') }}assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="{{ env('APP_URL') }}assets/backend/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
@endsection
@section('body')
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card-box">
			<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/promotion" class="btn btn-info"><i class="fa fa-reply-all"></i></a> Thêm Khuyến mãi</h3>
			<form action="{{ env('APP_URL') }}admin/promotion/create" method="POST" id="promotion_form">
				{{ csrf_field() }}
				<div class="form-body">
		            <hr />
		            @if($errors->any())
		                <div class="alert alert-success">
		                    <ul>
		                        @foreach ($errors->all() as $error)
		                            <li>{{ $error }}</li>
		                        @endforeach
		                    </ul>
		                </div>
		            @endif
		            <div class="row form-group">
		            	<label class="control-label col-md-2 text-right p-t-10">Chọn sản phẩm</label>
		            	<div class="col-12 col-md-10">
		            		<select name="id_products[]" id="id_products" multiple required class="form-control select2" data-placeholder="Chọn sản phẩm khuyến mãi">
		            			<option value=""></option>
		            			@if($products)
			            			@foreach($products as $product)
			            				<option value="{{ $product['_id'] }}" @if(old('id_products') != null && in_array($product['_id'], old('id_products'))) selected @endif>{{ $product['title'] }} - {{ number_format($product['prices'],0,",",".") }} VNĐ</option>
			            			@endforeach
		            			@endif
		            		</select>
		            	</div>
		            </div>
		            <div class="row form-group">
		            	<label class="control-label col-md-2 text-right p-t-10">Từ ngày</label>
		            	<div class="col-12 col-md-4">
		            		<input type="text" name="date_from" id="date_from" required value="{{ old('date_from') }}" placeholder="" class="form-control datetimepicker" autocomplete="off">
		            	</div>
		            	<label class="control-label col-md-2 text-right p-t-10">Đến ngày</label>
		            	<div class="col-12 col-md-4">
		            		<input type="text" name="date_to" id="date_to" required value="{{ old('date_to') }}" placeholder="" class="form-control datetimepicker" autocomplete="off">
		            	</div>
		            </div>
		            @php
		            	$discount = old('discount') != null ? old('discount') : '%';
		            @endphp
		            <div class="row form-group">
		            	<label class="control-label col-md-2 text-right p-t-10">Loại khuyến mãi</label>
		            	<div class="col-12 col-md-4">
		            		<select name="discount" id="discount" class="form-control select2">
		            			<option value="%" @if($discount == '%') selected @endif>Phần trăm (%)</option>
		            			<option value="$" @if($discount == '$') selected @endif>Số tiền</option>
		            		</select>
		            	</div>
		            	<label class="control-label col-md-2 text-right p-t-10">Số tiền/Phần trăm</label>
		            	<div class="col-12 col-md-4">
		            		<input type="text" name="amount" value="{{ old('amount') }}" required placeholder="" class="form-control number">
		            	</div>
		            </div>
	        	</div>
	        	<div class="form-actions">
	            	<a href="{{ env('APP_URL') }}admin/promotion" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
	            	<button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
	          	</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
	<script src="{{ env('APP_URL') }}assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
	 <script src="{{ env('APP_URL') }}assets/backend/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	 <script src="{{ env('APP_URL') }}assets/backend/plugins/number/jquery.number.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".select2").select2();
			$(".datetimepicker").datetimepicker({
            	format: 'yyyy-mm-dd h:i:s'
        	});
        	$('.number').number(true, 0, ',', '.');
		});
	</script>
@endsection