@extends('layouts.home_layout')
@section('title')
Home | Book Swapping
@endsection
@section('js_extend')
<script type="text/javascript" src="{{ asset('js/shuffle/shuffle.js') }}"></script>
<script type="text/javascript">
var Shuffle = window.Shuffle;
var element = $('#my-shuffle-container');
var shuffle = new Shuffle(element, {
  itemSelector: '.book-item',
  filterMode: Shuffle.FilterMode.ALL
});
function removeItem(array, elements) {
    $.each(elements, function(index, element) {
        var index = array.indexOf(element);
        if (index > -1) {
            array.splice(index, 1);
        }
    });
    return array;
}
var filters = [];
$('.filter_want_to > button').click(function() {
    filter = $(this).data('filter');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        index = filters.indexOf(filter);
        if (index > -1) {
            filters.splice(index, 1);
        }
    } else {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        filters = removeItem(filters, ['swap', 'sell']);
        filters.push(filter);
    }
    if (filters.length > 0) {
        shuffle.filter(filters);
    } else {
        shuffle.filter('all');
    }
})

$('.filter_status > button').click(function() {
    filter = $(this).data('filter');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        index = filters.indexOf(filter);
        if (index > -1) {
            filters.splice(index, 1);
        }
    } else {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        filters = removeItem(filters, ['old', 'like_new', 'new']);
        filters.push(filter);
    }
    if (filters.length > 0) {
        shuffle.filter(filters);
    } else {
        shuffle.filter('all');
    }
})
</script>
@endsection
@section('home_content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.left_sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <div class="row"><h2 class="title text-center">All book</h2></div>
                    <div class="row" style="margin-right: 10px; margin-left: 10px; margin-bottom: 30px;">
                        <div class="btn-group pull-left filter_want_to">
                            <button type="button" class="btn btn-primary" data-filter="swap">Swap</button>
                            <button type="button" class="btn btn-primary" data-filter="sell">Sell</button>
                        </div>
                        <div class="btn-group pull-right filter_status">
                            <button type="button" class="btn btn-primary" data-filter="old" >Old</button>
                            <button type="button" class="btn btn-primary" data-filter="like_new">Like New</button>
                            <button type="button" class="btn btn-primary" data-filter="new">New</button>
                        </div>
                    </div>
                    <div id="my-shuffle-container">
                    @foreach ($books as $book)
                        <?php
                            $wantTo = ($book->want_to == 0) ? 'swap' : 'sell';
                            $status = ($book->status == 0) ? 'old' : (($book->status == 1) ? 'like_new' : 'new');
                            $data_groups = '["' . $wantTo . '", ' . '"' . $status . '"]';
                        ?>
                        <div class="col-sm-4 book-item" data-groups='{{ $data_groups }}' data-status='{{ $status }}'>
                            <div class="product-image-wrapper" style="background: #f5f5f0; width: 246px; height: 440px;">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('book_detail', $book->id)}}">
                                                <img width="246" height="300" src="{{ $book->images[0]}}" alt="" />
                                            </a>
                                            <h2>{{ ($book->want_to == 1) ? number_format($book->price) : '' }}</h2>
                                            <p>{{ $book->name }}</p> by <a href="#">{{ $book->author->name}}</a>
                                        </div>
<!--                                         <div text-align="center">
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-exchange"></i>Swap Request</a>
                                        </div> -->
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="{{ route('book_detail', $book->id)}}"><i class="fa fa-plus-square"></i>Details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div><!--features_items-->
                <div>
                    {{ $books->links() }}
                </div>
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">   
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">  
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>          
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>
@endsection