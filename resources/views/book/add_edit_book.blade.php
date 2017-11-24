@extends('layouts.home_layout')
@section('title')
Add New Book
@endsection

@section('css_extend')
<link rel="stylesheet" type="text/css" href="{{ asset('css/add_edit_book.css')}}">
@endsection

@section('js_extend')
<script type="text/javascript" src="{{ asset('js/book.js') }}"></script>
@endsection
@section('home_content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.left_sidebar')
            </div>
            
            <div class="col-sm-9 padding-right">
                <form class="form-horizontal" method="POST" action="{{ route('add_book') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="title" class="col-2 col-form-label">Title</label>
                      <div class="col-10">
                        <input class="form-control" type="text" placeholder="Example: Đắc Nhân Tâm (Khổ Lớn)">
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-2 col-form-label">Name</label>
                      <div class="col-10">
                        <input class="form-control" type="search" placeholder="Example: Đắc Nhân Tâm">
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="author" class="col-2 col-form-label">Author</label>
                      <div class="col-10">
                        <input class="form-control" type="email" placeholder="Example: Dale Carnegie">
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="author" class="col-2 col-form-label">Status</label>
                      <div class="col-10">
                        <select class="form-control">
                            <option>Old Book</option>
                            <option>Like New</option>
                            <option>New 100%</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="author" class="col-2 col-form-label">Upload Image</label>
                        <div class="col-10">
                            <div class="choose_file">
                                <span>Choose Image</span>
                                <input type="file" id="files" name="image_list" accept="image/*" required multiple>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="show_image_list">
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="description" class="col-2 col-form-label">Description</label>
                      <div class="col-10">
                        <textarea rows="5"></textarea>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="description" class="col-2 col-form-label">Location</label>
                      <div class="col-10">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control">
                                    <option>---</option>
                                    <option>Hà Nội</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control">
                                    <option>---</option>
                                    <option>Q. Hai Bà Trưng</option>
                                </select>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="want_to">Want to</label>
                        <select class="form-control">
                            <option>Swap</option>
                            <option>Sell</option>
                        </select>
                    </div>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="author" class="col-2 col-form-label">Price</label>
                      <div class="col-10 form-inline">
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="number" step="1000" class="form-control">
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