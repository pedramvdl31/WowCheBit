@extends($layout)
@section('stylesheets')
  {!! Html::style('/assets/css/pages/website_pages/general.css') !!}
  {!! Html::style('/assets/css/pages/website_pages/events.css') !!}
@stop
@section('scripts')
<script src="/assets/js/pages/website_pages/events.js"></script>
@stop

@section('content')
<div class="container" style="padding-top:80px;background-color:black">
  <div class="jumbotron my-jumbotron" style="">
    <h1>Cocoon-US Massage</h1>
  </div>
  	<div class="panel panel-default my-panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8 col-sm-12 col-xs-12" >
			It is practiced while being centered and connected to the “vital”
			(life) energy.Daily demonstration and initiation to the basic techniques
			of the Cocoon modality will be followed by a massage exchange with a
			partner of choice.
			<br>
			<br>
			The Cocoon Workshop: Aims to restore flow and irrigate the 7 chakras,
			which allows one to unify their body, heart and spirit.	  	
			 <br>
			 <br>
			See more at: 
			<a href="http://cocoon-us.com/pages/about-us/workshop/">
			http://cocoon-us.com/pages/about-us/workshop/</a>
	  	</div>
	  	<div class="col-md-4 col-sm-12 col-xs-12" >
	  		  <div class="col-xs-12 col-md-12">
			    <a class="thumbnail">
			      <img src="/assets/images/img/cocoon.jpg" alt="...">
			    </a>
			  </div>
	  	</div>

	  </div>
	</div>
</div>

@stop