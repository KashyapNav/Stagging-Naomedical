<?php
/**
 *Template Name: Healthy Journey
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();
$appointment_url = !empty(get_post_meta( $post->ID, 'appointment_link', true )) ? get_post_meta(  $post->ID, 'appointment_link', true ) : 'https://naomedical.io/';
?>
<main id="primary" class="site-main" role="main"> 

    <div class="top_service_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div id="primary1" class="content-area">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-12 hy_btn">
                <div class="justify-content-center ">
                    <a class="wp-block-button__link appointment_modal" data-wahfont="18" role="link" data-appointment_url="<?php echo $appointment_url; ?>">Book an Appointment</a>
                </div>
            </div>
        </div>

        <div class="guide-better-bg">
            <div class="container">
                <div class="ps_container_hj">
                    <div class="col-md-12 col-sm-12 col-12 guide-better-div">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="better-health-form">
                                <div>
                                        <h2>Let <span class="naologo-hj"></span> <br> guide you to better health.</h2>
                                    </div>

                                    <div>
                                        <?php echo do_shortcode('[contact-form-7 id="6099" title="Healthcare Journey Submission"]'); ?>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="text-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/betterhealth.webp" class="img-fluid" alt="better health" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hy_ps_section">
            <div class="container">
                <div class="ps_container_hj">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/personal-support.webp" class="img-fluid" alt="personal support" style="border-radius: 4px;" width="100%" height="100%">
                            </div>
                            <div class="col-md-6 col-sm-12 col-12 d-flex align-items-center">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="">
                                        <h2>Personal support for your personal healthcare needs</h2>
                                        <p>Nao Medical's team of concierges will support you throughout your healthcare journey, helping schedule all your appointments as well as get any referrals and authorizations you might need. They are always available for any questions you may have, or any help you might require!</p>
                                        <p>At Nao Medical your health is our number one priority - our team is looking forward to supporting you on your journey to better health!</p>
                                    </div>

                                    <div class="ps-booking-btn appointment_modal">
                                        <a class="wp-block-button__link appointment_modal" data-wahfont="18" role="link" data-appointment_url="<?php echo $appointment_url; ?>">Book an Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hj_pre_accordian">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-12 hj_pre_title">
                    <h2>Preventative healthcare <br> recommendations</h2>
                </div>

                    <div class="col-md-12 col-sm-12 col-12 hj_pre_div">
                        <div class="max-hj_pre">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Preventative Care Recommendations for Ages 18-29
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body preventative-div table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Examination</th>
                                                    <th scope="col">Frequency</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Risk Factors Assessment Score</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Annual Blood Work</td>
                                                        <td>Annually1</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Baseline Electrocardiogram (ECG)</td>
                                                        <td>Once<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mental Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Substance Abuse Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reproductive/Sexual Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Safety/Violence Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Healthy Lifestyle Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Immunization Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Vision Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Hearing Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Dental Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Skin Exam</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Blood Pressure Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Testicular Exam<sup>2</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Breast Exam<sup>3</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pelvic Exam<sup>3</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pap Smear3</td>
                                                        <td>Every 3 Years<sup>1</sup></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                         Preventative Care Recommendations for Ages 30-39
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body preventative-div table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Examination</th>
                                                    <th scope="col">Frequency</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Risk Factors Assessment Score</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Annual Blood Work</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Baseline Electrocardiogram (ECG)</td>
                                                        <td>Once<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mental Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Substance Abuse Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reproductive/Sexual Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Safety/Violence Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Healthy Lifestyle Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Immunization Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Vision Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Hearing Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Dental Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Skin Exam</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Blood Pressure Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Testicular Exam<sup>2</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Breast Exam<sup>3</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pelvic Exam<sup>3</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>HPV & Pap Smear Cotest<sup>3</sup></td>
                                                        <td>Every 3 Years<sup>1</sup></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Preventative Care Recommendations for Ages 40-49
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body preventative-div table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Examination</th>
                                                    <th scope="col">Frequency</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Risk Factors Assessment Score</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Annual Blood Work</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Baseline Electrocardiogram (ECG)</td>
                                                        <td>Once<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mental Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Substance Abuse Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reproductive/Sexual Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Safety/Violence Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Healthy Lifestyle Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Immunization Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Vision Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Hearing Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Dental Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Skin Exam</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Blood Pressure Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                        <p>Colon Cancer Screening</p>
                                                        <ul>
                                                            <li>+ Colonoscopy,</li>
                                                            <li>+ Sigmoidoscopy, or</li>
                                                            <li>+ Fecal Occult Blood Test</li>
                                                        </ul>
                                                        </td>
                                                        <td>Every 1, 5, or  10 Years<sup>1, 4</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Testicular Exam<sup>2</sup></td>
                                                        <td>Annually</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mammogram<sup>3</sup></td>
                                                        <td>Every 2 Years<sup>5</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pelvic Exam<sup>3</sup></td>
                                                        <td>Annually <sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>HPV & Pap Smear Cotest<sup>3</sup></td>
                                                        <td>Every 3 Years<sup>1</sup></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Preventative Care Recommendations for Ages 50-59
                                    </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body preventative-div table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Examination</th>
                                                        <th scope="col">Frequency</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Advanced Care Directives</td>
                                                        <td>Review Annually</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Risk Factors Assessment Score</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Annual Blood Work</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Electrocardiogram (ECG)</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mental Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Substance Abuse Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reproductive/Sexual Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Safety/Violence Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Healthy Lifestyle Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Immunization Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Vision Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Hearing Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Dental Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Skin Exam</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Blood Pressure Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <p>Colon Cancer Screening</p>
                                                            <ul>
                                                                <li>+ Colonoscopy,</li>
                                                                <li>+ Sigmoidoscopy, or</li>
                                                                <li>+ Fecal Occult Blood Test</li>
                                                            </ul>
                                                        </td>
                                                        <td>Every 1, 5, or  10 Years<sup>1, 4</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Testicular Exam<sup>2</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                        <p> Prostate Cancer Screening<sup>2</sup></p>
                                                        <ul>
                                                            <li>+ PSA Screening (Blood Test)</li>
                                                            <li>+ Digital Rectal Exam (DRE) </li>
                                                        </ul>
                                                        </td>
                                                        <td>Every 1, 2, or 4 Years<sup>4</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mammogram Exam<sup>3</sup></td>
                                                        <td>Every 2 Years<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pelvic Exam<sup>3</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pap Smear<sup>3</sup></td>
                                                        <td>Every 3 Years<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Bone Density Scan<sup>5</sup></td>
                                                        <td>Every 2 Years<sup>1</sup></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Preventative Care Recommendations for Ages 60+
                                    </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body preventative-div table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Examination</th>
                                                    <th scope="col">Frequency</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Advanced Care Directives</td>
                                                        <td>Review Annually</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Risk Factors Assessment Score</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Annual Blood Work</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Electrocardiogram (ECG)</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Mental Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Substance Abuse Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reproductive/Sexual Health Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Safety/Violence Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Healthy Lifestyle Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                        <p>Immunization Screening</p> 
                                                        <ul>
                                                            <li>+ Pneumococcal Vaccine</li>
                                                            <li>+ Shingles Vaccine</li>
                                                        </ul>
                                                        </td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Vision Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Hearing Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Dental Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Skin Exam</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Blood Pressure Screening</td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                        <p>Colon Cancer Screening</p> 
                                                        <ul>
                                                            <li>+ Colonoscopy,</li>
                                                            <li>+ Sigmoidoscopy, or</li>
                                                            <li>+ Fecal Occult Blood Test</li>
                                                        </ul>
                                                        </td>
                                                        <td>Every 1, 5, or  10 Years<sup>1, 4</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Testicular Exam<sup>2</sup></td>
                                                        <td>Annually<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                        <p>Prostate Cancer Screening<sup>2</sup></p> 
                                                        <ul>
                                                            <li>+ PSA Screening (Blood Test)</li>
                                                            <li>+ Digital Rectal Exam (DRE) </li>
                                                        </ul>
                                                        </td>
                                                        <td>Every 1, 2, or 4 Years<sup>4</sup></td>
                                                    </tr>


                                                    <tr>
                                                        <td>Mammogram<sup>3</sup></td>
                                                        <td>Every 2 Years<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pelvic Exam<sup>3</sup></td>
                                                        <td>Annually <sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Pap Smear<sup>3</sup></td>
                                                        <td>Every 3 Years<sup>1</sup></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Bone Density Scan<sup>5</sup></td>
                                                        <td>Every 2 Years<sup>1</sup></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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