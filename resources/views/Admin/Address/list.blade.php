@extends('Admin.layout')
@section('title', 'Danh sách địa chỉ')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <h3 class="m-t-0"><i class="mdi mdi-city"></i> {{--  <a href="/admin/address/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> --}}Danh sách địa chỉ</h3>
      <a href="{{ env('APP_URL') }}admin/address/" class="btn btn-primary"><i class="fa fa-home"></i> Tỉnh</a>
      @if($province && isset($province[0]['ma']))
        <a href="{{ env('APP_URL') }}admin/address/{{ $province[0]['ma'] }}" class="btn btn-primary"><i class="mdi mdi-city"></i> {{ $province[0]['ten'] }}</a>
      @endif
      @if($district && isset($district[0]['ma']))
        <a href="{{ env('APP_URL') }}admin/address/{{ $district[0]['ma']}}" class="btn btn-primary"><i class="mdi mdi-earth"></i> {{ $district[0]['ten'] }}</a>
      @endif
      <hr />
      <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th data-toggle="true">STT</th>
            <th data-sort-initial="true">Mã</th>
            <th>Tên</th>
            <th>Tên tiếng Anh</th>
            <th>Cấp</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          @if($addresses)
            @foreach($addresses as $key => $address)
              <tr>
                <td>{{ $key+1 }}</td>
                @if(isset($address['ma']))
                  <td>{{ $address['ma'] }}</td>
                @endif
                @if(isset($address['ma']) && strlen($address['ma']) > 3)
                  <td>{{ $address['ten'] }}</td>
                @else
                  <td><a href="{{ env('APP_URL') }}admin/address/{{ $address['ma'] }}">{{ $address['ten'] }}</a></td>
                @endif
                <td>{{ $address['tentienganh'] }}</td>
                <td>{{ $address['cap'] }}</td>
                <td class="text-center">
                  {{-- <a href="/dia-chi/delete?id={{address._id}}&ma={{address.ma}}&_token={{_token}}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                  <a href="/dia-chi/edit?id={{address._id}}&ma={{address.ma}}" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>--}}
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
