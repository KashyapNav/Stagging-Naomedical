<?php /* Template Name: bronx174-street */ ?>

    <div id="primary" class="content-area">

        <div class="subpage-mapbanner">
            <div class="container-fluid">
                <div class="sub-location-map">
                    <!--<div class="col-md-12 col-12 col-sm-12 map-img-distance">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-6">
                                <div class="lcd-img">
                                    <img src="http://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/03/01093710/bronx174.png">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-12">
                                
                            </div>
                        </div>
                    </div>-->

                    <div class="col-md-12 col-12 col-sm-12">
                        <div id="map_wrapper">
                            <div id="map_canvas_subbanner" class="submapping"></div>
                        </div>
                        <div class="search-navigate-lcd">
                            <div class="input-group">
                                <input type="text" class="form-control controls" id="pac-input" placeholder="Find distance from a place" aria-label="Find distance from a place" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Navigate</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lcd-help">
                    <h6>Location Help:</h6>
                    <div>
                        <ul>
                            <li>From Manhattan take the #2 or #5 subway line to 174 Street train station and we are the 4th storefront right off the staircase coming off the subway.</li>
                            <li>Landmarks: Between East 174th street pharmacy and Metro PCS; it is also across the street from Western Union. It’s between Southern blvd and Hoe Avenue</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-12 col-sm-12 subbanner-address">
                    <div class="row">
                        <div class="col-md-8 col-12 col-sm-8">
                            <h1>Nao Medical, Bronx, 174th Street</h1>
                            <p>932 East 174th Street Bronx, NY 10460</p>
                            <label>(917) 920-7321</label>
                        </div>
                        <div class="col-md-4 col-12 col-sm-4">
                            <div class="max-lct">
                                <ul>
                                    <li><b>Mon – Fri: </b>8 am – 8 pm</li>
                                    <li><b>Sat – Sun:  </b>9 am – 5 pm</li>
                                    <li><b>Holidays: </b> 9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container-fluid">
            <div class="col-md-12 col-12 col-sm-12 location-detail-second">
                <div class="row">
                    <div class="col-sm-12 col-6 col-md-6" style="padding:0px;">
                        <div>
                          <img src="http://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/02/28115339/people-lcd.png">
                        </div>
                    </div>
                    <div class="col-sm-12 col-6 col-md-6" style="align-self: center;">
                        <div class="location-detail-right">
                            <h2>Nao Medical Care Experience</h2>
                            <p>We believe that getting care from medical experts and resources should be as easy and accessible as possible. Let our trained medical professionals provide the best essential medical services when you need them most.</p>
                            
                            <div class="wp-block-buttons btn-ld-view">
                                <div class="wp-block-button">
                                    <a class="wp-block-button__link" href="https://naomedical.io/" target="_blank" rel="noreferrer noopener">Make an appointment</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-12 col-sm-12 location-as-bg">
                <div class="wp-block-columns locate-availabel-toggle">
                    <div class="wp-block-column location-availabel-bg" style="flex-basis:100%">
                        <div class="wp-block-columns">
                            <div class="wp-block-column">
                                <h3 class="has-text-align-center">Available Services <a href="javascript:void(0)" class="show-more">Show More</a> </h3>
                            </div>
                        </div>

                        <div class="wp-block-columns las show-more-height" id="show-more-content">
                            <div class="wp-block-column locate-availabel-services">
                                <div class="wp-block-columns">
                                    <div class="wp-block-column">
                                        <ul>
                                            <li>STD testing and screening</li>
                                            <li>Primary care</li>
                                            <li>Emergency care (cuts, wounds, fractures)</li>
                                        </ul>
                                    </div>



                                    <div class="wp-block-column">
                                        <ul>
                                            <li>Annual exams</li>
                                            <li>Travel clinic</li>
                                            <li>COVID-19 testing and vaccine</li>
                                        </ul>
                                    </div>



                                    <div class="wp-block-column">
                                        <ul>
                                            <li>Telemedicine</li>
                                            <li>Immunizations</li>
                                            <li>Pediatric urgent care</li>
                                        </ul>
                                    </div>



                                    <div class="wp-block-column">
                                        <ul>
                                            <li>On-site lab</li>
                                            <li>DOT Medical exam</li>
                                            <li>USCIS Immigration medical exams</li>
                                        </ul>
                                    </div>



                                    <div class="wp-block-column">
                                        <ul>
                                            <li>Worker's comp</li>
                                            <li>Walk-In clinic</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div> -->
    </div><!-- content-area -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5DPIhnci0oZA_35-ZwL-FnIxmV4cPcm8&signed_in=true&libraries=places&callback=initialize" async></script>
    <script>
        var marker;
        var map;

        function initialize() {
            var styles = [{
                stylers: [{
                    saturation: 0
                }]
            }];
            var styledMap = new google.maps.StyledMapType(styles, {
                name: "Styled Map"
            });
            var mapProp = {
                center: new google.maps.LatLng(40.837024, -73.8894437),
                zoom: 17,
                maxZoom: 17,
                minZoom:6,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: true,
                streetViewControl: false,
                overviewMapControl: false,
                rotateControl: true,
                scrollwheel: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas_subbanner"), mapProp);
            
        
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style')

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.837024, -73.8894437),
                animation: google.maps.Animation.DROP,
                icon: 'http://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/02/21123056/Group-861.png',
            });
        
            marker.setMap(map);
            map.panTo(marker.position);
        }

        function changeMarkerPos(lat, lon){
            myLatLng = new google.maps.LatLng(lat, lon)
            marker.setPosition(myLatLng);
            map.panTo(myLatLng);
        }
    </script>
