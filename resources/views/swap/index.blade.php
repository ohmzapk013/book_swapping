@extends('layouts.home_layout')
@section('title')
Home | Book Swapping
@endsection
@section('home_content')
<section>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            @include('layouts.left_sidebar')
        </div>
        <div class="col-sm-9 padding-right">
            <div class="row">
                <div class="col-sm-4 book-item">
                    <div class="product-image-wrapper product-border" style="background: #f5f5f0; width: 246px; height: 440px;">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="http://localhost:8000/book-detail/15">
                                <img width="246" height="300" src="/images/books/1513749962871ai-lay-mieng-pho-mat-cua-toi-a.u547.d20160407.t084016.jpg" alt="">
                                </a>
                                <h2>23,000</h2>
                                <p>Ai Lấy Miếng Pho Mát Của Tôi</p>
                                by <a href="#">Spencer Johnson</a>
                            </div>
                        </div>
                        <input type="checkbox" name="image[]" value="">
                        <i class="fa fa-check hidden"></i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">To: ThangNguyen</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <button href="#" class="btn btn-info">
                          <span class="glyphicon glyphicon-send"></span> Send 
                        </button>
                    </form>
                </div>
            </div>
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center" style="margin-bottom: 30px;">Choose Book to Swap</h2>
                <div>
                @foreach ($books as $book)
                    <div class="col-sm-4 book-item">
                        <div class="product-image-wrapper product-border" style="background: #f5f5f0; width: 246px; height: 440px;">
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