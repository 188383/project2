var map;
var geo;
var marker;
/**
	Initialization of the map object
**/
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
	    center:{lat:52,lng:15},
	    zoom: 4
	  });
	
	geo = new google.maps.Geocoder;
	  map.addListener('click',function(e){
	  /**Here we add the call to the controller that should set up the view
	  **/
	  	fillAddress(e,map,geo);
	  });
	  
}

/*
	Handle the reverse geocoding via the server
*/

/*
	reverse geocode from here and add data 
	to the fill in form and retrieve data that is changed from the input form
	i.e setListener on input and on map click
*/


