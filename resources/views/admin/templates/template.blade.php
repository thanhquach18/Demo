@extends('admin.templates.root')

@section('content')
<div id="wrapper">
    @include('admin.templates.navbar')
    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('content_child')
        </div>
    </div>
</div>
@endsection