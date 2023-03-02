<?php /* Template Name: ourlocations */
global $wpdb;

// pre($wpdb);
$category = get_queried_object();
// echo $category->term_id;

$category_id = $category->term_id;

$args = array(
    'post_type' => 'location',
    'tax_query' => array(
        array(
        'taxonomy' => 'location-category',
        'field' => 'term_id',
        'terms' => $category_id
            )
        )
    );
$get_locations = new WP_Query( $args );

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

                            <!--location-slider-list-->
                                <div class="col-md-12 col-sm-12 col-xl-12 location-slider-list">
                                    <div class="location-slider-div">
                                        <?php 
                                        $locations_arr = [];
                                        if(!empty($get_locations)){
                                            foreach($get_locations->posts as $i =>$post){ 
                                                $post_title 		= !empty(get_post_meta( $post->ID, 'post_title', true )) ? get_post_meta( $post->ID, 'post_title', true ) : '';
                                                $location_address 		= !empty(get_post_meta( $post->ID, 'location_address', true )) ? get_post_meta( $post->ID, 'location_address', true ) : '';
                                                $location_info 			= !empty(get_post_meta( $post->ID, 'insurance_info', true )) ? get_post_meta( $post->ID, 'insurance_info', true ) : '';
                                                $location_phone 	    = !empty(get_post_meta( $post->ID, 'location_phone', true )) ? get_post_meta( $post->ID, 'location_phone', true ) : '';

                                                $location_latitude 	    = !empty(get_post_meta( $post->ID, 'location_latitude', true )) ? get_post_meta( $post->ID, 'location_latitude', true ) : '';
                                                $location_longitude     = !empty(get_post_meta( $post->ID, 'location_longitude', true )) ? get_post_meta( $post->ID, 'location_longitude', true ) : '';

                                                
                                                //Working hours slote start
                                                                
                                                $slot_string    = '<div class="cldv-dt"><ul>';
                                                $mon_fri_slot     = !empty(get_post_meta( $post->ID, 'mon-fri', true )) ? get_post_meta( $post->ID, 'mon-fri', true ) : '';

                                                $mon_fri_start     = !empty(get_post_meta( $post->ID, 'mon-fri-start', true )) ? get_post_meta( $post->ID, 'mon-fri-start', true ) : '';
                                                $mon_fri_close     = !empty(get_post_meta( $post->ID, 'mon-fri-close', true )) ? get_post_meta( $post->ID, 'mon-fri-close', true ) : '';
                                                if($mon_fri_slot){
                                                    $mon_fri_string =  '<li><b>Mon – Fri:</b> '.date('g:i
                                        a', strtotime($mon_fri_start)).' - '.date('g:i
                                        a', strtotime($mon_fri_close)).'</li>';
                                                    $slot_string .=  '<li><b>Mon – Fri:</b> '.date('g:i
                                        a', strtotime($mon_fri_start)).' - '.date('g:i
                                        a', strtotime($mon_fri_close)).'</li>';
                                                }else{
                                                    $mon_fri_string = '';
                                                    $slot_string .= '';
                                                }
                                                
                                                if(empty($mon_fri_string)){ 
                                                    $monday_slot     = !empty(get_post_meta( $post->ID, 'monday', true )) ? get_post_meta( $post->ID, 'monday', true ) : '';
                                                    $monday_start     = !empty(get_post_meta( $post->ID, 'monday-start', true )) ? get_post_meta( $post->ID, 'monday-start', true ) : '';
                                                    $monday_close     = !empty(get_post_meta( $post->ID, 'monday-close', true )) ? get_post_meta( $post->ID, 'monday-close', true ) : '';
                                                    if($monday_slot){
                                                        $monday_string =  '<li><b>Monday:</b> '.date('g:i
                                            a', strtotime($monday_start)).' - '.date('g:i
                                            a', strtotime($monday_close)).'</li>';
                                                        $slot_string .=  '<li><b>Monday:</b> '.date('g:i
                                            a', strtotime($monday_start)).' - '.date('g:i
                                            a', strtotime($monday_close)).'</li>';
                                                    }else{
                                                        $monday_string = '';
                                                        $slot_string .= '';
                                                    }
                                                    

                                                    $tuesday_slot     = !empty(get_post_meta( $post->ID, 'tuesday', true )) ? get_post_meta( $post->ID, 'tuesday', true ) : '';
                                                    $tuesday_start     = !empty(get_post_meta( $post->ID, 'tuesday-start', true )) ? get_post_meta( $post->ID, 'tuesday-start', true ) : '';
                                                    $tuesday_close     = !empty(get_post_meta( $post->ID, 'tuesday-close', true )) ? get_post_meta( $post->ID, 'tuesday-close', true ) : '';
                                                    if($tuesday_slot){
                                                        $tuesday_string =  '<li><b>Tuesday:</b> '.date('g:i
                                            a', strtotime($tuesday_start)).' - '.date('g:i
                                            a', strtotime($tuesday_close)).'</li>';
                                                        $slot_string .=  '<li><b>Tuesday:</b> '.date('g:i
                                            a', strtotime($tuesday_start)).' - '.date('g:i
                                            a', strtotime($tuesday_close)).'</li>';
                                                    }else{
                                                        $tuesday_string = '';
                                                        $slot_string .= '';
                                                    }
                                                    

                                                    $wednesday_slot     = !empty(get_post_meta( $post->ID, 'wednesday', true )) ? get_post_meta( $post->ID, 'wednesday', true ) : '';
                                                    $wednesday_start     = !empty(get_post_meta( $post->ID, 'wednesday-start', true )) ? get_post_meta( $post->ID, 'wednesday-start', true ) : '';
                                                    $wednesday_close     = !empty(get_post_meta( $post->ID, 'wednesday-close', true )) ? get_post_meta( $post->ID, 'wednesday-close', true ) : '';
                                                    if($wednesday_slot){
                                                        $wednesday_string =  '<li><b>Wednesday:</b> '.date('g:i
                                            a', strtotime($wednesday_start)).' - '.date('g:i
                                            a', strtotime($wednesday_close)).'</li>';
                                                        $slot_string .=  '<li><b>Wednesday:</b> '.date('g:i
                                            a', strtotime($wednesday_start)).' - '.date('g:i
                                            a', strtotime($wednesday_close)).'</li>';
                                                    }else{
                                                        $wednesday_string = '';
                                                        $slot_string .= '';
                                                    }
                                                    

                                                    $thursday_slot     = !empty(get_post_meta( $post->ID, 'thursday', true )) ? get_post_meta( $post->ID, 'thursday', true ) : '';
                                                    $thursday_start     = !empty(get_post_meta( $post->ID, 'thursday-start', true )) ? get_post_meta( $post->ID, 'thursday-start', true ) : '';
                                                    $thursday_close     = !empty(get_post_meta( $post->ID, 'thursday-close', true )) ? get_post_meta( $post->ID, 'thursday-close', true ) : '';
                                                    if($thursday_slot){
                                                        $thursday_string =  '<li><b>Thursday:</b> '.date('g:i
                                            a', strtotime($thursday_start)).' - '.date('g:i
                                            a', strtotime($thursday_close)).'</li>';
                                                        $slot_string .=  '<li><b>Thursday:</b> '.date('g:i
                                            a', strtotime($thursday_start)).' - '.date('g:i
                                            a', strtotime($thursday_close)).'</li>';
                                                    }else{
                                                        $thursday_string = '';
                                                        $slot_string .= '';
                                                    }
                                                    

                                                    $friday_slot     = !empty(get_post_meta( $post->ID, 'friday', true )) ? get_post_meta( $post->ID, 'friday', true ) : '';
                                                    $friday_start     = !empty(get_post_meta( $post->ID, 'friday-start', true )) ? get_post_meta( $post->ID, 'friday-start', true ) : '';
                                                    $friday_close     = !empty(get_post_meta( $post->ID, 'friday-close', true )) ? get_post_meta( $post->ID, 'friday-close', true ) : '';
                                                    if($friday_slot){
                                                        $friday_string =  '<li><b>Friday:</b> '.date('g:i
                                            a', strtotime($friday_start)).' - '.date('g:i
                                            a', strtotime($friday_close)).'</li>';
                                                        $slot_string .=  '<li><b>Friday:</b> '.date('g:i
                                            a', strtotime($friday_start)).' - '.date('g:i
                                            a', strtotime($friday_close)).'</li>';
                                                    }else{
                                                        $friday_string = '';
                                                        $slot_string .= '';
                                                    }

                                                }

                                                $saturday_slot     = !empty(get_post_meta( $post->ID, 'saturday', true )) ? get_post_meta( $post->ID, 'saturday', true ) : '';
                                                $saturday_start     = !empty(get_post_meta( $post->ID, 'saturday-start', true )) ? get_post_meta( $post->ID, 'saturday-start', true ) : '';
                                                $saturday_close     = !empty(get_post_meta( $post->ID, 'saturday-close', true )) ? get_post_meta( $post->ID, 'saturday-close', true ) : '';
                                                if($saturday_slot){
                                                    $saturday_string =  '<li><b>Saturday:</b> '.date('g:i
                                        a', strtotime($saturday_start)).' - '.date('g:i
                                        a', strtotime($saturday_close)).'</li>';
                                                    $slot_string .=  '<li><b>Saturday:</b> '.date('g:i
                                        a', strtotime($saturday_start)).' - '.date('g:i
                                        a', strtotime($saturday_close)).'</li>';
                                                }else{
                                                    $saturday_string = '';
                                                    $slot_string .= '';
                                                }

                                                $sunday_slot     = !empty(get_post_meta( $post->ID, 'sunday', true )) ? get_post_meta( $post->ID, 'sunday', true ) : '';
                                                $sunday_start     = !empty(get_post_meta( $post->ID, 'sunday-start', true )) ? get_post_meta( $post->ID, 'sunday-start', true ) : '';
                                                $sunday_close     = !empty(get_post_meta( $post->ID, 'sunday-close', true )) ? get_post_meta( $post->ID, 'sunday-close', true ) : '';
                                                if($sunday_slot){
                                                    $sunday_string =  '<li><b>Sunday:</b> '.date('g:i
                                        a', strtotime($sunday_start)).' - '.date('g:i
                                        a', strtotime($sunday_close)).'</li>';
                                                    $slot_string .= '<li><b>Sunday:</b> '.date('g:i
                                        a', strtotime($sunday_start)).' - '.date('g:i
                                        a', strtotime($sunday_close)).'</li>';
                                                }else{
                                                    $sunday_string = '';
                                                    $slot_string .='';
                                                }

                                                $holiday_slot     = !empty(get_post_meta( $post->ID, 'holiday', true )) ? get_post_meta( $post->ID, 'holiday', true ) : '';
                                                $holiday_start     = !empty(get_post_meta( $post->ID, 'holiday-start', true )) ? get_post_meta( $post->ID, 'holiday-start', true ) : '';
                                                $holiday_close     = !empty(get_post_meta( $post->ID, 'holiday-close', true )) ? get_post_meta( $post->ID, 'holiday-close', true ) : '';
                                                if($holiday_slot){
                                                    $holiday_string =  '<li><b>Holiday:</b> '.date('g:i
                                        a', strtotime($holiday_start)).' - '.date('g:i
                                        a', strtotime($holiday_close)).'</li>';
                                                    $slot_string .= '<li><b>Holiday:</b> '.date('g:i
                                        a', strtotime($holiday_start)).' - '.date('g:i
                                        a', strtotime($holiday_close)).'</li>';
                                                }else{
                                                    $holiday_string = '';
                                                    $slot_string .='';
                                                } 
                                                $slot_string .='</ul></div>';
                                                ?>
                                                <div class="borough-single-box">
                                                    <h3><?php echo $post_title; ?></h3>
                                                    <p><?php echo $location_address; ?></p>
                                                    <div>
                                                        <a href="tel:<?php echo $location_phone; ?>" data-wpel-link="internal" tabindex="0" role="link">
                                                            <label>
                                                                <span class="call-line-ic"></span>
                                                                <?php echo $location_phone; ?>
                                                            </label>
                                                        </a>
                                                    </div>
                                                        <?php echo  $slot_string; ?>
                                                    <div>
                                                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn btn-knowmore">Know more  </a>
                                                    </div>
                                                </div>
                                                <?php
                                                //Working hours slote end
                                                
    
                                                    $location_latitude 	    = $location_latitude;
                                                    $location_longitude     = $location_longitude;
                                                    // $location_address 		= $location_address;
                                                    $locations_arr[$i]['lat'] = $location_latitude;
                                                    $locations_arr[$i]['lng'] = $location_longitude;
                                                    $locations_arr[$i]['title'] = '<b>'.$post_title.'</b>';
                                            }
                                            $locations_json = json_encode($locations_arr);
                                        }   
                                        ?>      
                                    </div>

                                </div>
                            <!--location-slider-list-closed-->
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqsI2FNOJD_penQGHkHRBzmdIE-yY7TDs&signed_in=true&libraries=places&callback=initMap" async></script>
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
			icon: 'https://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/02/21123056/Group-861.png',
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
        // console.log(lat);
        // console.log(lng);
		closeOtherInfo();
		var nearest_marker = marker_list[findNearestMarker(lat,lng)];
		// map.panTo(nearest_marker.getPosition());
		map.setZoom(12);
		nearest_marker.infowindow.open(nearest_marker.get('map_canvas'), nearest_marker);
		InforObj[0] = nearest_marker.infowindow;
	};

	// MAKE LABEL BASED ON LATITUDE ANDLONGITUDE VALUES
	// window.findCategoryLocations = function(catLocations){
	// 	closeOtherInfo();
	// 	if(catLocations){
	// 		for( i=0; i<catLocations.length; i++ ) {
	// 			let lat = catLocations[i].lat;
	// 			let lng = catLocations[i].lng;

	// 			const findLocation = (element) => element.lat == lat && element.lng == lng;
	// 			let locationIndex = locations.findIndex(findLocation);                    
	// 			var nearest_marker = marker_list[locationIndex];
	// 			map.panTo(nearest_marker.getPosition());
	// 			map.setZoom(12);
	// 			nearest_marker.infowindow.open(nearest_marker.get('map_canvas'), nearest_marker);
	// 			InforObj[0] = nearest_marker.infowindow;

	// 		}
	// 	}       
	// };

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
// jQuery(window).on('load', function(){
//     window.initMap = initMap();
// })

jQuery(document).ready(function($){ 
    $('.location-slider-div').slick({   
        slidesToShow: 4,
        dots:false,
        centerMode: false,
        infinite: false,
        arrows: true,
        slidesToScroll: 4,
        
        responsive: [
            {
                breakpoint: 1120,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});
</script>
<?php
get_footer();

