@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {!! Session::get('error') !!}
</div>
@elseif($errors->has('error'))
<div class="alert alert-danger" role="alert">
    {!!$errors->first('error')!!}
</div>
@elseif(Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! Session::get('success') !!}
</div>
@elseif($errors->has('success'))
<div class="alert alert-success" role="alert">
    {!!$errors->first('success')!!}
</div>
@endif