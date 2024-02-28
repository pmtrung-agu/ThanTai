@extends('Admin.layout')
@section('title') Thêm Điểm mua sắm đạt chuẩn phục vụ khách du lịch @endsection
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.css">
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
  <link href="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-lite.css" rel="stylesheet" />
@endsection
@section('body')
<div class="row">
  	<div class="col-12">
    	<div class="card-box">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/shopping" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Thêm Điểm mua sắm đạt chuẩn phục vụ khách du lịch</h3>
        @if($errors->any())
                <div class="alert alert-success">
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
                </div>
              @endif
    		<form action="{{ env('APP_URL') }}admin/shopping/create" method="post" id="dinhkemform" enctype="multipart/form-data">
      			{{ csrf_field() }}
      			<div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Tên</label>
                      <div class="col-md-10">
                          <input type="text" id="title" name="title" class="form-control" placeholder="Tên địa điểm kinh doanh" value="{{ old('title') }}">
                      </div>
                  </div>
              </div>
	         </div>
           <div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="control-label col-md-2 text-right p-t-10">Slug</label>
                          <div class="col-md-10">
                              <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" value="{{ old('slug') }}">
                          </div>
                      </div>
                  </div>
              </div>
      			<div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                      		<label class="control-label col-md-2 text-right p-t-10">Điện thoại</label>
	                          <div class="col-md-4">
	                              <input type="text" id="phone" name="phone" class="form-control" placeholder="Điện thoại" value="{{ old('phone') }}">
	                          </div>
	                          <label class="control-label col-md-2 text-right p-t-10">Email</label>
	                          <div class="col-md-4">
	                              <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required />
	                          </div>
                      </div>
                  </div>
              	</div>
              	<div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="control-label col-md-2 text-right p-t-10">Website</label>
                          <div class="col-md-10">
                              <input type="url" id="website" name="website" class="form-control" placeholder="Địa chỉ Website" value="{{ old('website') }}">
                          </div>
                      </div>
                  </div>
              	</div>
              	<div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                          <div class="col-md-4">
                              <select class="select2 m-b-10" id="address_1" name="address[]" style="width: 100%" data-placeholder="Chọn Tỉnh">
                                  <option value="">Tỉnh</option>}
                                  @if($address)
                                    @foreach($address as $a)
                                      <option value="{{ $a['ma'] }}" @if($a['ma'] == old('address.0')) selected @endif >{{ $a['ten'] }}</option>
                                    @endforeach
                                  @endif
                              </select>
                          </div>
                          <div class="col-md-3">
                              <select class="select2 m-b-10" id="address_2" name="address[]" style="width: 100%" data-placeholder="Chọn Huyện, Tp">
                                  <option value=""></option>

                              </select>
                          </div>
                          <div class="col-md-3">
                              <select class="select2 m-b-10" id="address_3" name="address[]" style="width: 100%" data-placeholder="Chọn Xã, phường, TT">
                                  <option value=""></option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                          <div class="col-md-10">
                              <input type="text" id="address_4" name="address[]" class="form-control" placeholder="Số nhà, tên đường, khóm, ấp,..." value="{{ old('address.3')}}" required>
                          </div>
                      </div>
                  </div>
              </div>
              	<div class="row">
	              <div class="col-12">
	                <textarea name="gioi_thieu" id="gioi_thieu" placeholder="Thông tin giớ thiệu" class="form-control summernote">{{ old('gioi_thieu') }}</textarea>
	              </div>
	            </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group row">
                          <label class="control-label col-md-2 text-right p-t-10">Hình ảnh</label>
                          <div class="col-md-2">
                            <label class="btn btn-info">
                              <input type="file" name="dinhkem[]" class="dinhkem btn btn-info" multiple accept="image/*" placeholder="Chọn hình ảnh" style="display:none;" />
                              <i class="fa fa-file-photo-o"></i> Chọn hình ảnh 900x600
                            </label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="progress m-b-20" id="progressbar">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div id="list_hinhanh" class="form-group row portfolioContainer">
               @if(old('hinhanh_aliasname') !== null)
                  @foreach(old('hinhanh_aliasname') as $key => $hinhanh)
                  <div class="col-sm-6 col-md-4 items draggable-element text-center">
                    <input type="hidden" name="hinhanh_aliasname[]" value="{{ $hinhanh}}" readonly/>
                    <input type="hidden" name="hinhanh_filename[]" value="{{ old('hinhanh_filename.'.$key) }}" class="form-control"/>
                    <a href="{{ env('APP_URL') }}storage/images/origin/{{$hinhanh}}" class="image-popup">
                      <div class="portfolio-masonry-box">
                        <div class="portfolio-masonry-img">
                          <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{$hinhanh}}" class="thumb-img img-fluid" alt="work-thumbnail">
                        </div>
                        <div class="portfolio-masonry-detail">
                          <p>{{ $hinhanh }}</p>
                        </div>
                      </div>
                    </a>
                    <a href="{{ env('APP_URL') }}image/delete/{{ $hinhanh }}" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                      <i class="fa fa-trash"></i>
                    </a>
                    <input type="text" name="hinhanh_title[]" value="{{ old('hinhanh_title.'.$key) }}" class="form-control"/>
                  </div>
                  @endforeach
               @endif
             </div>
             <div class="form-actions">
	            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
	            <a href="{{ env('APP_URL') }}admin/user" class="btn btn-inverse"><i class="mdi mdi-reply-all"></i> Trở về</a>
	        </div>
      		</form>
    	</div>
    </div>
</div>
@endsection
@section('js')
	<script src="{{ env('APP_URL') }}assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/isotope/js/isotope.pkgd.min.js"></script>
  	<script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  	<script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js"></script>
  	<script src="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-lite.js"></script>
  	<script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
  	<script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js"></script>
  	<script src="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-lite.js"></script>
  	<script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
  	<script type="text/javascript">
       	$(document).ready(function() {
       		$(".select2").select2();upload_hinhanh("{{ env('APP_URL') }}/image/uploads");delete_hinhanh();
       		@if (old('address.0') !== null)
	          $.get("{{ env('APP_URL') }}address/get/{{ old('address.0') }}/{{ old('address.1') }}", function(huyen){
	            $("#address_2").html(huyen);
	          });
	          @endif
	          @if(old('address.1') !== null)
	          $.get("{{ env('APP_URL') }}address/get/{{ old('address.1') }}/{{ old('address.2') }}", function(xa){
	            $("#address_3").html(xa);
	          });
	        @endif
	        chontinh("{{ env('APP_URL') }}");chonhuyen("{{ env('APP_URL') }}");
	        $('.summernote').summernote({
	            height: 300, dialogsInBody: true
	        });
	        popup_images();
	        $("#progressbar").hide();
          $("#title").keyup(function(){
            var _this = $(this);
            $.get('{{ env('SLUG_URL') }}slug/'+ $("#title").val(), function(data){
              $("#slug").val(data);
            });
          });
       	});
    </script>
@endsection
