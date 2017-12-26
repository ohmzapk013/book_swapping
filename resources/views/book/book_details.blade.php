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
<script type="text/javascript" src="/js/book.js"></script>
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
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
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
                            <img class="user-photo img-thumbnail" src="{{ Auth::user()->avatar }}">
                        </div><!-- /thumbnail -->
                        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                    </div><!-- /col-sm-2 -->
                    <div class="col-sm-11">
                        <textarea rows="5" id="comment_content"></textarea>
                        <button type="button" class="btn btn-outline-info" name="add_comment"><i class="fa fa-comments-o" aria-hidden="true"></i> Add Comment</button>
                    </div><!-- /col-sm-5 -->
                </div>
                <div id="all_comment">
                @foreach ($comments as $comment)
                    <div class="row">
                        <div class="col-md-1">
                            <div class="thumbnail" style="">
                            <img class="img-responsive user-photo img-thumbnail" src="{{ $comment->user->avatar }}">
                            </div><!-- /thumbnail -->
                        </div><!-- /col-sm-1 -->
                        <div class="col-md-11">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>{{ $comment->user->name }}</strong>
                                    <span class="text-muted">commented at {{ date_format($comment->created_at, "d/m/Y") }}</span>
                                </div>
                                <div class="panel-body">
                                    {{ $comment->content }}
                                </div><!-- /panel-body -->
                                <button name="reply" type="button" class="btn btn-outline-info"><i class="fa fa-reply" aria-hidden="true"></i> Reply</button>
                            </div><!-- /panel panel-default -->
                            <div>
                                <div class="row reply_comment" style="display: none">
                                    <div class="col-sm-1">
                                        <div class="thumbnail">
                                            <img class="user-photo img-thumbnail" src="{{ Auth::user()->avatar }}">
                                        </div>
                                        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-sm-11">
                                        <textarea rows="5"></textarea>
                                        <button type="button" class="btn btn-outline-info" name="add_sub_comment" data-parent="{{ $comment->id }}"><i class="fa fa-comments-o" aria-hidden="true"></i> Add Comment</button>
                                    </div>
                                </div>
                                <div id="all_sub_comment_{{ $comment->id }}">
                                @foreach ($comment->children as $subComment)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="thumbnail" style="">
                                            <img class="img-responsive user-photo img-thumbnail" src="{{ $subComment->user->avatar }}">
                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->
                                        <div class="col-md-11">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <strong>{{ $subComment->user->name }}</strong>
                                                    <span class="text-muted">commented at {{ date_format($subComment->created_at, "d/m/Y") }}</span>
                                                </div>
                                                <div class="panel-body">
                                                    {{ $subComment->content }}
                                                </div><!-- /panel-body -->
                                                <button name="reply" type="button" class="btn btn-outline-info"><i class="fa fa-reply" aria-hidden="true"></i> Reply</button>
                                            </div><!-- /panel panel-default -->
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div><!-- /col-sm-5 -->
                    </div><!-- /row -->
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
