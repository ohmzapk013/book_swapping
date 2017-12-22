@extends('layouts.home_layout')
@section('title')
Home | Book Swapping
@endsection
@section('cs_extend')
<style type="text/css">
.nopad {
    padding-left: 0 !important;
    padding-right: 0 !important;
}
/*image gallery*/
.image-checkbox {
    cursor: pointer;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    border: 4px solid transparent;
    margin-bottom: 0;
    outline: 0;
}
.image-checkbox input[type="checkbox"] {
    display: none;
}

.image-checkbox-checked {
    border-color: #4783B0;
}
.image-checkbox .fa {
  position: absolute;
  color: #4A79A3;
  background-color: #fff;
  padding: 10px;
  top: 0;
  right: 0;
}
.image-checkbox-checked .fa {
  display: block !important;
}
</style>
@endsection
@section('js_extend')
<script type="text/javascript">
// image gallery
// init the state from the input
$(".image-checkbox").each(function () {
  if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
    $(this).addClass('image-checkbox-checked');
  }
  else {
    $(this).removeClass('image-checkbox-checked');
  }
});

// sync the state to the input
$(".image-checkbox").on("click", function (e) {
  $(this).toggleClass('image-checkbox-checked');
  var $checkbox = $(this).find('input[type="checkbox"]');
  $checkbox.prop("checked",!$checkbox.prop("checked"))

  e.preventDefault();
});
</script>
@endsection
@section('home_content')
<section>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<div class="container">
  <h3>Bootstrap image checkbox(multiple)</h3>
  <div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
    <label class="image-checkbox">
      <img class="img-responsive" src="https://dummyimage.com/600x400/000/fff" />
      <input type="checkbox" name="image[]" value="" />
      <i class="fa fa-check hidden"></i>
    </label>
  </div>
  <div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
    <label class="image-checkbox">
      <img class="img-responsive" src="https://dummyimage.com/600x400/000/fff" />
      <input type="checkbox" name="image[]" value="" />
      <i class="fa fa-check hidden"></i>
    </label>
  </div>
  <div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
    <label class="image-checkbox">
      <img class="img-responsive" src="https://dummyimage.com/600x400/000/fff" />
      <input type="checkbox" name="image[]" value="" />
      <i class="fa fa-check hidden"></i>
    </label>
  </div>
  <div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
    <label class="image-checkbox">
      <img class="img-responsive" src="https://dummyimage.com/600x400/000/fff" />
      <input type="checkbox" name="image[]" value="" />
      <i class="fa fa-check hidden"></i>
    </label>
  </div>
  <div class="col-xs-4 col-sm-3 col-md-2 nopad text-center">
    <label class="image-checkbox">
      <img class="img-responsive" src="https://dummyimage.com/600x400/000/fff" />
      <input type="checkbox" name="image[]" value="" />
      <i class="fa fa-check hidden"></i>
    </label>
  </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.left_sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center" style="margin-bottom: 30px;">Choose Book to Swap</h2>
                    <div>
                    @foreach ($books as $book)
                        <div class="col-sm-4 book-item">
                            <div class="product-image-wrapper" style="background: #f5f5f0; width: 246px; height: 440px;">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('book_detail', $book->id)}}">
                                                <img width="246" height="300" src="{{ $book->images[0]}}" alt="" />
                                            </a>
                                            <h2>{{ ($book->want_to == 1) ? number_format($book->price) : '' }}</h2>
                                            <p>{{ $book->name }}</p> by <a href="#">{{ $book->author->name}}</a>
                                        </div>
                                </div>
                                <input type="checkbox" name="image[]" value="" />
                                <i class="fa fa-check hidden"></i>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection