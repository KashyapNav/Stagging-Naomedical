<?php /* Template Name: ourlocations */
global $wpdb;

$args = array(
            'taxonomy' => 'location-category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );

$cats = get_categories($args);
// pre($cats);
$locations = get_posts([
    'post_type' => 'location',
    'post_status' => 'publish',
    'numberposts' => -1
    // 'order'    => 'ASC'
  ]);
$locations_arr = [];
// pre($locations);
foreach($locations as $i => $location){
    
    $location_latitude 	    = !empty(get_post_meta( $location->ID, 'location_latitude', true )) ? get_post_meta( $location->ID, 'location_latitude', true ) : '';
    $location_longitude     = !empty(get_post_meta( $location->ID, 'location_longitude', true )) ? get_post_meta( $location->ID, 'location_longitude', true ) : '';
    $location_address 		= !empty(get_post_meta( $location->ID, 'location_address', true )) ? get_post_meta( $location->ID, 'location_address', true ) : '';
    $locations_arr[$i]['lat'] = $location_latitude;
    $locations_arr[$i]['lng'] = $location_longitude;
    $locations_arr[$i]['title'] = '<b>'.$location->post_title.'</b>';
}
$locations_json = json_encode($locations_arr);
get_header();
?>
    <div id="primary1" class="content-area ourlocations-overall">


        <div class="ourlocate-bluetab">
            
            <div class="">
                <div class="col-md-12 col-12 col-sm-12 ourlocation-tab">
                    <div class="col-md-12 col-12 col-sm-12 fullwidth-location">
                            <div class="intab-map">
                                <!-- <div class="location-search-abs">
                                    
                                </div> -->
                                
                                <!-- <input type="text" class="form-control controls" id="pac-input2" placeholder="Search by city, clinic or zipcode" aria-label="Search by city, clinic or zipcode" aria-describedby="button-addon3"> -->
                                <div id="map_canvas" style="height:100%; box-sizing: border-box;"></div>
                                <!-- <input type="text" placeholder="San Fransisco" name="search_location" id="search_location"/><button id="search_location_submit" onclick="searchAddress()">Search</button> -->
                                
                                    <div class="col-md-4 col-sm-12 col-12 ">
                                        <div class="location-search-abs">
                                            <input type="text" class="form-control controls" id="pac-input2" placeholder="Search by city, clinic or zipcode" aria-label="Search by city, clinic or zipcode" aria-describedby="button-addon3" > 
                                            <div class="map-main-ctc">
                                                <button class="btn btn-nearme" type="button" id="button-addon3" onclick="nearestAddress()">Near me</button>
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="searchAddress()">Search</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="location-borough">
                                <h1>Choose a borough</h1>
                                
                                <div class="borough-list">
                                    <ul>
                                    <?php foreach($cats as $cat) { ?>
                                        <li>
                                            <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="show_locations">
                                                <div><h2><?php echo $cat->name; ?></h2></div>
                                                <div><p><?php echo ($cat->category_count>1)?$cat->category_count.' locations':$cat->category_count.' location'; ?></p></div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                        
                                    </ul>
                                </div>
                            </div> <!--location-borough-closed-->

                            <!--location-slider-list-->
                                <div class="col-md-12 col-sm-12 col-xl-12 location-slider-list" style="display:none;">
                                    <div class="location-slider-div">
                                        
                                    </div>

                                </div>
                            <!--location-slider-list-closed-->

                   
                     <!-- <div class="col-md-6 col-12 col-sm-6">
                            <div class="map-tab-scroll">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                <?php 
                                    if(isset($results) && !empty($results)){
                                        foreach($results as $key => $postdata){
                                            
                                            $post_title 			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
                                            $location_address 		= !empty(get_post_meta( $postdata->ID, 'location_address', true )) ? get_post_meta( $postdata->ID, 'location_address', true ) : '';
                                            $location_info 			= !empty(get_post_meta( $postdata->ID, 'location_info', true )) ? get_post_meta( $postdata->ID, 'location_info', true ) : '';
                                            $location_phone 	    = !empty(get_post_meta( $postdata->ID, 'location_phone', true )) ? get_post_meta( $postdata->ID, 'location_phone', true ) : '';

                                            $location_latitude 	    = !empty(get_post_meta( $postdata->ID, 'location_latitude', true )) ? get_post_meta( $postdata->ID, 'location_latitude', true ) : '';
                                            $location_longitude     = !empty(get_post_meta( $postdata->ID, 'location_longitude', true )) ? get_post_meta( $postdata->ID, 'location_longitude', true ) : '';
                                           // $location_permalink     = get_permalink( $postdata->ID );
                                       ?>
                                        <button class="nav-link v-pills-cityone-tabs tab-near-me" id="v-pills-cityone-tab" data-bs-toggle="pill" data-longitude="<?php echo $location_longitude; ?>" data-latitude="<?php echo $location_latitude; ?>" data-bs-target="#v-pills-cityone" type="button" role="tab" aria-controls="v-pills-cityone" aria-selected="true">
                                            <div class="mtb-left">
                                                <h4><?php echo $post_title; ?></h4>
                                                <p><?php echo $location_address; ?></p>
                                                <div class="">
                                                    <?php echo $location_info; ?>
                                                </div>
                                            </div>
                                            <a href="<?php echo get_permalink( $postdata->ID ); ?>" 
                                            class="get-direct-tab">
                                            View Location </a>
                                        </button>

                                            <?php } ?>
                                        <?php } ?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div><!-- content-area -->
        </div>

        <input type="hidden" id="pac-input-hidden-lat" value="" />
        <input type="hidden" id="pac-input-hidden-lng" value="" />


        
        <input type="hidden" id="city2" name="city2" />
        <input type="hidden" id="cityLat" name="cityLat" />
        <input type="hidden" id="cityLng" name="cityLng" />
        <!---/////////////////////////////////////////////////////////////////////////-->
        <input type="hidden" id="nearest-lat" value="" />
        <input type="hidden" id="nearest-lng" value="" />
        <input type="hidden" id="nearest-click" value="8 The Green, Dover, DE, USA" />
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqsI2FNOJD_penQGHkHRBzmdIE-yY7TDs&signed_in=true&libraries=places" async></script>
    <!-- <script type="text/javascript" 
  src="https://maps.googleapis.com/maps/api/js?sensor=false">
  </script> -->
    
<script>
var marker;
var map;
const array1 = [];
function initMap() {
    const locations = jQuery.parseJSON('<?php echo $locations_json;?>');
    infoWindow = new google.maps.InfoWindow;

	//GEO LOCATION 
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(GeolocationPosition) => {
				const position = GeolocationPosition;
				document.getElementById('nearest-lat').value = position.coords.latitude;
				document.getElementById('nearest-lng').value = position.coords.longitude;                
			},
			() => {
				handleLocationError(true, infoWindow, map.getCenter());
			}
		);
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}

	var map = new google.maps.Map(document.getElementById('map_canvas'), {
		center: {lat: 40.7569334, lng: -73.9323691},
		zoom: 8,
		panControl: false,
		zoomControl: false,
		mapTypeControl: false,
		scaleControl: true,
		streetViewControl: false,
		overviewMapControl: false,
		rotateControl: true,
		scrollwheel: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var input = document.getElementById('pac-input2');
	var autocomplete = new google.maps.places.Autocomplete(input);
	google.maps.event.addListener(autocomplete, 'place_changed', function () {
		var place = autocomplete.getPlace();
		document.getElementById('city2').value = place.name;
		document.getElementById('cityLat').value = place.geometry.location.lat();
		document.getElementById('cityLng').value = place.geometry.location.lng();

		document.getElementById('pac-input-hidden-lat').value = place.geometry.location.lat();
		document.getElementById('pac-input-hidden-lng').value = place.geometry.location.lng(); 
	});

	var marker_list = [];
	var marker_data_list = [];

	for (let i = 0; i < locations.length; i++) {

		location_latlng = new google.maps.LatLng(locations[i].lat,locations[i].lng); 
		var location_marker = new google.maps.Marker({ // sleep dallas
			title:locations[i].title,
			position: location_latlng,
			map: map,
			animation: google.maps.Animation.DROP,
			icon: 'https://d1d6755cit84bm.cloudfront.net/wp-content/uploads/2022/11/03160623/mappin.webp',
		});
		marker_list[i] = location_marker;
		marker_data_list[i] = locations[i].title;

	}

	// FIT DISPLAY TO CONTAIN ALL MARKERS
	var bounds = new google.maps.LatLngBounds();
	for (var i = 0; i < marker_list.length; i++) {
		bounds.extend(marker_list[i].getPosition());
		attachMarkerMessage(marker_list[i],marker_data_list[i]);
	}

	map.fitBounds(bounds);

	var InforObj = [];
	// ATTACH DATA AND MESSAGE TO MARKERS
	function attachMarkerMessage(marker, message) {
		var infowindow = new google.maps.InfoWindow({
			content: message
		});

		marker.infowindow = infowindow;

		marker.addListener('click', function() {
			infowindow.open(marker.get('map_canvas'), marker);
		});

		marker.addListener("click", function() {
			// closeOtherInfo();
			infowindow.open(marker.get("mapTop"), marker);
			InforObj[0] = infowindow;
		});
		google.maps.event.addListener(map, "click", function(event) {
			infowindow.close();
		});
	}

	// SEARCH LOCATION AND FIND NEAR BY SEARCH
	var geocoder = new google.maps.Geocoder();
	window.searchAddress = function(){
		var lat = '';
		var lng = '';
		var address = document.getElementById('pac-input2').value;
		closeOtherInfo();
		geocoder.geocode( { 'address': address}, function(results, status) {

			if (status === google.maps.GeocoderStatus.OK) {
				lat = results[0].geometry.location.lat();
				lng = results[0].geometry.location.lng();
				//console.log(marker_list[findNearestMarker(lat,lng)]);
				var nearest_marker = marker_list[findNearestMarker(lat,lng)];
				// map.panTo(nearest_marker.getPosition());
				map.setZoom(12);
				nearest_marker.infowindow.open(nearest_marker.get('map_canvas'), nearest_marker);
				InforObj[0] = nearest_marker.infowindow;
			} else {
				alert("Geocode was not successful for the following reason: " + status);}
		});
	};

	 // DISTANCE AND NEAREST MARKER SELECTOR
	window.nearestAddress = function(){
		var lat = document.getElementById('nearest-lat').value;
		var lng = document.getElementById('nearest-lng').value;
		closeOtherInfo();
		var nearest_marker = marker_list[findNearestMarker(lat,lng)];
		// map.panTo(nearest_marker.getPosition());
		map.setZoom(12);
		nearest_marker.infowindow.open(nearest_marker.get('map_canvas'), nearest_marker);
		InforObj[0] = nearest_marker.infowindow;
	};

	// MAKE LABEL BASED ON LATITUDE ANDLONGITUDE VALUES
	window.findCategoryLocations = function(catLocations){
		closeOtherInfo();
		if(catLocations){
			for( i=0; i<catLocations.length; i++ ) {
				let lat = catLocations[i].lat;
				let lng = catLocations[i].lng;

				const findLocation = (element) => element.lat == lat && element.lng == lng;
				let locationIndex = locations.findIndex(findLocation);                    
				var nearest_marker = marker_list[locationIndex];
				map.panTo(nearest_marker.getPosition());
				map.setZoom(12);
				nearest_marker.infowindow.open(nearest_marker.get('map_canvas'), nearest_marker);
				InforObj[0] = nearest_marker.infowindow;

			}
		}       
	};

	function closeInfoWindow() {
		if (infoWindow !== null) {
			google.maps.event.clearInstanceListeners(infoWindow);  // just in case handlers continue to stick around
			infoWindow.close();
			infoWindow = null;
		}
	}

	// FIND THE LOCATION NEAR LATITUDE AND LONGITUDE
	function rad(x) {return x*Math.PI/180;}
	function findNearestMarker(lat,lng){
		var R = 6371; // radius of earth in km
		var distances = [];
		var closest = -1;
		for( i=0; i<marker_list.length; i++ ) {
			var mlat = marker_list[i].position.lat();
			var mlng = marker_list[i].position.lng();
			var dLat  = rad(mlat - lat);
			var dLong = rad(mlng - lng);
			var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
					Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
			var d = R * c;
			distances[i] = d;
			if ( closest == -1 || d < distances[closest] ) {
				closest = i;
			}
		}

		return closest;
	}

	//Clear the information box
	function closeOtherInfo() {
		if (InforObj.length > 0) {
			/* detach the info-window from the marker ... undocumented in the API docs */
			InforObj[0].set("marker", null);
			/* and close it */
			InforObj[0].close();
			/* blank the array */
			InforObj.length = 0;
		}
	}

}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

// window.initMap = initMap();
jQuery(window).on('load', function(){
    window.initMap = initMap();
})

</script>
<?php
get_footer();

