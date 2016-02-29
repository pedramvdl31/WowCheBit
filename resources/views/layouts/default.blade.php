<!DOCTYPE html>
<html lang="en">
<head>
  <link href="/assets/css/fonts.css" rel="stylesheet" type="text/css" />
  <link href="/assets/css/layouts/default.css" rel="stylesheet" type="text/css" />
  <link href="/assets/css/application.css" rel="stylesheet">
  @yield('stylesheets')

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="googlebot" content="index,follow">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon/ubu-favicon.png">

    <!-- Title -->
    <title>WowCheBit &mdash; Bitcoin</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="/assets/css/pages/website_pages/landing-page.css" rel="stylesheet">
    <!-- Templates core CSS -->
    {!! Html::style('/assets/css/login_modal.css') !!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Modernizr Scripts -->
    <script src="/assets/js/modernizr-2.7.1.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="/">WowCheBit</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="">Buy Bitcoin</a>
                    </li>
                    <li>
                        <a href="">Sell Bitcoin</a>
                    </li>
                    <li>
                        <a href="">FAQ</a>
                    </li>
                    <li>
                       @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!!Auth::user()->username!!}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{!! route('users_profile',Auth::user()->username) !!}">Edit Profile</a></li>
                              <li><a href="{!! route('logout') !!}">Log Out</a></li>
                            </ul>
                        </li>
                      @else
                        <li><a id="login-btn">Log In</a>
                        </li>
                      @endif
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container-fluid background-color">
        <style type="text/css">
        .alert{
            margin-top: 55px;
        }
        </style>
      @include('flash::message')
      @yield('content')
    </div>
    {!! View::make('partials.login_modal') !!}
    <!-- Load js libs only when the page is loaded. -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @yield('scripts')

  </body>
</html>
    <style>

    </style>