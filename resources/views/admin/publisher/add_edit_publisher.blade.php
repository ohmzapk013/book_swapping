@extends('admin.layouts.admin_layout')

@section('title')
Add Publisher
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-right: -5px;">
        <h3>Manage Publisher</h3><br>
        @if (count($errors))
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
          </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ isset($publisher) ? route('update_publisher', $publisher->id) : route('add_publisher') }}">
            {!! csrf_field() !!}

            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-2 col-form-label">Name <font color="red">*</font></label>
              <div class="col-10">
                <input name="name" class="form-control" type="text" value="{{ isset($publisher) ? $publisher->name : old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
            </div>
            <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
              <label for="phone" class="col-2 col-form-label">Phone</label>
              <div class="col-10">
                <input name="phone" class="form-control" type="text" value="{{ isset($publisher) ? $publisher->phone : old('phone') }}">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
              </div>
            </div>
            <div class="form-group row {{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address" class="col-2 col-form-label">Address</label>
              <div class="col-10">
                <input name="address" class="form-control" type="text" value="{{ isset($publisher) ? $publisher->address : old('address') }}">
                <span class="text-danger">{{ $errors->first('address') }}</span>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2 col-form-label">Description</label>
              <div class="col-10">
                <textarea name="description" rows="5">{{ isset($publisher) ? $publisher->description : old('description') }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-info">
              @if (isset($publisher))
                <span class="glyphicon glyphicon-send"></span> Update Publisher
              @else
                <i class="fa fa-plus-square" aria-hidden="true"></i> Add Publisher
              @endif
            </button>
        </form>
    </div>
</div>
@endsection