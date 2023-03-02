<?php /* Template Name: topservices-list */


/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafc-season
 */


// $post_title 		= !empty(get_post_meta( $post->ID, 'post_title', true )) ? get_post_meta( $post->ID, 'post_title', true ) : '';
// $services_views		= !empty(get_post_meta( $post->ID, 'services_views', true )) ? get_post_meta( $post->ID, 'services_views', true ) : '';
// $services_baseprice			= !empty(get_post_meta( $post->ID, 'services_baseprice', true )) ? get_post_meta( $post->ID, 'services_baseprice', true ) : '';
// $services_price_discount 	    = !empty(get_post_meta( $post->ID, 'services_price_discount', true )) ? get_post_meta( $post->ID, 'services_price_discount', true ) : '';

// $services_price 	    = !empty(get_post_meta( $post->ID, 'services_price', true )) ? get_post_meta( $post->ID, 'services_price', true ) : '';
// $services_price_description     = !empty(get_post_meta( $post->ID, 'services_price_description', true )) ? get_post_meta( $post->ID, 'services_price_description', true ) : '';
// $services_booking_time    = !empty(get_post_meta( $post->ID, 'services_booking_time', true )) ? get_post_meta( $post->ID, 'services_booking_time', true ) : '';

$post_title 		= !empty(get_post_meta( $post->ID, 'post_title', true )) ? get_post_meta( $post->ID, 'post_title', true ) : '';
//$post_rated_title 		= !empty(get_post_meta( $post->ID, 'post_rated_title', true )) ? get_post_meta( $post->ID, 'post_rated_title', true ) : '';
$toprated_discription		= !empty(get_post_meta( $post->ID, 'toprated_discription', true )) ? get_post_meta( $post->ID, 'toprated_discription', true ) : '';
$toprated_price			= !empty(get_post_meta( $post->ID, 'toprated_price', true )) ? get_post_meta( $post->ID, 'toprated_price', true ) : '';

// $customer_reviews			= !empty(get_post_meta( $post->ID, 'customer_reviews', true )) ? get_post_meta( $post->ID, 'customer_reviews', true ) : '';

global $wpdb;


// $location_query = 'SELECT * FROM '.$wpdb->prefix.'posts
//         LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
//         LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
//         WHERE '.$wpdb->prefix.'posts.post_status = "publish" AND '.$wpdb->prefix.'posts.post_type = "location"
//         GROUP BY '.$wpdb->prefix.'posts.ID ORDER BY '.$wpdb->prefix.'posts.ID ASC';



// $results = $wpdb->get_results($location_query);

$service_query = 'SELECT * FROM '.$wpdb->prefix.'posts
        LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
        LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
        WHERE '.$wpdb->prefix.'posts.post_status = "publish" AND '.$wpdb->prefix.'posts.post_type = "services"
        GROUP BY '.$wpdb->prefix.'posts.ID ORDER BY '.$wpdb->prefix.'posts.ID ASC';

$service_results = $wpdb->get_results($service_query);


global $post;
$args = array( 'numberposts' => 10);
$blog_posts = get_posts( $args );


?>
    <div class="ss-otrs">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12">
                    <h2>Customers also searched for</h2>
                <div class="max-ess-div">
                    <div class="sstop-related-slider">
                        <?php 
                            if(isset($service_results) && !empty($service_results)){
                            foreach($service_results as $key => $postdata){
                               // echo $postdata->ID;
                                $post_title			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
                                $toprated_discription 		= !empty(get_post_meta( $postdata->ID, 'toprated_discription', true )) ? get_post_meta( $postdata->ID, 'toprated_discription', true ) : '';
                                $toprated_price 			= !empty(get_post_meta( $postdata->ID, 'toprated_price', true )) ? get_post_meta( $postdata->ID, 'toprated_price', true ) : '';
                        ?>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="col-md-12 col-xl-12 col-sm-12 hms-dym-box">
                                    <div>
                                        <h3><?php echo $post_title; ?> </h3>
                                    </div>

                                    <div>
                                        <div class="hms-prc">
                                            <h4><?php echo $toprated_price; ?></h4>
                                        </div>
                                        <div class="hms-dis">
                                            <i><?php echo $toprated_discription; ?></i>
                                        </div>
                                    </div>


                                    <div>
                                        <a href="#" class="btn btn-mkp-ess" data-bs-toggle="modal" data-bs-target="#bookanapp"> Make an appointment</a>
                                    </div>

                                    <div>
                                        <a href="https://naomedical.io/" class="btn btn-lmr-ess"> Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                        


                    </div>
                </div>
            </div>
        </div>
    </div><!--closed-->

    <!--top-article-section-->
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
                                        <!-- <div>
                                            <a href="<?php the_permalink(); ?>"> <img src="<?php echo $featured_img_url; ?>" class="img-fluid" alt="related articles"> </a>
                                        </div> -->

                                        <div>
                                            <!-- <a hrfe="<?php the_permalink(); ?>">
                                                <?php if($featured_img_url != ''){ ?>
                                                    <img src="<?php echo $featured_img_url; ?>" class="img-fluid" alt="related articles"> 
                                            <?php }else{ ?>
                                            <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                            <?php } ?>
                                            </a> -->

                                            <a href="<?php the_permalink(); ?>">
                                                 <?php if ( has_post_thumbnail() ) {
                                                     the_post_thumbnail('full'); ?>
                                                 <?php }else{ ?>
                                                <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                                <?php } ?>
                                            </a>

                                            <!-- <a hrfe="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?> 
                                            </a> -->
                                        </div>
                                        
                                        <div>
                                            <h2><a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                                        </div>
                                        <div>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                        <div>   
                                            <lable class="author-lbl-ss">ANDY LAMB, MD | PHYSICIAN</lable>
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
    <!--top-article-section-closed-->