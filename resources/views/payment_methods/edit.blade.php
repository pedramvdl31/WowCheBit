@extends($layout)
@section('stylesheets')

@stop
@section('scripts')


@stop

@section('content')
<div class="jumbotron">
  <h1>Payment_methods Add</h1>
</div>
<div class="panel panel-default">

  <div class="panel-body">
  {!! Form::open(array('action' => 'AdminsController@postPaymentMethodsEdit', 'class'=>'','role'=>"form")) !!}
    <div class="form-group {{ $errors->has('title') ? 'has-error' : false }}">
      <label class="control-label" for="title">Title</label>
      {!! Form::text('title',$data['title'], array('class'=>'form-control', 'placeholder'=>'Title')) !!}
        @foreach($errors->get('title') as $message)
            <span class='help-block'>{{ $message }}</span>
        @endforeach
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : false }}">
      <label class="control-label" for="description">Description (optional)</label>
      {!! Form::textarea('description',$data['decoded_description'], array('size'=>'10x5','class'=>'form-control', 'placeholder'=>'Description')) !!}
        @foreach($errors->get('description') as $message)
            <span class='help-block'>{{ $message }}</span>
        @endforeach
    </div>

    <div class="form-group {{ $errors->has('address') ? 'has-error' : false }}">
      <label class="control-label" for="address">Address</label>
      {!! Form::text('address',$data['address'], array('class'=>'form-control', 'placeholder'=>'Address')) !!}
        @foreach($errors->get('address') as $message)
            <span class='help-block'>{{ $message }}</span>
        @endforeach
    </div>

      <label for="pwd">Default Wait Hours:</label>
      <div class="input-group {{ $errors->has('hours') ? 'has-error' : false }}">
        <input type="text" class="form-control" aria-label="Amount" name="hours" placeholder="24" value="{{$data['default_wait_hours']}}">
        <span class="input-group-addon">Hours</span>
      </div>

  </div>
  <div class="panel-footer clearfix">
    <a href="{!! route('payment_method_index') !!} " class="btn btn-info">Back</a>
    <button class="btn btn-primary pull-right">Add</button>
  </div>
  <input name="this_id" value="{{$this_id}}" type="hidden" >
    {!! Form::close() !!}
</div>
@stop