<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafc-season
 */
get_header();

global $wpdb;
global $post;

$servicePostId = $post->ID;

$schema_script     = !empty(get_post_meta( $post->ID, 'schema-script', true )) ? get_post_meta( $post->ID, 'schema-script', true ) : '';


$get_tags = wp_get_post_tags($post->ID);

$tags = array_column($get_tags, 'slug');


$args = array( 'post_type' => 'post','numberposts' => 10, 'tax_query' => array(
    array(
        'taxonomy'  => 'post_tag',
        'field'     => 'slug',
        'terms'     => $tags
    )
));
$blog_posts = get_posts( $args );
// pre($tags);
// pre($blog_posts);

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

$top_service_id  = !empty(get_post_meta( $post->ID, 'top_service', true )) ? get_post_meta(  $post->ID, 'top_service', true ) : '';
$home_service    = !empty(get_post_meta( $post->ID, 'available_at_home', true )) ? get_post_meta(  $post->ID, 'available_at_home', true ) : false;
$bulk_testing    = !empty(get_post_meta( $post->ID, 'available_bulk_testing', true )) ? get_post_meta(  $post->ID, 'available_bulk_testing', true ) : false;
$appointment_url = !empty(get_post_meta( $post->ID, 'appointment_link', true )) ? get_post_meta(  $post->ID, 'appointment_link', true ) : 'https://naomedical.io/';
// echo $top_service_id;
$top_service = '';
if($top_service_id){
    $top_service = get_post($top_service_id);
}
// pre($top_service);


/**Nao Medical google review start */

if(is_plugin_active('nao-google-review/nao-google-review.php')){
    $table_name = $wpdb->prefix . 'google_reviews'; 
    $total_review = $wpdb->get_var("SELECT count(*) FROM $table_name");
    $zero_star = $wpdb->get_var("SELECT ((SELECT COUNT(*) FROM $table_name WHERE rating=0) / COUNT(*)) * 100 AS 'percentage' FROM $table_name;");
    $zero_star_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE rating=0");

    $one_star = $wpdb->get_var("SELECT ((SELECT COUNT(*) FROM $table_name WHERE rating=1) / COUNT(*)) * 100 AS 'percentage' FROM $table_name;");
    $one_star_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE rating=1");

    $two_star = $wpdb->get_var("SELECT ((SELECT COUNT(*) FROM $table_name WHERE rating=2) / COUNT(*)) * 100 AS 'percentage' FROM $table_name;");
    $two_star_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE rating=2");

    $three_star = $wpdb->get_var("SELECT ((SELECT COUNT(*) FROM $table_name WHERE rating=3) / COUNT(*)) * 100 AS 'percentage' FROM $table_name;");
    $three_star_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE rating=3");

    $four_star = $wpdb->get_var("SELECT ((SELECT COUNT(*) FROM $table_name WHERE rating=4) / COUNT(*)) * 100 AS 'percentage' FROM $table_name;");
    $four_star_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE rating=4");

    $five_star = $wpdb->get_var("SELECT  ((SELECT COUNT(*) FROM $table_name WHERE rating=5) / COUNT(*)) * 100 AS 'percentage' FROM $table_name;");
    $five_star_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE rating=5");

    // echo $total_review;
    if($total_review){
        $sum = ($one_star_count+$two_star_count+$three_star_count+$four_star_count+$five_star_count);
        $averge_total = ($one_star_count*1)+($two_star_count*2)+($three_star_count*3)+($four_star_count*4)+($five_star_count*5);
        $average_rate = $averge_total/$sum;

        /**Nao Medical google review end */
    }
    $customer_reviews = $wpdb->get_results("SELECT * FROM $table_name WHERE review<>'' AND status=1 AND rating IN(4,5) ORDER BY date DESC LIMIT 20");
}
?>


<div id="primary" class="content-area">

    <div class="service-specific-banner">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="ssb-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/our-services">Services</a></li><?php if($top_service){  ?>
                                    <li class="breadcrumb-item"><?php echo '<a href="'.get_permalink($top_service->ID).'">'.$top_service->post_title.'</a>' ?></li>
                                    <?php } ?>
                                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                                </ol>
                            </nav>
                        </div>

                        <?php if($home_service){ ?>
                            <div>
                                <label class="ssb-label-aah"><span class="aah-heart-icon"></span> Available at home</label>
                            </div>
                        <?php } ?>
                        
                        <div class=""><h1><?php the_title(); ?></h1></div>
                        <div class="ssb-review-list" style="display:none;">
                            <ul>
                                <li>9000+ appointments booked</li>
                                <li style="padding-left: 15px;border-right: 0px;"> <span class="eye-view-ssb"></span> 10000 Views</li>
                            </ul>
                        </div>
                        <?php if(is_plugin_active('nao-google-review/nao-google-review.php') && $total_review){ ?>
                        <div class="ssb-review-list">
                            <ul>
                                <li class="ss-ratings ss-ratings-arw">
                                    <div id="fixture">
                                        <span class='stars-container stars-<?php echo number_format($average_rate, 1); ?>' ></span>
                                    </div>
                                </li>

                                 <!--review-progress-box-->
                                
                                    <div class="review-progress-flex">
                                        <div class="overall-review-popin">
                                            <h3><?php echo number_format($average_rate, 1);?></h3>
                                            <div class="ss-ratings">
                                                <div id="fixture">
                                                    <span class='stars-container stars-<?php echo number_format($average_rate, 1); ?>' ></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="overall-review-progress">
                                            <div>
                                                <ul>
                                                    <li>
                                                        <span class="review-star-count">5 Star</span>
                                                        <span class="review-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo ceil($five_star);?>" aria-valuemin="0" aria-valuemax="100" style="background-color:#76DC99;width:<?php echo ceil($five_star);?>%;">
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span class="review-percentage"><?php echo ceil($five_star);?>%</span>
                                                    </li>
                                                    <li>
                                                        <span class="review-star-count">4 Star</span>
                                                        <span class="review-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo ceil($four_star);?>" aria-valuemin="0" aria-valuemax="100"  style="background-color:#B7EA83;width:<?php echo ceil($four_star);?>%;">
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span class="review-percentage"><?php echo ceil($four_star);?>%</span>
                                                    </li>
                                                    <li>
                                                        <span class="review-star-count">3 Star</span>
                                                        <span class="review-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo ceil($three_star);?>" aria-valuemin="0" aria-valuemax="100" style="background-color:#F6D757;width:<?php echo ceil($three_star);?>%;">
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span class="review-percentage"><?php echo ceil($three_star);?>%</span>
                                                    </li>
                                                    <li>
                                                        <span class="review-star-count">2 Star</span>
                                                        <span class="review-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo ceil($two_star);?>" aria-valuemin="0" aria-valuemax="100" style="background-color:#FBB851;width:<?php echo ceil($two_star);?>%;">
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span class="review-percentage"><?php echo ceil($two_star);?>%</span>
                                                    </li>
                                                    <li>
                                                        <span class="review-star-count">1 Star</span>
                                                        <span class="review-progress">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo ceil($one_star);?>" aria-valuemin="0" aria-valuemax="100" style="background-color:#F17A55;width:<?php echo ceil($one_star);?>%;">
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <span class="review-percentage"><?php echo ceil($one_star);?>%</span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div>
                                                <a href="<?php echo site_url('reviews/'); ?>" class="sacr-link">See all customer reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                        <!--review-progress-box-closed-->
                                <li style="padding-left: 15px;border-left: 1px solid #e3e3e3;margin-left: 10px;"><a href="<?php echo site_url('reviews/'); ?>"><?php echo ($total_review>50000)?'50000+':$total_review;?> ratings </a></li>
                            </ul>
                        </div>
                        <?php } ?>

                        <div class="ssb-price-ins-box">
                            <ul>
                               <li>
                                   <div class="ssb-selfpay-div">
                                        <div class="selfpay-ribbon">Self pay</div>
                                        <?php if(get_post_meta($post->ID, '_price', true) != "") { ?>
                                       <h5>
                                            <span>$<?php echo get_post_meta($post->ID, '_price', true); ?></span>  
                                            <del>
                                                <?php if(get_post_meta($post->ID, '_oldprice', true)) { ?>    
                                                $<?php echo get_post_meta($post->ID, '_oldprice', true) ?>
                                                <?php } ?> 
                                            </del>
                                                </h5>
                                       <p> Price per person</p>
                                       <?php }else if(!empty(get_post_meta($post->ID, '_price_message', true))) { ?> 
                                        <h5><span class="pms-txt"><?php echo get_post_meta($post->ID, '_price_message', true); ?></span> </h5>
                                        <?php }else { ?> 
                                                <h5><span>Free</span> </h5>
                                        <?php } ?>
                                   </div>
                               </li>
                               <li>
                                <?php
                                    if($post->post_name != 'iv-infusion-drip-near-me-new-york-hydration-therapy-treatments-nyc' && $post->post_name != '1-hour-rt-pcr-covid-19-test-for-quick-surgery-travel-airline-travel-naat-coronavirus-testing-jfk-nyc-international' & $post->post_name != '30-minute-rt-pcr-covid-19-test-for-quick-surgery-travel-airline-travel-naat-coronavirus-testing-jfk-nyc-international')
                                    { ?>                                    
                                        <?php                                        
                                        if(get_post_meta($post->ID, '_insuranceprice', true) != "") {
                                        ?>   
                                        <div class="ssb-insurance-div">
                                            <div class="insurance-ribbon">Insurance</div>  
                                            <div>
                                                <h3>
                                                    <?php if(get_post_meta($post->ID, '_insuranceprice', true)) { ?>    
                                                        $<?php echo get_post_meta($post->ID, '_insuranceprice', true) ?>
                                                    <?php }else { ?> 
                                                        $0
                                                    <?php } ?> 
                                                </h3>
                                                <p>Dependent upon the health insurance</p>
                                            </div>                                    
                                            <div class="">
                                                <a href="/insurance-fees" class="vai-link">View accepted insurances</a>
                                            </div>
                                        </div>
                                        <div class="weacc-txt"> <span class="info-ssb-icon"></span> We accept most insurances </div>

                                        <?php
                                        }else if(!empty(get_post_meta($post->ID, '_insuranceprice_message', true))){ ?>
                                        <div class="ssb-insurance-div">
                                            <div class="insurance-ribbon">Insurance</div> 
                                            <div class="col-md-12 col-sm-12 col-12 ssb-checknow">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-12">
                                                        <p><em><?php echo get_post_meta($post->ID, '_insuranceprice_message', true) ?></em></p>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>  
                                        <?php
                                        } ?>                                  
                                        
                                    <?php 
                                    } 
                                    ?> 
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 bbs-ctc-min">
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-12">
                                    <a class="wp-block-button__link appointment_modal" href="javascript:void(0)"  data-appointment_url="<?php echo $appointment_url; ?>">Make an Appointment</a>
                                </div>
                                <div class="col-md-7 col-sm-12 col-12">
                                    <?php if($bulk_testing){ ?>
                                    <a class="onsite_link"  data-bs-toggle="modal" data-bs-target="#onsite_bluk_popup">On-Site (Bulk) Testing Inquiries</a>
                                    <?php }else{ ?>
                                    <p><b>Book within <span> <span id="ss-timer">60:00</span> min </span> to be seen today or tomorrow</b></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 ssb-last-list">
                            <div class="ssb-divide-list">
                                <?php echo get_post_meta($post->ID, 'service-benefits', true); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-12 col-xl-6">
                        <div class="col-md-12 col-sm-12 col-12 col-xl-12 single-services-map">
                            <div id="map_wrapper">
                                <div id="map_canvas_services" class="submapping" style="filter: drop-shadow(-10px 8px 69px rgba(200, 215, 212, 0.58));border-radius: 10px;"></div>
                                <div class="location-search-abs">
                                    <input type="text" class="form-control controls" id="pac-input2" placeholder="Search locations" aria-label="Search by city, clinic or zipcode" aria-describedby="button-addon3" > 
                                    <div class="map-main-ctc">
                                        <button class="btn btn-nearme" type="button" id="button-addon3" onclick="nearestAddress()">Near me</button>
                                        <span class="divide-ssb-line"></span>
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="searchAddress()">Search</button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="ssb-divide-list">
                                <?php echo get_post_meta($post->ID, 'service-benefits', true); ?>
                            </div> -->
                        </div>
                    </div>
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
        </div>
    </div><!--banner-closed-->

    <div class="ss-service-section">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12 ss-service-detail">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 col-xl-6">
                        <div class="max-ssd-div">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <h2>Service Details</h2>
                                </div>
                                <?php echo get_post_meta($post->ID, 'service-description', true); ?>
                        </div>
                    </div><!--6-closed-->

                    <div class="col-md-12 col-sm-12 col-12 col-xl-6">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="col-md-12 col-sm-12 col-12 ssb-insurance-right-bg">
                                    <div>
                                        <h5>Nao Medical accepted insurances</h5>
                                    </div>

                                    <div class="ssb-insurance-imglist">
                                        <ul>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-5.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-4.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-9.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-1.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-2.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-3.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-7.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-8.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                            <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-6.webp" class="img-fluid" alt="<?php the_title(); ?>"></li>
                                        </ul>

                                        <div>
                                            <a href="https://www.naomedical.com/insurance-fees" class="btn btn-insurance-ser">View all insurances</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div><!--row-->

            </div>
        </div>
    </div><!--ss-service-section-->

    <div class="service_global_content customer-search-div">
        <?php
            $content_post = get_post($servicePostId);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
        ?>
    </div>

        <div class="ss-whynao-section">
            <div class="col-md-12 col-sm-12 col-12 ss-whynoa-detail">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 col-xl-5">
                        <div class="ss-whynao-bg ss-whynao-div">
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
                                <?php if(is_plugin_active('nao-google-review/nao-google-review.php')){ ?>
                                <h4>Verified Customer Reviews</h4>
                                <div class="ss-whynao-pes">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <?php 

                                        ?>
                                        <div class="customer-review-slider">
                                            <?php 
                                        if(!empty($customer_reviews)){
                                            foreach ($customer_reviews as $review) {   
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
                                                                                
                                                                                <span class='stars-container stars-<?php echo $review->rating; ?>' ></span> 
                                                                            </div>
                                                                        </li>
                                                                        <li><?php echo date("F d, Y h:i A",strtotime($review->date)); ?></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="review-cr-content">
                                                                    <p><?php echo $review->review; ?></p>
                                                                </div>
                                                                <div>
                                                                    <p><i>- <?php echo $review->owner; ?></i></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--closed-->
    
    <!--top-article-section-->
    <?php if($blog_posts) { ?>
    <div class="ss-toparticles">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12 ssta-div">
                <h2>Top articles related to this service</h2>
            </div>
           

            <div class="max-tpart">
                <div class="col-md-12 col-sm-12 col-12 tp-article-ss">
                    <div class="row">
                        <div class="toparticle-slider">

                            <?php
                                foreach( $blog_posts as $post ): setup_postdata($post);
                                // echo '<pre>';
                                // print_r($post);
                                // echo '</pre>';
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
                                
                                ?>
                                <div class="col-md-3 col-sm-12 col-12">
                                    <div class="toparticle-div">

                                        <div>

                                            <a href="<?php the_permalink(); ?>">
                                                 <?php if ( has_post_thumbnail() ) {
                                                     the_post_thumbnail('full'); ?>
                                                 <?php }else{ ?>
                                                <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                                <?php } ?>
                                            </a>
                                        </div>

                                        <div>
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div>
                                            <p><?php echo wp_trim_words(get_the_content(),50, '...');?>	</p>
                                        </div>
                                        <div>   
                                            <!-- <lable class="author-lbl-ss"> <?php the_author_posts_link(); ?> </lable> -->

                                            <lable class="author-lbl-ss"> <?php echo get_the_author(); ?></lable>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    endforeach
                                ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>
    <!--top-article-section-closed-->

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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqsI2FNOJD_penQGHkHRBzmdIE-yY7TDs&signed_in=true&libraries=places&callback=initMap" defer></script>

 <!--map-location-->
<script>   
        var marker;
        var map;
        const array1 = [];
        function initMap() {

             /* Map Style */
             var styledMapType = new google.maps.StyledMapType(
                [   
                    { elementType: "geometry", stylers: [{ color: "#ffffff" }] },
                    { elementType: "labels.text.fill", stylers: [{ color: "#464646" }] },
                    { elementType: "labels.text.stroke", stylers: [{ color: "#ffffff" }] },
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
                        stylers: [{ color: "#fcfcfc" }],
                    },
                    {
                        featureType: "poi",
                        elementType: "geometry",
                        stylers: [{ color: "#fcfcfc" }],
                    },
                    {
                        featureType: "poi",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#93817c" }],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "geometry.fill",
                        stylers: [{ color: "#fcfcfc" }],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#464646" }],
                    },
                    {
                        featureType: "transit.line",
                        elementType: "geometry",
                        stylers: [{ color: "#c8d7d4" }],
                    },
                    {
                        featureType: "transit.line",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#5c6064" }],
                    },
                    {
                        featureType: "transit.line",
                        elementType: "labels.text.stroke",
                        stylers: [{ color: "#ebe3cd" }],
                    },
                    {
                        featureType: "transit.station",
                        elementType: "geometry",
                        stylers: [{ color: "#c8d7d4" }],
                    },
                    {
                        featureType: "water",
                        elementType: "geometry.fill",
                        stylers: [{ color: "#c8d7d4" }],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.fill",
                        stylers: [{ color: "#92998d" }],
                    },
                    
                
                ],
                { name: "Styled Map" }
            );

            const locations = jQuery.parseJSON('<?php echo $locations_json;?>');

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

            var map = new google.maps.Map(document.getElementById('map_canvas_services'), {
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

            //Associate the styled map with the MapTypeId and set it to display.
             map.mapTypes.set("styled_map", styledMapType);
             map.setMapTypeId("styled_map");

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
                    icon: '<?php echo get_template_directory_uri(); ?>/assets/images/circle-mapmarker.svg',
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
                    infowindow.open(marker.get('map_canvas_services'), marker);
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
                        nearest_marker.infowindow.open(nearest_marker.get('map_canvas_services'), nearest_marker);
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
                nearest_marker.infowindow.open(nearest_marker.get('map_canvas_services'), nearest_marker);
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
                        nearest_marker.infowindow.open(nearest_marker.get('map_canvas_services'), nearest_marker);
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
    </script>
<!--map-location-closed-->
<?php
get_footer();
?>