<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafc-season
 */
get_header();

$location_id = $post->ID;
$post_title 		= !empty(get_post_meta( $post->ID, 'post_title', true )) ? get_post_meta( $post->ID, 'post_title', true ) : '';
$location_address 		= !empty(get_post_meta( $post->ID, 'location_address', true )) ? get_post_meta( $post->ID, 'location_address', true ) : '';
$location_info 			= !empty(get_post_meta( $post->ID, 'insurance_info', true )) ? get_post_meta( $post->ID, 'insurance_info', true ) : '';
$location_phone 	    = !empty(get_post_meta( $post->ID, 'location_phone', true )) ? get_post_meta( $post->ID, 'location_phone', true ) : '';

$location_latitude 	    = !empty(get_post_meta( $post->ID, 'location_latitude', true )) ? get_post_meta( $post->ID, 'location_latitude', true ) : '';
$location_longitude     = !empty(get_post_meta( $post->ID, 'location_longitude', true )) ? get_post_meta( $post->ID, 'location_longitude', true ) : '';

$location_help     = !empty(get_post_meta( $post->ID, 'location_help', true )) ? get_post_meta( $post->ID, 'location_help', true ) : '';
$insurance_info     = !empty(get_post_meta( $post->ID, 'insurance_info', true )) ? get_post_meta( $post->ID, 'insurance_info', true ) : '';
$appointment_link     = !empty(get_post_meta( $post->ID, 'appointment_link', true )) ? get_post_meta( $post->ID, 'appointment_link', true ) : '';
$location_images     = !empty(get_post_meta( $post->ID, 'location_images', true )) ? get_post_meta( $post->ID, 'location_images', true ) : '';
$location_schema_script     = !empty(get_post_meta( $post->ID, 'location-schema-script', true )) ? get_post_meta( $post->ID, 'location-schema-script', true ) : '';

//Working hours slote start
                
$mon_fri_slot     = !empty(get_post_meta( $post->ID, 'mon-fri', true )) ? get_post_meta( $post->ID, 'mon-fri', true ) : '';

$mon_fri_start     = !empty(get_post_meta( $post->ID, 'mon-fri-start', true )) ? get_post_meta( $post->ID, 'mon-fri-start', true ) : '';
$mon_fri_close     = !empty(get_post_meta( $post->ID, 'mon-fri-close', true )) ? get_post_meta( $post->ID, 'mon-fri-close', true ) : '';
if($mon_fri_slot){
    $mon_fri_string =  '<li><b>Mon – Fri:</b> '.date('g:i a', strtotime($mon_fri_start)).' - '.date('g:i a', strtotime($mon_fri_close)).'</li>';
}else{
    $mon_fri_string = '';
}


$monday_slot     = !empty(get_post_meta( $post->ID, 'monday', true )) ? get_post_meta( $post->ID, 'monday', true ) : '';
$monday_start     = !empty(get_post_meta( $post->ID, 'monday-start', true )) ? get_post_meta( $post->ID, 'monday-start', true ) : '';
$monday_close     = !empty(get_post_meta( $post->ID, 'monday-close', true )) ? get_post_meta( $post->ID, 'monday-close', true ) : '';
if($monday_slot){
    $monday_string =  '<li><b>Monday:</b> '.date('g:i a', strtotime($monday_start)).' - '.date('g:i a', strtotime($monday_close)).'</li>';
}else{
    $monday_string = '';
}


$tuesday_slot     = !empty(get_post_meta( $post->ID, 'tuesday', true )) ? get_post_meta( $post->ID, 'tuesday', true ) : '';
$tuesday_start     = !empty(get_post_meta( $post->ID, 'tuesday-start', true )) ? get_post_meta( $post->ID, 'tuesday-start', true ) : '';
$tuesday_close     = !empty(get_post_meta( $post->ID, 'tuesday-close', true )) ? get_post_meta( $post->ID, 'tuesday-close', true ) : '';
if($tuesday_slot){
    $tuesday_string =  '<li><b>Tuesday:</b> '.date('g:i a', strtotime($tuesday_start)).' - '.date('g:i a', strtotime($tuesday_close)).'</li>';
}else{
    $tuesday_string = '';
}


$wednesday_slot     = !empty(get_post_meta( $post->ID, 'wednesday', true )) ? get_post_meta( $post->ID, 'wednesday', true ) : '';
$wednesday_start     = !empty(get_post_meta( $post->ID, 'wednesday-start', true )) ? get_post_meta( $post->ID, 'wednesday-start', true ) : '';
$wednesday_close     = !empty(get_post_meta( $post->ID, 'wednesday-close', true )) ? get_post_meta( $post->ID, 'wednesday-close', true ) : '';
if($wednesday_slot){
    $wednesday_string =  '<li><b>Wednesday:</b> '.date('g:i a', strtotime($wednesday_start)).' - '.date('g:i a', strtotime($wednesday_close)).'</li>';
}else{
    $wednesday_string = '';
}


$thursday_slot     = !empty(get_post_meta( $post->ID, 'thursday', true )) ? get_post_meta( $post->ID, 'thursday', true ) : '';
$thursday_start     = !empty(get_post_meta( $post->ID, 'thursday-start', true )) ? get_post_meta( $post->ID, 'thursday-start', true ) : '';
$thursday_close     = !empty(get_post_meta( $post->ID, 'thursday-close', true )) ? get_post_meta( $post->ID, 'thursday-close', true ) : '';
if($thursday_slot){
    $thursday_string =  '<li><b>Thursday:</b> '.date('g:i a', strtotime($thursday_start)).' - '.date('g:i a', strtotime($thursday_close)).'</li>';
}else{
    $thursday_string = '';
}


$friday_slot     = !empty(get_post_meta( $post->ID, 'friday', true )) ? get_post_meta( $post->ID, 'friday', true ) : '';
$friday_start     = !empty(get_post_meta( $post->ID, 'friday-start', true )) ? get_post_meta( $post->ID, 'friday-start', true ) : '';
$friday_close     = !empty(get_post_meta( $post->ID, 'friday-close', true )) ? get_post_meta( $post->ID, 'friday-close', true ) : '';
if($friday_slot){
    $friday_string =  '<li><b>Friday:</b> '.date('g:i a', strtotime($friday_start)).' - '.date('g:i a', strtotime($friday_close)).'</li>';
}else{
    $friday_string = '';
}

$saturday_slot     = !empty(get_post_meta( $post->ID, 'saturday', true )) ? get_post_meta( $post->ID, 'saturday', true ) : '';
$saturday_start     = !empty(get_post_meta( $post->ID, 'saturday-start', true )) ? get_post_meta( $post->ID, 'saturday-start', true ) : '';
$saturday_close     = !empty(get_post_meta( $post->ID, 'saturday-close', true )) ? get_post_meta( $post->ID, 'saturday-close', true ) : '';
if($saturday_slot){
    $saturday_string =  '<li><b>Saturday:</b> '.date('g:i a', strtotime($saturday_start)).' - '.date('g:i a', strtotime($saturday_close)).'</li>';
}else{
    $saturday_string = '';
}

$sunday_slot     = !empty(get_post_meta( $post->ID, 'sunday', true )) ? get_post_meta( $post->ID, 'sunday', true ) : '';
$sunday_start     = !empty(get_post_meta( $post->ID, 'sunday-start', true )) ? get_post_meta( $post->ID, 'sunday-start', true ) : '';
$sunday_close     = !empty(get_post_meta( $post->ID, 'sunday-close', true )) ? get_post_meta( $post->ID, 'sunday-close', true ) : '';
if($sunday_slot){
    $sunday_string =  '<li><b>Sunday:</b> '.date('g:i a', strtotime($sunday_start)).' - '.date('g:i a', strtotime($sunday_close)).'</li>';
}else{
    $sunday_string = '';
}


$holiday_slot     = !empty(get_post_meta( $post->ID, 'holiday', true )) ? get_post_meta( $post->ID, 'holiday', true ) : '';
$holiday_start     = !empty(get_post_meta( $post->ID, 'holiday-start', true )) ? get_post_meta( $post->ID, 'holiday-start', true ) : '';
$holiday_close     = !empty(get_post_meta( $post->ID, 'holiday-close', true )) ? get_post_meta( $post->ID, 'holiday-close', true ) : '';
if($holiday_slot){
    $holiday_string =  '<li><b>Holiday:</b> '.date('g:i a', strtotime($holiday_start)).' - '.date('g:i a', strtotime($holiday_close)).'</li>';
}else{
    $holiday_string = '';
}

//Working hours slote end

// Get available service category
$get_service_categories	= !empty(get_post_meta( $post->ID, 'available_service_category', true )) ? get_post_meta( $post->ID, 'available_service_category', true ) : '';
$comingsoon_locations    = !empty(get_post_meta( $post->ID, 'comingsoon_at_locations', true )) ? get_post_meta(  $post->ID, 'comingsoon_at_locations', true ) : false;                
$service_categories = array_filter(explode(",",$get_service_categories));


$args = array(  
    'post_type' => 'services', 
    'posts_per_page' => -1, 
    'tax_query' => array(
        array(
            'taxonomy' => 'services_category', 
            'field'    => 'ID', // search by slug name, you may change to use ID
            'terms'    => $service_categories, // value of the slug for taxonomy, in term using ID, you should using integer type casting (int) $value
        ),
    )
);
$new_query = new WP_Query($args); 


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

    // echo '<br>zero_star->'.$zero_star.'count of->'.$zero_star_count;
    // echo '<br>one_star->'.$one_star.'count of->'.$one_star_count;
    // echo '<br>two_star->'.$two_star.'count of->'.$two_star_count;
    // echo '<br>three_star->'.$three_star.'count of->'.$three_star_count;
    // echo '<br>four_star->'.$four_star.'count of->'.$four_star_count;
    // echo '<br>five_star->'.ceil($five_star).'count of->'.$five_star_count;
    $sum = ($one_star_count+$two_star_count+$three_star_count+$four_star_count+$five_star_count);
    $averge_total = ($one_star_count*1)+($two_star_count*2)+($three_star_count*3)+($four_star_count*4)+($five_star_count*5);
    $average_rate = $averge_total/$sum;
    // echo '<br>average_rate->'.$average_rate;
    // echo '<br>average_rate->'.(is_numeric( $average_rate ) && floor( $average_rate ) != $average_rate);

    /**Nao Medical google review end */

    $customer_reviews = $wpdb->get_results("SELECT * FROM $table_name WHERE review<>'' AND status=1 AND rating IN(5) ORDER BY date DESC LIMIT 15");


}

?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js"></script>

<main id="primary" class="site-main" role="main"> 
<div id="primary1" class="content-area">
    <input type="hidden" id="location_latitude" value="<?php echo $location_latitude; ?>" />
    <input type="hidden" id="location_longitude" value="<?php echo $location_longitude; ?>" />

    <input type="hidden" id="location_search_name" required value="<?php echo get_post_meta( $post->ID, 'location_search_name', true );?>">
    

    <div class="subpage-mapbanner">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12 new-sublocation-banner">
                <div class="row">

                    <div class="col-md-6 col-sm-12 col-12 col-xl-6">
                        <div class="col-md-12 col-sm-12 col-12">
                            <h1><?php echo $post_title; ?> <?php if($comingsoon_locations){ ?> <span class="lsc">Coming Soon</span>  <?php } ?></h1>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 new-title-ldiv">
                            <div class="">
                                <div class="col-md-12 col-sm-12 co-12">
                                    <h5><?php echo $location_address; ?></h5>
                                    <label><a href="tel:<?php echo $location_phone; ?>"><span class="call-unline-ic"></span><?php echo $location_phone; ?></a></label>
                                </div>

                                <div class="col-md-12 col-sm-12 co-12">
                                <?php if(is_plugin_active('nao-google-review/nao-google-review.php')){ ?>
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
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 ">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 co-12">
                                    <?php echo $location_help; ?>
                                    <div id="total_distance_label" style="display:hidden;">
                                        <h3 id="total_distance"></h3>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 co-12">
                                    <div class="ssl-hrs">
                                        <h6 style="margin-bottom:10px;">Hours</h6>
                                        <h4 id="hospital_status"></h4>
                                    </div>
                                    <div class="max-lct">
                                        <ul>
                                            <?php echo $mon_fri_string; 
                                            if(empty($mon_fri_string)){ 
                                            ?>
                                            <?php echo $monday_string;?>
                                            <?php echo $tuesday_string;?>
                                            <?php echo $wednesday_string;?>
                                            <?php echo $thursday_string;?>
                                            <?php echo $friday_string;
                                            }
                                            ?>
                                            <?php echo $saturday_string;?>
                                            <?php echo $sunday_string;?>
                                            <?php echo $holiday_string;?>
                                        </ul>                        
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 co-12">
                                    <div class="ssl-hrs">
                                        <h6 style="margin-bottom:10px;">Virtual Care Available:
                                        </h6>
                                        <h4 id="hospital_status"></h4>
                                    </div>
                                    <div class="max-lct">
                                        <ul>
                                                                          
                                        <li><b>Mon- Fri</b>:&nbsp;&nbsp;&nbsp; 9:00 am - 9:00 pm</li>
                                        <li><b>Sat- Sun</b>:&nbsp;&nbsp;&nbsp; 9:00 am - 5:00 pm</li>
                                        </ul>                
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 co-12">
                                    <div class="ssl-hrs">
                                        <h6 style="margin-bottom:10px;">After Hours Service:
                                        </h6>
                                        <h4 id="hospital_status"></h4>
                                    </div>
                                    <div class="max-lct">
                                        <ul>
                                                                          
                                        <li><b>Mon- Fri</b>:&nbsp; 9:00 pm - 12:00 am</li>
                                        <li><b>Sat- Sun</b>:&nbsp; 8:00 pm - 11:00 pm</li>
                                        </ul>                
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 co-12">
                        <?php //if(!empty($appointment_link)){ 
                            //echo $appointment_link; 
                        ?>
                        <div class="wp-block-buttons btn-ld-view">
                            <div class="wp-block-button">
                                <!-- <a class="wp-block-button__link appointment_modal" href="javascript:void(0)"  rel="noreferrer noopener">Make an appointment</a> -->
                                <a class="wp-block-button__link appointment_modal" href="javascript:void(0)" data-appointment_url="<?php echo $appointment_link; ?>">Make an Appointment</a>
                            </div>
                        </div>
                        <?php //} ?>
                            <?php if(!empty($insurance_info)){
                                echo '<h3>'.$insurance_info.'</h3>';
                            } ?>

                        </div>
                    </div><!--col-md-7-closed-->

                    <div class="col-md-6 col-sm-12 col-12 col-xl-6">
                        <div class="col-md-12 col-sm-12 col-12 sub-location-map">
                            <div id="map_wrapper">
                                <div id="map_canvas_subbanner" class="submapping"></div>
                            </div>

                            <div class="col-md-12 col-12 col-sm-12 search-navigate-lcd">
                                <div class="input-group">
                                    <input type="text" class="form-control controls" id="pac-input" placeholder="Find distance from a place" aria-label="Find distance from a place" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Navigate</button>
                                    <input type="hidden" id="pac-input-hidden-lat" value="" />
                                    <input type="hidden" id="pac-input-hidden-lng" value="" />
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-12 location-thumbnail-set">
                                <div class="location-thumb-slider">
                                    <?php 
                                    $image_arr = explode(',', $location_images);

                                    if (!empty($image_arr)) {
                                        foreach ($image_arr as $location_image) {
                                            if ($image_attributes = wp_get_attachment_image_src($location_image, 'full')) { ?>
                                                <!-- $image_str .= '<li data-attechment-id=' . $location_image . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>'; -->
                                                <div class="location-thumb-div">
                                                    <img src="<?php echo $image_attributes[0]; ?>">
                                                </div>
                                                <?php 
                                            }
                                        }

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php if(is_plugin_active('nao-google-review/nao-google-review.php') && $total_review){ ?>
    <div class="location-reviews">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12">
                <h5><?php echo $total_review; ?> 5-star reviews. Top rated. Multiple NYC area locations. Quality care. Adults and kids two & older seen.</h5>
            </div>

            <div class="col-md-12 col-sm-12 col-12 location-review-div" id="fivestarreview">
                <div class="location-review-slider">
                <?php 
                if(!empty($customer_reviews)){
                    foreach ($customer_reviews as $review) {   
                    ?>
                    <div class="col-md-12 col-sm-12 col-12 lfs-div">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <h4><?php echo $review->owner; ?></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="location-rating">
                                    <span class="stars-container stars-<?php echo $review->rating; ?>"></span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                             <p><?php echo $review->review; ?></p>
                        </div>
                    </div>
                    <?php } 
                } ?>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="container-fluid about-locate-section">
        <div class="col-md-12 col-12 col-sm-12 location-detail-second">
            <div class="row">
                <div class="col-sm-12 col-12 col-md-6" style="padding:0px;">
                    <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/couple.webp" alt="nao locations" width="100%" height="100%">
                    </div>
                </div>
                <div class="col-sm-12 col-12 col-md-6" style="align-self: center;">
                    <div class="location-detail-right">
                        <h2>About</h2>
                        <p>Nao Medical is dedicated to providing the highest quality service and most trusted health care to patients in various locations in New York City.</p>
                        <p>Having spent years building urgent care centers and walk-in clinics, and assembling a highly qualified team, Nao Medical (formerly Statcare) has earned the Urgent Care Association of America accreditation (UCAOA) and The Joint Commission Gold Seal of Approval. Both of these accreditations are reserved for organizations that strive to exceed nationally recognized standards of patient care and illness or injury treatment.</p>
                        <p>Now, we are adding several more urgent care medical centers where we can provide immediate care, COVID-19 testing, home video visits, and a caring environment to even more patients throughout New York City. Please call to book an appointment for an urgent care visit or a virtual consultation.</p>                        
                        <div class="wp-block-buttons btn-ld-view">
                            <div class="wp-block-button">
                                <a class="wp-block-button__link appointment_modal" href="javascript:void(0)" rel="noreferrer noopener">Make an appointment</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if($service_categories) {  ?>
    <div class="location-availble-service">
        <div class="container">
            <div class="las-maxwidth">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="service-slider-title">
                        <h3>Available Services</h3>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-12 availble-locationser-slider">
                    <div class="row">
                        <div class="location-as-slider">

                            <?php
                               while($new_query -> have_posts()) : $new_query -> the_post();
                                $content = get_post_meta($post->ID, 'service-description', true);
                            ?>

                            <div class="col-md-12 col-sm-12 col-12 hms-dym-box">
                                <div  class="col-md-12 col-sm-12 col-12 ">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo mb_strimwidth(strip_tags($content), 0, 160, '...'); ?></p>
                                </div>
                                
                                

                                <div  class="col-md-12 col-sm-12 col-12 ">
                                    <div class="hms-prc">
                                        <h4>
                                            <?php if(get_post_meta($post->ID, '_price', true)) { ?>    
                                                $<?php echo get_post_meta($post->ID, '_price', true) ?>
                                            <?php }else { ?>
                                                <span>Free</span>
                                            <?php } ?> 
                                        </h4>
                                    </div>
                                    <div class="hms-dis">
                                        <i>Price without insurance applied*</i>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 mainservices-ctc-div">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-learnmre">Learn More</a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <a href="javascript:void(0)" class="btn btn-booknow appointment_modal">Book Now</a>
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
<?php } ?>
</div><!-- content-area -->
</main>




<script>
var location_id = <?php echo $location_id; ?>;
jQuery(document).ready(function($){
    //SET CURRENT LOCATION HIGHLIGHT
    if(location_id){
        $(".ftr-location-list div").each(function(){			
            let loc_id = $(this).attr("location_id");
            console.log(location_id)
            console.log(loc_id)
            if(location_id == loc_id){
                $(this).addClass('active_location')
            }
        })
    }	

    

    //LOCATION OPEN/CLOSE LABEL DISPLAY BASED ON WEEKLY TIME SLOT BASED 
    var dateObj = new Date();
    get_location_datetime = dateObj.toLocaleString('en-US', { timeZone: 'America/New_York' });
    currentDate = new Date(get_location_datetime);
    var day = currentDate.getDay();
    var nao_mon_fri_slot = '<?php echo $mon_fri_slot; ?>';
    console.log('nao_mon_fri_slot->',nao_mon_fri_slot);
    
    if(day >0 && day<=5){
        if(nao_mon_fri_slot == ''){
            if(day == 1){
                let slot = '<?php echo $monday_slot; ?>';
                if(slot){
                    let startTime  = '<?php echo $monday_start; ?>';
                    let closeTime  = '<?php echo $monday_close; ?>';

                    startDate = new Date(currentDate.getTime());
                    startDate.setHours(startTime.split(":")[0]);
                    startDate.setMinutes(startTime.split(":")[1]);


                    endDate = new Date(currentDate.getTime());
                    endDate.setHours(closeTime.split(":")[0]);
                    endDate.setMinutes(closeTime.split(":")[1]);
                    if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
                    //    console.log('Open');
                        $('#hospital_status').html('<span class="open_location">Open</span>');
                    }else{
                        // console.log('close');
                        $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                    }
                }else{
                    $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                }
            }else if(day == 2){
                let slot = '<?php echo $tuesday_slot; ?>';
                if(slot){
                    let startTime  = '<?php echo $tuesday_start; ?>';
                    let closeTime  = '<?php echo $tuesday_close; ?>';

                    startDate = new Date(currentDate.getTime());
                    startDate.setHours(startTime.split(":")[0]);
                    startDate.setMinutes(startTime.split(":")[1]);


                    endDate = new Date(currentDate.getTime());
                    endDate.setHours(closeTime.split(":")[0]);
                    endDate.setMinutes(closeTime.split(":")[1]);
                    if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
                    //    console.log('Open');
                        $('#hospital_status').html('<span class="open_location">Open</span>');
                    }else{
                        // console.log('close');
                        $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                    }
                }else{
                    $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                }
            }else if(day == 3){
                let slot = '<?php echo $wednesday_slot; ?>';
                if(slot){
                    let startTime  = '<?php echo $wednesday_start; ?>';
                    let closeTime  = '<?php echo $wednesday_close; ?>';

                    startDate = new Date(currentDate.getTime());
                    startDate.setHours(startTime.split(":")[0]);
                    startDate.setMinutes(startTime.split(":")[1]);


                    endDate = new Date(currentDate.getTime());
                    endDate.setHours(closeTime.split(":")[0]);
                    endDate.setMinutes(closeTime.split(":")[1]);
                    if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
                    //    console.log('Open');
                        $('#hospital_status').html('<span class="open_location">Open</span>');
                    }else{
                        // console.log('close');
                        $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                    }
                }else{
                    $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                }
            }else if(day == 4){
                let slot = '<?php echo $thursday_slot; ?>';
                if(slot){
                    let startTime  = '<?php echo $thursday_start; ?>';
                    let closeTime  = '<?php echo $thursday_close; ?>';

                    startDate = new Date(currentDate.getTime());
                    startDate.setHours(startTime.split(":")[0]);
                    startDate.setMinutes(startTime.split(":")[1]);


                    endDate = new Date(currentDate.getTime());
                    endDate.setHours(closeTime.split(":")[0]);
                    endDate.setMinutes(closeTime.split(":")[1]);
                    if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
                    //    console.log('Open');
                        $('#hospital_status').html('<span class="open_location">Open</span>');
                    }else{
                        // console.log('close');
                        $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                    }
                }else{
                    $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                }
            }else if(day == 5){
                let slot = '<?php echo $friday_slot; ?>';
                if(slot){
                    let startTime  = '<?php echo $friday_start; ?>';
                    let closeTime  = '<?php echo $friday_close; ?>';

                    startDate = new Date(currentDate.getTime());
                    startDate.setHours(startTime.split(":")[0]);
                    startDate.setMinutes(startTime.split(":")[1]);


                    endDate = new Date(currentDate.getTime());
                    endDate.setHours(closeTime.split(":")[0]);
                    endDate.setMinutes(closeTime.split(":")[1]);
                    if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
                    //    console.log('Open');
                        $('#hospital_status').html('<span class="open_location">Open</span>');
                    }else{
                        // console.log('close');
                        $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                    }
                }else{
                    $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                }
            }

        }else{
            let slot = '<?php echo $mon_fri_slot; ?>';
            if(slot){
                let startTime  = '<?php echo $mon_fri_start; ?>';
                let closeTime  = '<?php echo $mon_fri_close; ?>';
                startDate = new Date(currentDate.getTime());
                startDate.setHours(startTime.split(":")[0]);
                startDate.setMinutes(startTime.split(":")[1]);


                endDate = new Date(currentDate.getTime());
                endDate.setHours(closeTime.split(":")[0]);
                endDate.setMinutes(closeTime.split(":")[1]);
                
                if(currentDate.getTime() >= startDate.getTime() && currentDate.getTime() <= endDate.getTime()){
                //    console.log('Open');
                    $('#hospital_status').html('<span class="open_location">Open</span>');
                }else{
                    // console.log('close');
                    $('#hospital_status').html('<span class="close_location">Closed Now</span>');
                }
            }else{
                $('#hospital_status').html('<span class="close_location">Closed Now</span>');
            }
        }
        
        
        
    }else if(day == 6){
        let slot = '<?php echo $saturday_slot; ?>';
        if(slot){
            let startTime  = '<?php echo $saturday_start; ?>';
            let closeTime  = '<?php echo $saturday_close; ?>';

            startDate = new Date(currentDate.getTime());
            startDate.setHours(startTime.split(":")[0]);
            startDate.setMinutes(startTime.split(":")[1]);


            endDate = new Date(currentDate.getTime());
            endDate.setHours(closeTime.split(":")[0]);
            endDate.setMinutes(closeTime.split(":")[1]);
            if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
            //    console.log('Open');
                $('#hospital_status').html('<span class="open_location">Open</span>');
            }else{
                // console.log('close');
                $('#hospital_status').html('<span class="close_location">Closed Now</span>');
            }
        }else{
            $('#hospital_status').html('<span class="close_location">Closed Now</span>');
        }
    }else if(day == 0){
        let slot = '<?php echo $sunday_slot; ?>';
        if(slot){
            let startTime  = '<?php echo $sunday_start; ?>';
            let closeTime  = '<?php echo $sunday_close; ?>';

            startDate = new Date(currentDate.getTime());
            startDate.setHours(startTime.split(":")[0]);
            startDate.setMinutes(startTime.split(":")[1]);


            endDate = new Date(currentDate.getTime());
            endDate.setHours(closeTime.split(":")[0]);
            endDate.setMinutes(closeTime.split(":")[1]);
            if(currentDate.getTime() > startDate.getTime() && currentDate.getTime() < endDate.getTime()){
            //    console.log('Open');                   
                $('#hospital_status').html('<span class="open_location">Open</span>');
            }else{
                // console.log('close');
                $('#hospital_status').html('<span class="close_location">Closed Now</span>');
            }
        }else{
            $('#hospital_status').html('<span class="close_location">Closed Now</span>');
        }
    }
});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqsI2FNOJD_penQGHkHRBzmdIE-yY7TDs&signed_in=true&libraries=places" async></script>
<script>
	jQuery(document).ready(function($){ 	
        let autocomplete;
		let address1Field;

		$("#button-addon2").click(function(){
			initialize();
		});

		function initAutocomplete() {
			address1Field = document.querySelector("#pac-input");
			// Create the autocomplete object, restricting the search predictions to
			// addresses in the US and Canada.
			autocomplete = new google.maps.places.Autocomplete(address1Field, {
			componentRestrictions: { country: ["us", "ca"] },
			fields: ["address_components", "geometry"],
			types: ["geocode"],
			});
			address1Field.focus();
			// When the user selects an address from the drop-down, populate the
			// address fields in the form.
			autocomplete.addListener("place_changed", fillInAddress);
		}


		function fillInAddress() {
			// Get the place details from the autocomplete object.
			const place = autocomplete.getPlace();

			$('#pac-input-hidden-lat').val(place.geometry['location'].lat());
			$('#pac-input-hidden-lng').	val(place.geometry['location'].lng());
		}

        $("#pac-input").keyup(function(){
            var search = $(this).val();
            let length = search.length;
            console.log(length, 'length length length');
            if(length === 0){
              initialize(); 
            }
        });

		function initialize() {
		//geolocate();
			initAutocomplete();

			var searchlat = document.getElementById('pac-input-hidden-lat').value; //$('#pac-input-hidden-lat').val();
			var searchlng = document.getElementById('pac-input-hidden-lng').value; //$('#pac-input-hidden-lng').val();

            var location_latitude = document.getElementById('location_latitude').value;
            var location_longitude = document.getElementById('location_longitude').value;
            var location_search_name = document.getElementById('location_search_name').value;



			var searchname = document.getElementById('pac-input').value; //$('#pac-input').	val();
			if(searchname != '' && searchname != ''){


                const map = new google.maps.Map(document.getElementById("map_canvas_subbanner"), {
                zoom: 15,
                maxZoom:17,
				minZoom:6,
				panControl: false,
				zoomControl: false,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				rotateControl: false,
				scrollwheel: true
                });

                const directionsService = new google.maps.DirectionsService();
                const directionsRenderer = new google.maps.DirectionsRenderer({
                draggable: true,
                map,
                panel: document.getElementById("panel"),
                });

                directionsRenderer.addListener("directions_changed", () => {
                const directions = directionsRenderer.getDirections();

                if (directions) {
                    computeTotalDistance(directions);
                }
                });


                $('#total_distance_label').hide();

                displayRoute(
                    location_search_name,
                    searchname,
                    directionsService,
                    directionsRenderer
                );

			}else{


				var styles = [{
				stylers: [{
				saturation: 0
				}]
				}];
				var styledMap = new google.maps.StyledMapType(styles, {
				name: "Styled Map"
				});
				var mapProp = {
				center: new google.maps.LatLng(location_latitude, location_longitude),
				zoom: 15,
				maxZoom: 17,
				minZoom:6,
				panControl: false,
				zoomControl: false,
				mapTypeControl: false,
				scaleControl: true,
				streetViewControl: false,
				overviewMapControl: false,
				rotateControl: false,
				scrollwheel: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("map_canvas_subbanner"), mapProp);


				map.mapTypes.set('map_style', styledMap);
				map.setMapTypeId('map_style')

				marker = new google.maps.Marker({
				position: new google.maps.LatLng(location_latitude, location_longitude),
				animation: google.maps.Animation.DROP,
				icon: 'https://d1d6755cit84bm.cloudfront.net/wp-content/uploads/2022/11/03160623/mappin.webp',
				});

				marker.setMap(map);
				map.panTo(marker.position);

			}

		}


		//new

		function displayRoute(origin, destination, service, display) {
			service
			.route({
				origin: origin,
				destination: destination,
				travelMode: google.maps.TravelMode.DRIVING,
				avoidTolls: true,
			})
			.then((result) => {
				display.setDirections(result);
			})
			.catch((e) => {
				alert("Could not display directions due to: " + e);
			});
		}

		function computeTotalDistance(result) {
			let total = 0;
			const myroute = result.routes[0];

			if (!myroute) {
			return;
			}

			for (let i = 0; i < myroute.legs.length; i++) {
			total += myroute.legs[i].distance.value;
			}

            $('#total_distance_label').show();
			//total = total / 1000;
			total = (Math.round(total / 1000)/1.6).toFixed(2)
			///total = total / 1.6;
			document.getElementById("total_distance").innerHTML = total + " miles";
		}

		///newe

		// initialize();
        // jQuery(window).on('load', function(){
        //     window.initMap = initialize();
        // })
        initialize();

        $('#pac-input').keyup(function(event){
		if(event.which==13){
			$('#button-addon2').click();
		}
		});

	});

	</script>


<?php
get_footer();
?>