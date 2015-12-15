/**
	@author:188383@student.pwr.edu.pl
**/
var resultTable;
var addressString = '';
var address=null;
var currentPlaceId = '';
var str = '';
var timeout=null;
var sbmt = null
var marker = null;
var mark = false;
function initializeElements(){
	address = document.getElementById("address");
//	sbmt = document.getElementById("sbmt");
	
	address.addEventListener('keydown',function(event){
		str = address.value;
		setTimeOut();
	});
	
}
/**
	This is the function that processes the incoming click event
	and zooms to the correct place
**/
function fillAddress(e,map,geo){
	geo.geocode({location:e.latLng},function(result,status){
		address.value = result[0].formatted_address;
		currentPlaceId = result[0].place_id;
		//placeMarkerOnMap(map,e.latLng);		
	});
	map.setZoom(10);
	map.panTo(e.latLng);	
	
}
/*
	Change the map according to the address currently entered into the 
	search bar
	This is a keyevent that is called by the timer event
*/
function fillAddressKeys(map,geo,mark){
	geo.geocode({address:address.value},function(result,status){
		if(status=='OK'){
			//change the current id
			currentPlaceId = result[0].place_id;
			address.value = result[0].formatted_address;
			console.log(currentPlaceId);
			map.setZoom(13);
			map.panTo(result[0].geometry.location);
			if(mark==true){
				placeMarkerOnMap(map,result[0].geometry.location);
			}
		}
			
	});
	
}
/**
	Add the single marker if it does not exist, onto the map or 
	change the location of the existing marker
**/
function placeMarkerOnMap(map,position){
	if(marker!==null){
		marker.setMap(null);
		marker = null;
		placeMarkerOnMap(map,position);	
	}else{
		marker = new google.maps.Marker({
			position:position
		});
		marker.setMap(map);
	}
}
/**
	Sets the timeout function for the key requests. 
	The time is hardcoded for 500ms. This timeout function clears the timeout
	if it is running or starts a new one if it is called from inside itself.
**/
function setTimeOut(){
	if(timeout!==null){
		clearTimeout(timeout);
		timeout = null;
		setTimeOut();
	}else{
		timeout = setTimeout(function(){
			fillAddressKeys(map,geo);
		},800);
	}
}
