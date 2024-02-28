@extends('Admin.layout')
@section('title', 'Danh sách tài khoản khách hàng')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.css">
@endsection
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/customer/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Danh sách Khách hàng</h3>
      <table id="responsive-datatable" class="table table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th data-sort-initial="true" data-toggle="true">STT</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th class="text-center">Tình trạng</th>
            <th data-sort-ignore="true" class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          @if($customers)
            @foreach($customers as $key => $user)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ isset($user['email']) ? $user['email'] : '' }}</td>
                  <td>{{ isset($user['name']) ? $user['name'] : '' }}</td>
                  <td class="text-center">
                  	<input type="checkbox" name="{{ $user['_id'] }}" class="js-switch status" data-plugin="switchery" @if($user['active'] == 1) checked="checked" @endif data-size="small" data-color="#009efb" value="1"/>
                  </td>
                  <td class="text-center">
                      <a href="{{ env('APP_URL') }}admin/customer/delete/{{ $user['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                      <a href="{{ env('APP_URL') }}admin/customer/edit/{{ $user['_id'] }}" class="btn btn-sm btn-info"><i class="mdi mdi-account-edit"></i> Sửa</a>
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
  <script src="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
      $(".status").change(function(){
        var id = $(this).attr("name");
        $.get("{{ env('APP_URL') }}admin/customer/update-status/"+id);
      });
      $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
    });
  </script>
@endsection
