@extends('layouts.home_layout')
@section('title')
Edit Profile
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
            <div class="change">
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm btn-responsive"><i class="fa fa-camera-retro" aria-hidden="true"></i> Change Avatar</button>
                <button type="button" class="btn btn-default btn-sm btn-responsive"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Cover</button>
              </div>
            </div>                                                                                                
        </div>
		<div class="row">
      <!-- edit form column -->
      <div class="col-md-6 personal-info">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Enable Your Location</strong> can improve you find the book near you
        </div>
        <h3 class="display-2" style="margin-left: 32px; margin-bottom: 32px;"><b>Change Personal Infomation</b></h3>
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
            <label class="col-lg-3 control-label">Date Of Birth:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
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
        <button type="button" class="btn btn-info">Enable My Location</button>
        <div id="map" style="margin-top:32px; height:400px;"></div>
      </div>
		</div>                             
    </div>
</div>
<hr>
</section>
@endsection