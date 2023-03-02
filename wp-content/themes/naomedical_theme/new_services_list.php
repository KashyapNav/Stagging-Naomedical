<?php /* Template Name: new_services_list */ 

$args = array(
    'post_type' => 'topservices',
    'post_status' => 'publish',
    'numberposts' => -1
    // 'order'    => 'ASC'
  );

$loop = new WP_Query($args);
// pre($top_services);

?>

<div class="container">

    <div class="max_nos_div service-desktop-view">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12 col-xl-4">
                <div class="nos-tab">
                    <h5 class="nos-title">Our Services</h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php 
                        $row = 1;
                        if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); 
                            global $post;
                            $slug = $post->post_name;
                            $active = '';
                            if($row == 1){
                                $active = 'active';
                            }
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo $active; ?>" id="<?php echo $slug; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $slug; ?>" type="button" role="tab" aria-controls="<?php echo $slug; ?>" aria-selected="true"><span class="<?php echo $slug; ?>-nos nos-tb-icon">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    echo get_the_post_thumbnail();
                                } ?>
                                </span><?php echo get_the_title(); ?></button>
                            </li>
                        <?php 
                            $row++;
                            endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-12 col-xl-8 pad0">
                <div class="tab-content" id="myTabContent">
                    <?php 
                    $row = 1;
                    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); 
                            global $post;
                            $slug = $post->post_name;
                            $id = $post->ID;
                            $active = '';
                            if($row == 1){
                                $active = 'active';
                            }
                        ?>
                    <div class="tab-pane fade show <?php echo $active; ?>" id="<?php echo $slug; ?>" role="tabpanel" aria-labelledby="<?php echo $slug; ?>-tab">
                            <?php 
                            $arg =  array(
                                'post_type' => 'services',
                                'meta_key' => 'top_service',
                                'meta_value' => $id,
                                'meta_compare' => '=',
                                'posts_per_page' => 20

                            );
                            // pre($arg);
                            $the_query = new WP_Query($arg);
                            // pre($the_query->posts);
                            ?>
                        <div class="nos-tab-content">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?> <span> Go </span> </a>
                                </div>
                                <div class="card-body">
                                    <div class="nos-services-list-scroll">
                                        <ul>
                                        <?php foreach ( $the_query->posts as $service_post ){
                                            // pre($service_post);
                                        ?>
                                            <li><a href="<?php the_permalink($service_post->ID); ?>"><?php echo $service_post->post_title; ?></a></li>
                                        <?php 
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <a href="<?php echo get_permalink(); ?>" class="btn viewall-pms">View All <?php echo get_the_title(); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <?php 
                    $row++;
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div><!--desktop-view-closed-->

    <div class="max_nos_div service-mobile-view">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12 col-xl-12 mob-os-list">
                <div class="accordion" id="accordionExample">
                    <?php 
                    $row =1;
                    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); 
                            global $post;
                            $slug = $post->post_name;
                            $id = $post->ID;
                            $active = 'false';
                            $show = '';
                            $collapse = 'collapsed';
                            if($row == 1){
                                $active = 'true';
                                $show = ' show';
                                $collapse = '';
                            }
                            
                        ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button <?php echo $collapse; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $slug; ?>" aria-expanded="<?php echo $active; ?>" aria-controls="<?php echo $slug; ?>">
                            <?php echo get_the_title(); ?>
                        </button>
                        </h2>
                        <div id="<?php echo $slug; ?>" class="accordion-collapse collapse <?php echo $show; ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <div class="nos-services-list-scroll">
                                        <ul>
                                        <?php 
                                        $arg =  array(
                                            'post_type' => 'services',
                                            'meta_key' => 'top_service',
                                            'meta_value' => $id,
                                            'meta_compare' => '=',
                                            'posts_per_page' => 20
            
                                        );
                                        // pre($arg);
                                        $the_query = new WP_Query($arg);
                                        // pre($the_query->posts);
                                        foreach ( $the_query->posts as $service_post ){
                                            // pre($service_post);
                                        ?>
                                            <li><a href="<?php the_permalink($service_post->ID); ?>"><?php echo $service_post->post_title; ?></a></li>
                                        <?php 
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <a href="<?php echo get_permalink(); ?>" class="btn viewall-pms">View All <?php echo get_the_title(); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                    <?php                     
                    $row++;
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div><!--mobile-view-->

</div>
