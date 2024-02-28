@extends('Admin.layout')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-lite.css" rel="stylesheet" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.css">
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
@endsection
@section('body')
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/product" class="btn btn-info"><i class="mdi mdi-reply-all"></i></a> Thêm sản phẩm</h3>
    		<form action="{{ env('APP_URL') }}admin/product/create" method="post" id="dinhkemform" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-body">
            <hr />
            @if($errors->any())
                <div class="alert alert-success">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Mã sản phẩm</label>
                      <div class="col-md-4 input-group">
                        <div class="input-group-prepend" name="{{ strtoupper(uniqid()) }}" id="qrcode">
                            <div class="input-group-text"><i class="fa fa-qrcode"></i></div>
                        </div>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Mã sản phẩm" value="{{ old('code') }}" required />
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Tên sản phẩm</label>
                      <div class="col-md-10">
                          <input type="text" id="title" name="title" class="form-control" placeholder="Tên sản phẩm" value="{{ old('title') }}" required />
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10">Slug</label>
                        <div class="col-md-10">
                            <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" value="{{ old('slug') }}" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Thuộc loại sản phẩm</label>
                      <div class="col-md-10">
                          <select name="id_product_category[]" multiple="multiple" id="id_product_category" class="form-control select2" required data-placeholder="Chọn loại sản phẩm">
                            <option value="">Chọn loại sản phẩm</option>
                            @if($product_categories)
                              @foreach($product_categories as $cat)
                                <option value="{{ $cat['_id'] }}">{{ $cat['title'] }}</option>
                              @endforeach
                            @endif
                          </select>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Mô tả</label>
                      <div class="col-md-10">
                        <textarea name="description" id="description" required placeholder="Mô tả sản phẩm" class="form-control">{{ old('description') }}</textarea>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Chi tiết</label>
                    <div class="col-md-10">
                      <textarea name="contents" id="contents" placeholder="Mô tả chi tiết" class="form-control summernote">{{ old('contents') }}</textarea>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Giá</label>
                    <div class="col-md-4">
                      <input type="text" id="prices" name="prices" class="form-control number" placeholder="Giá" value="{{ old('prices') !== null ? old('prices') : 0}}" required />
                    </div>
                    <div class="col-md-3 switchery-demo">
                      Hoạt động:&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="status" id="status" class="js-switch" data-plugin="switchery" checked="checked" data-color="#009efb" value="1"/>
                    </div>
                    <div class="col-md-3 switchery-demo">
                      Sản phẩm nổi bật:&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="hot" id="hot" class="js-switch" data-plugin="switchery" data-color="#009efb" value="1"/>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Hình ảnh</label>
                    <div class="col-md-2">
                      <label class="btn btn-info">
                          <input type="file" name="dinhkem[]" class="dinhkem btn btn-info" multiple accept="image/*" placeholder="Pictures" style="display:none;" />
                          <i class="fa fa-file-photo-o"></i> Size 800x800
                      </label>
                    </div>
                    <label class="control-label col-md-2 text-right p-t-10">Người bán</label>
                    <div class="col-md-6">
                      <select name="id_seller" id="id_seller" class="form-control select2">
                        @if($sellers)
                          @foreach($sellers as $seller)
                            <option value="{{ $seller['_id'] }}" @if($seller['_id'] == $id_user) selected @endif>{{ $seller['email'] }} [{{ $seller['name'] }}]</option>
                          @endforeach
                        @endif
                      </select>
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
                          <img src="/storage/images/thumb_300x200/{{$hinhanh}}" class="thumb-img img-fluid" alt="work-thumbnail">
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
          </div>
          <div class="form-actions">
              <a href="{{ env('APP_URL') }}admin/product" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
              <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
          </div>
        </form>
    	</div>
    </div>
</div>
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-lite.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/switchery/switchery.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/number/jquery.number.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      upload_hinhanh("{{ env('APP_URL') }}image/uploads");delete_hinhanh();
      popup_images();$(".select2").select2();
      $("#progressbar").hide();
      $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
      $("#title").keyup(function(){
        var _this = $(this);
        $.get('{{ env('SLUG_URL') }}slug/'+$("#code").val()+ " " + $("#title").val(), function(data){
          $("#slug").val(data);
        });
      });
      $('.number').number(true, 0, ',', '.');
      $('.summernote').summernote({
        height: 300, dialogsInBody: true
      });
      $("#qrcode").click(function(){
        $("#code").val($(this).attr("name"));
      });
    });
  </script>
@endsection
