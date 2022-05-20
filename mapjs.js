var mapOptions, map, marker, searchBox, city,
		// infoWindow = '',
		addressEl = document.querySelector( '#map-search' ),
		latEl = document.getElementById("lat"),
		longEl = document.getElementById( "lng"),
		element = document.getElementById( 'map' );
		city = document.querySelector( '.reg-input-city' );

var geocoder;



function initialize() {
	geocoder = new google.maps.Geocoder();
	mapOptions = {
		// How far the maps zooms in.
		zoom: 8,
		center: new google.maps.LatLng(33.8547, 35.8623),
		disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
		scrollWheel: true, // If set to false disables the scrolling on the map.
		// draggable: true, // If set to false , you cannot move the map around.
		

	};

	/**
	 * Creates the map using google function google.maps.Map() by passing the id of canvas and
	 * mapOptions object that we just created above as its parameters.
	 *
	 */
	// Create an object map with the constructor function Map()
	map = new google.maps.Map( element, mapOptions ); 

	marker = new google.maps.Marker({
		position: mapOptions.center,
		map: map
	});

	map.addListener("click", (mapsMouseEvent) => {
		// var position = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
		var position = mapsMouseEvent.latLng.toJSON()

		document.getElementById("lat").value = position.lat;
		document.getElementById("lng").value = position.lng;
		marker.setPosition(mapsMouseEvent.latLng)
		get_geocode()
	})

	/**
	 * Creates a search box
	 */
	searchBox = new google.maps.places.SearchBox( addressEl );

	/**
	 * When the place is changed on search box, it takes the marker to the searched location.
	 */
	google.maps.event.addListener( searchBox, 'places_changed', function () {
		var places = searchBox.getPlaces(),
			bounds = new google.maps.LatLngBounds(),
			i, place, lat, long, resultArray,
			addresss = places[0].formatted_address;

		for( i = 0; place = places[i]; i++ ) {
			bounds.extend( place.geometry.location );
			marker.setPosition( place.geometry.location );  // Set marker position new.
		}

		map.fitBounds( bounds );  // Fit to the bound
		map.setZoom( 15 ); // This function zooms to level 15.

		resultArray =  places[0].address_components;
		console.log(resultArray)
		if(resultArray.length == 5)
			addressEl.value = resultArray[1].long_name + ", " + resultArray[2].long_name
		else 
			addressEl.value = resultArray[0].long_name + ", " + resultArray[1].long_name
	} );

}
function get_geocode(){
	var latlng = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("lng").value);	
	geocoder.geocode({location: latlng}, function(result, status){
		if('OK' == status){
			address = result[0].formatted_address
			resultArray = result[0].address_components
			console.log(resultArray)
			if(resultArray.length == 5)
				addressEl.value = resultArray[1].long_name + ", " + resultArray[2].long_name
			else
				addressEl.value = resultArray[0].long_name + ", " + resultArray[1].long_name
		} else {
			console.log('Geocode was not successful for the following reason: ' + status)
		}
	})
}


function getLocation(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}
	
}

function showPosition(position){
	document.getElementById("lat").value = position.coords.latitude;
	document.getElementById("lng").value = position.coords.longitude;
	marker.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude))
	get_geocode()
}


function showError(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
        alert("You must allow the request to use location to fill out the form");
        location.reload();
        break;
    }
} 

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			var image = document.getElementById("pothole_image")
			image.src=e.target.result;
			image.style.width='160px'
			image.style.height='160px'
		};
		reader.readAsDataURL(input.files[0]);
	}
}
