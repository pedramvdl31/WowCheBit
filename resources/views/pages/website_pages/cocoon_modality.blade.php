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
    <h1>Cocoon Modality</h1>
  </div>
  	<div class="panel panel-default my-panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8 col-sm-12 col-xs-12" >
			THE COCOON MODALITY INCORPORATES
			<br>
			<br>
			1.) Presence: Shamanic “Vital Breath” (breath-work) exercises are incorporated throughout the workshop.
			The exercises allow a safe forum to release traumatic, emotional or sexual blockages that often unconsciously manifest in the body. Safe release of these blockages creates the ability to connect with one’s self and the Universe.
			<br>
			<br>
			2.) Consciousness: Daily meditation exercises reaffirm the unity of the body – soul – spirit.
			(1-2 evening shamanic / tantric rituals)
			<br>
			<br>
			3.) Massage: The massage is spiritual, healing, sensual and tender. The technique involves conscious touch and resourcing. It is practiced while being centered and connected to the “vital” (life) energy.	  	<br>
			<br>
			See more at: 
			<a href="http://cocoon-us.com/">
			http://cocoon-us.com/</a>
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