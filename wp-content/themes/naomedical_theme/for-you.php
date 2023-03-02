<?php
/**
 *Template Name: Foryou
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();

?>
<main id="primary" class="site-main" role="main"> 

    <div class="for_you_topsection">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>
   
    <div id="primary1" class="content-area">
        
       <!--customer-review-section-->
            <div class="os-review-section foryou_review_section">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <!-- <div class="max-os-review-new">
                                    <div class="col-md-12 col-sm-12 col-12 os-review-title os-review-new">
                                        <h3>Customer Reviews</h3>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12 os-review-new">
                                        <div class="ssb-review-list">
                                            <ul>
                                                <li class="ss-ratings">
                                                    <div id="fixture">
                                                        <span class="stars-container stars-5"></span>
                                                    </div>
                                                </li>
                                                <li class="os-reviewr-nm">June 22, 2022 10:30AM</li>
                                            </ul>
                                        </div>
                                        <div class="os-review-txt-height">
                                                <div class="os-review-toggle">
                                                    <p>I would like to thank a receptionist for being beyond kind and helpful. I came this Saturday morning, and she was the only one at the desk. Thank you so much for being a beautiful positive person. All the staff was also excellent. </p>
                                                </div>
                                                <p class="os-customer-nm"><span>Yasmina</span> , <span>New york</span></p>
                                            </div>
                                       
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12  os-review-new">
                                        <div class="ssb-review-list">
                                            <ul>
                                                <li class="ss-ratings">
                                                    <div id="fixture">
                                                        <span class="stars-container stars-5"></span>
                                                    </div>
                                                </li>
                                                <li class="os-reviewr-nm">June 22, 2022 12:30PM</li>
                                            </ul>
                                        </div>
                                        <div class="os-review-txt-height">
                                                <div class="os-review-toggle">
                                                    <p>The staff and the doctors were all very kind and caring. I was very worried about my child's health. I appreciate your clinic being open on Saturdays. This saved us a trip to the ER, which can be scary for a child. Thank you again!</p>
                                                </div>
                                                <p class="os-customer-nm"><span>Mitchell</span> , <span>New york</span></p>
                                            </div>
                                       
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12 os-review-new">
                                        <div class="ssb-review-list">
                                            <ul>
                                                <li class="ss-ratings">
                                                    <div id="fixture">
                                                        <span class="stars-container stars-5"></span>
                                                    </div>
                                                </li>
                                                <li class="os-reviewr-nm">June 21, 2022 05:30 PM</li>
                                            </ul>
                                        </div>
                                        <div class="os-review-txt-height">
                                            <div class="os-review-toggle">
                                                <p>Everything was great; the entire team was helpful, friendly, and professional </p>
                                            </div>
                                            <p class="os-customer-nm"><span>Kassy </span> , <span>New york</span></p>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12  os-review-new">
                                        <div class="ssb-review-list">
                                            <ul>
                                                <li class="ss-ratings">
                                                    <div id="fixture">
                                                        <span class="stars-container stars-5"></span>
                                                    </div>
                                                </li>
                                                <li class="os-reviewr-nm">June 20, 2022 09:15 PM</li>
                                            </ul>
                                        </div>
                                        <div class="os-review-txt-height">
                                                <div class="os-review-toggle">
                                                    <p>I'm impressed with the service from the nurse, physician & doctor, and the very lovely & friendly staff. </p>
                                                </div>
                                                <p class="os-customer-nm"><span>Fatimazahr</span> , <span>New york</span></p>
                                            </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12" style="text-align:center;padding: 0px 30px;">
                                        <div class="d-grid">
                                        <a href="<?php echo site_url('/reviews'); ?>">   <button class="btn btn-os-loadmr btn-block"> View all reviews</button> </a>
                                        </div>
                                    </div>
                                </div> -->
                                <?php echo do_shortcode('[recent_reviews limit="4" ratings="4,5"]');?>
                            </div><!--col-6-closed-->

                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="max-care-foryou">
                                    <div class="col-md-12 col-sm-12 col-12 foryou_care_bg">
                                        <div class="welcome_phone_div">
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/welcome_phone.png" class="img-fluid" alt="nao appointment">
                                        </div>

                                        <div>
                                            <h3>Get the care you need by booking an appointment now.</h3>
                                        </div>
                                        <div class="new-sb-button">
                                            <a class="wp-block-button__link appointment_modal" style="border-radius:6px" role="link" href="javascript:void(0)">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <!--customer-review-section-closed-->
    </div><!-- content-area -->
</main>

<script>
  // requires jquery
jQuery(document).ready(function() {
  (function() {
    var showChar = 200;
    var ellipsestext = "...";

    jQuery(".os-review-toggle").each(function() {
      var content = jQuery(this).html();
      if (content.length > showChar) {
        var c = content.substr(0, showChar);
        var h = content;
        var html =
          '<div class="os-review-toggle-text" style="display:block">' +
          c +
          '<span class="moreellipses">' +
          ellipsestext +
          '&nbsp;&nbsp;<a href="" class="moreless more">View More</a></span></span></div><div class="os-review-toggle-text" style="display:none">' +
          h +
          '<a href="" class="moreless less">View Less</a></span></div>';

          jQuery(this).html(html);
      }
    });

    jQuery(".moreless").click(function() {
      var thisEl = jQuery(this);
      var cT = thisEl.closest(".os-review-toggle-text");
      var tX = ".os-review-toggle-text";

      if (thisEl.hasClass("less")) {
        cT.prev(tX).toggle();
        cT.slideToggle();
      } else {
        cT.toggle();
        cT.next(tX).fadeToggle();
      }
      return false;
    });
    /* end iffe */
  })();

  /* end ready */
});

</script>

<?php
get_footer();
?>