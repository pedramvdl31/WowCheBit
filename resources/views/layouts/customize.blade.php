<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
  <head>

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="/assets/css/pages/website_pages/landing-page.css" rel="stylesheet">
    <!-- Templates core CSS -->
    <link href="/assets/css/application.css" rel="stylesheet">
    {!! Html::style('/assets/css/layouts/customize.css') !!}
    {!! Html::style('/assets/css/login_modal.css') !!}
    {!! Html::style('/assets/css/general.css') !!}
    {!! Html::style('/assets/css/partials/login_modal_style.css') !!}
    {!! Html::style('/assets/css/partials/login_modal_form_elements.css') !!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Modernizr Scripts -->
    <script src="/assets/js/modernizr-2.7.1.min.js"></script>
  </head>
  <body class="index" id="to-top">
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!!Auth::user()->email!!}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{!! route('users_profile',Auth::user()->username) !!}">Edit Profile</a></li>
                              <li><a href="{!!route('users_logout')!!}" class="logout-btn clickables-a">Log Out</a></li>
                            </ul>
                        </li>
                      @else
                        <li><a class="login-btn  clickables-a">Log In</a>
                        </li>
                      @endif
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Side nav -->
    <nav class="side-nav" role="navigation">

      <ul class="nav-side-nav">
        <li><a class="tooltip-side-nav" href="#section-0" title="" data-original-title="Intro" data-placement="left"></a></li>
        <li><a class="tooltip-side-nav" href="#section-1" title="" data-original-title="Chart" data-placement="left"></a></li>
        <li><a class="tooltip-side-nav" href="#section-2" title="" data-original-title="Subscribe" data-placement="left"></a></li>
        <li><a class="tooltip-side-nav" href="#section-3" title="" data-original-title="Contact" data-placement="left"></a></li>
      </ul>
      
    </nav> <!-- /.side-nav -->
    <div class="flashmessage" style="margin:50px 0 0 0;">
    <style type="text/css">.alert-success,.alert-danger{margin: 0;}</style>
      @include('flash::message')
    </div>
    
    <!-- Jumbotron -->
    <header class="jumbotron" role="banner" id="section-0">
      <div class="container">

        <div class="row">

          <div class="col-md-6">

            <!-- Logo -->
            <figure class="text-center">
              <a href="./index.html">
                <img class="img-logo" src="/assets/images/logo.png" alt="">
              </a>
            </figure> <!-- /.text-center -->

            <!-- Title -->
            <h1>WowCheBit</h1>
            <!-- Sub title -->
            <p>
              If you want to buy or sell bitcoins you are in the right place.
            </p>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:10px">
              <a class="col-md-5 col-xs-12 col-sm-12 btn btn-info btn-sm">Buy <i><img width="23px" src="/assets/images/icons/bitcoin.png"></i></a>
              <a class="col-md-5 pull-right col-xs-12 col-sm-12 btn btn-success btn-sm">Sell <i><img width="23px" src="/assets/images/icons/bitcoin.png"></i></a>
            </div>
          </div> <!-- /.col-md-7 -->
          <div class="col-md-5">

            <!-- Images showcase -->
            <figure>
              <img class="img-iPhone" src="/assets/images/iphone/2.png" alt="">
            </figure>

          </div> <!-- /.col-md-5 -->
          
        </div> <!-- /.row -->
        
      </div> <!-- /.container -->

    </header> <!-- /.jumbotron -->


    <!-- Services -->
    <section class="services-section" id="section-1">

      <div class="container">
        <div class="row">
          <div class="col-md-6 col-features text-center">
            <h3 id="title-1">Bitcoin 24/7 Live chart</h3>
            <p>By default, browsers will treat all native form controls (<code>&lt;input&gt;</code>, <code>&lt;select&gt;</code> and <code>&lt;button&gt;</code> elements) inside a <code>&lt;fieldset disabled&gt;</code> as disabled, preventing both keyboard and mouse interactions on them.</p>
          </div> <!-- /.col-md-5 -->

          <div class="col-md-6 col-features features-content"style="padding-top:10px;">
            <h3 id="title-1">Bitcoin 24/7 Live chart</h3>
            <p>By default, browsers will treat all native form controls (<code>&lt;input&gt;</code>, <code>&lt;select&gt;</code> and <code>&lt;button&gt;</code> elements) inside a <code>&lt;fieldset disabled&gt;</code> as disabled, preventing both keyboard and mouse interactions on them.</p>
          </div> <!-- /.col-md-7 -->
          
        </div> <!-- /.row -->

      </div> <!-- /.container -->
      
    </section> <!-- /.services-section -->


    <!-- Services -->
    <section class="" id="section-2" style="background: #f3f4f5;">

      <div class="container">

        <div class="row">

          <div class="col-md-4 col-services">
            
            <!-- Icons -->
            <figure>
              <img class="img-services" src="/assets/images/icons/search.png" alt="">
            </figure>

            <!-- Title -->
            <h4>FAQ</h4>

            <!-- Description -->
            <p>Here we answer to the top frequently asked questions, to read more click here.</p>

          </div> <!-- /.col-md-4 -->

          <div class="col-md-4 col-services">
            
            <!-- Icons -->
            <figure>
              <img class="img-services" src="/assets/images/icons/world-map.png" alt="">
            </figure>

            <!-- Title -->
            <h4>Search</h4>

            <!-- Description -->
            <p>Quaerat, quisquam, perspiciatis, ipsam eveniet a ducimus repellat rem nobis similique.</p>

          </div> <!-- /.col-md-4 -->

          <div class="col-md-4 col-services">
            
            <!-- Icons -->
            <figure>
              <img class="img-services img-margin" src="/assets/images/icons/flag.png" alt="">
            </figure>

            <!-- Title -->
            <h4>Contact Us</h4>

            <!-- Description -->
            <p>If you wish to directly ask or report something click <a href="#section-3">here</a>.</p>

          </div> <!-- /.col-md-4 -->
          
        </div> <!-- /.row -->
        
      </div> <!-- /.container -->
      
    </section> <!-- /.services-section -->




    <!-- Features -->
    <section class="features-section" id="section-2" style="background: white;">

      <div class="container">

        <div class="row">

          <div class="col-md-5 col-features text-center">
            
            <!-- Images showcase -->
            <figure>
              <img class="img-iPhone" src="/assets/images/iphone/1.png" alt="">
            </figure>

          </div> <!-- /.col-md-5 -->

          <div class="col-md-7 col-features features-content">
            
            <!-- Title -->
            <h3 id="title-1">First title features</h3>

            <!-- Description -->
            <p>Omnis, esse quo natus soluta minima facilis ratione dignissimos necessitatibus quod dolorem labore molestiae maxime veritatis laudantium aut odio ullam laboriosam autem!</p>

            <p>
              <a class="btn btn-danger" href="#title-2">Learn more</a>
            </p>

          </div> <!-- /.col-md-7 -->
          
        </div> <!-- /.row -->




        <div class="row media-screen-800">

          <div class="col-md-7 col-features features-content">
            
            <!-- Title -->
            <h3 id="title-2">Second title features</h3>

            <!-- Description -->
            <p>Omnis, esse quo natus soluta minima facilis ratione dignissimos necessitatibus quod dolorem labore molestiae maxime veritatis laudantium aut odio ullam laboriosam autem!</p>

            <p>
              <a class="btn btn-danger" href="./sign-in.html">Sign In</a> &nbsp;
              <a class="btn btn-danger-border" href="./sign-up.html">Sign Up</a>
            </p>

          </div> <!-- /.col-md-7 -->

          <div class="col-md-5 col-features text-center">
            
            <!-- Images showcase -->
            <figure>
              <img class="img-iPhone margin-top margin-screen-800" src="/assets/images/iphone/4.png" alt="">
            </figure>

          </div> <!-- /.col-md-5 -->
          
        </div> <!-- /.row -->




        <div class="row">

          <div class="col-md-5 col-features text-center">
            
            <!-- Images showcase -->
            <figure>
              <img class="img-iPhone margin-top margin-top-1" src="/assets/images/iphone/3.png" alt="">
            </figure>

          </div> <!-- /.col-md-5 -->

          <div class="col-md-7 col-features features-content">
            
            <!-- Title -->
            <h3 id="title-3">Third title features</h3>

            <!-- Description -->
            <p>Omnis, esse quo natus soluta minima facilis ratione dignissimos necessitatibus quod dolorem labore molestiae maxime veritatis laudantium aut odio ullam laboriosam autem!</p>

            <!-- Button -->
            <p class="btn-app-store">
              <a class="btn btn-danger btn-lg" href="#fakelinks">
                <img src="/assets/images/btn-app-store.png" alt="">
              </a>
            </p> <!-- /.btn-app-store -->

          </div> <!-- /.col-md-7 -->
          
        </div> <!-- /.row -->

      </div> <!-- /.container -->

    </section> <!-- /.features-section -->




    <!-- Subscribe -->
    <section class="subscribe-section" id="section-3">

      <div class="container">

        <div class="row">

          <div class="col-md-8">

            <!-- Title -->
            <h2>Subscribe to get delightfully infrequent updates</h2>

            <!-- Subscribe form -->
            <div class="row">

              <div class="col-md-12 col-subscribe">
                <form class="subscribe-form form-inline" action="./index.html" role="form">
                  <!-- Input -->
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address">
                  </div> <!-- /.form-group -->
                  <!-- Button -->
                  <button class="btn btn-success" type="submit">Subscribe</button>
                </form> <!-- /.subscribe-form -->
                <section class="subscribe-description">
                  <p>Don't worry. We do not spam :)</p>
                </section> <!-- /.subscribe-description -->
              </div> <!-- /.col-md-6 -->

            </div> <!-- /.row -->
            
          </div> <!-- /.col-md-12 -->
          <div class="col-md-4">
                <div class="form-group">
                    <label for="usr">Send Message:</label>
                    <input type="text" class="form-control" placeholder="Enter Your Email" id="user_email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Message" style="width:100%" id="user_message"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-sm pull-right" id="send_message">Send</button>
                    <img id="email_loading" class="hide" style="float:right;    
                            margin-top: 4px;
                            margin-right: 5px;" 
                    src="/assets/images/icons/gif/loading1.gif" width="20px">
                </div>
          </div> <!-- /.col-md-12 -->
          
        </div> <!-- /.row -->

      </div> <!-- /.container -->

    </section> <!-- /.subscribe-section -->




    <!-- Footer -->
    <footer class="footer-section" role="contentinfo">

      <div class="container">

        <div class="row">

          <div class="col-md-4 col-footer">
            
            <!-- Footer 1 -->
            <section>
              <p>Made with by <a target="_blank" href="http://www.webprinciples.com/">WebPrinciples</a>.</p>
            </section>

          </div> <!-- /.col-md-4 -->

          <div class="col-md-4 col-footer col-padding">
            
            <!-- Footer 1 -->
            <section class="text-center">
              <p>Be sure to read <a href="#fakelinks">Terms</a> and <a href="#fakelinks">Privacy Policy</a>.</p>
            </section>

            <!-- Social media links -->
            <ul class="social-media-links">

              <li><a class="fa fa-twitter tw" href="#fakelinks"></a></li>
              <li><a class="fa fa-facebook fb" href="#fakelinks"></a></li>
              <li><a class="fa fa-pinterest pn" href="#fakelinks"></a></li>
              
            </ul> <!-- /.social-media-links -->

          </div> <!-- /.col-md-4 -->

          <div class="col-md-4 col-footer">
            
            <!-- Footer 1 -->
            <section>
              <p><strong>WowCheBit, Inc</strong> <br>Mr John Smith 132, My Street,
              <br>Bigtown BG23 4YZ, England</p>
            </section>

          </div> <!-- /.col-md-4 -->
          
        </div> <!-- /.row -->

      </div> <!-- /.container -->

    </footer> <!-- /.footer-section -->
    {!! View::make('partials.login_modal') !!}
    <!-- Load js libs only when the page is loaded. -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/packages/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/application.js"></script>
    <script src="/assets/js/layouts/customize.js"></script>
  </body>
</html>
