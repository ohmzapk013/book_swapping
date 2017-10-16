@extends('layouts.home_layout')
@section('title')
Add New Book
@endsection

@section('home_content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.left_sidebar')
            </div>
            
            <div class="col-sm-9 padding-right">
                <form>
                    <div class="form-group row">
                      <label for="title" class="col-2 col-form-label">Title</label>
                      <div class="col-10">
                        <input class="form-control" type="text" placeholder="Example: Đắc Nhân Tâm (Khổ Lớn)">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-2 col-form-label">Name</label>
                      <div class="col-10">
                        <input class="form-control" type="search" placeholder="Example: Đắc Nhân Tâm">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="author" class="col-2 col-form-label">Author</label>
                      <div class="col-10">
                        <input class="form-control" type="email" placeholder="Example: Dale Carnegie">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="author" class="col-2 col-form-label">Status</label>
                      <div class="col-10">
                        <select class="form-control">
                            <option>Old Book</option>
                            <option>Like New</option>
                            <option>Brand New 100%</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="author" class="col-2 col-form-label">Upload Image</label>
                        <div class="col-10">
                            <div class="choose_file">
                                <span>Choose Image</span>
                                <input type="file" name="image_list" accept="image/*" required multiple>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-2 col-form-label">Description</label>
                      <div class="col-10">
                        <textarea rows="5"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
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
                    <div class="form-group row">
                        <label for="want_to">Want to</label>
                        <select class="form-control">
                            <option>Swap</option>
                            <option>Sell</option>
                        </select>
                    </div>
                    <div class="form-group row">
                      <label for="author" class="col-2 col-form-label">Price</label>
                      <div class="col-10 form-inline">
                              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="number" step="1000" class="form-control">
                                <div class="input-group-addon">VNĐ</div>
                              </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg">Add</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection