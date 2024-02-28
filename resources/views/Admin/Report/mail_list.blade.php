@extends('Admin.layout')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Mail List</h3>
        <hr />
        <table id="datatable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Email</th>
        			<th>Date</th>
        			<th>#</th>
        		</tr>
        	</thead>
        	@if($emails)
        	<tbody>
        		@foreach($emails as $key => $email)
        			<tr>
        				<td>{{ $key+1 }}</td>
        				<td>{{ $email['email'] }}</td>
        				<td>{{ Carbon\Carbon::parse($email['created_at'])->format("d/m/Y H:i") }}</td>
        				<td class="text-center">
        					<a href="{{ env('APP_URL') }}admin/mail-list/delete/{{ $email['_id'] }}" class="btn btn-danger btn-sm" onclick="return confirm('Chắc chắn xóa?');"><i class="fa fa-trash"></i> Xóa</a>
        				</td>
        			</tr>
        		@endforeach
        	</tbody>
        	@endif
        </table>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#datatable').DataTable();
    	});
    </script>
@endsection