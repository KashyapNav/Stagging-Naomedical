<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 	*
 * @package naomedical_theme
 */
global $wpdb;
$query = 'SELECT * FROM '.$wpdb->prefix.'posts
        LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
        LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
        WHERE '.$wpdb->prefix.'posts.post_status = "publish" AND '.$wpdb->prefix.'posts.post_type = "location"
        GROUP BY '.$wpdb->prefix.'posts.ID ORDER BY '.$wpdb->prefix.'posts.post_title ASC;';
$results            = $wpdb->get_results($query);
?>
	<footer id="colophon" class="site-footer newFooterWrap" role="contentinfo">
		<div class="footerLocWrap">
			<div class="max-hmetl-visit px-3 px-md-5 px-lg-4 px-xl-0"> 
				<div class="fooLocTitle">
					<h2>Our Locations</h2>
				</div>
				<div class="row m-0">
					<div class="col-md-12 col-xl-8 col-sm-12  mb-4 mb-lg-0">
						<div class="fooLocListWrap">
							<div class="fooLocList row">
								<?php if(isset($results) && !empty($results)){
									foreach($results as $key => $postdata){
										
										$post_title	= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
										$location_address = !empty(get_post_meta( $postdata->ID, 'location_address', true )) ? get_post_meta( $postdata->ID, 'location_address', true ) : '';
									?>
										<div class="item col-6 col-sm-4 col-md-3 col-xl-3"> 
											<div location_id="<?php echo $postdata->ID; ?>" class="item_inner">
												<a href="<?php echo get_permalink( $postdata->ID ); ?>">
													<h3><?php echo $post_title; ?></h3>
													<p><?php echo $location_address; ?></p>
												</a>
											</div>
										</div>		
									<?php } ?>
								<?php } ?>
								</div>
							</div>						
						</div>
						<div class="col-md-12 col-xl-4 col-sm-12 footerBanner">
							<div class="row d-flex align-items-center">
								<div class="col-md-8 col-xl-8 col-sm-8 col-8 p-0">
									<h3>Virtual Care</h3>
									<p>Easily book a session with our online doctors to assist you with a wide range of non-life-threatening illnesses (including mental health conditions) from the comfort of your own home.</p>
									<a href="javascript:void(0)" class="text-btn withIcon appointment_modal">Book a Televisit</a>
								</div>
								<div class="col-md-4 col-xl-4 col-sm-4 col-4 p-0 fooMobileImg">
									<div class="">
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/footer_mobile.png">
									</div>
								</div>
							</div>
							<div class="row d-flex align-items-center">
								<div class="col-md-8 col-xl-8 col-sm-8 col-8 p-0">
									<h3>Home Visit</h3>
									<p>Let the medical experts come to you! Get home visits for COVID PCR & rapid tests, annual physicals, and blood tests with Nao Medical's home visit service.</p>
									<a href="javascript:void(0)" class="text-btn withIcon appointment_modal">Book a Home Visit</a>
								</div>
								<div class="col-md-4 col-xl-4 col-sm-4 col-4 p-0 fooCarImg">
									<div class="">
										<img src="<?php bloginfo('template_directory'); ?>/assets/images/footer_car.png">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footerBottomWrap">
					<div class="container">
						<div class="max-hmetl-visit">
							<div class="row align-items-center">
								<div class="footerLinkWrap col-md-12 col-xl-7 col-sm-12 pr-5 order-2 order-md-0">
									<div class="footer_logo mb-3 p-0 pb-5"><a href="https://apps.apple.com/us/app/nao-medical/id1666444737"><img align="right" src="https://d1d6755cit84bm.cloudfront.net/wp-content/uploads/2023/02/28151514/Playstore.png" width="150px" ></a>
										<?php dynamic_sidebar( 'footer_logo' ); ?>   
									</div>
									<div class="row ">
										<div class="col-md-5 col-xl-5 col-sm-12 footerLinks order-2 order-md-0">
											<h3>Site Navigation</h3>
											<?php dynamic_sidebar( 'footer_about' ); ?>   
										</div>
										<div class="col-md-7 col-xl-7 col-sm-12 footerLinks order-1 order-md-0 ">
											<h3>Our Services</h3>
											<?php dynamic_sidebar( 'footer_other' ); ?> 
										</div>
										
									</div>
								</div>
								<div class="col-md-12 col-xl-5 col-sm-12 footerSubscribe pl-5 mb-5 mb-md-0 order-2 order-md-0">
									<div class="footer_logo text-center mb-4">
										<?php dynamic_sidebar( 'footer_logo' ); ?> <br>
										<a href="https://apps.apple.com/us/app/nao-medical/id1666444737"><img align="middle" src="https://d1d6755cit84bm.cloudfront.net/wp-content/uploads/2023/02/28151514/Playstore.png" width="120px"></a>      
									</div>
									<div class="subscribe_inner">
										<div class="subscribeForm">
											<h3><span style="text-transform: none !important;">Blogs and article</span>Get personalized health and wellness ariticles </h3>
											<!-- Begin Mailchimp Signup Form -->
											<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7_dtp.css" rel="stylesheet" type="text/css">
											<style type="text/css">
												#mc_embed_signup{background-color:transparent; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
												/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
												We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
											</style>
											<div id="mc_embed_signup">
												<form action="https://naomedical.us20.list-manage.com/subscribe/post?u=bc8992c20d728b618261eb521&amp;id=39e60ddcec" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
													<div id="mc_embed_signup_scroll">
													<label for ="mce-EMAIL" style="position: absolute;top: -20px;z-index: -1;">Email Address </label>
														<input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="Email Address" required> 
														<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups -->
														<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" />
													</div>
												</form>
											</div>
										</div>
										<!-- End mc_embed_signup -->
										<div class="soicalLinks">
											<span>Stay Connected</span>
											<?php dynamic_sidebar( 'footer_subscribe' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->


	<!-- <footer id="colophon" class="site-footer" role="contentinfo">
		<div class="location-footer">
			<div class="container">
				<div class="col-md-12 col-xl-12 col-sm-12">
					<div class="ftr-location-title">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xl-6">
								<div>
									<h2>Our Locations</h2>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xl-6">
								<div class="max-lcnt">
									<a href="tel:(917) 310-3371" data-wpel-link="internal" class="cnt-btn-ph"> <span class="call-line-ic-ctc"></span> (917) 310-3371</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xl-12 col-sm-12">
					<div class="ftr-location-list">
						<ul class="desktopView_location">
							<?php 
								if(isset($results) && !empty($results)){
								foreach($results as $key => $postdata){
									
									$post_title 			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
									$location_address 		= !empty(get_post_meta( $postdata->ID, 'location_address', true )) ? get_post_meta( $postdata->ID, 'location_address', true ) : '';
								?>
							<li>
									<div location_id="<?php echo $postdata->ID; ?>">
										<a href="<?php echo get_permalink( $postdata->ID ); ?>">
											<h3><?php echo $post_title; ?></h3>
											<p><?php echo $location_address; ?></p>
										</a>
									</div>
									<?php } ?>
								<?php } ?>
							</li>
						</ul>						
						<div class="mobileView_location">
							<div class="accordion" id="accordionExample">
								<?php 
									if(isset($results) && !empty($results)){
									foreach($results as $key => $postdata){
										
										$post_title 			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
										$location_address 		= !empty(get_post_meta( $postdata->ID, 'location_address', true )) ? get_post_meta( $postdata->ID, 'location_address', true ) : '';
									?>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-<?php echo $postdata->ID; ?>">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $postdata->ID; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $postdata->ID; ?>">
													<?php echo $post_title; ?>
												</button>
											</h2>
											<div id="collapse-<?php echo $postdata->ID; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $postdata->ID; ?>" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<p><?php echo $location_address; ?></p>
													<a class="view_more_link" href="<?php echo get_permalink( $postdata->ID ); ?>">View  More</a>
												</div>
											</div>	
										</div>	
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xl-12 col-sm-12">
					<div class="max-hmetl-visit">
						<div class="row ">
							<div class="col-md-6 col-xl-6 col-sm-12">
								<div class="col-md-12 col-xl-12 col-sm-12 tele-home-div">
									<div class="row d-flex align-items-center">
										<div class="col-md-12 col-xl-7 col-sm-12 col-12">
											<h3>Virtual Care</h3>
											<p>Easily book a session with our online doctors to assist you with a wide range of non-life-threatening illnesses (including mental health conditions) from the comfort of your own home.</p>
										</div>
										<div class="col-md-12 col-xl-5 col-sm-12  col-12">
											<div class="">
												<a href="javascript:void(0)" class="btn btn-telhme appointment_modal">Make an Appointment</a>
											</div>
										</div>
											
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xl-6 col-sm-12">
								<div class="col-md-12 col-xl-12 col-sm-12 tele-home-div">
									<div class="row d-flex align-items-center">
										<div class="col-md-12 col-xl-7 col-sm-12  col-12">
											<h3>Home Visit</h3>
											<p>Let the medical experts come to you! Get home visits for COVID PCR & rapid tests, annual physicals, and blood tests with Nao Medical's home visit service.</p>
										</div>
										<div class="col-md-12 col-xl-5 col-sm-12  col-12">
											<div class="">
												<a href="javascript:void(0)" class="btn btn-telhme appointment_modal">Make an Appointment</a>
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
		<div class="footer_top">
			<div class="container">
				<div class="footer_logo mb-md-5 mx-1 px-2 pb-3">
					<?php dynamic_sidebar( 'footer_logo' ); ?>   
				</div>
				<div class="row m-lg-0 align-items-stretch">
					<div class="col-lg-3 col-md-6 col-sm-12 col-12 footerSec one">
						<?php dynamic_sidebar( 'footer_about' ); ?>   
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12 col-12 footerSec two"> 
							<?php dynamic_sidebar( 'footer_other' ); ?>
					</div>
					<div class="col-lg-5 col-md-12 col-sm-12 col-12 footerSec subscribe">
						<div class="subscribe_inner">
							<h3>Subscribe to our newsletter</h3>
							Begin Mailchimp Signup Form
							<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7_dtp.css" rel="stylesheet" type="text/css">
							<style type="text/css">
								#mc_embed_signup{background-color:transparent; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
								/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
								We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
							</style>
							<div id="mc_embed_signup">
							<form action="https://naomedical.us20.list-manage.com/subscribe/post?u=bc8992c20d728b618261eb521&amp;id=39e60ddcec" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div id="mc_embed_signup_scroll" class="input-group">
								   <label for ="mce-EMAIL" style="position: absolute;top: -20px;z-index: -1;">Email Address </label>
									<input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="Email Address" required> 
									real people should not fill this in and expect good things - do not remove this or risk form bot signups
									<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" />
								</div>
							</form>
							</div>
							End mc_embed_signup
							<div class="soicalLinks">
								<span>Stay Connected</span>
								<?php dynamic_sidebar( 'footer_subscribe' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>.container
		</div>
		<div class="copyright p-3"></div>
	</footer>#colophon -->
	
</div><!-- #page -->

    <!--bookan-appointment-popup-->
    <div class="bap-popup">
            <!-- Modal -->
            <div class="modal fade" id="bookanapp" tabindex="-1" aria-labelledby="bookanappModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookanappModalLabel">Book your appointment via</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="row">

                                    <div class="col-md-4 col-sm-12 col-12">
                                        <div class="bookan-pp-box">
                                            <div class=""><lable class="rec-lbl-pp">Recommended</label></div>

                                            <div class="">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pp-app.svg" alt="app">
                                            </div>
                                            <div>
                                                <h6>App</h6>
                                            </div>
                                            <div>
                                                <a href="https://naomedical.io/patient/preSelection/appointment-type" class="btn btn-pp-bnw" id="appointment_url"> Book Now </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <div class="bookan-pp-box">
                                            <div class=""  style="padding-top: 65px;">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pp-ourcon.svg" alt="concierge">
                                            </div>
                                            <div>
                                                <h6>Our Concierge</h6>
                                            </div>
                                            <div>
												<?php echo do_shortcode('[contact-form-7 id="3200" title="Our Concierge"]'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <div class="bookan-pp-box">
                                            <div class="" style="padding-top: 65px;">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pp-callus.svg" alt="call">
                                            </div>
                                            <div>
                                                <h6>Call Us</h6> 
                                            </div>
                                            <div>
                                                <a href="tel:(917) 310-3371" data-wpel-link="internal" tabindex="0" class="btn btn-pp-bnw"><span class="call-line-pp"></span> (917) 310-3371 </a>
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
    <!--bookan-appointment-popup-closed-->
    <!--onsite-bulk-popup-->
    <div class="onsite-bulk-popup">
		<!-- Modal -->
		<div class="modal fade" id="onsite_bluk_popup" tabindex="-1" aria-labelledby="onsite-bulkpopup-ModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-12 col-sm-12 col-12">
							<div class="onsite-form-div">
                                <div class="onsite-form-max">
                                    <div class="">
                                        <h4>On-Site (Bulk) Testing Inquiries</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?php echo do_shortcode('[contact-form-7 id="5992" title="On-Site (Bulk) Testing Inquiries"]'); ?>
                                    <div class="form-group" style="text-align:center;">
                                     <img src="<?php bloginfo('template_directory'); ?>/assets/images/hippa.svg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!--on-site-bulk-popup-closed-->

		<!--occ-health-popup-popup-->
		<div class="occ-health-popup">
		<!-- Modal -->
		<div class="modal fade" id="occ_health_popup" tabindex="-1" aria-labelledby="occ_healthpopup-ModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-12 col-sm-12 col-12">
							<div class="onsite-form-div">
                                <div class="onsite-form-max">
                                    <div class="">
                                        <h4>Email</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?php echo do_shortcode('[contact-form-7 id="6771" title="Corporate Health Inquiries"]'); ?>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!--occ-health-popup-closed-->

<script fetchpriority="low" type="module" id="podium-widget" data-api-token="a208de57-1625-47d1-8379-913251062de9" src="https://connect.podium.com/widget.js#API_TOKEN=a208de57-1625-47d1-8379-913251062de9" defer></script>
<?php wp_footer(); ?>
</body>
</html>
