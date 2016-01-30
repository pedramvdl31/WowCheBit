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
    <h1>Jean Paul</h1>
  </div>
  	<div class="panel panel-default my-panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8 col-sm-12 col-xs-12" >
        Jean-Paul (Sathya) has been a practicing Psychologist since 1977. From 1977 until 1985 he led a Psychiatric Children’s Hospital in Paris, France. 
		<br>
		<br>
        For the next 15 years, he oversaw training at multiple major hospitals in France. Jean-Paul has studied and practiced Gestalt, Bioenergy, Rolfing and Systemic Therapy Rebirth from 1981 to 1982 . 
		<br>
		<br>
        A facilitator in an Emotional Body Painting workshop at the Humanist Psychology Congress of Paris in 1982, he discovered the Tantra of Osho and studied with Sudheer Roche, an assistant of Osho. Jean-Paul is very spiritually gifted. He became a Tibetan Master and Ushui Reiki teacher in 2001 and studied with an Amazonian Shaman from 1999 to 2005. He developed and is the founder of the Cocoon modality. Cocoon is the biggest e-enterprise Tantric massage business in Paris, France.	  	
		<br>
		<br>
				See more at: 
				<a href="http://cocoon-us.com/jean-paul/">
					http://cocoon-us.com/jean-paul/
				</a>
        <br>
        for more information about cocoon-us visit:
        <a href="http://cocoon-us.com">
          http://cocoon-us.com
        </a>
	  	</div>
	  	<div class="col-md-4 col-sm-12 col-xs-12" >
	  		  <div class="col-xs-12 col-md-12">
			    <a class="thumbnail">
			      <img src="/assets/images/img/jean.jpg" alt="...">
			    </a>
			  </div>
	  	</div>

	  </div>
	</div>
</div>

@stop