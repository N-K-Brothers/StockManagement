{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->

</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
        @endif



    </div>
</body>

</html> --}}
<!DOCTYPE html>
<html>

<head>
    <title>Stock Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel='stylesheet' href='/stylesheets/style.css' />
    <style>
        .thumbnail img {
            height: 200px;
        }

        .thumbnail .description {
            color: rgb(87, 88, 88);
        }

        .price {
            font-weight: bold;
            font-size: 16px;
        }

    </style>

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Stock Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        @if ($isAuth)
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                                {{ Auth::user()->email }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out text-yellow"></i> Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                                 User<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('register') }}">Sign Up</a></li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            @foreach ($products as $p)
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $p->image }}" alt="Views near Rob Roy Glacier" class="img-responsive">
                        <div class="caption">
                            <h3></h3>

                            <p class="description">{{ $p->description }} </p>
                            @if ($p->quantity === 0)
                                <p class="description" style="color: red">Out of stock </p>
                            @endif
                            <div class="clearfix">
                                <form action="/purchase/{{ $p->id }}" method="post" class="">
                                    @csrf
                                    <div class="price pull-left">Rs. {{ $p->price }} </div>
                                    <button class="btn btn-success pull-right" role="button">Purchase</button>
                                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qty : </label>
                                    <input type="number" name="qty" value="0" min="0" max="{{ $p->quantity }}"
                                        style="width:50px;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

</body>

</html>
