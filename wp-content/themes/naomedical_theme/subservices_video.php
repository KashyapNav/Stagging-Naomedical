<?php
/**
 *Template Name: Top Services Video Template
 *Template Post Type: post, page, product, topservices
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
$topservices_schema_script     = !empty(get_post_meta( $post->ID, 'topservices-schema-script', true )) ? get_post_meta( $post->ID, 'topservices-schema-script', true ) : '';
global $wpdb;
?>
<main id="primary" class="site-main" role="main"> 
    <div class="top_service_video_top">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>
    <div id="primary2" class="content-area main-service-overall">

    </div><!-- content-area -->
</main>

<!-------Schema script START-->
<div class="d-none">
<?php if(!empty($topservices_schema_script)){
    echo $topservices_schema_script;
} ?>
</div>
<!-------Schema script END-->

<?php
get_footer();
?>