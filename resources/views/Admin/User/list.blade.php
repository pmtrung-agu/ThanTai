@extends('Admin.layout')
@section('title', 'Danh sách tài khoản')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/user/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Danh sách tài khoản người dùng</h3>
      <table id="responsive-datatable" class="table table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th data-sort-initial="true" data-toggle="true">STT</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Quyền</th>
            <th class="text-center">Tình trạng</th>
            <th data-sort-ignore="true" class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          @if($users)
              @foreach($users as $key => $user)
              <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ isset($user['email']) ? $user['email'] : '' }}</td>
                  <td>{{ isset($user['name']) ? $user['name'] : '' }}</td>
                  <td>
                    @if(isset($user['roles']))
                      @foreach($user['roles'] as $role)
                        <span class="badge badge-pill badge-primary">{{ $role }}</span>
                      @endforeach
                    @endif
                  </td>
                  <td class="text-center">
                    @if($user['active'] == 1)
                      <i class="mdi mdi-check-circle text-info"></i>
                    @else
                      <i class="mdi mdi-close-circle text-danger"></i>
                    @endif
                  </td>
                  <td class="text-center">
                      <a href="{{ env('APP_URL') }}admin/user/delete/{{ $user['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                      <a href="{{ env('APP_URL') }}admin/user/edit/{{ $user['_id'] }}" class="btn btn-sm btn-info"><i class="mdi mdi-account-edit"></i> Sửa</a>
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
