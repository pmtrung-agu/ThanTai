@extends('Admin.layout')
@section('title', 'Danh mục sản phẩm')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
        @if($id_parent && $level)
          <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/product-category/add/{{ $id_parent }}/{{ $level }}" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh mục loại sản phẩm</h3>
        @else
          <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/product-category/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Danh mục loại sản phẩm</h3>
        @endif
    		<a href="{{ env('APP_URL') }}admin/product-category" class="btn btn-success"><i class="fa fa-home"></i> ROOT</a>
          @if($lv1 && count($lv1) > 0)
            <a href="{{ env('APP_URL') }}admin/product-category/{{ $lv1[0]['_id'] }}/{{ $level-1 }}" class="btn btn-info"><i class="mdi mdi-tag"></i> {{ $lv1[0]['title'] }}</a>
          @endif
          @if($lv2 && count($lv2) > 0)
            <a href="{{ env('APP_URL') }}admin/product-category/{{ $lv2[0]['_id'] }}/{{ $level }}" class="btn btn-info"><i class="mdi mdi-tag"></i> {{ $lv2[0]['title'] }}</a>
          @endif
          <hr />
          <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th data-toggle="true">STT</th>
                  <th data-sort-initial="true">Hình</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Order</th>
                  <th class="text-center">#</th>
              </tr>
          </thead>
              <tbody>
                @if($list)
                  @foreach($list as $k => $l)
                    <tr>
                      <td>{{ $k+1 }}</td>
                      <td>
                        @if(isset($l['photos'][0]['aliasname']) && $l['photos'][0]['aliasname'])
                          <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{ $l['photos'][0]['aliasname'] }}" height="50"/>
                        @else
                          <img src="{{ env('APP_URL') }}assets/backend/images/logo_sm.png" height="50"/>
                        @endif
                      </td>
                      <td>
                        <a href="/admin/product-category/{{$l['_id'] }}/{{ $level+1 }}">{{ $l['title'] }}</a>
                        <br /><small>{{ $l['slug'] }}</small>
                      </td>
                      <td class="text-center" style="font-size:20px;">
                        @if(isset($l['status']) && $l['status'] == 1)
                          <i class="fa fa-check-circle text-primary"></i>
                        @else
                          <i class="fa fa-ban text-danger"></i>
                        @endif
                      </td>
                      <td class="text-center">{{ $l['order'] }}</td>
                      <td class="text-center">
                        @if($id_parent && $level)
                          <a href="{{ env('APP_URL') }}admin/product-category/delete/{{ $l['_id'] }}/{{ $id_parent }}/{{$level}}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                          <a href="{{ env('APP_URL') }}admin/product-category/edit/{{ $l['id'] }}/{{ $id_parent }}/{{ $level }}" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                        @else
                          <a href="{{ env('APP_URL') }}admin/product-category/delete/{{ $l['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                          <a href="{{ env('APP_URL') }}admin/product-category/edit/{{ $l['id'] }}" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                        @endif
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
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
@endsection
