@extends('layouts.home_layout')
@section('title')
Detail a Book
@endsection

@section('css_extend')
<link href="/css/book_details.css" rel="stylesheet">
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
							<img src="images/product-details/dacnhantam.jpeg" alt="" />
							<h3>ZOOM</h3>
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">
							
							  <!-- Wrapper for slides -->
							    <div class="carousel-inner">
									<div class="item active">
									  <a href=""><img width="80" src="images/product-details/dacnhantam.jpeg" alt=""></a>
									  <a href=""><img width="80" src="images/product-details/dacnhantam1.jpeg" alt=""></a>
									  <a href=""><img width="80" src="images/product-details/dacnhantam2.jpeg" alt=""></a>
									</div>
									<div class="item">
									  <a href=""><img width="80" src="images/product-details/dacnhantam.jpeg" alt=""></a>
									  <a href=""><img width="80" src="images/product-details/dacnhantam1.jpeg" alt=""></a>
									  <a href=""><img width="80" src="images/product-details/dacnhantam2.jpeg" alt=""></a>
									</div>
									<div class="item">
									  <a href=""><img width="80" src="images/product-details/dacnhantam.jpeg" alt=""></a>
									  <a href=""><img width="80" src="images/product-details/dacnhantam1.jpeg" alt=""></a>
									  <a href=""><img width="80" src="images/product-details/dacnhantam2.jpeg" alt=""></a>
									</div>
									
								</div>

							  <!-- Controls -->
							  <a class="left item-control" href="#similar-product" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right item-control" href="#similar-product" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<img src="images/product-details/new.jpg" class="newarrival" alt="" />
							<h2>Đắc Nhân Tâm (Khổ Lớn)</h2>
							<p>by <a href="">Thang Nguyen</a></p>
							<p><b>Description About Book:</b></p>
							<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							<span>
								<span>50.000 VND</span>
								<button type="button" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>
									Want to buy OR Want to swap
								</button>
							</span>
							<p><b>Name:</b> Đắc Nhân Tâm</p>
							<p><b>Author:</b> Dale</p>
							<p><b>Publisher:</b> NXB Trẻ</p>
							<p><b>Area:</b> Q.Hai Bà Trưng - Hà Nội</p>
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->
				<div id="map" style="height:400px;background:yellow"></div>
				<div style="margin-top: 50px; margin-bottom: 50px;" class="row">
					<div class="col-sm-1">
						<div class="thumbnail">
						<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
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
						<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
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

@section('js_extend')
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