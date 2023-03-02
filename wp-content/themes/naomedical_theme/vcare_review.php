    <div class="main-service-overall <?php echo ($post->post_name =='virtual-care')?'search-services-bg':''; ?>">
            <!--virtual-care-customer-review-slider-->
            <?php if($post->post_name =='virtual-care'){ ?>
        <div class="vc-customer-review-bg">
            <div class="container">
                <div class="col-md-12 col-12 col-sm-12 virtualcare-cr-div">
                    <div class="service-slider-title">
                        <h3>Customer Reviews</h3>
                    </div>
                    <?php 
                    $args = array(  
                        'post_type' => 'testimonials', 
                        'posts_per_page' => -1, 
                        'orderby' => 'rand',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'testimonial_category', 
                                'field'    => 'slug', // search by slug name, you may change to use ID
                                'terms'    => 'virtual-care', // value of the slug for taxonomy, in term using ID, you should using integer type casting (int) $value
                            ),
                        )
                    );
                    ?>
                    <div class="virtualcare-cr-slider">
                        <?php 
                            $new_query = new WP_Query($args); 
                            while($new_query -> have_posts()) : $new_query -> the_post();
                            $post = $new_query->post;
                            // pre($post);
                        ?>
                        <div class="col-md-12 col-12 col-sm-12 vcr-slider-box">
                            <span class="vcare-quotes"></span>
                            <div class="vcr-head-div">
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
                                            <span class='stars-container stars-<?php echo $rating; ?>'></span> 
                                        </div>
                                    </li>
                                    <li><?php echo get_the_date(); ?> <?php echo the_time(); ?></li>
                                </ul>
                            </div>
                            <div class="vcr-content-div">
                                <?php echo get_the_content();?>
                            </div>

                            <div class="vcr-customer-detail">
                                <h4><?php echo get_the_title(); ?></h4>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--virtual-care-customer-review-slider-closed-->
    </div>