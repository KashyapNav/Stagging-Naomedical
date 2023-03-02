<style>
	.ContactBubble__Bubble {
		background-color: #3074DC;
    	display: none !important;
}
	</style>
<?php
/**
 *Template Name: Custom Landingpage
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafc-season
 */
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1e3565">
	<meta name="facebook-domain-verification" content="h7j1odpici64r88v33wrsoo65rzdld" />
	<meta name="robots" content="noindex" />
	<meta name="p:domain_verify" content="e1343cc27ee525645da71a7cee8010e1"/>
	<link rel="apple-touch-icon" href="images/naoMedicalLogo.svg">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preload" fetchpriority="low" as="image" href="https://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/06/09140701/mother-and-child-homepage-1.webp" type="image/webp">
	<link rel="preload" fetchpriority="low" as="image" href="https://d1d6755cit84bm.cloudfront.net/wp-content/uploads/2022/06/16080840/couple-homepage1.webp" type="image/webp">
	<link rel="preload" fetchpriority="low" as="image" href="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i301!3i384!4i256!2m3!1e0!2sm!3i618350720!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy5lOmd8cC5jOiNmZmZmZmZmZixzLmU6bC50LmZ8cC5jOiNmZjQ2NDY0NixzLmU6bC50LnN8cC5jOiNmZmZmZmZmZixzLnQ6MXxzLmU6Zy5zfHAuYzojZmZjOWIyYTYscy50OjIxfHMuZTpnLnN8cC5jOiNmZmRjZDJiZSxzLnQ6MjF8cy5lOmwudC5mfHAuYzojZmZhZTllOTAscy50OjgyfHMuZTpnfHAuYzojZmZmY2ZjZmMscy50OjJ8cy5lOmd8cC5jOiNmZmZjZmNmYyxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZjkzODE3YyxzLnQ6NDB8cy5lOmcuZnxwLmM6I2ZmZmNmY2ZjLHMudDo0MHxzLmU6bC50LmZ8cC5jOiNmZjQ2NDY0NixzLnQ6NjV8cy5lOmd8cC5jOiNmZmM4ZDdkNCxzLnQ6NjV8cy5lOmwudC5mfHAuYzojZmY1YzYwNjQscy50OjY1fHMuZTpsLnQuc3xwLmM6I2ZmZWJlM2NkLHMudDo2NnxzLmU6Z3xwLmM6I2ZmYzhkN2Q0LHMudDo2fHMuZTpnLmZ8cC5jOiNmZmM4ZDdkNCxzLnQ6NnxzLmU6bC50LmZ8cC5jOiNmZjkyOTk4ZA!4e0!23i1379903&key=AIzaSyCqsI2FNOJD_penQGHkHRBzmdIE-yY7TDs&token=51958" type="image/webp">
	<script src="assets/"></script>
    <?php wp_head(); ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1370694906705063');
	fbq('track', 'PageView');
	</script>
	<noscript>
	 <img height="1" width="1" alt="Facebook" src="https://www.facebook.com/tr?id=1370694906705063&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	<!--Google Optimize Code -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-M43SLQX" defer></script>
	<!--Google Optimize Code END -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188399239-4"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-188399239-4');
		</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WQWRRHQ');</script>
	<!-- End Google Tag Manager -->



	<!-- Schema script START -->
	<?php 
	$postTypes = array("services", "location", "page", "post","topservices");
	if(in_array(get_post_type(), $postTypes)){
		$location_schema_script     = !empty(get_post_meta( $post->ID, 'location-schema-script', true )) ? get_post_meta( $post->ID, 'location-schema-script', true ) : '';
		$schema_script     			= !empty(get_post_meta( $post->ID, 'schema-script', true )) ? get_post_meta( $post->ID, 'schema-script', true ) : '';
		$topservices_schema_script  = !empty(get_post_meta( $post->ID, 'topservices-schema-script', true )) ? get_post_meta( $post->ID, 'topservices-schema-script', true ) : '';
		?>
		<div class="d-none">
		<?php 
		if(!empty($location_schema_script)){
			echo $location_schema_script;
		} 
		if(!empty($schema_script)){
			echo $schema_script;
		} 		
		if(!empty($topservices_schema_script)){
			echo $topservices_schema_script;
		} 
		
		?>
		</div>
		<?php
	}
	?>
	<!--Schema script END-->
</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQWRRHQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?php wp_body_open(); ?>


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




<!--landing-page-popup-->
<div class="landing_form_popupdiv">
    <!-- Modal -->
    <div class="modal fade" id="landing_form_popup" tabindex="-1" aria-labelledby="landing_form_popup-ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="landing-form-container">
                            <div class="">
                                <h4>Please fill out the form below and our staff will contact you for booking confirmation.</h4>
                            </div>
                            <div>
                                <?php echo do_shortcode('[contact-form-7 id="10535" title="Book With Concierge"]'); ?>
                            </div>
                            <div class="">
                                <a href="#" class="pp-close" data-bs-dismiss="modal" aria-label="Close">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--popup-closed-->


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

<?php
get_footer('landing');
?> 