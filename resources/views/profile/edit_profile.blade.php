@extends('layouts.home_layout')
@section('title')
Edit Profile
@endsection

@section('js_extend')
<script src="{{ asset('/js/profile.js') }}"></script>
@endsection

@section('css_extend')
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<link href="/css/profile.css" rel="stylesheet">
<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
@endsection

@section('home_content')
<script>
  // Note: This example requires that you consent to location sharing when
  // prompted by your browser. If you see the error "The Geolocation service
  // failed.", it means you probably did not give permission for the browser to
  // locate you.
  var map, infoWindow;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 14
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        $('#position').val(JSON.stringify(pos));
        infoWindow.setPosition(pos);
        infoWindow.setContent('Location found.');
        infoWindow.open(map);
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb2XP_B4Dcuzj-KuMh3l8XTQWgdT-AWfk&callback=initMap">
</script>
<section>
<div class="container">
    <div class="profile clearfix">                            
        <div class="image">
            <img src="{{is_null($user->cover) ? '/images/covers/default_cover.jpeg' : $user->cover}}" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar" style="max-width: 150px; max-height: 150px;">
                    <img src="{{is_null($user->avatar) ? '/images/avatars/default_avatar.jpeg' : $user->avatar}}" class="img-thumbnail img-profile" id="avatar">
            </div>
            <div class="change">
              <div class="btn-group">
                <button id="change_avatar" type="button" class="btn btn-default btn-sm btn-responsive"><i class="fa fa-camera-retro" aria-hidden="true"></i> Change Avatar</button>
                <button id="change_cover" type="button" class="btn btn-default btn-sm btn-responsive"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Cover</button>
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
        <form class="form-horizontal" role="form" action="{{route('update_profile')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="file" name="change_avatar" style="display: none;">
          <input type="file" name="change_cover" style="display: none;">
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input disabled class="form-control" type="text" value="{{$user->email}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input name="name" class="form-control" type="text" value="{{$user->name}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input name="phone" class="form-control" type="text" value="{{$user->phone}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="gender" class="form-control">
                  <option value="0" {{($user->gender == 0) ? 'selected' : ''}}>Male</option>
                  <option value="1" {{($user->gender == 1) ? 'selected' : ''}}>Female</option>
                  <option value="2" {{($user->gender == 2) ? 'selected' : ''}}>Other</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date Of Birth:</label>
            <div class="col-lg-8">
              <input name="date_of_birth" type="date" class="form-control" type="text" value="{{$user->date_of_birth}}">
            </div>
          </div>
          <input type="hidden" name="position" id="position">
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <div class="col-md-6"><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> Update</button></div>
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