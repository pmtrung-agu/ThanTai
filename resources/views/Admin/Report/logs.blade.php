@extends('Admin.layout')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Logs</h3>
        <hr />
        <table id="datatable" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Date</th>
        			<th>Action</th>
        			<th>Name</th>
        		</tr>
        	</thead>
        	<tbody>
        	</tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#datatable').DataTable( {
	        	"processing": true,
	          	"serverSide": true,
	          	"ajax": "{{ env('APP_URL') }}admin/logs/datatable"
	        });
    	});
    </script>
@endsection
