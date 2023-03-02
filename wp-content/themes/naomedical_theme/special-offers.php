<?php
/**
 *Template Name: Special Offer
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
    <div class="specialoffer_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div id="primary2" class="content-area">
        <div class="special-offer-fluid">
            <div class="col-md-12">
                <div class="max-special-offer">

                    <div class="slick-offer">
                        <div class="item">
                            <div class="bg">
                                <div class="so so-pattern-one">
                                    <div class="offer-white-box pad-10">
                                        <div class="offer-dashed">
                                            <div class="so-logo">
                                                <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" class="img-fluid" width="100" height="15"></span> 
                                            </div>
                                            <div class="so-title-div">
                                                <h3>STD Package</h3> 
                                            </div>
                                            <div class="so-sale-div">
                                                <h1><span>Winter</span> <br> Sale</h1>
                                            </div>

                                            <div class="so-price-div">
                                                <h2>$20 Off</h2>
                                            </div>
                                            <div class="so-coupon-div">
                                               <div><span>Coupon Code: </span> <b id="coupon-code">BGJSU23SK</b> </div> 
                                               <div><p> <a href="#" onclick="copyToClipboard('#coupon-code')"><span class="cpy-txt-span">Click to Copy</span></a></p></div>
                                            </div>

                                            <div class="so-tc-div">
                                                <p><b>T&c applied*</b></p>
                                                <p>Valid for only one vaccine. Must have the coupon at the time of the visit. May not be combined with any other offers or insurance. <span>Exp. 06/30/2023</span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="bg">
                                <div class="so so-pattern-two">
                                    <div class="offer-white-box pad-10">
                                        <div class="offer-dashed">
                                            <div class="so-logo">
                                                <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" class="img-fluid" width="100" height="15"></span> 
                                            </div>
                                            <div class="so-title-div">
                                                <h3>CDL Exam</h3> 
                                            </div>
                                            <div class="so-sale-div">
                                                <h1><span>Winter</span> <br> Sale</h1>
                                            </div>

                                            <div class="so-price-div">
                                                <h2>$10 Off</h2>
                                            </div>
                                            <div class="so-coupon-div">
                                            <div><span>Coupon Code: </span> <b id="coupon-code">BGJSU23SK</b> </div> 
                                            <div><p> <a href="#" onclick="copyToClipboard('#coupon-code')"><span class="cpy-txt-span">Click to Copy</span></a></p></div>
                                            </div>

                                            <div class="so-tc-div">
                                                <p><b>T&c applied*</b></p>
                                                <p>Valid for only one vaccine. Must have the coupon at the time of the visit. May not be combined with any other offers or insurance. <span>Exp. 06/30/2023</span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="bg">
                                <div class="so so-pattern-three">
                                    <div class="offer-white-box pad-10">
                                        <div class="offer-dashed">
                                            <div class="so-logo">
                                                <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" class="img-fluid" width="100" height="15"></span> 
                                            </div>
                                            <div class="so-title-div">
                                                <h3>Back to School/Sports Physical</h3> 
                                            </div>
                                            <div class="so-sale-div">
                                                <h1><span>Winter</span> <br> Sale</h1>
                                            </div>

                                            <div class="so-price-div">
                                                <h2>$20 Off</h2>
                                            </div>
                                            <div class="so-coupon-div">
                                            <div><span>Coupon Code: </span> <b id="coupon-code">BGJSU23SK</b> </div> 
                                            <div><p> <a href="#" onclick="copyToClipboard('#coupon-code')"><span class="cpy-txt-span">Click to Copy</span></a></p></div>
                                            </div>

                                            <div class="so-tc-div">
                                                <p><b>T&c applied*</b></p>
                                                <p>Valid for only one vaccine. Must have the coupon at the time of the visit. May not be combined with any other offers or insurance. <span>Exp. 06/30/2023</span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="bg">
                                <div class="so so-pattern-four">
                                    <div class="offer-white-box pad-10">
                                        <div class="offer-dashed">
                                            <div class="so-logo">
                                                <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" class="img-fluid" width="100" height="15"></span> 
                                            </div>
                                            <div class="so-title-div">
                                                <h3>Urgent Care Visit</h3> 
                                            </div>
                                            <div class="so-sale-div">
                                                <h1><span>Winter</span> <br> Sale</h1>
                                            </div>

                                            <div class="so-price-div">
                                                <h2>$20 Off</h2>
                                            </div>
                                            <div class="so-coupon-div">
                                                <div><span>Coupon Code: </span> <b id="coupon-code">BGJSU23SK</b> </div> 
                                                <div><p> <a href="#" onclick="copyToClipboard('#coupon-code')"><span class="cpy-txt-span">Click to Copy</span></a></p></div>
                                            </div>

                                            <div class="so-tc-div">
                                                <p><b>T&c applied*</b></p>
                                                <p>Valid for only one vaccine. Must have the coupon at the time of the visit. May not be combined with any other offers or insurance. <span>Exp. 06/30/2023</span></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="bg">
                                <div class="so so-pattern-five">
                                    <div class="offer-white-box pad-10">
                                        <div class="offer-dashed">
                                            <div class="so-logo">
                                                <span><img src="<?php bloginfo('template_directory'); ?>/assets/images/naoMedicalLogo.svg" class="img-fluid" width="100" height="15"></span> 
                                            </div>
                                            <div class="so-title-div">
                                                <h3>Immigration Physical</h3> 
                                            </div>
                                            <div class="so-sale-div">
                                                <h1><span>Winter</span> <br> Sale</h1>
                                            </div>

                                            <div class="so-price-div">
                                                <h2>$10 Off</h2>
                                            </div>
                                            <div class="so-coupon-div">
                                                <div><span>Coupon Code: </span> <b id="coupon-code">BGJSU23SK</b> </div> 
                                                <div><p> <a href="#" onclick="copyToClipboard('#coupon-code')"><span class="cpy-txt-span">Click to Copy</span></a></p></div>
                                            </div>

                                            <div class="so-tc-div">
                                                <p><b>T&c applied*</b></p>
                                                <p>Valid for only one vaccine. Must have the coupon at the time of the visit. May not be combined with any other offers or insurance. <span>Exp. 06/30/2023</span></p>
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
    </div><!-- content-area -->
</main>
<?php
get_footer();
?>
<script>
      function copyToClipboard(element) {
        var $temp = jQuery("<input>");
        jQuery("body").append($temp);
        $temp.val(jQuery(element).text()).select();
        document.execCommand("copy");
        alert("Coupon Code is Copied!");
        $temp.remove();
    }
</script>

