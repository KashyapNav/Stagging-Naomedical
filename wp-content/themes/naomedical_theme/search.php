<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package naomedical_theme
 */

get_header();

$term = $_REQUEST['s'];
$post_type = $_REQUEST['post_type'];
$service_posts = $location_posts = $blog_posts = $meta_query = [];
$service_flag = $location_flag = $blog_flag = $all_flag = false; 
$is_not_found = true; 
global $wpdb;
if($post_type == 'services'){
	
	//TOP SERVICES
	$top_service_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='topservices' AND $wpdb->posts.post_status = 'publish' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$top_service_title_ids = wp_list_pluck( $top_service_posts, 'ID' );
	// pre($top_service_title_ids);
	$top_service_title_length = (count($top_service_title_ids) >=10)?10:count($top_service_title_ids);
	$top_service_posts_title = [];
	if($top_service_title_length > 0){
		$top_service_posts_title = get_posts(array(
			'post_type' => ['topservices'],
			'post__in' => $top_service_title_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $top_service_title_length
		));
	}

	//SERVICES
	$service_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='$post_type' AND $wpdb->posts.post_status = 'publish' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$service_title_ids = wp_list_pluck( $service_posts, 'ID' );
	// pre($service_title_ids);
	$service_title_length = (count($service_title_ids) >=10)?10:count($service_title_ids);
	$service_posts_title = [];
	if($service_title_length > 0){
		$service_posts_title = get_posts(array(
			'post_type' => ['services'],
			'post__in' => $service_title_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $service_title_length
		));
	}

	if(count($top_service_posts_title)> 0){
		$service_posts_title = array_merge($top_service_posts_title,$service_posts_title);
	}
	// echo 'service_title_ids';
	// pre($service_title_ids);
	// pre($top_service_posts_title);
	// pre($service_posts_title);


	if(count($service_posts_title) < 10){
		$service_q1 = get_posts(array(
			'fields' => 'ids',
			'post_type' => ['services'],
			's' => $term,
			'posts_per_page'=> 10,
			'post_status' => 'publish',		
		));
	
		
		$service_q2 = get_posts(array(
				'fields' => 'ids',
				'post_type' => ['services'],
				'posts_per_page'=> 10,
				'post_status' => 'publish',		
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => '_price',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => '_oldprice',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => '_insuranceprice',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'service-benefits',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'service-description',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'short-description',
						'value' => $term,
						'compare' => 'LIKE'
					),
				)
		));
		// $service_q2 = [];
		// echo 'service_q1';
		// pre($service_q1);
		$service_unique = array_unique( array_merge( $service_q1, $service_q2 ) );
		// echo 'service_unique';
		// pre($service_unique);
		// $clean1 = array_diff($service_title_ids, $service_unique); 
		$final_output = array_diff($service_unique, $service_title_ids); 
		// $final_output = array_merge($clean1, $clean2);
		// echo 'final_output';
		// pre($final_output);
		$balance_length = 10 - $service_title_length;
		if(count($final_output) >= $balance_length){
			$limit = $balance_length;
		}else{
			$limit = count($final_output);
		}
		$service_posts = [];
		if(!empty($final_output)){
			$service_posts = get_posts(array(
				'post_type' => ['services'],
				'post__in' => $final_output,
				'post_status' => 'publish',
				'posts_per_page'=> $limit
			));
		}
		$service_posts = array_merge($service_posts_title,$service_posts);
		if(count($service_posts) >0){
			$is_not_found = false;
		}
		
	}else{
		$service_posts = $service_posts_title;
		$is_not_found = false;
	}
	$service_flag = true;
}elseif($post_type == 'location'){
	
	// $table = $wpdb->prefix.''
	$location_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='$post_type' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$title_posts_ids = wp_list_pluck( $location_posts, 'ID' );
	// pre($title_posts_ids);
	$title_post_length = (count($title_posts_ids) >=12)?12:count($title_posts_ids);
	$post_by_titles = [];
	if($title_post_length > 0){
		$post_by_titles = get_posts(array(
			'post_type' => $post_type,
			'post__in' => $title_posts_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $title_post_length
		));
	}
	// echo 'title_posts_ids';
	// pre($title_posts_ids);
	// pre($post_by_titles);

	if($title_post_length < 12){
		$location_q1 = get_posts(array(
			'fields' => 'ids',
			'post_type' => $post_type,
			's' => $term,
			'posts_per_page'=> 12,
			'post_status' => 'publish',		
		));
		$location_q2 = get_posts(array(
				'fields' => 'ids',
				'post_type' => $post_type,
				'posts_per_page'=> 12,
				'post_status' => 'publish',					
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'location_search_name',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'location_address',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'location_phone',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'appointment_link',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'insurance_info',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'location_help',
						'value' => $term,
						'compare' => 'LIKE'
					),
				)
		));
		// Location Taxonomy search
		$location_query = new WP_Query( array(
			'fields' => 'ids',
			'post_type' => 'location',
			'post_status' => 'publish',
			'posts_per_page'=> 12,
			'tax_query' => array(
				array(
					'taxonomy' => 'available_services',
					'field' => 'name',
					'compare' => 'LIKE',
					'terms' => $term
				)
			)));
		$location_q3 = [];
		if($location_query->posts){
			$location_q3 = $location_query->posts;
		}
		
		// pre($location_query->query);
		$location_unique = array_unique( array_merge( $location_q1, $location_q2, $location_q3 ) );
		// echo 'location_unique';
		// pre($location_unique);
		$final_output = array_diff($location_unique, $title_posts_ids); 
		// echo 'final_output';
		// pre($final_output);	
		$balance_length = 12 - $title_post_length;
		if(count($final_output) >= $balance_length){
			$limit = $balance_length;
		}else{
			$limit = count($final_output);
		}
		$location_posts = [];
		if(!empty($final_output)){
			$location_posts = get_posts(array(
				'post_type' => $post_type,
				'post__in' => $final_output,
				'post_status' => 'publish',
				'posts_per_page'=> $limit
			));		
			$is_not_found = false;
			// pre($location_query->query);
		}
		$location_posts = array_merge($post_by_titles,$location_posts);
		if(count($location_posts) >0){
			$is_not_found = false;
		}
	}else{
		$location_posts = $post_by_titles;
		$is_not_found = false;
	}	
	$location_flag = true;
}elseif($post_type == 'post'){

	// $table = $wpdb->prefix.''
	$blog_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='$post_type' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$title_posts_ids = wp_list_pluck( $blog_posts, 'ID' );
	// pre($title_posts_ids);
	$title_post_length = (count($title_posts_ids) >=9)?9:count($title_posts_ids);
	$post_by_titles = [];
	if($title_post_length > 0){
		$post_by_titles = get_posts(array(
			'post_type' => $post_type,
			'post__in' => $title_posts_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $title_post_length
		));
	}
	
	// echo 'title_posts_ids';
	// pre($title_posts_ids);
	// pre($post_by_titles);
	// pre($title_post_length);

	if($title_post_length < 9){
	
		$post_ids = get_posts(array(
			'post_type' => 'post',
			'fields' => 'ids',
			's' => $term,
			'post_status' => 'publish',		
			'posts_per_page'=> 9
		));
		// echo 'post_ids';
		// pre($post_ids);
		$final_output = array_diff($post_ids, $title_posts_ids); 
		// echo 'final_output';
		// pre($final_output);	
		$balance_length = 9 - $title_post_length;
		if(count($final_output) >= $balance_length){
			$limit = $balance_length;
		}else{
			$limit = count($final_output);
		}
		$blog_posts = [];
		if(!empty($final_output)){
			$blog_posts = get_posts(array(
				'post_type' => $post_type,
				'post__in' => $final_output,
				'post_status' => 'publish',
				'posts_per_page'=> $limit
			));				
		}
		$blog_posts = array_merge($post_by_titles,$blog_posts);
		if(count($blog_posts) >0){
			$is_not_found = false;
		}
		
	}else{
		$blog_posts = $post_by_titles;
		$is_not_found = false;
	}
	$blog_flag = true;
}else{
	// SEARCH QUERY FOR TOP SERVICE CPT 
	$top_service_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='topservices' AND $wpdb->posts.post_status = 'publish' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$top_service_title_ids = wp_list_pluck( $top_service_posts, 'ID' );
	// pre($top_service_title_ids);
	$top_service_title_length = (count($top_service_title_ids) >=10)?10:count($top_service_title_ids);
	$top_service_posts_title = [];
	if($top_service_title_length > 0){
		$top_service_posts_title = get_posts(array(
			'post_type' => ['topservices'],
			'post__in' => $top_service_title_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $top_service_title_length
		));
	}


	// SEARCH QUERY FOR SERVICE CPT 
	$service_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='services' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$service_title_ids = wp_list_pluck( $service_posts, 'ID' );
	// pre($service_title_ids);
	$service_title_length = (count($service_title_ids) >=10)?10:count($service_title_ids);
	$service_posts_title = [];
	if($service_title_length > 0){
		$service_posts_title = get_posts(array(
			'post_type' => 'services',
			'post__in' => $service_title_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $service_title_length
		));
	}

	if(count($top_service_posts_title)> 0){
		$service_posts_title = array_merge($top_service_posts_title,$service_posts_title);
	}

	// echo 'service_title_ids';
	// pre($service_title_ids);
	// pre($service_posts_title);


	if(count($service_posts_title) < 10){
		$service_q1 = get_posts(array(
			'fields' => 'ids',
			'post_type' => 'services',
			's' => $term,
			'posts_per_page'=> 10,
			'post_status' => 'publish',		
		));
	
		
		$service_q2 = get_posts(array(
				'fields' => 'ids',
				'post_type' => 'services',
				'posts_per_page'=> 10,
				'post_status' => 'publish',		
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => '_price',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => '_oldprice',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => '_insuranceprice',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'service-benefits',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'service-description',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'short-description',
						'value' => $term,
						'compare' => 'LIKE'
					),
				)
		));
		// $service_q2 = [];
		// echo 'service_q1';
		// pre($service_q1);
		$service_unique = array_unique( array_merge( $service_q1, $service_q2 ) );
		// echo 'service_unique';
		// pre($service_unique);
		// $clean1 = array_diff($service_title_ids, $service_unique); 
		$final_output = array_diff($service_unique, $service_title_ids); 
		// $final_output = array_merge($clean1, $clean2);
		// echo 'final_output';
		// pre($final_output);
		$balance_length = 10 - $service_title_length;
		if(count($final_output) >= $balance_length){
			$limit = $balance_length;
		}else{
			$limit = count($final_output);
		}
		$service_posts = [];
		if(!empty($final_output)){
			$service_posts = get_posts(array(
				'post_type' => 'services',
				'post__in' => $final_output,
				'post_status' => 'publish',
				'posts_per_page'=> $limit
			));
		}
		$service_posts = array_merge($service_posts_title,$service_posts);
		if(count($service_posts) >0){
			$is_not_found = false;
		}
		
	}else{
		$service_posts = $service_posts_title;
		$is_not_found = false;
	}

	// SEARCH QUERY FOR LOCATION CPT 
	$location_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='location' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$location_title_posts_ids = wp_list_pluck( $location_posts, 'ID' );
	// pre($location_title_posts_ids);
	$location_post_title_length = (count($location_title_posts_ids) >=12)?12:count($location_title_posts_ids);
	$location_post_by_titles = [];
	if($location_post_title_length > 0){
		$location_post_by_titles = get_posts(array(
			'post_type' => 'location',
			'post__in' => $location_title_posts_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $location_post_title_length
		));
	}
	// echo 'location_title_posts_ids';
	// pre($location_title_posts_ids);
	// pre($location_post_by_titles);

	if($location_post_title_length < 12){
		$location_q1 = get_posts(array(
			'fields' => 'ids',
			'post_type' => 'location',
			's' => $term,
			'posts_per_page'=> 12,
			'post_status' => 'publish',		
		));
		$location_q2 = get_posts(array(
				'fields' => 'ids',
				'post_type' => 'location',
				'posts_per_page'=> 12,
				'post_status' => 'publish',					
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'location_search_name',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'location_address',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'location_phone',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'appointment_link',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'insurance_info',
						'value' => $term,
						'compare' => 'LIKE'
					),
					array(
						'key' => 'location_help',
						'value' => $term,
						'compare' => 'LIKE'
					),
				)
		));
		// Location Taxonomy search
		$location_query = new WP_Query( array(
			'fields' => 'ids',
			'post_type' => 'location',
			'post_status' => 'publish',
			'posts_per_page'=> 12,
			'tax_query' => array(
				array(
					'taxonomy' => 'available_services',
					'field' => 'name',
					'compare' => 'LIKE',
					'terms' => $term
				)
			)));
		$location_q3 = [];
		if($location_query->posts){
			$location_q3 = $location_query->posts;
		}
		
		// pre($location_query->query);
		$location_unique = array_unique( array_merge( $location_q1, $location_q2, $location_q3 ) );
		// echo 'location_unique';
		// pre($location_unique);
		$final_output = array_diff($location_unique, $location_title_posts_ids); 
		// echo 'final_output';
		// pre($final_output);	
		$balance_length = 12 - $location_post_title_length;
		if(count($final_output) >= $balance_length){
			$limit = $balance_length;
		}else{
			$limit = count($final_output);
		}
		$location_posts = [];
		if(!empty($final_output)){
			$location_posts = get_posts(array(
				'post_type' => 'location',
				'post__in' => $final_output,
				'post_status' => 'publish',
				'posts_per_page'=> $limit
			));		
			$is_not_found = false;
			// pre($location_query->query);
		}
		$location_posts = array_merge($location_post_by_titles,$location_posts);
		if(count($location_posts) >0){
			$is_not_found = false;
		}
	}else{
		$location_posts = $location_post_by_titles;
		$is_not_found = false;
	}

	// SEARCH QUERY FOR BLOG CPT 
	$blog_posts = $wpdb->get_results( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type='post' AND post_title LIKE '%s'", '%'. $wpdb->esc_like( $term ) .'%' ) );
	// var_dump($wpdb->last_query);
	$title_posts_ids = wp_list_pluck( $blog_posts, 'ID' );
	// pre($title_posts_ids);
	$title_post_length = (count($title_posts_ids) >=9)?9:count($title_posts_ids);
	$post_by_titles = [];
	if($title_post_length > 0){
		$post_by_titles = get_posts(array(
			'post_type' => 'post',
			'post__in' => $title_posts_ids,
			'post_status' => 'publish',
			'posts_per_page'=> $title_post_length
		));
	}
	
	// echo 'title_posts_ids';
	// pre($title_posts_ids);
	// pre($post_by_titles);
	// pre($title_post_length);

	if($title_post_length < 9){
	
		$post_ids = get_posts(array(
			'post_type' => 'post',
			'fields' => 'ids',
			's' => $term,
			'post_status' => 'publish',		
			'posts_per_page'=> 9
		));
		// echo 'post_ids';
		// pre($post_ids);
		$final_output = array_diff($post_ids, $title_posts_ids); 
		// echo 'final_output';
		// pre($final_output);	
		$balance_length = 9 - $title_post_length;
		if(count($final_output) >= $balance_length){
			$limit = $balance_length;
		}else{
			$limit = count($final_output);
		}
		$blog_posts = [];
		if(!empty($final_output)){
			$blog_posts = get_posts(array(
				'post_type' => 'post',
				'post__in' => $final_output,
				'post_status' => 'publish',
				'posts_per_page'=> $limit
			));				
		}
		$blog_posts = array_merge($post_by_titles,$blog_posts);
		if(count($blog_posts) >0){
			$is_not_found = false;
		}
		
	}else{
		$blog_posts = $post_by_titles;
		$is_not_found = false;
	}
	$all_flag = true;
}

// echo '<br>service_posts->';
// if(!empty($service_posts)){
// 	echo count($service_posts).'<br>';
// 	pre($service_posts);
// }

// echo '<br>location_posts->';
// if(!empty($location_posts)){
// 	echo count($location_posts).'<br>';
// 	pre($location_posts);
// }

// echo '<br>blog_posts->';
// if(!empty($blog_posts)){
// 	echo count($blog_posts).'<br>';
// 	pre($blog_posts);
// }


?>
	<main id="primary" class="site-main" role="main">
		<div class="search_page">
			<div class="container">
				<div class="search_page_head">
					<!-- <img src="<?php bloginfo('template_directory'); ?>/assets/images/searchpage_bg.jpg" alt="search">-->
					<h1>How can we help you today?</h1>
					<form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
						<div class="input-group">
							<input type="text" name="s" class="form-control" placeholder="Type here..." aria-label="Search" autofocus value="<?php the_search_query();?>">
							<select class="form-control search-dropdown js-states" id="inputGroupSelect01" name="post_type">
								<option value="">Category</option>
								<option value="services" <?php echo ($post_type == 'services')?'selected':''; ?>>Services</option>
								<option value="location" <?php echo ($post_type == 'location')?'selected':''; ?>>Locations</option>
								<option value="post" <?php echo ($post_type == 'post')?'selected':''; ?>>Blog</option>
							</select>
							<button class="btn btn-outline-secondary" type="submit">Search</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="main-blog-list search-page-container">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'naomedical_theme' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<!--SEARCH RESULT FOR SERVICE -->
				<?php if(!empty($service_posts)) { ?>
					<h2 class="search-result-title">Services</h2>
				<?php
					foreach ($service_posts as $key => $service) { 
						// pre($service);
						$toprated_discription		= !empty(get_post_meta( $service->ID, 'toprated_discription', true )) ? get_post_meta( $service->ID, 'toprated_discription', true ) : '';
						
						$price			= !empty(get_post_meta( $service->ID, '_price', true )) ? '$  '.get_post_meta( $service->ID, '_price', true ) : 'Free';
						
						$short_description			= !empty(get_post_meta( $service->ID, 'short-description', true )) ? get_post_meta( $service->ID, 'short-description', true ) : '';
						
						$appointment_url			= !empty(get_post_meta( $service->ID, 'appointment_link', true )) ? get_post_meta( $service->ID, 'appointment_link', true ) : '';
						?>
						<div class="col-12 col-sm-12 col-md-12">
							<div class="search-services-block">
								<div class="col-md-12 col-12 col-sm-12 ssr-div">
									<div class="row align-items-center">
											<div class=" <?php echo ($service->post_type == 'services')?'col-md-3':'col-md-6'; ?> col-sm-12 col-12">
												<div class="">
													<a href="<?php echo get_permalink($service->ID); ?>"><h3><?php echo  get_the_title($service->ID); ?></h3></a>
													<a href="<?php echo get_permalink($service->ID); ?>"><?php echo $short_description; ?></a>
												</div>
											</div>
											<?php if($service->post_type == 'services') { ?>
											<div class="col-md-3 col-sm-12 col-12">
												<div class="">
													<a href="<?php echo get_permalink($service->ID); ?>"><h3><?php echo $price ?></h3></a>
													<a href="<?php echo get_permalink($service->ID); ?>"><p><i>Price without insurance applied*</i></p></a>
												</div>
											</div>
											<?php } ?>
										<div class="col-md-6 col-sm-12 col-12">
											<div class="sr-ctc">
												<a href="javascript:void(0)" class="btn btn-bookan appointment_modal" data-appointment_url="<?php echo $appointment_url; ?>" >Book an Appointment</a>
												<a href="<?php echo get_permalink($service->ID); ?>" class="btn btn-learnmr">Learn More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
				<?php } 
					if($all_flag){ ?>
					<div class="col-md-12 col-sm-12 col-lg-12">
						<hr style="margin-top: 35px;opacity:.12;">
					</div>
					<?php } ?>
				<?php
				} ?>
					
				

				<!--SEARCH RESULT FOR LOCATION -->
				<?php if(!empty($location_posts)){ ?>
					<!--Locations-->
					<h2 class="search-result-title">Locations</h2>
					<div class="ftr-location-list search-location-list">
						<ul>
							<?php
								if(isset($location_posts) && !empty($location_posts)){
								foreach($location_posts as $key => $postdata){
									
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
					</div>
					<?php if($all_flag){ ?>
					<div class="col-md-12 col-sm-12 col-lg-12">
						<hr style="margin-top: 35px;opacity:.12;">
					</div>
					<?php } ?>
				<?php } ?>

				

				<!--SEARCH RESULT FOR BLOG -->
				<?php if(!empty($blog_posts)){ ?>
					<h2 class="search-result-title">Blogs</h2>
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 main-blog-list">
						<div class="row">
							<?php foreach($blog_posts as $blog){ ?>
							<div class="col-12 col-sm-12 col-md-6 col-lg-4 most-blog-pad">
								<div id="post-<?php echo $blog->ID; ?>" class="blog-mst-group">
									<div class="blog-image">
										<a href="<?php echo get_permalink($blog->ID); ?>">
											<?php if ( get_the_post_thumbnail($blog->ID) ) {
												echo get_the_post_thumbnail($blog->ID);
												} else { ?>
												<img src="<?php bloginfo('template_directory'); ?>/assets/images/placeholder.png" alt="<?php echo get_the_title($blog->ID); ?>" />
											<?php } ?>
										</a>	
									</div>

									<div class="blog-title">
										<h2><a href="<?php echo get_permalink($blog->ID); ?>"><?php echo  get_the_title($blog->ID); ?></a></h2>
									</div>
									
									<div class="blog-description">
										<p>
											<?php echo wp_trim_words($blog->post_content, 24, '...');?>	
										</p>
									</div>

									<div class="row align-items-center">
										<div class="col-lg-8 col-md-12 col-sm-8 col-8"> 
											<div class="green_blog_btn">
												<a href="javascript:void(0)"><?php echo the_author_meta( 'user_nicename' , $blog->post_author );   ?></a>
											</div>
										</div>
										<div class="col-lg-4  col-md-12  col-sm-4 col-4  text-end  share_block">
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle share_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
													Share
												</button>
												<ul class="dropdown-menu social_icon_inline" aria-labelledby="dropdownMenuButton1">
													<li class="tw"><a href="https://twitter.com/share?url=<?php echo get_permalink($blog->ID); ?>&text=<?php echo get_the_title($blog->ID); ?>" target="_blank" title="Twitter">Twitter</a></li>
													<li class="in"><a href="http://www.linkedin.com/shareArticle?url=<?php echo get_permalink($blog->ID); ?>" target="_blank" title="Linkedin">Linkedin</a></li>
													<li class="ins"><a href="#" target="_blank" title="Instagram">Instagram</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<?php if($is_not_found){ ?>
					<h2 class="no-search-result-post-title"> <span class="search_icon"></span>Sorry, No results found!</h2>
				<?php } ?>
			</div>
		</div>
		

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
