function myMap() {
  var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.12),
    zoom: 14
  }
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}