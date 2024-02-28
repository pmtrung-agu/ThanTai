@extends('Admin.layout')
@section('body')
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/logistic" class="btn btn-info"><i class="mdi mdi-reply-all"></i></a> Chỉnh sửa Hạ tầng Thương mại biên giới và hệ thống dịch vụ Logistic</h3>
			<form action="{{ env('APP_URL') }}admin/logistic/update" method="post" id="dinhkemform" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" name="id" id="id" value="{{ $mp['_id'] }}">
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
	                        	<input type="text" id="title" name="title" class="form-control" placeholder="Tên" value="{{ old('title') != null ? old('title') : $mp['title'] }}" required />
	                      	</div>
	                  	</div>
	              	</div>
	            </div>
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
                                <a href="/file/delete/{{ $dk }}" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                              </div>
                          </div>
                        </div>
                        </div>
                    @endforeach
                  @else
                    @if($mp['dinhkem'])
                      @foreach($mp['dinhkem'] as $dk)
                         <div class="form-group row items draggable-element">
                          <input type="hidden" name="file_aliasname[]" value="{{ $dk['aliasname'] }}" readonly/>
                          <input type="hidden" name="file_filename[]" value="{{ $dk['filename'] }}" class="form-control"/>
                          <div class="col-12">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">@</span>
                                </div>
                                <input type="hidden" name="file_size[]" value="{{ $dk['size'] }}" class="form-control">
                                <input type="hidden" name="file_type[]" value="{{ $dk['type'] }}" class="form-control">
                                <input type="text" name="file_title[]" placeholder="Chú thích tập tinh đính kèm" value="{{ $dk['title'] }}" class="form-control form-control-sm">
                                <div class="input-group-append">
                                  <a href="{{ env('APP_URL') }}file/delete/{{ $dk['aliasname'] }}" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                                </div>
                            </div>
                          </div>
                          </div>
                      @endforeach
                    @endif
                  @endif
                </div>
            </div>
            <div class="form-actions">
                <a href="{{ env('APP_URL') }}admin/logistic" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
            </div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('js')
	<script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
	<script type="text/javascript">
       $(document).ready(function() {
        upload_files("{{ env('APP_URL') }}file/uploads");delete_file();
      });
  </script>
@endsection