@extends($layout)
@section('stylesheets')
      {!! Html::style('/assets/css/home/homepage.css') !!}
@stop
@section('scripts')
      <script src="/assets/js/homepage.js"></script>
@stop

@section('content')

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>UBU Today</h1>
                        <h3>Creating harmony through renewed body, heart & sprite...</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="{!!route('get-calendar')!!}" class="btn btn-default btn-lg"><i class="fa fa-calendar"></i> <span class="network-name our-text">Upcoming Events</span></a>
                            </li>
                            <li>
                                <a class="btn btn-default btn-lg" id="like-us-btn">
                                <i class="fa fa-thumbs-o-up"></i> 
                                <span class="network-name">Likes <strong><span id="like_num">{!!$likes_count!!}</span></strong></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

  <a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Jo Morris:<br><small>UBU Today Founder</small></h2>
                    <p class="lead">Wendy is an avid advocate for alternative healing
                        modalities specifically related to trauma resolution and disease
                        management. <a href="">Read More</a></p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                   <div class="slider-wrapper col-md-12 col-sm-12 col-xs-12 pull-left" style="">
                        @if($slider_option == true)
                               {!! View::make('partials.homepage.slider')
                                    ->with('slider_images',$slider_images)
                                    ->with('param1_lowered',$param1_lowered)
                                    ->__toString()
                               !!}
                        @endif
                   </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

      <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">UBU TODAY - <br>OSHO KUNDALINI MEDITATION</h2>
                    <p class="lead">Extend form controls by adding text or buttons before, after, or on both sides of any text-based <code>&lt;input&gt;</code>. Use <code>.input-group</code> with an <code>.input-group-addon</code> or <code>.input-group-btn</code> to prepend or append elements to a single <code>.form-control</code>.</p>            
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading">UBU TODAY - <br>MEDITATION</h2>
                        <p class="lead">Extend form controls by adding text or buttons before, after, or on both sides of any text-based <code>&lt;input&gt;</code>. Use <code>.input-group</code> with an <code>.input-group-addon</code> or <code>.input-group-btn</code> to prepend or append elements to a single <code>.form-control</code>.</p>            
                  </div>

            </div>
      </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Vision</h2>
                    <p class="lead">UBU Today's vision is to have a retreat center that functions as a conduit to healing trauma, restoring, renewing & revitalizing. Ultimately resulting in the free flow of vital energy. <a href="">Read</a></p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="/assets/images/img/phones.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

  



@stop