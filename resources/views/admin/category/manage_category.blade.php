@extends('admin.layouts.admin_layout')

@section('title')
Manage Category
@endsection

@section('js_extend')
<script type="text/javascript" src="{{ asset('js/category.js') }}"></script>
@endsection

@section('content')
<div class="row" style="margin-right: -5px;">
    <div class="col-md-12">
        <div class="row">
            <h3>Manage Category</h3><br>
            <div>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#add_category"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Category</a>
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
                        <th>Category</th>
                        <th>Description</th>
                        <th class="col-md-1">Edit</th>
                        <th class="col-md-1">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td><button type="button" class="edit btn btn-warning" data-id="{{$category->id}}" data-name="{{$category->name}}" data-description="{{$category->description}}" data-toggle="modal" data-target="#edit_category"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                            <td><button type="button" class="delete btn btn-danger" data-id="{{$category->id}}" data-name="{{$category->name}}" data-toggle="modal" data-target="#delete_category"><i class="fa fa-times" aria-hidden="true"></i> Delete</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- /. ROW  -->
<hr />
<!-- /. ROW  -->           
</div>

<!-- Modal For Add Category -->
<form class="modal fade" id="add_category" role="dialog" method="POST" action="{{ route('categories')}}">
    {!! csrf_field() !!}
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-value-title">Add category</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Name <font color="red">*</font></label>
                    <input name="name" placeholder="Name" class="form-control" type="text" required="">
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea name="description" placeholder="Description" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: 0px;">
                <button type="submit" class="btn btn-primary" >Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

<!-- Modal For Edit Category -->
<form class="modal fade" id="edit_category" role="dialog" method="POST" action="">
    {!! csrf_field() !!}
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-value-title">Edit category</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input name="name" id="edit_name" placeholder="Name" class="form-control" type="text" required="">
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea name="description" id="edit_description" placeholder="Description" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: 0px;">
                <button type="submit" class="btn btn-primary" >Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

<!-- show confirm delete Post -->
<form class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_category" action="" method="POST">
    {!! csrf_field() !!}
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="lbl_delete_category"></h4>
          </div>
          <div class="modal-footer" style="margin-top: 0px;">
            <button type="submit" class="btn btn-default" id="modal-btn-yes">Yes</button>
            <button type="button" class="btn btn-primary" id="modal-btn-no" data-dismiss="modal">No</button>
          </div>
        </div>
    </div>
</form>
@endsection