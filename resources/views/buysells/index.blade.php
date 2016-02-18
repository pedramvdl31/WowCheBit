@extends($layout)
@section('stylesheets')

@stop
@section('scripts')
<script type="text/javascript" src="/assets/js/buysells/index.js"></script>
@stop

@section('content')

<div class="jumbotron">
  <h1>Buy/Sell Index</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">
    <div>

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#buy" aria-controls="buy" role="tab" data-toggle="tab">Buy</a></li>
        <li role="presentation"><a href="#sell" aria-controls="sell" role="tab" data-toggle="tab">Sell</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="buy">

          <div class="table-responsive">
            <table class="table table-bordered" style="font-size:18px">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Type</th>
                      <th>Currency</th>
                      <th>Payment Method</th>
                      <th>Status</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all as $ackey => $cat)
                      @if($cat['type']==1)
                      <tr>
                        <th scope="row">{{$cat['id']}}</th>
                        <td>{{$cat['type_html']}}</td>
                        <td>{{$cat['currency_html']}}</td>
                        <td>{{$cat['method_html']}}</td>
                        <td>{!!$cat['status_html']!!}</td>
                        <td>{{$cat['created_at_html']}}</td>
                        <td>
                          <a href="{!! route('buysells_view',$cat->id) !!}">View</a>
                        </td>
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>

        </div>
        <!-- BUY END -->FA
        <div role="tabpanel" class="tab-pane" id="sell">

        </div>


      </div>

    </div>
  </div>

</div>
@stop