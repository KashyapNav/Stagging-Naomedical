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
	<meta name="robots" content="noindex" />
	<meta name="p:domain_verify" content="e1343cc27ee525645da71a7cee8010e1"/>
	<link rel="apple-touch-icon" href="images/naoMedicalLogo.svg">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preload" fetchpriority="low" as="image" href="https://d303jutayzbpem.cloudfront.net/wp-content/uploads/2022/06/09140701/mother-and-child-homepage-1.webp" type="image/webp">
	<link rel="preload" fetchpriority="low" as="image" href="https://d1d6755cit84bm.cloudfront.net/wp-content/uploads/2022/06/16080840/couple-homepage1.webp" type="image/webp">
	<link rel="preload" fetchpriority="low" as="image" href="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i301!3i384!4i256!2m3!1e0!2sm!3i618350720!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy5lOmd8cC5jOiNmZmZmZmZmZixzLmU6bC50LmZ8cC5jOiNmZjQ2NDY0NixzLmU6bC50LnN8cC5jOiNmZmZmZmZmZixzLnQ6MXxzLmU6Zy5zfHAuYzojZmZjOWIyYTYscy50OjIxfHMuZTpnLnN8cC5jOiNmZmRjZDJiZSxzLnQ6MjF8cy5lOmwudC5mfHAuYzojZmZhZTllOTAscy50OjgyfHMuZTpnfHAuYzojZmZmY2ZjZmMscy50OjJ8cy5lOmd8cC5jOiNmZmZjZmNmYyxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZjkzODE3YyxzLnQ6NDB8cy5lOmcuZnxwLmM6I2ZmZmNmY2ZjLHMudDo0MHxzLmU6bC50LmZ8cC5jOiNmZjQ2NDY0NixzLnQ6NjV8cy5lOmd8cC5jOiNmZmM4ZDdkNCxzLnQ6NjV8cy5lOmwudC5mfHAuYzojZmY1YzYwNjQscy50OjY1fHMuZTpsLnQuc3xwLmM6I2ZmZWJlM2NkLHMudDo2NnxzLmU6Z3xwLmM6I2ZmYzhkN2Q0LHMudDo2fHMuZTpnLmZ8cC5jOiNmZmM4ZDdkNCxzLnQ6NnxzLmU6bC50LmZ8cC5jOiNmZjkyOTk4ZA!4e0!23i1379903&key=AIzaSyCqsI2FNOJD_penQGHkHRBzmdIE-yY7TDs&token=51958" type="image/webp">
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
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188399239-4"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-188399239-4');
		</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WQWRRHQ');</script>
	<!-- End Google Tag Manager -->



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
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQWRRHQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?php wp_body_open(); ?>
<!-- <div id="page" class="site"> -->
	<!-- <div class="landing-container">
		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<div class="max-landing-header">
					<div class="col-xl-12 col-md-12 col-lg-12 col-sm-12 col-12">
						<div class="row align-items-center">
							<div class="site-branding col-xl-6 col-md-6 col-lg-6 col-sm-7 col-6">
								 <img alt="naoMedicalLogo" src="<?php echo get_template_directory_uri(); ?>/assets/images/naoMedicalLogo.svg" width="269" height="42">
							</div>
					
							<div class="btnWrap makeappbtn col-xl-6 col-lg-6 col-md-5 col-sm-5  col-6 text-end">
								<a href="tel:(917) 310-3371" class="btn greyBtn"><span class="call-unline-ic"></span> (917) 310-3371</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div> -->