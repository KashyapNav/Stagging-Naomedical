<?php
/**
 *Template Name: Top Services
 *Template Post Type: post, page, product, topservices
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
    <div class="top_service_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div id="primary2" class="content-area main-service-overall">
        
    </div><!-- content-area -->
</main>

<?php
get_footer();
?>