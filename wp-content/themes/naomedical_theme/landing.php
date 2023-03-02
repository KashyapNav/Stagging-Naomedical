<?php
/**
 *Template Name: Landing page
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafc-season
 */
get_header('landing');
$servicePostId = $post->ID;
$schema_script     = !empty(get_post_meta( $post->ID, 'schema-script', true )) ? get_post_meta( $post->ID, 'schema-script', true ) : '';

global $wpdb;
global $post;
$args = array( 'orderby' => 'rand', 'post_type' => 'post','numberposts' => 10);
$blog_posts = get_posts( $args );

/**location-map-querys */
$get_available_location     = get_post_meta( $post->ID, 'service_avaiable_location', true );
// pre($get_available_location);
// exit;
if($get_available_location){
    $available_locations = explode(',',$get_available_location);
    $locations = get_posts([
        'post_type' => 'location',
        'post_status' => 'publish',
        'numberposts' => -1,
        'post__in' => $available_locations
        // 'order'    => 'ASC'
      ]);
}else{
    $locations = get_posts([
        'post_type' => 'location',
        'post_status' => 'publish',
        'numberposts' => -1,
        // 'order'    => 'ASC'
      ]);
}
// $available_locations = explode(',',$get_available_location);
// pre($get_available_location);

$locations_arr = [];
// pre($locations);
// exit;
foreach($locations as $i => $location){
    
    $location_latitude 	    = !empty(get_post_meta( $location->ID, 'location_latitude', true )) ? get_post_meta( $location->ID, 'location_latitude', true ) : '';
    $location_longitude     = !empty(get_post_meta( $location->ID, 'location_longitude', true )) ? get_post_meta( $location->ID, 'location_longitude', true ) : '';
    $location_address 		= !empty(get_post_meta( $location->ID, 'location_address', true )) ? get_post_meta( $location->ID, 'location_address', true ) : '';
    $locations_arr[$i]['lat'] = $location_latitude;
    $locations_arr[$i]['lng'] = $location_longitude;
    $locations_arr[$i]['title'] = '<b>'.$location->post_title.'</b>';
}
 $locations_json = json_encode($locations_arr);

// get the custom post type's taxonomy terms
                            
$custom_taxterms = wp_get_object_terms( $post->ID, 'services_category', array('fields' => 'ids') );
                    
$args = array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'posts_per_page' => 10, // you may edit this number
    'orderby' => 'rand',
    'post__not_in' => array ( $post->ID ),
    'tax_query' => array(
        array(
            'taxonomy' => 'services_category',
            'field' => 'id',
            'terms' => $custom_taxterms
        )
    )
);
$related_items = new WP_Query( $args );

$top_service_id    = !empty(get_post_meta( $post->ID, 'top_service', true )) ? get_post_meta(  $post->ID, 'top_service', true ) : '';
$home_service    = !empty(get_post_meta( $post->ID, 'available_at_home', true )) ? get_post_meta(  $post->ID, 'available_at_home', true ) : false;
$bulk_testing    = !empty(get_post_meta( $post->ID, 'available_bulk_testing', true )) ? get_post_meta(  $post->ID, 'available_bulk_testing', true ) : false;
$appointment_url = !empty(get_post_meta( $post->ID, 'appointment_link', true )) ? get_post_meta(  $post->ID, 'appointment_link', true ) : 'https://naomedical.io/';
// echo $top_service_id;
$top_service = '';
if($top_service_id){
    $top_service = get_post($top_service_id);
}
// pre($top_service);
$query = 'SELECT * FROM '.$wpdb->prefix.'posts
        LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
        LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
        WHERE '.$wpdb->prefix.'posts.post_status = "publish" AND '.$wpdb->prefix.'posts.post_type = "location"
        GROUP BY '.$wpdb->prefix.'posts.ID ORDER BY '.$wpdb->prefix.'posts.post_title ASC;';
$results            = $wpdb->get_results($query);
?>


<div id="primary" class="content-area">

    <div class="top_service_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div class="ss-whynao-section">
        <div class="col-md-12 col-sm-12 col-12 ss-whynoa-detail">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 col-xl-5">
                    <div class="ss-whynao-bg ss-whynao-div landing-ss-img">

                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-12 col-xl-7">
                    <div class="max-ss-whynao">
                        <div class="col-md-12 col-sm-12 col-12 ss-whynao-title">
                            <h3>Why people love <i class="icon-nao"></i> </h3>
                            <p>At Nao Medical, we go the extra mile for our patients. When you or your loved one is unwell, we are a provider that you can trust to take the time to treat you with the attention and care you deserve.</p>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 ss-whynao-pes">
                            <h4>Committed to providing excellent service</h4>

                            <div class="">
                                <ul>
                                    <li>
                                        <div class="hms-ben-box">
                                            <div class="">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tfs.svg" class="img-fluid" width="60" height="62" alt="customer support">
                                            </div>
                                            <div>
                                                <h6>24/7 customer support</h6>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="hms-ben-box">
                                            <div class="">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/customer-care.svg" class="img-fluid" style="padding-bottom: 6px;"  width="66" height="58" alt="customer service"> 
                                            </div>
                                            <div>
                                            <h6>Top tier customer service </h6>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="hms-ben-box">
                                            <div class="">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/noun_paramedic.svg" class="img-fluid" width="65" height="65" alt="medical concierge">
                                            </div>
                                            <div>
                                                <h6>Dedicated medical concierge</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 ss-whynao-pes">
                            <!-- <h4>The <i class="icon-nao"></i>  Experience Customer Reviews</h4> -->
                            <h4>Verified Customer Reviews</h4>
                            <div class="ss-whynao-pes">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <?php 
                                    $args = array(  
                                        'post_type' => 'testimonials', 
                                        'posts_per_page' => -1, 
                                        'orderby' => 'rand',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'testimonial_category', 
                                                'field'    => 'slug', // search by slug name, you may change to use ID
                                                'terms'    => 'services-testimonial', // value of the slug for taxonomy, in term using ID, you should using integer type casting (int) $value
                                            ),
                                        )
                                    );
                                    ?>
                                    <div class="customer-review-slider">
                                        <?php 
                                            $new_query = new WP_Query($args); 
                                            while($new_query -> have_posts()) : $new_query -> the_post();
                                        ?>
                                        <div class="items">
                                            <div class="testiTitle"> 
                                                <div class="testiInner cr-inner">
                                                    <div>
                                                        <div>
                                                            <div class="ssb-review-list">
                                                                <ul>
                                                                <li class="ss-ratings">
                                                                        <div id="fixture">
                                                                            <?php 
                                                                                if(get_post_meta($post->ID, 'custom_ratings_meta_box', true)) {
                                                                                    $rating = get_post_meta($post->ID, 'custom_ratings_meta_box', true);
                                                                                }else {
                                                                                    $rating = 0;
                                                                                }
                                                                            ?>
                                                                            <span class='stars-container stars-<?php echo $rating; ?>' ></span> 
                                                                        </div>
                                                                    </li>
                                                                    <li><li><?php echo get_the_date(); ?> <?php echo the_time(); ?></li></li>
                                                                </ul>
                                                            </div>
                                                            <div class="review-cr-content">
                                                                <p><?php the_content(); ?></p>
                                                            </div>
                                                            <div>
                                                                <p><i>- <?php the_title(); ?></i></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <?php endwhile; wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--closed-->
    
    <div class="location-footer">
        <div class="container">
            <div class="col-md-12 col-xl-12 col-sm-12">
                <div class="ftr-location-title">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xl-6">
                            <div>
                                <h2>Our Locations</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xl-6">
                            <div class="max-lcnt">
                                <a href="tel:(917) 310-3371" data-wpel-link="internal" class="cnt-btn-ph"> <span class="call-line-ic-ctc"></span> (917) 310-3371</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12 col-sm-12">
                <div class="ftr-location-list">
                    <ul class="desktopView_location">
                        <?php 
                            if(isset($results) && !empty($results)){
                            foreach($results as $key => $postdata){
                                
                                $post_title 			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
                                $location_address 		= !empty(get_post_meta( $postdata->ID, 'location_address', true )) ? get_post_meta( $postdata->ID, 'location_address', true ) : '';
                            ?>
                        <li>
                                <div location_id="<?php echo $postdata->ID; ?>" style="padding: 30px;">
                                        <h3><?php echo $post_title; ?></h3>
                                        <p><?php echo $location_address; ?></p>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </li>
                    </ul>						
                    <div class="mobileView_location">
                        <div class="accordion" id="accordionExample">
                            <?php 
                                if(isset($results) && !empty($results)){
                                foreach($results as $key => $postdata){
                                    
                                    $post_title 			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
                                    $location_address 		= !empty(get_post_meta( $postdata->ID, 'location_address', true )) ? get_post_meta( $postdata->ID, 'location_address', true ) : '';
                                ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-<?php echo $postdata->ID; ?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $postdata->ID; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $postdata->ID; ?>">
                                                <?php echo $post_title; ?>
                                            </button>
                                        </h2>
                                        <div id="collapse-<?php echo $postdata->ID; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $postdata->ID; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p><?php echo $location_address; ?></p>
                                            </div>
                                        </div>	
                                    </div>	
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- content-area -->


<script>
jQuery(document).ready(function($){ 
    function startTimer() {
        var presentTime = localStorage.getItem("ss-timer");
        if(!presentTime){
            presentTime = '60:00';
        } 
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if(s==59){m=m-1}
        if(m<15){
            localStorage.setItem("ss-timer","60:00");
            // document.getElementById('ss-timer').innerHTML = '60:00';
            startTimer();
            return
        }
        localStorage.setItem("ss-timer",m + ":" + s);
        document.getElementById('ss-timer').innerHTML = m + ":" + s;
        setTimeout(startTimer, 1000);
    }

    function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
    if (sec < 0) {sec = "59"};
    return sec;
    }
    startTimer();
});
</script>


<!--search-provider-script -->



<script>
        jQuery(document).ready(function($){   
            
            ///ajax
            $('.loader-backdrop').show();
            $.ajax({
                type: "POST",
                url: ajax_url+'?action=providerList',
                data:'term=',
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                    var obj = $.parseJSON( data );
                    //$(".dropdown").show();
                    $("#search_provider_list1").html(obj.provider);
                    $('.loader-backdrop').hide();

                    $('[data-bs-toggle="tooltip"]').tooltip();
                }
            });

            $("#searchproviders").keyup(function(){
                
                var search = $(this).val();
                let length = search.length;
                if(length === 0){
                    $('.loader-backdrop').show();
                    $.ajax({
                        type: "POST",
                        url: ajax_url+'?action=providerList',
                        data:'term=',
                        beforeSend: function(){
                            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function(data){
                            var obj = $.parseJSON( data );
                            $("#search_provider_list1").html(obj.provider);
                            $('.loader-backdrop').hide();
                            $('[data-bs-toggle="tooltip"]').tooltip();
                            (".mCustomScrollbar").mCustomScrollbar("update");
                        }
                    });

                }
            });

            $(document).on('click', '#search-provider', function(){
            // $('#search-provider').click(function() {
                // alert('xvgxzcvzxcvxczv');
                $('.loader-backdrop').show();
                var term_id_select = $('#searchproviders').val();
                $(".max-search-width").html('');
                if(term_id_select != null){
                    
                    $.ajax({
                        type: "POST",
                        url: ajax_url+'?action=providerList',
                        data:'term='+term_id_select,
                        beforeSend: function(){
                            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function(data){
                            var obj = $.parseJSON( data );
                            $("#search_provider_list1").html(obj.provider);
                            $('.loader-backdrop').hide();
                            $('[data-bs-toggle="tooltip"]').tooltip();
                            (".mCustomScrollbar").mCustomScrollbar("update");
                        }
                    });
                }

            });

        });
    </script>

<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
	console.log(event.detail.inputs);
	var get_inputs = event.detail.inputs;
	var redirect_link = '';
	get_inputs.find((input)=>{
		if(input.name == 'thankyouURL'){
			redirect_link = input.value;
		}
	});
	console.log(redirect_link);
	if(redirect_link != ''){
		location = redirect_link;
	}	
}, false );
</script>

<?php
get_footer('landing');
?> 