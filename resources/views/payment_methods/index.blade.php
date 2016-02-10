@extends($layout)
@section('stylesheets')

@stop
@section('scripts')

@stop

@section('content')
<div class="jumbotron">
  <h1>Payment Methods Index</h1>
    <ol class="breadcrumb">
      <li class="active">Overview</li>
      <li><a href="{!!route('payment_method_add')!!}">Add New <i class="glyphicon glyphicon-edit"></i></a></li>
    </ol>
</div>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered" style="font-size:18px">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_payment_methods as $ackey => $cat)
                <tr>
                  <th scope="row">{{$cat['id']}}</th>
                  <td>{{$cat['title']}}</td>
                  <td>{!!$cat['address']!!}</td>
                  <td>{{$cat['created_at_html']}}</td>
                  <td>
                    <a href="{!! route('payment_method_edit',$cat->id) !!}">Edit
                    |&nbsp<a href="{!! route('payment_method_remove',$cat->id) !!}">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>

</div>
@stop