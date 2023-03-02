<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafc-season
 */
get_header();
$provider_id = $post->ID;
global $wpdb;

$provider_education = get_post_meta($post->ID, '_provider_education', true);
$provider_board_cerificate = get_post_meta($post->ID, '_provider_board_cerificate', true);
$provider_residency = get_post_meta($post->ID, '_provider_residency', true);

$educations = explode("\n", $provider_education);
$education_value = "<ul>";
    foreach($educations as $education){
        $education_value .= "<li>" . $education . "</li>";
    }
$education_value .= "</ul>";

$cerifications = explode("\n", $provider_board_cerificate);
$cerificate_value = "<ul>";
    foreach($cerifications as $cerification){
        $cerificate_value .= "<li>" . $cerification . "</li>";
    }
$cerificate_value .= "</ul>";

$residencies = explode("\n", $provider_residency);
$residency_value = "<ul>";
    foreach($residencies as $residency){
        $residency_value .= "<li>" . $residency . "</li>";
    }
$residency_value .= "</ul>";



?>
<main id="primary" class="site-main" role="main">

    <div class="provider_detail_banner"></div>
    
    <div id="primary2" class="content-area">

        <div class="container">

            <div class="founders-max-section" id="founder-div">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12 col-xl-12">
                            <div class="col-md-12 col-sm-12 col-12 founders-detail-bg">

                                <div class="col-md-12 col-sm-12 col-12 founders-profile-details">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12 col-xl-4 profile-photo-dd">
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('full'); ?>
                                        <?php }else{ ?>
                                            <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/naomedical_theme/assets/images/placeholder.png" class="img-fluid" alt="related articles">
                                        <?php } ?>
                                        </div>
                                        
                                        <div class="col-md-12 col-sm-12 col-12 col-xl-8 founder-detail-div">
                                            <h3><?php the_title(); ?></h3>
                                            <?php 
                                            $is_founder = !empty(get_post_meta( $post->ID, 'founder', true )) ? get_post_meta(  $post->ID, 'founder', true ) : false;
                                            //echo $is_founder ;
                                            if($is_founder === "true") { ?>
                                                 <h6>Founder @ <img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" alt="<?php the_title(); ?>" class="img-fluid"></h6>
                                            <?php } else { ?>
                                                <h6><?php echo get_post_meta($post->ID, '_provider_job_position', true); ?></h6>
                                            <?php } ?>
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12 col-12">
                                                        <div class="edu-provider-detail">
                                                            <h5>Education</h5>
                                                            <div>
                                                                <?php echo $education_value ; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php 
                                                        if(get_post_meta($post->ID, '_provider_board_cerificate', true) != "") { ?>
                                                    <div class="col-md-4 col-sm-12 col-12">
                                                  
                                                        <div class="edu-provider-detail epd-left">
                                                            <h5>Board certification</h5>
                                                            <div>
                                                                <?php echo $cerificate_value; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php 
                                                        if(get_post_meta($post->ID, '_provider_residency', true) != "") { ?>
                                                    <div class="col-md-4 col-sm-12 col-12">
                                                        <div class="edu-provider-detail epd-left">
                                                            <h5>Residency</h5>
                                                            <div>
                                                                <?php echo $residency_value; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-12 pad-10">
                <div class="max-provider-content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12 col-xl-6">
                            <div class="provider-content-left">
                                <div class="provider_about">
                                    <h2>About <?php the_title(); ?></h2>
                                    <?php
                                        $content_post = get_post($provider_id);
                                        $content = $content_post->post_content;
                                        $content = apply_filters('the_content', $content);
                                        $content = str_replace(']]>', ']]&gt;', $content);
                                        echo $content;
                                    ?>
                                </div>
                                <?php if(get_post_meta($post->ID, 'provider-health-and-wellness-description', true)) { ?>
                                    <div class="provider_health_and_wellnes">
                                        <h3>Why is health and wellness important to you?</h3>
                                        <?php echo get_post_meta($post->ID, 'provider-health-and-wellness-description', true); ?>
                                    </div>
                                <?php } ?>

                                <?php if(get_post_meta($post->ID, 'provider-help-your-patients-description', true)) { ?>
                                    <div class="provider_help_your_patients">
                                        <h3>How do you approach or help your patients?</h3>
                                        <?php echo get_post_meta($post->ID, 'provider-help-your-patients-description', true); ?>
                                    </div>
                                <?php } ?>

                                <?php if(get_post_meta($post->ID, 'provider-fun-facts-description', true)) { ?>
                                    <div class="provider_fun_facts">
                                        <h3>Fun Facts</h3>
                                        <?php echo get_post_meta($post->ID, 'provider-fun-facts-description', true); ?>
                                    </div>
                                <?php } ?>

                                <?php if(get_post_meta($post->ID, 'provider-whyworking-description', true)) { ?>
                                    <div class="provider_fun_facts">
                                        <h3>Why do you love working at Nao Medical?</h3>
                                        <?php echo get_post_meta($post->ID, 'provider-whyworking-description', true); ?>
                                    </div>
                                <?php } ?>
                            
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 col-xl-6">
                            <?php 
                            if(get_post_meta($post->ID, '_provider_video_link', true) != "") { ?>
                            <div class="providers-right-video">
                                <div class="ratio ratio-16x9">
                                    
                                    <iframe src="<?php echo get_post_meta($post->ID, '_provider_video_link', true); ?>" title="YouTube video" allowfullscreen></iframe>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div><!-- content-area -->
</main>

<?php
get_footer();
?>