<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package naomedical_theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1e3565">
	<meta name="facebook-domain-verification" content="h7j1odpici64r88v33wrsoo65rzdld" />
	<meta name="p:domain_verify" content="e1343cc27ee525645da71a7cee8010e1"/>
	<link rel="apple-touch-icon" href="images/naoMedicalLogo.svg">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1370694906705063');
	fbq('track', 'PageView');
	</script>
	<noscript>
	 <img height="1" width="1" alt="Facebook" src="https://www.facebook.com/tr?id=1370694906705063&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	<!--Google Optimize Code -->
		<script src="https://www.googleoptimize.com/optimize.js?id=OPT-WLCXLK5" defer></script>
		<script src="https://www.googleoptimize.com/optimize.js?id=OPT-M43SLQX" defer></script>
	<!--Google Optimize Code END -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script src="https://www.googletagmanager.com/gtag/js?id=G-0T4PK0SVMP" defer></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'G-0T4PK0SVMP');
	</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WQWRRHQ');</script>
	<!-- End Google Tag Manager -->
	<!--Ticktok script-->
		<script>
		!function (w, d, t) {
		w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
		ttq.load('CCLIBVBC77U1QCQHCHL0');
		ttq.page();
		}(window, document, 'ttq');
	</script>
	<!--Ticktok script END-->
	<!-- Schema script START -->
	<?php 
	$postTypes = array("services", "location", "page", "post","topservices");
	if(in_array(get_post_type(), $postTypes)){
		$location_schema_script     = !empty(get_post_meta( $post->ID, 'location-schema-script', true )) ? get_post_meta( $post->ID, 'location-schema-script', true ) : '';
		$schema_script     			= !empty(get_post_meta( $post->ID, 'schema-script', true )) ? get_post_meta( $post->ID, 'schema-script', true ) : '';
		$topservices_schema_script  = !empty(get_post_meta( $post->ID, 'topservices-schema-script', true )) ? get_post_meta( $post->ID, 'topservices-schema-script', true ) : '';
		?>
		<div class="d-none">
		<?php 
		if(!empty($location_schema_script)){
			echo $location_schema_script;
		} 
		if(!empty($schema_script)){
			echo $schema_script;
		} 		
		if(!empty($topservices_schema_script)){
			echo $topservices_schema_script;
		} 
		
		?>
		</div>
		<?php
	}
	?>
	<!--Schema script END-->
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe  src="https://www.googletagmanager.com/ns.html?id=GTM-WQWRRHQ" height="0" width="0" style="display:none;visibility:hidden" fetchpriority="low"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'naomedical_theme' ); ?></a>

		<div class="telemedicine-header" id="tele-medicine" style="display:none;">
			<div class="container">
				<div class="col-md-12 col-12 col-sm-12">
					<div class="row">
						<div class="col-md-12 col-12 col-sm-12">
							<p>Nao Medical After Hours service is currently available! <a href="javascript:void(0)" class="btn-telemedicine appointment_modal">Make an Appointment</a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row align-items-center">
				<div class="site-branding col-xl-2 col-md-4 col-lg-2 col-sm-6 col-5">
					<a href="/"> <img alt="naoMedicalLogo" src="<?php echo get_template_directory_uri(); ?>/assets/images/naoMedicalLogo.svg" width="269" height="42"> </a>
					<!-- <?php
					the_custom_logo(); ?> -->
					<!--<?php if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$naomedical_theme_description = get_bloginfo( 'description', 'display' );
					if ( $naomedical_theme_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $naomedical_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>-->
				</div><!-- .site-branding -->

				<div class="mainMenu col-xl-7 col-lg-4 col-md-4 col-sm-6 col-5">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Our Services', 'naomedical_theme' ); ?></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>

				<div class="btnWrap makeappbtn col-xl-3 col-lg-6 col-md-3 col-sm-4 col-2 text-center">
					<a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" class="menu-search-icon"><img src="<?php bloginfo('template_directory'); ?>/assets/images/search-menu.svg" alt="search" class="img-fluid" width="25" height="25"></a>
					<a href="javascript:void(0)" class="btn greyBtn appointment_modal">Book an Appointment</a>
					<a class="btn blueBtn menuToggle" href="javascript:void(0)">
						<span class="menuicon">
							<span class="empty"><i></i></span> 
						</span>
						<span class="menuitext">Menu</span>
						<span class="closetext">Close</span>
					</a>
					<div class="dropMenuWrap">
						<div class="row m-0">
							<div class="col-lg-4 col-md-12 col-sm-12 col-12 nao-Topmenu-left">
								<div class="col-md-12 col-lg-12 col-sm-12 col-12">
									<div class="humber-logo">
										<p><i class="icon-naomedical"></i></p>
									</div>
								</div>

								<div class="col-md-12 col-lg-12 col-sm-12 col-12 quick-ctc-menu">
									<div class="bookan-pp-box">
										<div class="">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pp-app.svg" alt="app">
										</div>
										<div>
											<h6>Our App</h6>
										</div>
										<div>
											<a href="javascript:void(0)" class="btn btn-pp-bnw appointment_modal">Book an Appointment </a>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-lg-12 col-sm-12 col-12 quick-ctc-menu">
									<div class="bookan-pp-box">
										<div class="">
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
								<div class="col-md-12 col-lg-12 col-sm-12 col-12 quick-ctc-menu">
									<div class="bookan-pp-box">
										<div class="">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pp-callus.svg" alt="call">
										</div>
										<div>
											<h6>Call Us</h6> 
										</div>
										<div>
											<a href="tel:(917) 310-3371" data-wpel-link="internal" tabindex="0" class="btn btn-pp-callus">(917) 310-3371 </a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-8 col-md-12 col-sm-12 col-12 nao-Topmenu nao-Topmenu-right">
								<div class="col-md-12 col-lg-12 col-sm-12 col-12 ">
									<div class="humber-menu-heading">
										<ul>
											<li><h3>menu</h3></li>
											<li class="mobile-humber-logo"><p><i class="icon-naomedical"></i></p></li>
											<li>
												<div class="menu-translate"><?php echo do_shortcode('[gtranslate]'); ?></div>
											</li>
										</ul>
									</div>
								</div>

								<div class="col-md-12 col-lg-12 col-sm-12 col-12 ">
									<?php dynamic_sidebar( 'top_left' ); ?>   
								</div>

								<div class="col-md-12 col-lg-12 col-sm-12 col-12 mobile-view-menu mobile-added-menu">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu-1',
										)
									);
									?>
								</div>

							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</header><!-- #masthead -->
