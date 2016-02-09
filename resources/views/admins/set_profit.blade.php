@extends($layout)
@section('stylesheets')
@stop
@section('scripts')
@stop

@section('content')
  {!! Form::open(array('action' => 'AdminsController@postSetProfit', 'class'=>'','role'=>"form")) !!}
  <div class="jumbotron">
    <h1>Profit Setup</h1>
  </div>
  <div class="panel panel-default">

    <div class="panel-body">
      <label for="pwd">Sell Profit:</label>
      <div class="input-group {{ $errors->has('sell-profit') ? 'has-error' : false }}" >
        <input type="text" value="{{$setup_data->sell_percentage}}" class="form-control" aria-label="Amount" name="sell-profit">
        <span class="input-group-addon">%</span>
      </div>
      @foreach($errors->get('sell-profit') as $message)
          <span class='help-block'>{{ $message }}</span>
      @endforeach

      <label for="pwd">Buy Profit:</label>
      <div class="input-group {{ $errors->has('buy-profit') ? 'has-error' : false }}">
        <input type="text" value="{{$setup_data->buy_percentage}}" class="form-control" aria-label="Amount" name="buy-profit">
        <span class="input-group-addon">%</span>
      </div>
      @foreach($errors->get('buy-profit') as $message)
        <span class='help-block'>{{ $message }}</span>
      @endforeach

    </div>
    <div class="panel-footer clearfix">
      <button class="btn btn-primary pull-right">Save</button>
    </div>
      
  </div>
{!! Form::close() !!}
@stop