<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title_page')</title>
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
        <!-- Bootstrap Core CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL::asset('admin/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ URL::asset('admin/css/timeline.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('admin/css/startmin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ URL::asset('admin/css/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('cssasset')
    </head>
    <body>
        @yield('content')
        <!-- jQuery -->
        <script src="{{ URL::asset('admin/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ URL::asset('admin/js/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ URL::asset('admin/js/startmin.js') }}"></script>
        @yield('jsasset')
        @yield('jsinline')
    </body>
</html>