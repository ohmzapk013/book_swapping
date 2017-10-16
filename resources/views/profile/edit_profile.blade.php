@extends('layouts.home_layout')
@section('title')
Detail a Book
@endsection

@section('css_extend')
<link href="/css/profile.css" rel="stylesheet">
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

@section('home_content')
<section>
<div class="container">
    <h1>Edit Profile</h1>
    <div class="profile clearfix">                            
        <div class="image">
            <img src="https://lorempixel.com/700/300/nature/2/" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar">
                <img src="https://bootdey.com/img/Content/user-453533-fdadfd.png" class="img-thumbnail img-profile">
            </div>                                
            <div class="actions">
                <div class="btn-group">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-plus glyphicon glyphicon-white"></span> Friends</button>
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-share-alt glyphicon glyphicon-white"></span> Recommend</button>
                </div>
            </div>                                                                                                
        </div>                          
		<div class="row">
      <!-- edit form column -->
      <div class="col-md-6 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Change Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="Bishop">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select class="form-control">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="11111122333">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="11111122333">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <div class="col-md-6"><input type="button" class="btn btn-primary" value="Save Changes"></div>
              <div class="col-md-6"><input type="reset" class="btn btn-default" value="Cancel"></div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div id="map" style="height:400px;"></div>
      </div>
		</div>                             
    </div>
</div>
<hr>
</section>
@endsection