@extends('admin.templates.template')

@section('title_page', 'Change password')

@section('content_child')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Change password</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        @include('admin.templates.msgError')
        {{ Form::open(array('role' => "form", 'method' => 'post')) }}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    {{ Form::password('password', $attributes = array('placeholder' => "Password", 'class' => 'form-control'.($errors->has('password')?' is-invalid':''))) }}
                    @if($errors->has('password'))
                        <div class="invalid-feedback">{{$errors->first('password')}}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Mật khẩu Mới</label>
                    {{ Form::password('newpassword', $attributes = array('placeholder' => "Password", 'class' => 'form-control'.($errors->has('newpassword')?' is-invalid':''))) }}
                    @if($errors->has('newpassword'))
                        <div class="invalid-feedback">{{$errors->first('newpassword')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mật khẩu xác nhận</label>
                    {{ Form::password('repassword', $attributes = array('placeholder' => "Password", 'class' => 'form-control'.($errors->has('repassword')?' is-invalid':''))) }}
                    @if($errors->has('repassword'))
                        <div class="invalid-feedback">{{$errors->first('repassword')}}</div>
                    @endif
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-success">Change & save</button>
            </div>
        </div>
        
        {{ Form::close() }}
    </div>
</div>
@endsection