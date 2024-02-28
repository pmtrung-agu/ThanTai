@extends('Admin.layout')
@section('body')
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/promotion/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách Khuyến mãi</h3>
			<hr />
			<table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-sm" cellspacing="0">
				<thead>
					<tr>
						<th>STT</th>
						<th>Từ ngày</th>
						<th>Đến ngày</th>
						<th>Sản phẩm</th>
						<th>Số tiên/%</th>
						<th width="100">#</th>
					</tr>
				</thead>
				<tbody>
					@if($promotions)
						@foreach($promotions as $key => $pro)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ App\Http\Controllers\ObjectController::getDate($pro['date_from'], "d/m/Y H:i:s") }}</td>
								<td>{{ App\Http\Controllers\ObjectController::getDate($pro['date_to'], "d/m/Y H:i:s") }}</td>
								<td>
									@foreach($pro['id_products'] as $p)
										@php
											$product = App\Models\Product::find($p);
										@endphp
										<span class="badge badge-success" style="padding: 5px 5px 5px 5px;font-size:12px;margin-top:2px;">
											{{ $product['title'] }}  - {{ number_format($product['prices'],0,",",".") }}
										</span>
									@endforeach
								</td>
								<td class="text-center">
									@if($pro['discount'] == '%') {{ $pro['amount'] }}% @else {{ number_format($pro['amount'],0,",",".") }} @endif
								</td>
								<td class="text-center" style="vertical-align:middle;">
									<a href="{{ env('APP_URL') }}admin/promotion/delete/{{ $pro['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i></a>
									<a href="{{ env('APP_URL') }}admin/promotion/edit/{{ $pro['_id'] }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			{{ $promotions->withPath(env('APP_URL').'admin/promotion') }}
		</div>
	</div>
</div>

@endsection