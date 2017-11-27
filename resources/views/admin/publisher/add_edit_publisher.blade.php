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

        <form class="form-horizontal" method="POST" action="{{ route('add_publisher') }}">
            {!! csrf_field() !!}

            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-2 col-form-label">Name <font color="red">*</font></label>
              <div class="col-10">
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
            </div>
            <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
              <label for="phone" class="col-2 col-form-label">Phone</label>
              <div class="col-10">
                <input name="phone" class="form-control" type="text" value="{{ old('phone') }}">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
              </div>
            </div>
            <div class="form-group row {{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address" class="col-2 col-form-label">Address</label>
              <div class="col-10">
                <input name="address" class="form-control" type="text" value="{{ old('address') }}">
                <span class="text-danger">{{ $errors->first('address') }}</span>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2 col-form-label">Description</label>
              <div class="col-10">
                <textarea name="description" rows="5" value="{{ old('description') }}"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-info"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Publisher</button>
        </form>
    </div>
</div>
@endsection