<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('page-title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    @yield('style')
</head>

<body class="skin-green">
    <div class="wrapper">

        <header class="main-header">
            <a href="#" style="text-decoration:none;" class="logo"><b>Stock</b> Management</a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    @include('/Admin/layouts/sidebar')
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('main-header')
                </h1>
                <ol class="breadcrumb">
                    @yield('sitemap')
                </ol>
            </section>

            <section class="content">
                @yield('content')
            </section>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <p style="text-align: center"> All rights reserved. Powered by <b>Nikunj Rajpara & Kishan Kachhadiya</b>. </p>
            <p style="text-align: center">17bmiit108@gmail.com, 17bmiit107@gmail.com </p>
        </footer>
    </div>
</body>

</html>
<script type="text/javascript">
    function preventBack() { window.history.forward(); }
    setTimeout("preventBack()", 0);
    window.onunload = function () { null };
</script>
<script crossorigin="anonymous" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" src="https://code.jquery.com/jquery-3.1.0.min.js">
<script src="{{ @asset('/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
<script src="{{ @asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ @asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ @asset('/plugins/fastclick/fastclick.min.js') }}"></script>
<script src="{{ @asset('/dist/js/app.min.js') }}" type="text/javascript"></script>
@yield('script')
