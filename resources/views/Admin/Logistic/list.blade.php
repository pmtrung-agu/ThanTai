@extends('Admin.layout')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.css">
@endsection
@section('body')
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/logistic/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Hạ tầng Thương mại biên giới và hệ thống dịch vụ Logistic</h3>
    		<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Đính kèm</th>
                    <th class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
            	@if($list)
            		@foreach($list as $key => $l)
            		<tr>
            			<td>{{ $key+1 }}</td>
            			<td>{{ $l['title'] }}</td>
            			<td class="text-center"><span class="badge badge-primary" style="padding:0px 20px 0px 20px;"><h5>{{ count($l['dinhkem']) }}</h5></span></td>
            			<td class="text-center">
            				<a href="{{ env('APP_URL') }}admin/logistic/delete/{{$l['_id']}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="{{ env('APP_URL') }}admin/logistic/edit/{{$l['_id']}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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
