@extends('Admin.layout')
@section('title', 'Chỉnh sửa danh mục thông tin')
@section('css')
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
@endsection
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/category" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Chỉnh sửa danh mục thông tin</h3>
        <form action="{{ env('APP_URL') }}admin/category/update" method="post" id="dinhkemform" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{$cat['_id']}}">
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
                            <label class="control-label col-md-2 text-right p-t-10">Title</label>
                            <div class="col-md-10">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ old('title') != null ? old('title') : $cat['title'] }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Slug</label>
                            <div class="col-md-10">
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" value="{{ old('slug') != null ? old('slug') : $cat['slug'] }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Order</label>
                            <div class="col-md-4">
                                <input type="number" id="order" name="order" class="form-control" placeholder="order" value="{{ old('order') != null ? old('order') : 0 }}" required />
                            </div>
                            <label class="control-label col-md-2 text-right p-t-10">Icon</label>
                            <div class="col-md-4">
                                <input type="text" id="icon" name="icon" class="form-control" placeholder="icon" value="{{ old('icon') != null ? old('icon') : $cat['icon'] }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Picture</label>
                            <div class="col-md-2">
                                <label class="btn btn-info">
                                    <input type="file" name="dinhkem[]" class="dinhkem btn btn-info" multiple accept="image/*" placeholder="Pictures" style="display:none;" />
                                    <i class="fa fa-file-photo-o"></i> Size 900x600
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
                  @else
                    @if($cat['photos'])
                       @foreach($cat['photos'] as $photo)
                        <div class="col-sm-6 col-md-4 items draggable-element text-center">
                          <input type="hidden" name="hinhanh_aliasname[]" value="{{ $photo['aliasname']}}" readonly/>
                          <input type="hidden" name="hinhanh_filename[]" value="{{ $photo['filename'] }}" class="form-control"/>
                          <a href="{{ env('APP_URL') }}storage/images/origin/{{$photo['aliasname']}}" class="image-popup">
                            <div class="portfolio-masonry-box">
                              <div class="portfolio-masonry-img">
                                <img src="{{ env('APP_URL') }}storage/images/thumb_300x200/{{$photo['aliasname']}}" class="thumb-img img-fluid" alt="work-thumbnail">
                              </div>
                              <div class="portfolio-masonry-detail">
                                <p>{{ $photo['aliasname'] }}</p>
                              </div>
                            </div>
                          </a>
                          <a href="{{ env('APP_URL') }}image/delete/{{ $photo['aliasname'] }}" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                            <i class="fa fa-trash"></i>
                          </a>
                          <input type="text" name="hinhanh_title[]" value="{{ $photo['filename'] }}" class="form-control"/>
                        </div>
                    @endforeach
                    @endif
                 @endif
             </div>
            </div>
            <div class="form-actions">
                <a href="{{ env('APP_URL') }}admin/category" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
       $(document).ready(function() {
          upload_hinhanh();delete_hinhanh();
          popup_images();
          $("#progressbar").hide();
          $("#title").change(function(){
            var _this = $(this);
            $.get('{{ env('APP_URL') }}slug?str='+ $("#title").val(), function(data){
              $("#slug").val(data);
            });
          });
      });
  </script>
@endsection
