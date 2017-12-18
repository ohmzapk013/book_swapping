@extends('layouts.home_layout')
@section('title')
Detail Profile
@endsection

@section('css_extend')
<link href="/css/profile.css" rel="stylesheet">
@endsection

@section('js_extend')
<script src="{{ asset('/js/create_map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb2XP_B4Dcuzj-KuMh3l8XTQWgdT-AWfk&callback=myMap"></script>
@endsection

@section('home_content')
<section>
<div class="container">
    <div class="profile clearfix">                            
        <div class="image">
            <img src="{{is_null($user->cover) ? '/images/covers/default_cover.jpeg' : $user->cover}}" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar">
                <img src="{{is_null($user->avatar) ? '/images/avatars/default_avatar.jpeg' : $user->avatar}}" class="img-thumbnail img-profile">
            </div>
            <div class="actions">
                <div class="btn-group">
                    <button class="btn btn-info btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="fa fa-rss"></span> Follow</button>
                    <button class="btn btn-info btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>
                </div>
            </div>                                                                                                
        </div>
  		<div class="row row-profile">
          <div class="col-md-6 panel-body inf-content">
              <strong>Information</strong><br>
              <div class="table-responsive">
              <table class="table table-condensed table-responsive table-user-information">
                  <tbody>
                      <tr>    
                          <td>
                              <strong>
                                  <span class="glyphicon glyphicon-user  text-primary"></span>    
                                  Name                                                
                              </strong>
                          </td>
                          <td class="text-primary">
                              {{$user->name}}
                          </td>
                      </tr>
                      <tr>        
                          <td>
                              <strong>
                                  <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                  Gender                                                
                              </strong>
                          </td>
                          <td class="text-primary">
                              {{($user->gender == 0) ? 'Male' : ($user->gender == 1) ? 'Female' : 'Other'}}
                          </td>
                      </tr>


                      <tr>        
                          <td>
                              <strong>
                                  <span class="glyphicon glyphicon-calendar text-primary"></span> 
                                  Date Of Birth                                                
                              </strong>
                          </td>
                          <td class="text-primary">
                              {{date_format(date_create($user->date_of_birth),"d/m/Y")}}
                          </td>
                      </tr>
                      <tr>        
                          <td>
                              <strong>
                                  <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                  Email                                                
                              </strong>
                          </td>
                          <td class="text-primary">
                              {{$user->email}}
                          </td>
                      </tr>
                      <tr>        
                          <td>
                              <strong>
                                  <span class="glyphicon glyphicon-phone text-primary"></span>
                                  Phone                                                
                              </strong>
                          </td>
                          <td class="text-primary">
                              {{$user->phone}}
                          </td>
                      </tr>
                      <tr>        
                          <td>
                              <strong>
                                  <span class="glyphicon glyphicon-calendar text-primary"></span>
                                  Member Since                                                
                              </strong>
                          </td>
                          <td class="text-primary">
                               {{date_format(date_create($user->created_at),"d/m/Y")}}
                          </td>
                      </tr>                                    
                  </tbody>
              </table>
              </div>
          </div>
          <div class="col-md-6">
            <div id="map" style="margin-top:20px; height:400px;"></div>
          </div>
  		</div>
      <div class="row">
        <div class="category-tab"><!--category-tab-->
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tshirt" data-toggle="tab">Book</a></li>
              <li><a href="#blazers" data-toggle="tab">WishList</a></li>
              <li><a href="#poloshirt" data-toggle="tab">History</a></li>
              <li><a href="#sunglass" data-toggle="tab">Follow</a></li>
              <li><a href="#kids" data-toggle="tab">Follow By</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt" >
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="blazers" >
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="sunglass" >
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="kids" >
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="poloshirt" >
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!--/category-tab-->
      </div>
  </div>                        
    </div>
</div>
<hr>
</section>
@endsection