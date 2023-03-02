<?php
/**
 *Template Name: Meet our providers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();
global $wpdb;

$args = array(
    'taxonomy' => 'providers_category',
    'orderby' => 'name',
    'order'   => 'ASC'
);
$taxonomy = 'providers_category';

$departments = get_terms($taxonomy);

$founder_posts = [];
// exit;
?>
<main id="primary" class="site-main" role="main">
    <div class="meetproviders_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.

            $args = array(  
                'post_type' => 'providers', 
                'posts_per_page' => 2, 
                'status'    => 'published',
                'meta_query' => array(
                    array(
                        'key' => 'founder', 
                        'value' => 'true'
                    ),
                )
            );
            $new_query = new WP_Query($args); 
            //pre($new_query->posts);
        ?>
    </div>

    <div id="primary2" class="content-area">
        <div class="container">

            <div class="founders-max-section" id="founder-div">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <?php while($new_query -> have_posts()) : $new_query -> the_post(); 
                        $founder_posts[] = $post->ID;
                        ?>
                        <div class="col-md-12 col-sm-12 col-12 col-xl-6">
                            <div class="col-md-12 col-sm-12 col-12 founders-section-bg">

                                <div class="founders-profile-section">
                                    <div class="profile-photo-div">
                                            <?php if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail('full'); ?>
                                                <?php }else{ ?>
                                            <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                            <?php } ?>
                                    </div>
                                    <div class="profile-content-div">
                                        <h3><?php the_title(); ?></h3>
                                        <h6>Founder @ <img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" alt="<?php the_title(); ?>" class="img-fluid"></h6>
                                    </div>
                                </div>

                                <div class="founders-content-div">
                                    <h4>About </h4>
                                    <div class="founder-about-content">
                                        <p><?php echo get_the_content();?></p>
                                    </div>
                                    <div>
                                        <a href="<?php the_permalink(); ?>">View More </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php endwhile; wp_reset_query(); ?>
                        

                    </div>
                </div>
            </div>

            <div class="providers-tab-section">
                <div class="container">

                    <div class="col-md-12 col-sm-12 col-12 provider-tab-bg">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <ul class="nav nav-tabs" id="department-list">
                                        <li class="nav-item">
                                            <button class="nav-link filter active" data-filter="all" type="button">All</button>
                                        </li>
                                        <?php
                                         foreach($departments as $department) {
                                        ?>
                                            <li class="nav-item">
                                                <button class="nav-link filter" data-filter="<?php echo $department->slug; ?>" ><?php echo $department->name; ?></button>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                    </ul></div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input type="search" id="providers-search" class="form-control search-mp" placeholder="Search">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-12 provider-tab-content">
                        <div class="">
                        <?php
                        // pre($founder_posts);
                                $args = array(  
                                    'post_type' => 'providers', 
                                    'posts_per_page' => -1, 
                                    'status'    => 'published',
                                    'post__not_in' => $founder_posts
                                    // 'tax_query' => array(
                                    //     array(
                                    //         'taxonomy' => 'providers_category', 
                                    //         'field'    => 'ID',
                                    //         'terms'    => $department->term_id, 
                                    //     ),
                                    // )
                                );
                                $new_query = new WP_Query($args); 
                        ?>
                                <div class="col-md-12 col-sm-12 col-12 providers-list-div">
                                    <ul id="providers_list">
                                        <?php while($new_query -> have_posts()) : $new_query -> the_post(); 
                                        //pre($post);
                                        $provider_job_position = !empty(get_post_meta( $post->ID, '_provider_job_position', true )) ? get_post_meta(  $post->ID, '_provider_job_position', true ) : '';
                                        $provider_location = !empty(get_post_meta( $post->ID, '_provider_location', true )) ? get_post_meta(  $post->ID, '_provider_location', true ) : '';
                                        $provider_location_name = '';
                                        if(!empty($provider_location)){
                                            $provider_location_name = get_the_title($provider_location);
                                        }

                                        $terms = get_the_terms( $post->ID, 'providers_category');
                                        ?>
                                        <li class="providers_list_item <?php echo $terms[0]->slug ?>">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="providers-list">
                                                    <div class="provider-img">
                                                    <?php if ( has_post_thumbnail() ) {
                                                     the_post_thumbnail('full'); ?>
                                                    <?php }else{ ?>
                                                        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                                    <?php } ?>
                                                    </div>
                                                    <div>
                                                        <h3><?php the_title(); ?></h3>
                                                        <p><?php echo $provider_job_position; ?></p>
                                                        <p><?php echo $provider_location_name; ?></p>
                                                        
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php endwhile; wp_reset_query(); ?>
                                    </ul>
                            </div>

                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div><!-- content-area -->
</main>
<script>
    jQuery(function($){
        jQuery('.filter').on('click',function(){
            var filter_val = jQuery(this).data('filter');
            if(filter_val == 'all'){
                jQuery('#providers_list .providers_list_item').show();
            }else{
                jQuery('#providers_list .providers_list_item').hide();
                jQuery('#providers_list .'+filter_val).show();
            }
            
        });
            jQuery(".providers-tab-section ul li button").click(function(){
            jQuery(".providers-tab-section ul li button.active").removeClass("active");
            jQuery(this).addClass("active")
	    })
    });
</script>

<script>
    let searchInput = document.getElementById('providers-search');
    searchInput.addEventListener('keyup',function(event){
    jQuery('#department-list li button').removeClass('active')
    jQuery('#department-list li button').first().addClass('active');

    let searchQuery = event.target.value.toLowerCase();
    let allNamesDOMCollection  = document.getElementsByClassName('providers_list_item');
    
    for(let i=0;i<allNamesDOMCollection.length;i++){
        const currentName = allNamesDOMCollection[i].textContent.toLowerCase();
        if(currentName.includes(searchQuery)){
            allNamesDOMCollection[i].style.display = 'block';
        }   
        else{
            allNamesDOMCollection[i].style.display = 'none';
        }
    }
})

</script>

<?php
get_footer();
?>