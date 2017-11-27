@extends('admin.layouts.admin_layout')

@section('title')
Manage Publisher
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
                            <td><button type="button" class="edit btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                            <td><button type="button" class="delete btn btn-danger" ><i class="fa fa-times" aria-hidden="true"></i> Delete</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- /. ROW  -->
<hr />
</div>

@endsection