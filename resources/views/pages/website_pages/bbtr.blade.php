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
    <h1>BioDynamic Breath & Trauma Release</h1>
  </div>
  	<div class="panel panel-default my-panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8 col-sm-12 col-xs-12" >
			BioDynamic Breath® is built on new approach to trauma release.
			This profound and revolutionary system of body / breath therapy
			integrates deep connected breathing with especially designed
			conscious movement, body awareness techniques, bodywork and
			meditation. When skillfully combined in an integrated flow
			and safe environment these techniques result in releasing
			long held trauma from the body/mind.
			<br>
			<br>
			BioDynamic Breath & Trauma Release System® is rooted in synergy
			of Wilhelm Reich’s body oriented therapeutic approach with soft
			and gentle techniques of Peter Levine’s Trauma Healing Modality.
			<br>
			<br>
			BioDynamic Breath and Trauma Release System® is developed by <a href="{!!route('get_giten_page')!!}">Giten
			Tonkov</a> after nearly 20 years of self exploration, study, and
			experience of working with countless individual clients and groups.
			This System is based on an observation of how tension is held and
			distributed in the body/mind. This approach is designed to break
			through layers of body armoring, releasing mental, emotional and
			physical resistance down to our core.
			<br>
			<br>
			BioDynamic Breath & Trauma Release System® enables us to experience
			the full range of sensations and emotions available to a human being.
			Furthermore, this approach expands our capacity to contain and support
			the free flow of our energy. As a result it restructures at a cellular
			level, supporting the full opening of the spine and releasing the 
			chronic tension held in the nervous system. Ultimately we transform
			into being increasingly present, conscious, and compassionate in our
			every day life. Through this work we let go of negative self image,
			chronic tension and physical pain. 
			<br>
			<br>
			When opening up through this work
			step by step with great care and awareness we move into emotional
			freedom and re-gain free flowing graceful movement and unrestricted
			breathing. We open up to acceptance of ourself and others, 
			celebrating life in it’s fullest.

			<br>
			<br>
			See more at: 
			<a href="http://cocoon-us.com/cocoon-massage/biodynamic-breath-and-trauma-release-bbtr/">
			http://cocoon-us.com/cocoon-massage/biodynamic-breath-and-trauma-release-bbtr/</a>
	  	</div>
	  	<div class="col-md-4 col-sm-12 col-xs-12" >
	  		  <div class="col-xs-12 col-md-12">
			    <a class="thumbnail">
			      <img src="/assets/images/img/bbtr-2.jpg" alt="...">
			    </a>
			  </div>
	  	</div>

	  </div>
	</div>
</div>

@stop