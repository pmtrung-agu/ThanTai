@extends('Admin.layout')
@section('css')
    <link href="{{ env('APP_URL') }}assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('body')
<div class="col-12">
  <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Thống kê tổng quan</h3>
  <hr />
  <div class="row">
    <div class="col-4">
      <div class="card-box ribbon-box">
        <div class="ribbon ribbon-custom">Sản phẩm</div>
        <p class="m-b-0" style="font-size:20px;">{{$products}}</p>
      </div>
    </div>
    {{-- <div class="col-4">
      <div class="card-box ribbon-box">
        <div class="ribbon ribbon-success">Doanh nghiệp</div>
        <p class="m-b-0" style="font-size:20px;">{{$sellers}}</p>
      </div>
    </div> --}}
    <div class="col-4">
      <div class="card-box ribbon-box">
        <div class="ribbon ribbon-pink">Đơn hàng</div>
        <p class="m-b-0" style="font-size:20px;">{{$orders}}</p>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
          $(document).ready(function(){
            $("#datatable").dataTable();
          });
      </script>
@endsection
