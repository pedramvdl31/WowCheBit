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
    <h1>Prema Kreever</h1>
  </div>
  	<div class="panel panel-default my-panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8 col-sm-12 col-xs-12" >
			Prema combines more than 20 years of experience in Eastern medicine, meditation, emotional release work, and body-mind therapies to guide you in your journey to wholeness and clarity about who you really are.
			<br>
			<br>
			By treating thousands of patients as a doctor of Chinese medicine she saw how vital our emotional health is for our physical health. Looking for ways to help herself and her patients release stored trauma in the body she discovered BioDynamic Breath & Trauma Release. She good fortune to be trained by its creator, Giten Tonkov, in Europe and the U.S. and considers it a sacred honor to facilitate and teach this deeply healing system of breath work. 
			In addition to her training in Chinese Medicine she is a certified Internal Alchemie coach and has trained in many therapeutic healing modalities including Hakomi (a body-centered system of psychotherapy), Shiatsu, Trauma Healing, Reiki, Tantra, pulsation, and bioenergetic chakra therapy.  		
	  		<a href=""></a>
	  	</div>
	  	<div class="col-md-4 col-sm-12 col-xs-12" >
	  		  <div class="col-xs-12 col-md-12">
			    <a class="thumbnail">
			      <img src="/assets/images/img/prema.jpg" alt="...">
			    </a>
			  </div>
	  	</div>

	  </div>
	</div>
</div>

@stop