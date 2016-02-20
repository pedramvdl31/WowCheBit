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
                <a href="/" class="pointer"><img width="107px" class="img-logo" src="/assets/images/brand_image/png/logo.png" alt=""></a>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a this-href="dashboard" this-slug="buy" class="fin m-top-nav-sb">Buy</a>
                    </li>
                    <li>
                        <a this-href="dashboard" this-slug="sell" class="fin m-top-nav-sb">Sell</a>
                    </li>
                    @if(Auth::check())
                      <li>
                          <a this-href="profile" class="fin m-top-nav">Profile</a>
                      </li>
                      <li>
                          <a this-href="order" class="fin m-top-nav">Order</a>
                      </li>
                      <li>
                          <a this-href="profile" class="fin m-top-nav">Wallet</a>
                      </li>
                    @endif
                    <li>
                        <a>Help</a>
                    </li>
                    <li>
                       @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!!Auth::user()->email!!}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a>Edit Profile</a></li>
                              <li><a href="{!!route('users_logout')!!}" class="logout-btn clickables-a">Log Out</a></li>
                            </ul>
                        </li>
                      @else
                        <li><a class="login-cats pointer login-btn" this-href="signin">Log In</a>
                        </li>
                        <li><a class="login-cats pointer login-btn" this-href="signup">Register</a>
                        </li>
                      @endif
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="flashmessage" style="margin:50px 0 0 0;">
    <style type="text/css">.alert-success,.alert-danger{margin: 0;}</style>
      @include('flash::message')
    </div>

    <!-- Jumbotron -->
    <header class="jumbotron" role="banner" id="section-0">
      <div class="container">

        <div class="row">

          <div class="col-md-6">


            <!-- Title -->
            <h1>WowCheBit</h1>
            <!-- Sub title -->
            <p>
              If you want to buy or sell bitcoins you came to the right place.
            </p>
            <br>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:10px">
              <a this-href="dashboard" this-slug="buy" style="z-index:1" class="col-md-5 col-xs-12 col-sm-12 btn btn-info btn-sm sell-buy-btn buy-btn"><i><img  width="23px" src="/assets/images/icons/bitcoin.png"></i>&nbspBuy €<strong><span class="onp-b"><img style="margin-left: 9px;margin-top: -3px;" class="upd_g hide" src="/assets/images/icons/gif/loading1.gif" width="20px"></span></a>
              <a this-href="dashboard" this-slug="sell" style="z-index:1" class="col-md-5 pull-right col-xs-12 col-sm-12 btn btn-success btn-sm sell-buy-btn sell-btn"><i><img width="23px" src="/assets/images/icons/bitcoin.png"></i>&nbspSell €<img style="margin-left: 9px;margin-top: -3px;" class="upd_g hide" src="/assets/images/icons/gif/loading1.gif" width="20px"><strong><span class="onp-s"></span></strong></a>
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

          <div class="col-md-4 col-services text-center">
            

            <!-- Icons -->
            <figure>
              <img class="img-services img-margin" src="/assets/images/icons/flag.png" alt="">
            </figure>

            <!-- Title -->
            <h4>BUY & SELL SECURELY</h4>

            <!-- Description -->
            <p>Security is our highest priority. To guarantee the highest level of security for your account, we are using state of the art technology and security standards.</p>

          </div> <!-- /.col-md-4 -->

          <div class="col-md-4 col-services text-center">
            
            <!-- Icons -->
            <figure>
              <img class="img-services" src="/assets/images/icons/world-map.svg" alt="">
            </figure>

            <!-- Title -->
            <h4>BE COMFORTABLE</h4>

            <!-- Description -->
            <p>With strong API-applications, high-end servers and a real-time, fully automated order system, we are able to provide you with 24/7 service and a secure environment to make your first steps into the crypto world in the best way possible.</p>

          </div> <!-- /.col-md-4 -->

          <div class="col-md-4 col-services text-center">
            
            <!-- Icons -->
            <figure>
              <img class="img-services" src="/assets/images/icons/search.png" alt="">
            </figure>

            <!-- Title -->
            <h4>BE IN THE FAST LANE</h4>

            <!-- Description -->
            <p>Coinimal was designed to provide you with the easiest and fastest access to Cryptocoins. With Coinimal you can order your coins in less than 2 minutes.</p>

          </div> <!-- /.col-md-4 -->
          
        </div> <!-- /.row -->
        
      </div> <!-- /.container -->
      
    </section> <!-- /.services-section -->







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


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/568ec78d87faab5426776b11/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
<!--End of Tawk.to Script-->

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
    @if(Auth::check())
      {!! View::make('partials.dashboard_modal')
      ->with('w_a',$w_a)
      ->with('all_bs',$all_bs)
      ->with('all_orders',$all_orders)
      ->with('all_payment_methods',$all_payment_methods)->__toString() !!}
    @endif

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