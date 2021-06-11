@extends('admin.templates.template')

@section('title_page', 'Quan ly bai viet')

@section('content_child')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thêm bài viết</h1>
    </div>
</div>
@include('admin.templates.msgError')
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(array('role' => "form", 'method' => 'post', 'enctype' => "multipart/form-data",  'class' => "panel panel-default")) }}
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {{ Form::label('thumb', 'Avatar', array('class' => 'form-label')) }}
                            {{ Form::file('thumb', $attributes = array('style' => "display: none;", 'target'=>'imgThumb')) }}
                            @if($errors->has('thumb'))
                                <div class="invalid-feedback">{{$errors->first('thumb')}}</div>
                            @endif
                        </div>
                        <label class="imagecheck mb-4" for="thumb">
                            <figure class="imagecheck-figure">
                                <img style="width: 100%;" src="{{ isset($thumbnail) ? $thumbnail : '/assets/images/uploadimage.jpg' }}" alt="" class="imagecheck-image" id="imgThumb">
                            </figure>
                        </label>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            {{ Form::text('title', isset($title) ? $title : null, $attributes = array('class' => 'form-control'.($errors->has('title')?' is-invalid':''))) }}
                            @if($errors->has('title'))
                                <div class="invalid-feedback">{{$errors->first('title')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            {{ Form::text('owner', isset($owner) ? $owner : null, $attributes = array('class' => 'form-control'.($errors->has('owner')?' is-invalid':''))) }}
                            @if($errors->has('owner'))
                                <div class="invalid-feedback">{{$errors->first('owner')}}</div>
                            @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('is_show', true, request()->is_show ?? (isset($is_show) ? $is_show : null)) }}
                                Hiển thị bài viết
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            {{ Form::textarea('short_description', isset($short_description) ? $short_description : null, $attributes = array('class' => 'form-control'.($errors->has('short_description')?' is-invalid':''))) }}
                            @if($errors->has('short_description'))
                                <div class="invalid-feedback">{{$errors->first('short_description')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            {{ Form::textarea('content',  isset($content) ? $content : null, $attributes = array('class' => 'summernote form-control'.($errors->has('content')?' is-invalid':''))) }}
                            @if($errors->has('content'))
                                <div class="invalid-feedback">{{$errors->first('content')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        {{ Form::close() }}
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