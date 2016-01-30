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
    <h1>Jo Morris</h1>
  </div>
  	<div class="panel panel-default my-panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8 col-sm-12 col-xs-12" >
              Wendy Morrison aka Jo Morris is the founder of UBU Today. She is an avid
              advocate for alternative healing modalities specifically
              related to trauma resolution and disease management.
              Wendy has her MA in Industrial Organizational Psychology
              from the University of Detroit, MI and studied Nursing
              for 4 years at Madonna University.
              <br>
              <br>
              Wendy worked as a
              VP of Human Resources until 2010 when she was diagnosed
              with Multiple System Atrophy (MSA). It was then that
              her quest for healing led her to Greece where she met
              Giten Tonkov (founder of Biodynamic Breath & Trauma Release)
              & Jean-Paul LaCroix (founder of the Cocoon Therapeutic
              Touch Modality).
              <br> 
              <br> 
              She has studied and practiced multiple
              forms of breath-work, Tantra, massage and meditation.
              She is a certified Franklin Covey Facilitator and has received
              certification in Biodynamic Breath and Trauma Release (BBTR).
              She has attended multiple Cocoon workshops in Greece and Paris
              and is currently training with Jean Paul Lacroix and the Cocoon
              team. Wendy leads promotion and marketing & social media sites
              for Cocoon in the United States.
              <br>
              <br>
              She is the founder of UBU Today
              which is committed to promoting alternative forms of healing
              and vital energy restoration in the United States. 	  	
              <br>
				See more at: 
				<a href="http://wendyjomorrison.com/">
					http://wendyjomorrison.com/
				</a>
	  	</div>
	  	<div class="col-md-4 col-sm-12 col-xs-12" >
	  		  <div class="col-xs-12 col-md-12">
			    <a class="thumbnail">
			      <img src="/assets/images/img/jo.jpg" alt="...">
			    </a>
			  </div>
	  	</div>

	  </div>
	</div>
</div>

@stop