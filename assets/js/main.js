
/* ==========================================================================
   Custom GeoLocation script For MapIT, utilzing Modernizr
   ========================================================================== */

if (Modernizr.geolocation){
	navigator.geolocation.getCurrentPosition(setCurrentLocation);
	function setCurrentLocation(location) {
		$startLocationInput = $('input[name="start_location"]');
		if ($startLocationInput.val() <= 1) {
			$startLocationInput.val(
				location.coords.latitude + ', ' + location.coords.longitude
			);
			$startLocationInput.parent().parent().addClass('success');
		}
	}
}
