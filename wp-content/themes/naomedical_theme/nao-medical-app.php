<?php /* Template Name: nao medical app */ 
get_header();
?>

    <div id="primary" class="content-area">
            <div class="">
                <div class="naoApp_content text-center">
                    <?php
                    // Start the loop.
                       while ( have_posts() ) : the_post();?>
 				<?php the_content(); ?>
                    <?php endwhile;
                    ?>
                </div>
            </div>
    </div><!-- .content-area -->


<?php
//get_sidebar();
get_footer(); 