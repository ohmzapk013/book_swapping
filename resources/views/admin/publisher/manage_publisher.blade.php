@extends('admin.layouts.admin_layout')

@section('title')
Manage Publisher
@endsection

@section('js_extend')
<script type="text/javascript" src="{{ asset('js/publisher.js') }}"></script>
@endsection

@section('content')
<div class="row" style="margin-right: -5px;">
    <div class="col-md-12">
        <div class="row">
            <h3>Manage Publisher</h3><br>
            <div>
                <a class="btn btn-info" href="{{route('add_publisher')}}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Publisher</a>
            </div><br>
            @if (session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if (count($errors))
              <div class="alert alert-danger">
                <strong>Whoops!</strong> <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
            @endif
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th class="col-md-1">Edit</th>
                        <th class="col-md-1">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publishers as $index => $publisher)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->phone }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>{{ $publisher->description }}</td>
                            <td><a href="{{route('edit_publisher', $publisher->id)}}" class="edit btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
                            <td><a class="delete btn btn-danger" data-id="{{$publisher->id}}" data-name="{{$publisher->name}}" data-toggle="modal" data-target="#delete_publisher"><i class="fa fa-times" aria-hidden="true"></i> Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- /. ROW  -->
<hr />
</div>

<!-- show confirm delete Post -->
<form class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_publisher" action="" method="POST">
    {!! csrf_field() !!}
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="lbl_delete_publisher"></h4>
          </div>
          <div class="modal-footer" style="margin-top: 0px;">
            <button type="submit" class="btn btn-default" id="modal-btn-yes">Yes</button>
            <button type="button" class="btn btn-primary" id="modal-btn-no" data-dismiss="modal">No</button>
          </div>
        </div>
    </div>
</form>
@endsection