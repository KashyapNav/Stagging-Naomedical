<?php /* Template Name: essentialservices */ ?>

    <div id="primary1" class="content-area essentialservices-list">
        <div class="container">
            <div class="col-md-12 col-xl-12 col-sm-12">
                <div class="max-ess-div">
                    <div class="row">
                        <?php 
                            $args = array(  
                                'post_type' => 'services', 
                                'posts_per_page' => 10, 
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'services_category', 
                                        'field'    => 'slug', // search by slug name, you may change to use ID
                                        'terms'    => 'home-services', // value of the slug for taxonomy, in term using ID, you should using integer type casting (int) $value
                                    ),
                                )
                            );
                        ?>
                        <div class="sstop-related-slider">
                            <?php
                                $new_query = new WP_Query($args); 
                                while($new_query -> have_posts()) : $new_query -> the_post();
                            ?>
                                <div class="col-md-12 col-xl-12 col-sm-12 hms-dym-box">
                                    <div>
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div>
                                        <div class="hms-prc">
                                            <h4>
                                                <?php if(get_post_meta($post->ID, '_price', true)) { ?>    
                                                    $<?php echo get_post_meta($post->ID, '_price', true) ?>
                                                <?php }else if(get_post_meta($post->ID, '_price_message', true)) { ?> 
                                                    <span><?php echo get_post_meta($post->ID, '_price_message', true); ?></span>
                                                <?php }else { ?>
                                                    <span>Free</span>
                                                <?php } ?> 
                                            </h4>
                                        </div>
                                        <?php if(get_post_meta($post->ID, '_price', true)) { ?>   
                                        <div class="hms-dis">
                                            <i>Price without insurance applied*</i>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" class="btn btn-mkp-ess appointment_modal"> Make an appointment</a>
                                    </div>

                                    <div>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-lmr-ess"> Learn More</a>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--essential-home-service-closed-->                           
    </div><!-- content-area -->
