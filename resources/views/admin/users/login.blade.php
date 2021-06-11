@extends('admin.templates.root')

@section('title_page', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(array('role' => "form", 'method' => 'post')) }}
                        @include('admin.templates.msgError')
                        <fieldset>
                            <div class="form-group">
                                {{ Form::text('email', null, $attributes = array('placeholder' => "E-mail",'class' => 'form-control'.($errors->has('email')?' is-invalid':''))) }}
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::password('password', $attributes = array('placeholder' => "Password", 'class' => 'form-control'.($errors->has('password')?' is-invalid':''))) }}
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember', true, null) }}
                                    Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection