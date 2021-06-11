@extends('admin.templates.template')

@section('title_page', 'Quản lý bài viết')

@section('content_child')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý bài viết</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Thêm bài viết</a>
    </div>
</div>
@include('admin.templates.msgError')
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover" style="margin-bottom: 0px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bài viết</th>
                                <th>Lượt xem</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data) && count($data) > 0)
                                @foreach($data as $item)
                                    <tr>
                                        <td>#{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->view }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('blog.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('blog.delete', ['id' => $item->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="5" style="text-align: center;">Không có gì để hiển thị</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($data->hasPages())
            <div class="panel-footer">
                {{ $data->appends(request()->input())->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('jsinline')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#' + $(input).attr('target')).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 350
        });
        $('input[type="file"]').change(function() {
            readURL(this);
        });
    });
</script>
@endsection

@section('jsasset')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection

@section('cssasset')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection