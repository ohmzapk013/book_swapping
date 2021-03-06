@extends('layouts.home_layout')
@section('title')
Add New Book
@endsection

@section('css_extend')
<link rel="stylesheet" type="text/css" href="{{ asset('css/add_edit_book.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap_select/bootstrap-select.css')}}">
@endsection

@section('js_extend')
<script type="text/javascript" src="{{ asset('js/book.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap_select/bootstrap-select.js') }}"></script>
@endsection
@section('home_content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.left_sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                @if (count($errors))
                  <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                  </div>
                @endif

                <form id="form_add_book" class="form-horizontal" method="POST" action="{{ route('add_book') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group row {{ $errors->has('title') ? ' has-error' : '' }}">
                      <label for="title" class="col-2 col-form-label">Title <font color="red">*</font></label>
                      <div class="col-10">
                        <input name="title" class="form-control" type="text" placeholder="Example: Đắc Nhân Tâm (Khổ Lớn)" value="{{ old('title') }}" required>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-2 col-form-label">Name <font color="red">*</font></label>
                      <div class="col-10">
                        <input name="name" class="form-control" type="text" placeholder="Example: Đắc Nhân Tâm" value="{{ old('name') }}" required>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('category') ? ' has-error' : '' }}">
                        <label for="category" class="col-2 col-form-label">Category <font color="red">*</font></label>
                        <div class="col-10">
                          <select name="categories[]" class="selectpicker form-control" data-live-search="true" title="Please select a or multiple category ..." multiple>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('publisher') ? ' has-error' : '' }}">
                        <label for="publisher" class="col-2 col-form-label">Publisher <font color="red">*</font></label>
                        <div class="col-10">
                          <select name="publisher" class="selectpicker form-control" data-live-search="true" title="Please select a Publisher ...">
                            @foreach ($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{ $publisher->name }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger">{{ $errors->first('publisher') }}</span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('author') ? ' has-error' : '' }}">
                      <label for="author" class="col-2 col-form-label">Author <font color="red">*</font></label>
                      <div class="col-10">
                        <input name="author" class="form-control" type="text" placeholder="Example: Dale Carnegie" value="{{ old('author') }}">
                        <span class="text-danger">{{ $errors->first('author') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                      <label for="author" class="col-2 col-form-label">Status <font color="red">*</font></label>
                      <div class="col-10">
                        <select name="status" class="form-control">
                            <option value="0" selected>Old Book</option>
                            <option value="1">Like New</option>
                            <option value="2">New 100%</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-2 col-form-label">Upload Image</label>
                        <div class="col-10">
                            <div class="choose_file">
                                <span>Choose Image</span>
                                <input type="file" id="files" name="image_list[]" accept="image/*" multiple required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="show_image_list">
                    </div>
                    <input type="hidden" name="image_list_upload">
                    <div class="form-group row">
                      <label for="description" class="col-2 col-form-label">Description</label>
                      <div class="col-10">
                        <textarea name="description" rows="5" value="{{ old('description') }}"></textarea>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('location') ? ' has-error' : '' }}">
                      <label for="description" class="col-2 col-form-label">Location <font color="red">*</font></label>
                      <div class="col-10">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="city_id" class="selectpicker form-control city" title="Choose a city">
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="district_id">
                                    <option class="bs-title-option" value>Choose a district</option>
                                </select>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('want_to') ? ' has-error' : '' }}">
                        <label for="want_to">Want to <font color="red">*</font></label>
                        <select name="want_to" class="form-control">
                            <option value="0" selected>Swap</option>
                            <option value="1">Sell</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('want_to') }}</span>
                    </div>
                    <div id="price" class="form-group row {{ $errors->has('price') ? ' has-error' : '' }}">
                      <label for="price" class="col-2 col-form-label">Price</label>
                      <div class="col-10 form-inline">
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input name="price" type="number" class="form-control" value="{{ old('price') }}">
                                <div class="input-group-addon">VNĐ</div>
                              </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection