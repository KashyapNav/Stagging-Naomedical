<?php
/**
 *Template Name: Our Services
 *Template Post Type: post, page, product, topservices
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();

$top_services = get_posts([
    'post_type' => 'topservices',
    'post_status' => 'publish',
    'numberposts' => -1
    // 'order'    => 'ASC'
  ]);

// pre($top_services);

?>
<main id="primary" class="site-main" role="main"> 
    <div class="top_service_top_section ourservices-overall">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>
    
    <div id="primary1" class="content-area main-service-overall">
        <!--on-site bulk inquiries-->
        <div class="onsite-section">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12 d-flex align-items-center">
                            <div class="onsite-bulk-os-div">
                                <h3><?php echo get_post_meta($post->ID, 'bulk_testing_title', true); ?></h3>
                                <p><?php echo get_post_meta($post->ID, 'bulk-testing', true); ?></p>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="onsite-form-div">
                                <div class="onsite-form-max">
                                    <div class="">
                                        <h4>On-Site (Bulk) Testing Inquiries</h4>
                                    </div>

                                    <?php echo do_shortcode('[contact-form-7 id="5992" title="On-Site (Bulk) Testing Inquiries"]'); ?>

                                    <div class="form-group" style="text-align:center;">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/hippa.svg" class="img-fluid" width="88" height="31">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--on-site bulk inquiries-closed-->
    
       <!--customer-review-section-->
       <div class="os-review-section">
           <div class="container">
                <?php echo do_shortcode('[review_slider limit="4" ratings="4,5"]');?>
                <!-- <div class="max-os-review-new">
                   
                </div> -->
            </div>
        </div>
        <!--customer-review-section-closed-->
        
    </div><!-- content-area -->
</main>    
<?php
get_footer();
?>