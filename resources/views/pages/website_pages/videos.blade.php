@extends($layout)
@section('stylesheets')
  {!! Html::style('/assets/css/pages/website_pages/general.css') !!}
  {!! Html::style('/assets/css/pages/website_pages/events.css') !!}
@stop
@section('scripts')
<script src="/assets/js/pages/website_pages/events.js"></script>
@stop

@section('content')
<div class="container" style="padding-top:80px;padding-bottom:20px">
  <div class="jumbotron my-jumbotron" style="margin-bottom: 0;">
    <h1>Videos</h1>
  </div>


	<div class="col-md-6">
	      <div class="embed-responsive embed-responsive-4by3">
	            <video controls>
	               <source src="/assets/videos/1.mp4" type="video/mp4">
	            </video>
	      </div>
	</div>
	<div class="col-md-6">
	      <div class="embed-responsive embed-responsive-4by3">
	            <video controls>
	               <source src="/assets/videos/2.mp4" type="video/mp4">
	            </video>
	      </div>
	</div>
	<div class="col-md-6">
	      <div class="embed-responsive embed-responsive-4by3">
	            <video controls>
	               <source src="/assets/videos/3.mp4" type="video/mp4">
	            </video>
	      </div>
	</div>


</div>

@stop