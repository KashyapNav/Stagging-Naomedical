<?php /* Template Name: homeservicemap */ ?>

    <div id="primary2" class="content-area homeservice-mapdiv">
        <div class="hms-map-section">
            <div class="main-banner-map">
                <div>
                    <div id="mapTop" style="height: 750px;"></div> 
                </div>
            </div>
        </div>
    </div><!-- content-area -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5DPIhnci0oZA_35-ZwL-FnIxmV4cPcm8&signed_in=true&libraries=places&callback=initialize" async></script>

    
    <script>
        
        var marker;
        var map;

            function initialize() {
                   /*Map Top Start*/	
                    /* Map Style */
                    var styledMapType = new google.maps.StyledMapType(
                        [   
                            { elementType: "geometry", stylers: [{ color: "#9ACF8C" }] },
                            { elementType: "labels.text.fill", stylers: [{ color: "#523735" }] },
                            { elementType: "labels.text.stroke", stylers: [{ color: "#f5f1e6" }] },
                            {
                                featureType: "administrative",
                                elementType: "geometry.stroke",
                                stylers: [{ color: "#c9b2a6" }],
                            },
                            {
                                featureType: "administrative.land_parcel",
                                elementType: "geometry.stroke",
                                stylers: [{ color: "#dcd2be" }],
                            },
                            {
                                featureType: "administrative.land_parcel",
                                elementType: "labels.text.fill",
                                stylers: [{ color: "#ae9e90" }],
                            },
                            {
                                featureType: "landscape.natural",
                                elementType: "geometry",
                                stylers: [{ color: "#cae8d3" }],
                            },
                            {
                                featureType: "poi",
                                elementType: "geometry",
                                stylers: [{ color: "#cae8d3" }],
                            },
                            {
                                featureType: "poi",
                                elementType: "labels.text.fill",
                                stylers: [{ color: "#93817c" }],
                            },
                            {
                                featureType: "poi.park",
                                elementType: "geometry.fill",
                                stylers: [{ color: "#cae8d3" }],
                            },
                            {
                                featureType: "poi.park",
                                elementType: "labels.text.fill",
                                stylers: [{ color: "#447530" }],
                            },
                            {
                                featureType: "transit.line",
                                elementType: "geometry",
                                stylers: [{ color: "#9ACF8C" }],
                            },
                            {
                                featureType: "transit.line",
                                elementType: "labels.text.fill",
                                stylers: [{ color: "#8f7d77" }],
                            },
                            {
                                featureType: "transit.line",
                                elementType: "labels.text.stroke",
                                stylers: [{ color: "#ebe3cd" }],
                            },
                            {
                                featureType: "transit.station",
                                elementType: "geometry",
                                stylers: [{ color: "#9ACF8C" }],
                            },
                            {
                                featureType: "water",
                                elementType: "geometry.fill",
                                stylers: [{ color: "#93b5eb" }],
                            },
                            {
                                featureType: "water",
                                elementType: "labels.text.fill",
                                stylers: [{ color: "#92998d" }],
                            },
                            
                        
                        ],
                        { name: "Styled Map" }
                    );
                    
                    
                    var mapTop = new google.maps.Map(document.getElementById("mapTop"), {  
                        center: new google.maps.LatLng(40.7562967, -73.8779567),
                        zoom: 11,
                        panControl: false,
                        zoomControl: false,
                        mapTypeControl: false,
                        scaleControl: true,
                        streetViewControl: false,
                        overviewMapControl: false,
                        rotateControl: true,
                        scrollwheel: true,
                        mapTypeId: google.maps.MapTypeId.styled_map,
                    });
                    
                        //Associate the styled map with the MapTypeId and set it to display.
                        mapTop.mapTypes.set("styled_map", styledMapType);
                        mapTop.setMapTypeId("styled_map");


                        const features = [
                            {
                            position: new google.maps.LatLng(40.7569294, -73.9301804),
                            title: "<b>Statcare Medical, Hicksville, NY</b> <br/>  232 W. Old Country Road Hicksville, NY 11801",
                            },
                            {
                            position: new google.maps.LatLng(40.7623035, -73.5293198),
                            },
                            {
                            position: new google.maps.LatLng(40.7719013, -73.9089274),
                            },
                            {
                            position: new google.maps.LatLng(40.87017900000001, -73.8283809),
                            },
                            {
                            position: new google.maps.LatLng(40.83702, -73.887255),
                            },
                            {
                            position: new google.maps.LatLng(40.702552, -73.8083996),
                            },
                            {
                            position: new google.maps.LatLng(40.76274699999999, -73.989845),
                            },
                            {
                            position: new google.maps.LatLng(40.7322147, -73.9822004),
                            },
                            {
                            position: new google.maps.LatLng(40.7130162, -73.9438907),
                            },
                            {
                            position: new google.maps.LatLng(40.7562967, -73.8779567),
                            },
                            {
                            position: new google.maps.LatLng(40.6710895, -73.957572),
                            },
                            {
                                position: new google.maps.LatLng(40.7523535, -73.86722329999999),
                            },
                            {
                                position: new google.maps.LatLng(40.65144229999999, -73.9415774),
                            },
                            {
                                position: new google.maps.LatLng(40.7426624, -73.6412264),
                            },
                        ];

                        var InforObj = [];
                        // Create markers.
                        for (let i = 0; i < features.length; i++) {
                            const mapTopmarker = new google.maps.Marker({ 
                            position: features[i].position, 
                            //animation: google.maps.Animation.DROP,
                            icon: 'http://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/02/21123056/Group-861.png',
                            map: mapTop,
                            });
                            //const infowindow = new google.maps.InfoWindow({
                            //	content: features[i].title,
                            //  });

                            //mapTopmarker.addListener("click", function() {
                            //  closeOtherInfo();
                            //  infowindow.open(mapTopmarker.get("mapTop"), mapTopmarker);
                            //  InforObj[0] = infowindow;
                            ///});
                            //google.maps.event.addListener(mapTop, "click", function(event) {
                            //  infowindow.close();
                            //});
                        }		  
                        //function closeOtherInfo() {
                        //if (InforObj.length > 0) {
                            /* detach the info-window from the marker ... undocumented in the API docs */
                            //InforObj[0].set("marker", null);
                            /* and close it */
                            //InforObj[0].close();
                            /* blank the array */
                            //InforObj.length = 0;
                        // }
                        //}
                        /*Map Top End*/
                        
                }     

        
        google.maps.event.addDomListener(window, 'load', initialize); 
    

    </script>
