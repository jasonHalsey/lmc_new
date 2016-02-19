jQuery(document).ready(function() {

	L.mapbox.accessToken = 'pk.eyJ1IjoiamFzb25oYWxzZXkiLCJhIjoiY2lrZm5oOWh3MDAxeHUza2w5MnM2aHdzYSJ9.WXf_OK1N34LKLlkBHCt_9w';

	var map = L.mapbox.map('map-one', 'mapbox.outdoors', {
  	zoomControl: false
	}).setView([45.382101,-122.782451], 17);

	map.dragging.disable();
	map.touchZoom.disable();
	map.doubleClickZoom.disable();
	map.scrollWheelZoom.disable();
	map.keyboard.disable();

	// Disable tap handler, if present.
	if (map.tap) map.tap.disable();

	L.mapbox.featureLayer({
	    type: 'Feature',
	    geometry: {
	        type: 'Point',
	        coordinates: [
	          -122.782451,
	          45.382101
	        ]
	    },
	    properties: {
	        title: 'LMC Construction',
	        description: 'World Headquarters',
	        'marker-size': 'large',
	        'marker-color': '#BE9A6B',
	        'marker-symbol': 'warehouse'
	    }
	}).addTo(map);
});