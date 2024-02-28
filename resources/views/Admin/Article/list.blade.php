@extends('Admin.layout')
@section('body')
<div class="row">
    <div class="col-12 card-box">
        <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/article/add" class="btn btn-primary"><i class="mdi mdi-folder-plus"></i></a> Tin tức</h3>
        <hr />
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
            @if($list)
                @foreach($list as $k => $l)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $l['title'] }}</td>
                        <td>{{ $l['slug'] }}</td>
                        <td class="text-center" width="150px">
                            <a href="{{ env('APP_URL') }}admin/article/delete/{{$l['_id']}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="{{ env('APP_URL') }}admin/article/edit/{{$l['_id']}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

