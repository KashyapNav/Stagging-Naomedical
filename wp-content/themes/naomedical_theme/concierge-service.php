<?php
/**
 *Template Name: Concierge Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();
global $wpdb;
?>
<main id="primary" class="site-main" role="main">
    <div class="concierge_service_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div id="primary2" class="content-area">

        <div class="concierge-bookappointment-section">
            <div class="container">
                <div class="concierge-service-maxbook">
                    <div class="col-md-12 col-sm-12 col-12">
                            <h2>Book your appointment via</h2>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="bookan-pp-box">
                                    <div class="" style="padding-top: 65px;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/inapp.svg" alt="app">
                                    </div>
                                    <div>
                                        <h6>In App</h6>
                                    </div>
                                    <div>
                                        <a href="https://naomedical.io/patient/preSelection/appointment-type" class="btn btn-pp-bnw" id="appointment_url"> Make an appointment </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="bookan-pp-box">
                                    <div class="" style="padding-top: 65px;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call-center.svg" alt="call">
                                    </div>
                                    <div>
                                        <h6>Call Center</h6> 
                                    </div>
                                    <div>
                                        <a href="tel:(917) 310-3371" data-wpel-link="internal" tabindex="0" class="btn btn-pp-bnw">Contact Us </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="bookan-pp-box">
                                    <div class=""  style="padding-top: 65px;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/concierge.svg" alt="concierge">
                                    </div>
                                    <div>
                                        <h6>Concierge</h6>
                                    </div>
                                    <div>
                                        <!-- <div class="input-group">
                                            <input type="tell" class="form-control" placeholder="Enter Phone number" aria-label="Enter Phone number" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Call Me</button>
                                        </div> -->
                                        <?php echo do_shortcode('[contact-form-7 id="3200" title="Our Concierge"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="actuallycare-div-cs">
            <div class="container">
                <div class="concierge-service-maxbook">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/actuallycare.webp" class="img-fluid"  alt="actuallycare">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12 d-flex align-items-center">
                                <div>
                                    <h2>Healthcare that actually cares about you</h2>
                                    <p>You'll only be given one healthcare assistant, that means each time you call, book an appointment or need help you'll be personally cared for by someone who understands you and your specific healthcare needs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="ss-whynao-section">
            <div class="col-md-12 col-sm-12 col-12 ss-whynoa-detail">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 col-xl-5">
                        <div class="ss-whynao-bg cs-whynao-div">
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
        
    </div><!-- content-area -->
</main>

<?php
get_footer();
?>