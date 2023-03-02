<?php
/**
 *Template Name: Covid Recovery Hub
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
    <div class="covid_hub_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div id="primary2" class="content-area">

        <div class="postcovid-symptoms-bg">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12 col-lg-6">
                            <div class="max-post-title-div">
                                <h2>Post-COVID <br>  Persistent Symptoms of “Long COVID”</h2>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-12 col-lg-6">
                            <div class="max-post-accordian">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Dermatologic (Skin) <span class="vs-right">View Symptoms</span>
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                 <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Hair Loss</li>
                                                        <li>Skins Lesions</li>
                                                        <li>Rashes</li>
                                                    </ul>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Neurologic (Brain) <span class="vs-right">View Symptoms</span>
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Cognitive </li>
                                                        <li>Impairment</li>
                                                    </ul>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Pulmonary (Lung) <span class="vs-right">View Symptoms</span>
                                        </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Cough</li>
                                                        <li>Wheezing</li>
                                                        <li>Pain with Breathing</li>
                                                    </ul>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            General <span class="vs-right">View Symptoms</span>
                                        </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Fatigue</li>
                                                        <li>No Smell</li>
                                                        <li>No Taste</li>
                                                        <li>Poor Appetite</li>
                                                        <li>Body Aches</li>
                                                        <li>Insomnia</li>
                                                        <li>Hair Loss</li>
                                                    </ul>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                              Psychological/Cognitive <span class="vs-right">View Symptoms</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Anxiety</li>
                                                        <li>Depression</li>
                                                        <li>Poor Memory & Concentration</li>
                                                        <li>Post-Traumatic Stress Disorder</li>
                                                    </ul>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                             Cardiac (Heart) <span class="vs-right">View Symptoms</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Chest Pain</li>
                                                        <li>Difficulty Breathing</li>
                                                        <li>Palpitations</li>
                                                        <li>Dizziness</li>
                                                        <li>Fainting</li>
                                                    </ul>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                             Others <span class="vs-right">View Symptoms</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                            <div class="accordion-body preventative-div">
                                                <div class="hub_symptoms_list">
                                                    <ul>
                                                        <li>Renal Failure</li>
                                                        <li>Liver Injury</li>
                                                        <li>Diabetes</li>
                                                        <li>Diarrhea</li>
                                                    </ul>
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
        </div>

        <div class="covid-recovery-section">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="covid-recovery-title">
                        <h2>Urgent care for COVID-19 recovery</h2>
                        <p>Nao Medical offers a Post-COVID Comprehensive Medical Examination to evaluate and address persistent symptoms of acute COVID-19 illness.</p>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-12">

                    <div class="covid-hub-container max-recovery-div">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="hub_recovery_box">
                                    <div class="hub-rb-left">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub_personalize.svg" alt="hub_personalize" class="img-fluid">
                                    </div>
                                    <div class="hub-rb-right">
                                        <p>Personalized <br> treatment plan</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="hub_recovery_box">
                                    <div class="hub-rb-left">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub_service.svg" alt="hub_service" class="img-fluid">
                                    </div>
                                    <div class="hub-rb-right">
                                        <p>Services offered <br> virtually or in-person</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="hub_recovery_box">
                                    <div class="hub-rb-left">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub_referrals.svg" alt="hub_referrals" class="img-fluid">
                                    </div>
                                    <div class="hub-rb-right">
                                        <p>Referrals provided <br> (if needed) </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="hub_recovery_box">
                                    <div class="hub-rb-left">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub_book.svg" alt="hub_book" class="img-fluid">
                                    </div>
                                    <div class="hub-rb-right">
                                        <p>Book same-day<br> appointments</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="hub_recovery_box">
                                    <div class="hub-rb-left">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub_aftercare.svg" alt="hub_aftercare" class="img-fluid">
                                    </div>
                                    <div class="hub-rb-right">
                                        <p>Aftercare program <br> for patients</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="hub_recovery_box">
                                    <div class="hub-rb-left">
                                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub_accessible.svg" alt="hub_accessible" class="img-fluid">
                                    </div>
                                    <div class="hub-rb-right">
                                        <p>Accessible clinic<br> locations to choose<br> from</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="appointment_modal foryou-booking-btn text-center">
                            <a class="wp-block-button__link" data-wahfont="18" role="link">Book an Appointment</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="covid-additional-services">
            <div class="container">
                <div class="max-covid-ser">
                    <div class="col-md-12 col-sm-12 col-12">
                        <h2 class="title-cas">Additional COVID-19 Services</h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-12 mainservices-slidlist <?php if($category_description){ echo "categoryDesc"; } ?>"> 
                        <div class="subservice-slider">
                            <?php 
                            $args = array(  
                                'post_type' => 'services', 
                                'posts_per_page' => -1, 
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'services_category', 
                                        'field'    => 'slug', // search by slug name, you may change to use ID
                                        'terms'    => ['COVID-19 Services for Kids','COVID-19 Vaccines','General COVID-19 Services','PCR COVID-19 Services','Rapid COVID-19 Services'] // value of the slug for taxonomy, in term using ID, you should using integer type casting (int) $value
                                    ),
                                )
                            );
                            $new_query = new WP_Query($args); 
                            while($new_query -> have_posts()) : $new_query -> the_post();
                            ?>
                            <div class="col-md-12 col-sm-12 col-12 hms-dym-box">
                                <a href="<?php the_permalink(); ?>">
                                    <div  class="col-md-12 col-sm-12 col-12 ">
                                        <h3><?php the_title(); ?></h3>
                                        <p> <?php echo strip_tags(get_post_meta($post->ID, 'short-description', true)) ?></p>
                                    </div>

                                    <div  class="col-md-12 col-sm-12 col-12 ">
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

                                    <div class="col-md-12 col-sm-12 col-12 mainservices-ctc-div">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-6">
                                                <a href="<?php the_permalink(); ?>" class="btn btn-learnmre">Learn More</a>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-6">
                                                <?php if(get_post_meta($post->ID, '_booknow', true)) { ?>    
                                                    <a href="<?php echo get_post_meta($post->ID, '_booknow', true) ?>" class="btn btn-booknow">Book Now</a>
                                                <?php }else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-booknow appointment_modal">Book Now</a>
                                                <?php } ?>  
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hub_bottom_pattern">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="hub_bottom_container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                 <div>
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/hub-alreart.svg" class="img-fluid" alt="hub-alert">
                                 </div>
                                 <div class="">
                                    <h3>Seek immediate help and call 911 if any of the following occur:</h3>
                                 </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="covid-hub-yellowbox">
                                    <ul>
                                        <li>Shortness of breath that makes speaking difficult</li>
                                        <li>Sudden worsening of symptoms</li>
                                        <li>Blood in your cough</li>
                                        <li>Episodes of fainting or passing out</li>
                                    </ul>
                                </div>
                            </div>
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