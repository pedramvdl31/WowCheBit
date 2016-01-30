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
    <h1>Calendar</h1>
  </div>
	<script type="text/javascript"  async src="https://ubutoday.tulasoftware.com/assets/calendar-widget.js"></script><a class="tulasoftware-calendar-widget" href="https://ubutoday.tulasoftware.com/calendar/embed?c1=1f1f1f&c2=FFCC00&c3=ffffff&c4=949494">Studio Calendar</a>
</div>

@stop