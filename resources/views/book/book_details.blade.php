@extends('layouts.home_layout')
@section('title')
Detail a Book
@endsection

@section('css_extend')
<link href="/css/book_details.css" rel="stylesheet">
<link href="/css/lightslider/lightslider.css" rel="stylesheet">
<style type="text/css">
    .demo {
    width:420px;
}
ul {
    list-style: none outside none;
    padding-left: 0;
    margin-bottom:0;
}
li {
    display: block;
    float: left;
    margin-right: 6px;
    cursor:pointer;
}
img {
    display: block;
    height: auto;
    max-width: 100%;
}
</style>
@endsection
@section('js_extend')
<script type="text/javascript" src="/js/lightslider/lightslider.js"></script>
<script type="text/javascript">
$('#slideshow').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 9
});
</script>
<script>
    function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.12),
        zoom: 14
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb2XP_B4Dcuzj-KuMh3l8XTQWgdT-AWfk&callback=myMap"></script>
@endsection
@section('home_content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.left_sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <ul id="slideshow">
                                @foreach ($book->images as $image)
                                    <li data-thumb="{{ $image }}">
                                        <img src="{{ $image }}" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $book->title }}</h2>
                            <p>posted by <a href="">{{ $book->user->name }}</a></p>
                            @if (is_null($book->description))
                                <p><b>Description About Book:</b></p>
                                <p>{{ $book->description }}</p>
                            @endif
                            @if ($book->want_to == 1)
                                <span>
                                    <span>{{ number_format($book->price) }} VND</span><br>
                                    <button type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Want to buy
                                    </button>
                                </span>
                            @else
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-exchange"></i>
                                    Want to swap
                                </button>
                            @endif
                            <p><b>Name:</b> {{ $book->name }}</p>
                            <p><b>Author:</b> {{ $book->author->name }}</p>
                            <p><b>Publisher:</b>{{ $book->publisher->name}}</p>
                            <p><b>Area:</b> {{ isset($book->district_id) ? $book->district->name . ' - ' . $book->city->name : $book->city->name}}</p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <div id="map" style="height:400px;background:yellow"></div>
                <div style="margin-top: 50px; margin-bottom: 50px;" class="row">
                    <div class="col-sm-1">
                        <div class="thumbnail">
                        <img class="user-photo img-thumbnail" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->
                    <div class="col-sm-11">
                        <textarea rows="5"></textarea>
                        <button type="button" class="btn btn-outline-info"><i class="fa fa-comments-o" aria-hidden="true"></i> Add Comment</button>
                    </div><!-- /col-sm-5 -->
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <div class="thumbnail">
                        <img class="img-responsive user-photo img-thumbnail" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div><!-- /thumbnail -->
                    </div><!-- /col-sm-1 -->
                    <div class="col-md-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                            </div>
                            <div class="panel-body">
                                Panel content
                            </div><!-- /panel-body -->
                            <button type="button" class="btn btn-outline-info"><i class="fa fa-reply" aria-hidden="true"></i> Reply</button>
                        </div><!-- /panel panel-default -->
                    </div><!-- /col-sm-5 -->
                </div><!-- /row -->
            </div>
        </div>
    </div>
</section>
@endsection
