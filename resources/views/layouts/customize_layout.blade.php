<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon/ubu-favicon.png">

    <title>UBU Today</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- sub menu -->
    <link rel="stylesheet" href="/packages/bootstrap-submenu/dist/css/bootstrap-submenu.min.css">
    <!-- Custom CSS -->
    <link href="/assets/css/pages/website_pages/landing-page.css" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    @yield('stylesheets')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body 
@if(!isset($is_home))
 style="background-color:black" 
@endif

>
    @if(isset($is_home))
      @if($is_home==1)
<!--         <div id="audio-container"> 
          <audio autoplay id="intro-song">
            <source src="/assets/music/intro_song.mp3" type="audio/mpeg">
          </audio>
        </div> -->
      @endif
    @endif
    <!-- Navigation -->
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
                <img id="pen-logo" class="pull-left" src="/assets/images/brand_image/perm/main-logo.jpg" style="width: 33px;margin-right:9px;">
                <a class="navbar-brand topnav" href="/">UBU Today</a>
                @if(isset($is_home))
                  @if($is_home==1)
                        <a style="line-height:49px" id="mute-btn" class="sound-btns"> <img class="sound-btns-img" src="/assets/images/icons/mute-icon.png" width="19px" ></a>
                        <a style="line-height:49px" id="sound-btn"  class="hide sound-btns"> <img class="sound-btns-img" src="/assets/images/icons/sound-icon.png" width="19px" ></a>
                  @endif
                @endif

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="true">
                          About<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                          <li class="dropdown-submenu">
                            <a tabindex="0">UBU Today</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="0" href="{!!route('get_jo_page')!!}">Jo Morris (Founder)</a></li>
                              <li><a tabindex="0" target="_blank" href="http://wendyjomorrison.com/">Jo Morris Bio</a></li>
                            </ul>
                          </li>
                          <li class="dropdown-submenu">
                            <a tabindex="0">Believe - in - Breath (BBTR)</a>
                            <ul class="dropdown-menu">
                              <li><a href="{!!route('get_bbtr_page')!!}" tabindex="0">BBTR Bio</a></li>
                              <li><a href="{!!route('get_giten_page')!!}" tabindex="0">Giten Tonkov (Founder)</a></li>
                              <li><a href="{!!route('get_bbtr_session_page')!!}" tabindex="0">Biodybamic Breath Session</a></li>
                            </ul>
                          </li>
                          <li class="dropdown-submenu">
                            <a tabindex="0">Cocoon-US</a>
                            <ul class="dropdown-menu">
                              <li><a href="{!!route('get_jean_page')!!}" tabindex="0">Jean Paul Lacroix (Founder)</a></li>
                              <li><a href="{!!route('get_cocoon_page')!!}" tabindex="0">Cocoon-US Bio</a></li>
                              <li><a href="{!!route('get_cocoon_modality_page')!!}" tabindex="0">Cocoon Modality</a></li>
                              <li><a href="{!!route('get_cocoon_massage_page')!!}" tabindex="0">Cocoon Massage</a></li>
                                
                            </ul>
                          </li>
                          <li><a tabindex="0" href="{!!route('get_prema_page')!!}">Prema Kreever</a></li>
                        </ul>
                      </li>
                    <li>
                        <a href="{!!route('get-videos')!!}">Media</a>
                    </li>
                    <li>
                        <a href="{!!route('get-calendar')!!}">Events</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    @yield('content')

    <a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="col-md-8  col-sm-12 col-xs-12">
                <div class="col-lg-6">
                    <h2>Connect to UBU Today:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/wendyjomorrison" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/ubutoday" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/+UBUTODAYCocoonMoiUS/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12" id="send-message-container">
                    
                <div class="form-group">
                    <label for="usr">Send Message:</label>
                    <input type="text" class="form-control" placeholder="Enter Your Email" id="user_email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Message" style="width:100%" id="user_message">  </textarea>
                </div>
                <div class="form-group">
                        <button class="btn btn-primary btn-sm pull-right" id="send_message">Send</button>
                </div>

            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="{!!route('get-videos')!!}">Media</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="{!!route('get-calendar')!!}">Events</a>
                        </li>

                    </ul>
                    <p class="copyright text-muted small" style="color:white">Copyright &copy; Webprinciples 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Load js libs only when the page is loaded. -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/packages/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="/packages/Magister3/assets/js/modernizr.custom.72241.js"></script>
    <script src="/packages/bootstrap-submenu/dist/js/bootstrap-submenu.min.js" defer></script>
    <script src="/assets/js/pages/website_pages/landing-page.js"></script>
    @yield('scripts')

</body>

</html>
