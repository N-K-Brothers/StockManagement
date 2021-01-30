@extends('Admin/layouts/skeleton')
@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ @asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('page-title', 'Dashboard')
@section('main-header', 'Dashboard')
@section('sitemap')
    <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
@endsection
@section('content')
    <section class="content">
        @if ($lowcount>0)
    <div>
        <center><h4 style="color: red">Please check the stock of the product</h4></center>
    </div>
@endif
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$products}}</h3>
                        <p>View Product</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="/manageproduct" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div>

    @endsection
    @section('script')
            <script type="text/javascript">
                function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null };
            </script>
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);

        </script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ @asset('plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
        <script src="{{ @asset('plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>


    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    @endsection
