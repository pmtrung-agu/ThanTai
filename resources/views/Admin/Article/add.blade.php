@extends('Admin.layout')
@section('title', 'Thêm mới thông')
@section('css')
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/css/magnific-popup.css"/>
  <link href="{{ env('APP_URL') }}assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
@endsection
@section('body')
<div class="row">
  <div class="col-12">
    <div class="card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/article" class="btn btn-primary"><i class="mdi mdi-reply-all"></i></a> Thêm mới Tin tức</h3>
        <form action="{{ env('APP_URL') }}admin/article/create" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                            <label class="control-label col-md-2 text-right p-t-10">Title</label>
                            <div class="col-md-10">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required />
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
                            <label class="control-label col-md-2 text-right p-t-10">Description</label>
                            <div class="col-md-10">
                                <textarea name="description" id="description" placeholder="Description" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Contents</label>
                            <div class="col-md-10">
                                <textarea name="contents" id="contents" placeholder="Nội dung chi tiết" class="form-control">{{old('contents')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Category</label>
                            <div class="col-10">
                              <select name="id_category[]" id="id_category" multiple required class="select2" data-placeholder="Chọn Category">
                                @if($categories)
                                  @foreach($categories as $cat)
                                    <option value="{{$cat['_id']}}">{{$cat['title']}}</option>}
                                    option
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
                            <label class="control-label col-md-2 text-right p-t-10">Order</label>
                            <div class="col-md-4">
                                <input type="number" id="order" name="order" class="form-control" placeholder="order" value="{{ old('order') != null ? old('order') : 0 }}" required />
                            </div>
                            <label class="control-label col-md-2 text-right p-t-10">Icon</label>
                            <div class="col-md-4">
                                <input type="text" id="icon" name="icon" class="form-control" placeholder="icon" value="{{ old('icon') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
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
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label col-md-2 text-right p-t-10">Đính kèm</label>
                            <div class="col-md-2">
                                <label class="btn btn-info">
                                    <input type="file" name="dinhkem_files[]" class="dinhkem_files btn btn-primary" multiple accept="*" placeholder="Chọn tập tin đính kèm" style="display:none;" />
                                    <i class="mdi mdi mdi-attachment"></i> Đính kèm
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress m-b-20" id="progressbar">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div id="list_files">
                  @if(old('file_aliasname'))
                    @foreach(old('file_aliasname') as $key => $dk))
                        <div class="form-group row items draggable-element">
                        <input type="hidden" name="file_aliasname[]" value="{{ $dk }}" readonly/>
                        <input type="hidden" name="file_filename[]" value="{{ old('file_filename')[$key] }}" class="form-control"/>
                        <div class="col-12">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                              </div>
                              <input type="hidden" name="file_size[]" value="{{ old('file_size')[$key] }}" class="form-control">
                              <input type="hidden" name="file_type[]" value="{{ old('file_type')[$key] }}" class="form-control">
                              <input type="text" name="file_title[]" placeholder="Chú thích tập tinh đính kèm" value="{{ old('"file_title')[$key] }}" class="form-control form-control-sm">
                              <div class="input-group-append">
                                <a href="{{ env('APP_URL') }}file/delete/{{ $dk }}" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                              </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
               </div>
            </div>
            <div class="form-actions">
                <a href="{{ env('APP_URL') }}admin/article" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
  <script src="{{ env('APP_URL') }}assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
       $(document).ready(function() {
        upload_hinhanh("{{ env('APP_URL') }}image/uploads");delete_hinhanh();popup_images();
        upload_files("{{ env('APP_URL') }}file/uploads");delete_file();$(".select2").select2();
        $('#contents').summernote({height: 350});
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
