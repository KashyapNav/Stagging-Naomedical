<?php
/**
 * naomedical_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package naomedical_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'naomedical_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function naomedical_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on naomedical_theme, use a find and replace
		 * to change 'naomedical_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'naomedical_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'naomedical_theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'naomedical_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'naomedical_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function naomedical_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'naomedical_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'naomedical_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function naomedical_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'naomedical_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Logo', 'naomedical_theme' ),
			'id'            => 'footer_logo',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer About Links', 'naomedical_theme' ),
			'id'            => 'footer_about',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Other Links', 'naomedical_theme' ),
			'id'            => 'footer_other',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Subscribe', 'naomedical_theme' ),
			'id'            => 'footer_subscribe',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Top Menu left', 'naomedical_theme' ),
			'id'            => 'top_left',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Top Menu Right', 'naomedical_theme' ),
			'id'            => 'top_right',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Instagram Feed', 'naomedical_theme' ),
			'id'            => 'instagram_feed',
			'description'   => esc_html__( 'Add widgets here.', 'naomedical_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'naomedical_theme_widgets_init' );

/**
 * Deregister styles
 */
// add_action( 'wp_print_styles',     'my_deregister_styles', 100 );
// function my_deregister_styles()    { 
//    if(!is_user_logged_in()){
// 	wp_deregister_style( 'dashicons' ); 
//    }
// }
/**
 * Enqueue scripts and styles.
 */
function naomedical_theme_scripts() {
	wp_enqueue_style( 'naomedical_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'naomedical_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'naomedical_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Add custom style.
	wp_enqueue_style(
		'naomedical_theme-bootstrap',
		get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css'
	);
	wp_enqueue_style(
		'naomedical_theme-slick',
		get_stylesheet_directory_uri() . '/assets/css/slick.css'
	);
	wp_enqueue_style(
		'naomedical_theme-aos',
		get_stylesheet_directory_uri() . '/assets/css/aos.css'
	);
	wp_enqueue_style(
		'naomedical_theme-icon', 
		get_stylesheet_directory_uri() . '/assets/css/icon_style.css'
	);
	wp_enqueue_style(
		'naomedical_theme-custom',
		get_stylesheet_directory_uri() . '/assets/css/custom.css'
	);
	wp_enqueue_style(
		'naomedical_theme-select2',
		get_stylesheet_directory_uri() . '/assets/css/select2.min.css'
	);
	wp_enqueue_style(
		'naomedical_theme-header',
		get_stylesheet_directory_uri() . '/assets/css/header.css'
	);
	wp_enqueue_style(
		'naomedical_theme-landing',
		get_stylesheet_directory_uri() . '/assets/css/landing.css'
	);
	
	
	// Add custom script.
	wp_enqueue_script(
		'naomedical_theme-bootstrap',
		get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js',
		[ 'jquery' ],
		true
	);
	wp_enqueue_script(
		'naomedical_theme-slick',
		get_stylesheet_directory_uri() . '/assets/js/slick.js',
		[ 'jquery' ],
		true
	);
	wp_enqueue_script(
		'naomedical_theme-aos',
		get_stylesheet_directory_uri() . '/assets/js/aos.js',
		[ 'jquery' ],
		true
	);
	wp_enqueue_script(
		'naomedical_theme-custom',
		get_stylesheet_directory_uri() . '/assets/js/custom.js',
		[ 'jquery' ],
		true
	);
	wp_enqueue_script(
		'naomedical_theme-jquery-ui',
		get_stylesheet_directory_uri() . '/assets/js/jquery-ui.js',
		[ 'jquery' ],
		true
	);
	wp_enqueue_script(
		'naomedical_theme-select2',
		get_stylesheet_directory_uri() . '/assets/js/select2.min.js',
		[ 'jquery' ],
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'naomedical_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* Custom Short Code - Testimonials */
function testimonials_shortcode() {
	ob_start();
	get_template_part('testimonials'); 
	return ob_get_clean();   
 } 
 add_shortcode( 'testimonials_shortcode', 'testimonials_shortcode');


//****************************** CPT Testimonials start ****************************
function testimonial_custom_post_type() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Testimonials', 'Post Type General Name', 'naomedical_theme' ),
			'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'naomedical_theme' ),
			'menu_name'           => __( 'Testimonials', 'naomedical_theme' ),
			'parent_item_colon'   => __( 'Parent Testimonial', 'naomedical_theme' ),
			'all_items'           => __( 'All Testimonials', 'naomedical_theme' ),
			'view_item'           => __( 'View Testimonial', 'naomedical_theme' ),
			'add_new_item'        => __( 'Add New Testimonial', 'naomedical_theme' ),
			'add_new'             => __( 'Add New', 'naomedical_theme' ),
			'edit_item'           => __( 'Edit Testimonial', 'naomedical_theme' ),
			'update_item'         => __( 'Update Testimonial', 'naomedical_theme' ),
			'search_items'        => __( 'Search Testimonial', 'naomedical_theme' ),
			'not_found'           => __( 'Not Found', 'naomedical_theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'testimonials', 'naomedical_theme' ),
			'description'         => __( 'Testimonial news and reviews', 'naomedical_theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'testimonials', $args );

		// Register taxonomy
		$cat_labels = array(
			'name'              => _x( 'Testimonial Category', 'taxonomy general name' ),
			'singular_name'     => _x( 'Testimonials', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Testimonials' ),
			'all_items'         => __( 'All Testimonials' ),
			'parent_item'       => __( 'Parent Testimonial Categories' ),
			'parent_item_colon' => __( 'Parent Testimonials:' ),
			'edit_item'         => __( 'Edit Testimonials' ),
			'update_item'       => __( 'Update Testimonials' ),
			'add_new_item'      => __( 'Add New Testimonial Category' ),
			'new_item_name'     => __( 'New Testimonials Name' ),
			'menu_name'         => __( 'Category' ),
		);
		$cat_args = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $cat_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'        => true,
			'rewrite'           => [ 'slug' => 'testimonial-category' ],
		);
		register_taxonomy( 'testimonial_category', [ 'testimonials' ], $cat_args );
		// global $wpdb;
		// $table = $wpdb->prefix . 'posts';
		// $result = $wpdb->query($wpdb->prepare("UPDATE $table SET post_name='mental-health' WHERE ID=4007"));
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'testimonial_custom_post_type', 0 );


//****************************** CPT Testimonials END  ****************************



function add_file_types_to_uploads($file_types){ 
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* Custom Short Code - Insurance */
function insurance_shortcode() {
	ob_start();
	get_template_part('insurancefees');
	return ob_get_clean();
	//include( get_theme_file_path() . '/insurancefees.php' );  
 } 
 add_shortcode( 'insurance_shortcode', 'insurance_shortcode' );


/* Custom Short Code - insurance searchprovider */
function searchprovider_shortcode() {
	ob_start();
	get_template_part('searchproviders');
	return ob_get_clean();
 } 
 add_shortcode( 'searchprovider_shortcode', 'searchprovider_shortcode' );


 /* Custom Short Code - openposition */
function openposition_shortcode() {
	ob_start();
	get_template_part('openpositions');
	return ob_get_clean();
 } 
 add_shortcode( 'openposition_shortcode', 'openposition_shortcode' );


  /* Custom Short Code - ourlocations */
function ourlocations_shortcode() {
	ob_start();
	get_template_part('ourlocations');
	return ob_get_clean();
 } 
 add_shortcode( 'ourlocations_shortcode', 'ourlocations_shortcode' );

 
   /* Custom Short Code - contact locations */
function contactlocations_shortcode() {
	ob_start();
	get_template_part('contact_locations');
	return ob_get_clean();
 } 
 add_shortcode( 'contactlocations_shortcode', 'contactlocations_shortcode' );

/* Custom Short Code - IG feed */
function instagram_shortcode() {
	ob_start();
	get_template_part('instagram-feed');
	return ob_get_clean();
 } 
 add_shortcode( 'instagram_shortcode', 'instagram_shortcode' );

 /* Custom Short Code - essentialservices*/
function essentialservices_shortcode() {
	ob_start();
	get_template_part('essentialservices');
	return ob_get_clean();
 } 
 add_shortcode( 'essentialservices_shortcode', 'essentialservices_shortcode' );

  /* Custom Short Code - homeservicemap*/
function homeservicemap_shortcode() {
	ob_start();
	get_template_part('homeservice-map');
	return ob_get_clean();
 } 
 add_shortcode( 'homeservicemap_shortcode', 'homeservicemap_shortcode' );

/* Custom Short Code - nick-slider */
function nickslider_shortcode() {
ob_start();
get_template_part('nick-slider');
return ob_get_clean();
} 
add_shortcode( 'nickslider_shortcode', 'nickslider_shortcode' );

/* Custom Short Code - landingtimer */
function landingtimer_shortcode() {
ob_start();
get_template_part('landingtimer');
return ob_get_clean();
} 
add_shortcode( 'landingtimer_shortcode', 'landingtimer_shortcode' );

/* Custom Short Code - landingform*/
function landingform_shortcode() {
ob_start();
get_template_part('landingform');
return ob_get_clean();
} 
add_shortcode( 'landingform_shortcode', 'landingform_shortcode' );

/* Custom Short Code - landingform*/
function landinginsurance_shortcode() {
ob_start();
get_template_part('landinginsurance');
return ob_get_clean();
} 
add_shortcode( 'landinginsurance_shortcode', 'landinginsurance_shortcode' );

/* Custom Short Code - subservicessearch*/
function vcare_review_shortcode() {
ob_start();
get_template_part('vcare_review');
return ob_get_clean();
} 
add_shortcode( 'vcare_review_shortcode', 'vcare_review_shortcode' );


/*email template */
// function footer_function() {
//    	ob_start();
// 	include(get_stylesheet_directory() . '/assets/email-templates/mail-template2.php');
// 	$email_content = ob_get_contents();
// 	$to_email = 'kumard@naomedical.com';
// 	ob_end_clean();
// 	$headers = array('Content-Type: text/html; charset=UTF-8');
// 	wp_mail($to_email, "Nao Medical", $email_content, $headers);
// }
// add_action( 'wp_footer', 'footer_function', 10,1 );

//new insurance fee update
///new Update 2022


// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Insurance', 'Post Type General Name', 'naomedical_theme' ),
	'singular_name'       => _x( 'insurance', 'Post Type Singular Name', 'naomedical_theme' ),
	'menu_name'           => __( 'Insurance', 'naomedical_theme' ),
	'parent_item_colon'   => __( 'Parent Insurance', 'naomedical_theme' ),
	'all_items'           => __( 'All Insurance', 'naomedical_theme' ),
	'view_item'           => __( 'View insurance', 'naomedical_theme' ),
	'add_new_item'        => __( 'Add New Insurance', 'naomedical_theme' ),
	'add_new'             => __( 'Add New', 'naomedical_theme' ),
	'edit_item'           => __( 'Edit Insurance', 'naomedical_theme' ),
	'update_item'         => __( 'Update Insurance', 'naomedical_theme' ),
	'search_items'        => __( 'Search Insurance', 'naomedical_theme' ),
	'not_found'           => __( 'Not Found', 'naomedical_theme' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'insurance', 'naomedical_theme' ),
	'description'         => __( 'Insurance news and reviews', 'naomedical_theme' ),
	'labels'              => $labels,
	// Features this CPT supports in Post Editor
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	
	'taxonomies'          => array( 'category' ),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/ 
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
	'show_in_rest' => true,

);

register_taxonomy(
	'Insurance Category', 'insurance', array(
	'hierarchical' => true,
	'label' => 'Insurance Category',
	'show_admin_column' => true,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => true
));

// Registering your Custom Post Type
register_post_type( 'insurance', $args );

add_action( 'admin_init', 'remove_default_type' );

function remove_default_type() {
	
	//******************************Remove default functions for custom post types in add and edit page start****************************
	$custom_post_type['post_type'] = array('insurance');
	if(!empty($custom_post_type['post_type'])){
		foreach($custom_post_type['post_type'] as $types){
			remove_post_type_support($types, 'title');
			remove_post_type_support($types, 'editor');
			remove_post_type_support($types, 'revisions');
			remove_post_type_support($types, 'Comments');
			remove_post_type_support($types, 'excerpt');
			remove_post_type_support($types, 'post-thumbnails');
			remove_post_type_support($types, 'postbox-container-2', 10, 1);
			remove_meta_box('wpseo_meta',$types,'normal');
		}
	}
}

/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Basic Information', 'textdomain' ), 'wpdocs_my_display_callback', 'insurance' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wpdocs_my_display_callback( $post ) {
	// Display code/markup goes here. Don't forget to include nonces!
	global $post;
	//echo  get_theme_file_path( __FILE__ );


	require_once get_theme_file_path( 'insurance_basic_info.php' );
}
add_action( 'save_post',  'custom_post_type_save_post', 10, 1 );


function custom_post_type_save_post() {
	global $post, $wpdb;

				//exit;
				// echo '<pre>';
				// //print_r($post);
				// print_r($_POST);
				// echo '</pre>';
				// exit;
	if(!empty($post)){
		//********Save post for insurance start****************
		
		if($post->post_type == 'insurance'){
			$post_id = $post->ID;
		//Fisrtname
				update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
				$post_title = $_POST['post_title'];
				 $where = array( 'ID' => $post_id );
				 $wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
				update_post_meta( $post_id, 'post_description', $_POST['inc_dec'] );
				update_post_meta( $post_id, 'post_price', $_POST['inc_price'] );
				// update_post_meta( $post_id, 'suffix', $_POST['suffix'] );
				// update_post_meta( $post_id, 'email', $_POST['email'] );
				
				
			}
		//********Save post for insurance End****************	
			
		}
	}


add_filter( 'manage_insurance_posts_columns', 'custom_post_columns', 10, 2 );
function custom_post_columns( $columns ) {
    unset(
	  $columns['author'],
	  $columns['comments'],
	  $columns['date'],
	);
	$columns['inc_dec'] = __( 'Description', 'your_text_domain' );
    $columns['inc_price'] = __( 'Price', 'your_text_domain' );
	return $columns;
// }
}


add_action( 'manage_insurance_posts_custom_column' , 'custom_insurance_column', 10, 2 );
function custom_insurance_column( $column, $post_id ) {
    switch ( $column ) {

        case 'inc_dec' :
			echo get_post_meta( $post_id, 'post_description', true );

        case 'inc_price' :
            echo '$ '.get_post_meta( $post_id , 'post_price' , true ); 
            break;

    }
}

function getCategoryPostData($term_id){
	global $wpdb;
	$posts                  = $wpdb->prefix.'posts';
	$term_relationships     = $wpdb->prefix.'term_relationships';
	$term_taxonomy          = $wpdb->prefix.'term_taxonomy';

	$query                  ='SELECT * FROM '.$posts.'
								LEFT JOIN 
										'.$term_relationships.' ON ('.$posts.'.ID = '.$term_relationships.'.object_id)
								LEFT JOIN 
										'.$term_taxonomy.' ON ('.$term_relationships.'.term_taxonomy_id = '.$term_taxonomy.'.term_taxonomy_id)
								WHERE '.$term_taxonomy.'.term_id IN ('.$term_id.') AND '.$posts.'.post_type = "insurance" and '.$posts.'.post_status = "publish"

								GROUP BY '.$posts.'.ID;'; 

	$results            = $wpdb->get_results($query);
	$data['post']		= array();
	if(isset($results) && !empty($results)){
		foreach($results as $key => $postdata){
			$data['post'][$postdata->ID]['post_title'] 			= get_post_meta( $postdata->ID, 'post_title', true );
			$data['post'][$postdata->ID]['post_description'] 	= get_post_meta( $postdata->ID, 'post_description', true );
			$data['post'][$postdata->ID]['post_price'] 			= get_post_meta( $postdata->ID, 'post_price', true );
		}
	}
	return $data;

}

#Search provider

add_action( 'init', 'custom_post_type_tax' , 10, 2);
function custom_post_type_tax() {


	$labels = array(
		'name' => _x( 'Search Provider', 'taxonomy general name' ),
		'singular_name' => _x( 'Search Provider', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Search Provider' ),
		'all_items' => __( 'All Search Provider' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Search Provider' ), 
		'update_item' => __( 'Update Search Provider' ),
		'add_new_item' => __( 'Add New Search Provider' ),
		'new_item_name' => __( 'New Search Provider Name' ),
		'menu_name' => __( 'Search Provider' ),
	  );
	  
	// Now register the taxonomy
	// Now register the taxonomy
	register_taxonomy('search_provider',array('insurance'), array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'product' ),
	  ));

	 
}

add_action( 'search_provider_add_form_fields', 'misha_add_term_fields' );
function misha_add_term_fields( $taxonomy ) {
	echo '<tr class="form-field">
			<th>
				<label for="misha-text">Payer ID</label>
			</th>
			<td>
				<input name="sub-title-text" id="sub-title-text" type="text" value="" />
			</td>
			</tr>
			
			';
		
}

add_action( 'search_provider_edit_form_fields', 'misha_edit_term_fields', 10, 2 );

function misha_edit_term_fields( $term, $taxonomy ) {

	$popular_platform 			= get_term_meta( $term->term_id, 'sub-title-text', true );
	
	echo '<tr class="form-field">
		<th>
			<label for="misha-text">Payer ID</label>
		</th>
		<td>
			<input name="sub-title-text" id="sub-title-text" type="text" value="'.$popular_platform.' " />
		</td>
		</tr>
	
		
		';
}

add_action( 'created_search_provider', 'misha_save_term_fields' );
add_action( 'edited_search_provider', 'misha_save_term_fields' );

function misha_save_term_fields( $term_id ) {
	$sub_title_text 			= !empty($_POST[ 'sub-title-text' ]) ? $_POST[ 'sub-title-text' ] : '';
	update_term_meta(
		$term_id,
		'sub-title-text',
		sanitize_text_field( $sub_title_text )
	);
}
################################## search_provider End ###############################


function my_admin_footer_function() {
 ?>
	<style>
		body.taxonomy-search_provider .term-description-wrap {
			display:none;
		}

		body.taxonomy-search_provider .term-slug-wrap {
			display:none;
		}

		body.taxonomy-search_provider #wpseo_meta {
			display:none;
		}
		</style>
 <?php
}
add_action('admin_footer', 'my_admin_footer_function');

add_action( 'wp_ajax_nopriv_providerList', 'providerList'  );
add_action( 'wp_ajax_providerList', 'providerList' );

function providerList(){
	global $wpdb;
	$provider = '';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if(!empty($_POST)){
	$provider = '<div class="row">';
			$term = $_POST['term'];
			$term_terms     = $wpdb->prefix.'terms';
			$term_query = '';
			

			$searchinc = !empty($_POST['term']) ? $_POST['term'] : '';
			$searchtext = '';

			if( $searchinc !== str_replace(' ','',$searchinc) ){
				$searchinc1 = (explode(" ",$searchinc));
				if(isset($searchinc1) && !empty($searchinc1)){
					foreach($searchinc1 as $key => $searchincList){
						if($key == 0){
							//$searchtext .= $wpdb->prefix.'posts.post_title LIKE "%'.$searchincList.'%"';
							$term_query .= ' AND '.$term_terms .'.name LIKE "%'.$searchincList.'%"';
						}else{
							//$searchtext .= ' AND '.$wpdb->prefix.'posts.post_title LIKE "%'.$searchincList.'%"';
							$term_query .= ' AND '.$term_terms .'.name LIKE "%'.$searchincList.'%"';
						}
						 
					}
				}
				//echo 'term query :'.$term_query.'<br>';
			}else{
				$term_query = ' AND '.$term_terms .'.name LIKE "%'.$term.'%"';
			}

	// 		//'SELECT *  FROM nao_med_term_taxonomy 
	// LEFT JOIN nao_med_terms ON nao_med_term_taxonomy.term_taxonomy_id = nao_med_terms.term_id
	// WHERE nao_med_term_taxonomy.taxonomy LIKE '%search_provider%' AND nao_med_terms.name LIKE '%6%';'
		
		$term_taxonomy          = $wpdb->prefix.'term_taxonomy';
		// echo 'term_taxonomy db name :'.$term_taxonomy.'<br>';
		$query                  ='SELECT '.$term_terms .'.name as name, '.$term_terms .'.term_id as term_id FROM '.$term_taxonomy.'
									LEFT JOIN 
											'.$term_terms.' ON ('.$term_taxonomy.'.term_taxonomy_id = '.$term_terms.'.term_id)
									WHERE '.$term_taxonomy.'.taxonomy LIKE "%search_provider%"'.$term_query.'';

									/// AND '.$term_terms .'.term_id LIKE "%'.$term.'%"
									// echo 'term_taxonomy select query  :'.$query.'<br>';
		$results            = $wpdb->get_results($query);
		// echo 'exe qry '.$wpdb->last_query;

		
		if(!empty($results)){
			
			$id = 0;
			foreach($results as $key => $term_list){

				// $data['provider'][$key]['name'] = $term_list->name;
				// $data['provider'][$key]['term_id'] = $term_list->term_id;
				// echo '';
				// $sub_title_text 			= get_term_meta( $term_list->term_id, 'sub-title-text', true );
				if($id == 0){
					$provider .= '<div class="col-md-4 col-12 col-sm-12 ssi-list">';
					$provider .= '<ul>';
				}
					$provider .= '<li data-bs-toggle="tooltip" data-bs-placement="top" title="'.$term_list->name.'">
									<div class="lft-inslist">'.$term_list->name.'</div>
									<div class="ins-acpt"> <span class="tick-accept-icon"></span> Accepted</div> 
								</li>';
				if($id == 5){
					$provider .= '</ul>';
					$provider .= '</div>';
					$id = 0;

				}else{
					++$id;
				}

				
			}
			

		}else{
			$provider .= '<div id="result_not_found_privider">No Result Found</div>';
		}
		$provider .= '</div>';

	}
		
	$data['provider'] = $provider;
	echo json_encode($data);
	exit;
}

add_action( 'wp_ajax_nopriv_insurancelist', 'insurancelist'  );
add_action( 'wp_ajax_insurancelist', 'insurancelist' );

function insurancelist(){
	global $wpdb;

	
	$inc = '';

if(!empty($_POST)){
			$category = !empty($_POST['category']) ? $_POST['category'] : '';
			//$tabname = !empty($_POST['tabname']) ? $_POST['tabname'] : '';

	// 		//'SELECT *  FROM nao_med_term_taxonomy 
	// LEFT JOIN nao_med_terms ON nao_med_term_taxonomy.term_taxonomy_id = nao_med_terms.term_id
	// WHERE nao_med_term_taxonomy.taxonomy LIKE '%search_provider%' AND nao_med_terms.name LIKE '%6%';'



	$category_query = ''.$wpdb->prefix.'term_taxonomy.term_id IN ('.$category.') AND ';

	$query = 'SELECT * FROM '.$wpdb->prefix.'posts
				LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
				LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
				WHERE  '.$category_query.''.$wpdb->prefix.'posts.post_status = "publish"
				GROUP BY '.$wpdb->prefix.'posts.ID;';



	$results            = $wpdb->get_results($query);

	$data['post']		= array();
	if(isset($results) && !empty($results)){
		foreach($results as $key => $postdata){
			$post_title 			= get_post_meta( $postdata->ID, 'post_title', true );
			$post_description 		= get_post_meta( $postdata->ID, 'post_description', true );
			$post_price 			= get_post_meta( $postdata->ID, 'post_price', true );

			$inc .= '<tr>';
				$inc .= '<td>'.$post_title.'</td>';
				$inc .= '<td>'.$post_description.'</td>';
				$inc .= '<td>$ '.$post_price.' </td>';
			$inc .= '</tr>';
		}
	}


	}
	if(empty($inc)){

		$inc .= '<tr>  <td></td> <td>No data available in table</td> <td> </td>';

		$inc .= '</tr>';

	}	
	$data['inc'] = $inc;
	echo json_encode($data);
	exit;
}


add_action( 'wp_ajax_nopriv_searchinc', 'searchinc'  );
add_action( 'wp_ajax_searchinc', 'searchinc' );

function searchinc(){
	global $wpdb;

	
	$inc = '';

if(!empty($_POST)){
	$searchinc = !empty($_POST['searchinc']) ? $_POST['searchinc'] : '';
	$searchtext = '';

	if( $searchinc !== str_replace(' ','',$searchinc) ){
		$searchinc1 = (explode(" ",$searchinc));
		if(isset($searchinc1) && !empty($searchinc1)){
			foreach($searchinc1 as $key => $searchincList){
				if($key == 0){
					$searchtext .= $wpdb->prefix.'posts.post_title LIKE "%'.$searchincList.'%"';
				}else{
					$searchtext .= ' AND '.$wpdb->prefix.'posts.post_title LIKE "%'.$searchincList.'%"';
				}
				 
			}
		}
	}else{
		$searchtext = $wpdb->prefix.'posts.post_title LIKE "%'.$searchinc.'%"';
	}

	$query = 'SELECT * FROM '.$wpdb->prefix.'posts
					LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
					LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
					WHERE '.$searchtext.' AND '.$wpdb->prefix.'posts.post_type = "insurance" AND '.$wpdb->prefix.'posts.post_status = "publish"
					GROUP BY '.$wpdb->prefix.'posts.ID';

	$results            = $wpdb->get_results($query);

	$data['post']		= array();


	$terms = get_terms( array( 
	    'taxonomy' => 'Insurance Category',
	    'parent'   => 0
	) );

	$terms_data = array();
	if(!empty($terms)){
		foreach($terms as $termsList){
			$terms_data[$termsList->term_id] = $termsList->name; 
		}
	}
	$inc_array = array();
	if(isset($results) && !empty($results)){
		foreach($results as $key => $postdata){
			$category_detail = wp_get_post_categories($postdata->ID);//$post->ID
			// echo '<pre>';
			// print_r($category_detail);
			// echo '</pre>';
			$term_list 	= get_the_terms($postdata->ID, 'Insurance Category');
			$term_id 	= $term_list[0]->term_id;
			
			
			$post_title 			= get_post_meta( $postdata->ID, 'post_title', true );
			$post_description 		= get_post_meta( $postdata->ID, 'post_description', true );
			$post_price 			= get_post_meta( $postdata->ID, 'post_price', true );

			$inc_array[$term_id][$postdata->ID]['post_title'] 		= $post_title;
			$inc_array[$term_id][$postdata->ID]['post_description'] 	= $post_description;
			$inc_array[$term_id][$postdata->ID]['post_price'] 		= $post_price;
			// $inc .= '<tr>';
			// 	$inc .= '<td>'.$post_title.'</td>';
			// 	$inc .= '<td>'.$post_description.'</td>';
			// 	$inc .= '<td>$ '.$post_price.' </td>';
			// $inc .= '</tr>';
		}
	}
	if(isset($inc_array) && !empty($inc_array)){
		foreach($inc_array as $key_id => $inc_list){
			// echo '<pre>';
			// print_r($inc_list);
			// echo '</pre>';
			$name = !empty($terms_data[$key_id]) ? $terms_data[$key_id] :'';
			if(isset($inc_list) && !empty($inc_list)){

				$inc .= '<div class="col-md-12 col-12 col-sm-12 if-tabcontent-title">';
					$inc .= '<div class="row">';
						$inc .= '<div class="col-md-12 col-12 col-sm-12">';
							$inc .= '<h3>'.$name.':</h3>';
						$inc .= '</div>';
					$inc .= '</div>';
				$inc .= '</div>';
				$inc .= '<div class="col-md-12 col-12 col-sm-12 if-table-div">';
					$inc .= '<div class="">';
					   $inc .= '<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">';
						
						  $inc .= '<table class="table myvisit dataTable no-footer" id="DataTables_Table_0">';
							 $inc .= '<thead>';
								$inc .= '<tr>';
								   $inc .= '<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Visit: activate to sort column descending" style="width: 410px;">Visit</th>';
								   $inc .= '<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Visit Description: activate to sort column ascending" style="width: 730px;">Visit Description</th>';
								   $inc .= '<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Visit cost - Fees: activate to sort column ascending" style="width: 290px;">Visit cost - Fees</th>';
								$inc .= '</tr>';
							 $inc .= '</thead>';
							 $inc .= '<tbody class="visitfees">';
				foreach($inc_list as $key => $inc_list1){
					
							   $inc .= '<tr>';
								   $inc .= '<td>'.$inc_list1['post_title'].'</td>';
								   $inc .= '<td>'.$inc_list1['post_description'].'</td>';
								   $inc .= '<td>$ '.$inc_list1['post_price'].' </td>';
								$inc .= '</tr>';
							
				}
					$inc .= '</tbody>';
					$inc .= '</table>';
				$inc .= '</div>';
			$inc .= '</div>';
			$inc .= '</div>';
			}
		}
	}

	}	

	// if(empty($inc)){

	// 		$inc .= '<tr> <td colspan="3">No data available in table</td>';
			
	// 		$inc .= '</tr>';

	// }
	$data['inc'] = $inc;
	echo json_encode($data);
	exit;
}


add_action( 'wp_ajax_nopriv_searchProvider', 'searchProvider'  );
add_action( 'wp_ajax_searchProvider', 'searchProvider' );

function searchProvider(){
	global $wpdb;

	
	$provider = '<ul id="provider-list">';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
	if(!empty($_POST)){
			$term = $_POST['term'];

	// 		//'SELECT *  FROM nao_med_term_taxonomy 
	// LEFT JOIN nao_med_terms ON nao_med_term_taxonomy.term_taxonomy_id = nao_med_terms.term_id
	// WHERE nao_med_term_taxonomy.taxonomy LIKE '%search_provider%' AND nao_med_terms.name LIKE '%6%';'
		$term_terms     = $wpdb->prefix.'terms';
		$term_taxonomy          = $wpdb->prefix.'term_taxonomy';

		$query                  ='SELECT '.$term_terms .'.name as name, '.$term_terms .'.term_id as term_id FROM '.$term_taxonomy.'
									LEFT JOIN 
											'.$term_terms.' ON ('.$term_taxonomy.'.term_taxonomy_id = '.$term_terms.'.term_id)
									WHERE '.$term_taxonomy.'.taxonomy LIKE "%search_provider%" AND '.$term_terms .'.name LIKE "%'.$term.'%"';

		$results            = $wpdb->get_results($query);
		
		if(!empty($results)){
			foreach($results as $key => $term_list){
				// $data['provider'][$key]['name'] = $term_list->name;
				// $data['provider'][$key]['term_id'] = $term_list->term_id;
				// echo '';
				$provider .= '<li class="provider_select" data-term_name="'.$term_list->name.'" data-term_id="'.$term_list->term_id.'">'.$term_list->name.'</li>';
			}

		}
		

	}
	$provider .= '</ul>';	
	$data['provider'] = $provider;
	echo json_encode($data);
	exit;
}


function hook_javascript() {
	$ajax_url = admin_url( 'admin-ajax.php' );
    ?>
        <script>
        var ajax_url = '<?php echo $ajax_url; ?>';
		</script>
    <?php
}
add_action('wp_head', 'hook_javascript');


//Disable Block editor 
// function _thz_filter_disable_block_editor_pt( $use_block_editor, $post_type ){
// 	if($post_type == 'post'){
// 	  $use_block_editor = false;
// 	}
// 	return $use_block_editor;
//   }
//   add_filter( 'use_block_editor_for_post_type', '_thz_filter_disable_block_editor_pt', 10, 2 );





  ///Conact Information


	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Contact Information', 'Post Type General Name', 'naomedical_theme' ),
		'singular_name'       => _x( 'Contact Information', 'Post Type Singular Name', 'naomedical_theme' ),
		'menu_name'           => __( 'Contact Information', 'naomedical_theme' ),
		'parent_item_colon'   => __( 'Parent Contact Information', 'naomedical_theme' ),
		'all_items'           => __( 'All Contact Information', 'naomedical_theme' ),
		'view_item'           => __( 'View Contact Information', 'naomedical_theme' ),
		'add_new_item'        => __( 'Add New Contact Information', 'naomedical_theme' ),
		'add_new'             => __( 'Add New', 'naomedical_theme' ),
		'edit_item'           => __( 'Edit Contact Information', 'naomedical_theme' ),
		'update_item'         => __( 'Update Contact Information', 'naomedical_theme' ),
		'search_items'        => __( 'Search Contact Information', 'naomedical_theme' ),
		'not_found'           => __( 'Not Found', 'naomedical_theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
	);
	
	// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'contact_information', 'naomedical_theme' ),
		'description'         => __( 'Contact Information news and reviews', 'naomedical_theme' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/ 
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	
	);
	
	
	// register_taxonomy(
	// 	'Insurance Category', 'contact_information', array(
	// 	'hierarchical' => true,
	// 	'label' => 'Contact Information Category',
	// 	'show_admin_column' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'rewrite' => true
	// ));
	
	// Registering your Custom Post Type
	register_post_type( 'contact_information', $args );
	
	add_action( 'admin_init', 'remove_default_type_contact' );
	
	function remove_default_type_contact() {
		 
		//******************************Remove default functions for custom post types in add and edit page start****************************
		$custom_post_type['post_type'] = array('contact_information');
		if(!empty($custom_post_type['post_type'])){
			foreach($custom_post_type['post_type'] as $types){
				remove_post_type_support($types, 'title');
				remove_post_type_support($types, 'editor');
				remove_post_type_support($types, 'revisions');
				remove_post_type_support($types, 'Comments');
				remove_post_type_support($types, 'excerpt');
				remove_post_type_support($types, 'post-thumbnails');
				remove_post_type_support($types, 'postbox-container-2', 10, 1);
				remove_meta_box('wpseo_meta',$types,'normal');
			}
		}
	}




	/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes_contact() {
	add_meta_box( 'meta-box-id', __( 'Basic Information', 'textdomain' ), 'wpdocs_my_display_callback_contact', 'contact_information' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes_contact' );

/**
* Meta box display callback.
*
* @param WP_Post $post Current post object.
*/
function wpdocs_my_display_callback_contact( $post ) {
// Display code/markup goes here. Don't forget to include nonces!
	global $post;
	require_once get_theme_file_path( 'contact_form_basic_info.php' );
}



add_action( 'save_post',  'custom_post_type_save_post_contact', 10, 1 );


function custom_post_type_save_post_contact() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post for Contact Information****************
		
		if($post->post_type == 'contact_information'){
			$post_id = $post->ID;
		//Fisrtname
				update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
				$post_title = $_POST['post_title'];
				 $where = array( 'ID' => $post_id );
				 $wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
				update_post_meta( $post_id, 'contact_address', $_POST['contact_address'] );
				update_post_meta( $post_id, 'contact_info', $_POST['contact_info'] );
				update_post_meta( $post_id, 'contact_phone', $_POST['contact_phone'] );		
			}
		//********Save post for Contact Information****************	
			
		}
	}



	
	
  ///Location Information


	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Location Information', 'Post Type General Name', 'naomedical_theme' ),
		'singular_name'       => _x( 'Location Information', 'Post Type Singular Name', 'naomedical_theme' ),
		'menu_name'           => __( 'Location Information', 'naomedical_theme' ),
		'parent_item_colon'   => __( 'Parent Location Information', 'naomedical_theme' ),
		'all_items'           => __( 'All Location Information', 'naomedical_theme' ),
		'view_item'           => __( 'View Location Information', 'naomedical_theme' ),
		'add_new_item'        => __( 'Add New Location Information', 'naomedical_theme' ),
		'add_new'             => __( 'Add New', 'naomedical_theme' ),
		'edit_item'           => __( 'Edit Location Information', 'naomedical_theme' ),
		'update_item'         => __( 'Update Location Information', 'naomedical_theme' ),
		'search_items'        => __( 'Search Location Information', 'naomedical_theme' ),
		'not_found'           => __( 'Not Found', 'naomedical_theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
	);
	
	// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'location_information', 'naomedical_theme' ),
		'description'         => __( 'Location Information news and reviews', 'naomedical_theme' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/ 
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
	
	);
	
	
	// Registering your Custom Post Type
	register_post_type( 'location', $args );

	// Register taxonomy
	$cat_labels = array(
		'name'              => _x( 'Location Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Location Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search LocationCategory' ),
		'all_items'         => __( 'All Location Categories' ),
		'parent_item'       => __( 'Parent Location Category' ),
		'parent_item_colon' => __( 'Parent Location Category:' ),
		'edit_item'         => __( 'Edit Location Category' ),
		'update_item'       => __( 'Update Location Category' ),
		'add_new_item'      => __( 'Add New Location City' ),
		'new_item_name'     => __( 'New Location Category Name' ),
		'menu_name'         => __( 'Category' ),
	);
	$cat_args = array(
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'        => true,
		'rewrite'           => [ 'slug' => 'locations' ],
	);
	register_taxonomy( 'location-category', [ 'location' ], $cat_args );
	
	add_action( 'admin_init', 'remove_default_type_location' );
	
	function remove_default_type_location() {
		 
		//******************************Remove default functions for custom post types in add and edit page start****************************
		$custom_post_type['post_type'] = array('location');
		if(!empty($custom_post_type['post_type'])){
			foreach($custom_post_type['post_type'] as $types){
				remove_post_type_support($types, 'title');
				remove_post_type_support($types, 'editor');
				remove_post_type_support($types, 'revisions');
				remove_post_type_support($types, 'Comments');
				remove_post_type_support($types, 'excerpt');
				remove_post_type_support($types, 'post-thumbnails');
				remove_post_type_support($types, 'postbox-container-2', 10, 1);
				remove_meta_box('wpseo_meta',$types,'normal');
			}
		}
	}


	/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes_location() {
	add_meta_box( 'meta-box-id', __( 'Basic Information', 'textdomain' ), 'wpdocs_my_display_callback_location', 'location' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes_location' );

/**
* Meta box display callback.
*
* @param WP_Post $post Current post object.
*/
function wpdocs_my_display_callback_location( $post ) {
// Display code/markup goes here. Don't forget to include nonces!

	global $post;
	require_once get_theme_file_path( 'location_form_basic_info.php' );
}



add_action( 'save_post',  'custom_post_type_save_post_location', 10, 1 );



function custom_post_type_save_post_location() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post for Location Information****************
		
		if($post->post_type == 'location'){
			$post_id = $post->ID;
				

		//Fisrtname
				update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
				$post_title = $_POST['post_title'];
				 $where = array( 'ID' => $post_id );
				 $wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
				update_post_meta( $post_id, 'location_address', $_POST['location_address'] );
				update_post_meta( $post_id, 'location_phone', $_POST['location_phone'] );	
				
				update_post_meta( $post_id, 'location_search_name', $_POST['location_search_name'] );
				update_post_meta( $post_id, 'location_latitude', $_POST['location_latitude'] );
				update_post_meta( $post_id, 'location_longitude', $_POST['location_longitude'] );
				update_post_meta( $post_id, 'location_help', $_POST['location_help'] );	
				update_post_meta( $post_id, 'location_images', $_POST['location_images'] );	
				update_post_meta( $post_id, 'appointment_link', $_POST['appointment_link'] );	
				update_post_meta( $post_id, 'insurance_info', $_POST['insurance_info'] );	

				//Working hours slots
				update_post_meta( $post_id, 'mon-fri', $_POST['mon-fri'] );	
				update_post_meta( $post_id, 'mon-fri-start', $_POST['mon-fri-start'] );	
				update_post_meta( $post_id, 'mon-fri-close', $_POST['mon-fri-close'] );	
				
				update_post_meta( $post_id, 'monday', $_POST['monday'] );	
				update_post_meta( $post_id, 'monday-start', $_POST['monday-start'] );	
				update_post_meta( $post_id, 'monday-close', $_POST['monday-close'] );
				
				update_post_meta( $post_id, 'tuesday', $_POST['tuesday'] );	
				update_post_meta( $post_id, 'tuesday-start', $_POST['tuesday-start'] );	
				update_post_meta( $post_id, 'tuesday-close', $_POST['tuesday-close'] );
				
				update_post_meta( $post_id, 'wednesday', $_POST['wednesday'] );	
				update_post_meta( $post_id, 'wednesday-start', $_POST['wednesday-start'] );	
				update_post_meta( $post_id, 'wednesday-close', $_POST['wednesday-close'] );
				
				update_post_meta( $post_id, 'thursday', $_POST['thursday'] );	
				update_post_meta( $post_id, 'thursday-start', $_POST['thursday-start'] );	
				update_post_meta( $post_id, 'thursday-close', $_POST['thursday-close'] );
				
				update_post_meta( $post_id, 'friday', $_POST['friday'] );	
				update_post_meta( $post_id, 'friday-start', $_POST['friday-start'] );	
				update_post_meta( $post_id, 'friday-close', $_POST['friday-close'] );
				
				update_post_meta( $post_id, 'saturday', $_POST['saturday'] );	
				update_post_meta( $post_id, 'saturday-start', $_POST['saturday-start'] );	
				update_post_meta( $post_id, 'saturday-close', $_POST['saturday-close'] );	
				
				update_post_meta( $post_id, 'sunday', $_POST['sunday'] );	
				update_post_meta( $post_id, 'sunday-start', $_POST['sunday-start'] );	
				update_post_meta( $post_id, 'sunday-close', $_POST['sunday-close'] );
				
				update_post_meta( $post_id, 'holiday', $_POST['holiday'] );	
				update_post_meta( $post_id, 'holiday-start', $_POST['holiday-start'] );	
				update_post_meta( $post_id, 'holiday-close', $_POST['holiday-close'] );	


			}
		//********Save post for Location Information****************	
			
		}
	}


	function custom_redirect() {
		global $wp;
	
		if( $wp->request == 'location' ) {
			wp_redirect( site_url( 'locations' ) );
			exit;
		}
	}
	
	add_action ('template_redirect', 'custom_redirect', 1, 10);


	//****************************** CPT Top Services start ****************************
function top_services_custom_post_type() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Top Services', 'Post Type General Name', 'naomedical_theme' ),
			'singular_name'       => _x( 'Top Service', 'Post Type Singular Name', 'naomedical_theme' ),
			'menu_name'           => __( 'Top Level Services', 'naomedical_theme' ),
			'parent_item_colon'   => __( 'Parent Top Service', 'naomedical_theme' ),
			'all_items'           => __( 'All Top Level Services', 'naomedical_theme' ),
			'view_item'           => __( 'View Top Service', 'naomedical_theme' ),
			'add_new_item'        => __( 'Add New Top Service', 'naomedical_theme' ),
			'add_new'             => __( 'Add New', 'naomedical_theme' ),
			'edit_item'           => __( 'Edit Top Service', 'naomedical_theme' ),
			'update_item'         => __( 'Update Top Service', 'naomedical_theme' ),
			'search_items'        => __( 'Search Top Service', 'naomedical_theme' ),
			'not_found'           => __( 'Not Found', 'naomedical_theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Top Services', 'naomedical_theme' ),
			'description'         => __( 'Top Service news and reviews', 'naomedical_theme' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'Top Services', $args );

		// Register taxonomy
		$cat_labels = array(
			'name'              => _x( 'Top Service Category', 'taxonomy general name' ),
			'singular_name'     => _x( 'Top Service', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Top Services' ),
			'all_items'         => __( 'All Top Services' ),
			'parent_item'       => __( 'Parent Top Service Categories' ),
			'parent_item_colon' => __( 'Parent Top Services:' ),
			'edit_item'         => __( 'Edit Top Services' ),
			'update_item'       => __( 'Update Top Services' ),
			'add_new_item'      => __( 'Add New Top Service Category' ),
			'new_item_name'     => __( 'New Top Services Name' ),
			'menu_name'         => __( 'Category' ),
		);
		$cat_args = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $cat_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'        => true,
			'rewrite'           => [ 'slug' => 'top-services-category' ],
		);
		register_taxonomy( 'top_services_category', [ 'topservices' ], $cat_args );
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'top_services_custom_post_type', 0 );


//****************************** CPT Top Services END  ****************************

// ****************************** Blog list Pagination start ****************************** 

	function custom_pagination($numpages = '', $pagerange = '', $paged='') {

		if (empty($pagerange)) {
		  $pagerange = 2;
		} 
		global $paged;
		if (empty($paged)) {
		  $paged = 1;
		}
		if ($numpages == '') {
		  global $wp_query;
		  $numpages = $wp_query->max_num_pages;
		  if(!$numpages) {
			  $numpages = 1;
		  }
		} 
		$pagination_args = array(
		  'base'            => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
		  'format'          => 'page/%#%',
		  'total'           => $numpages,
		  'current'         => $paged,
		  'show_all'        => False,
		  'end_size'        => 1,
		  'mid_size'        => $pagerange,
		  'prev_next'       => True,
		  'prev_text'       => __('&laquo;'),
		  'next_text'       => __('&raquo;'),
		  'type'            => 'plain',
		  'add_args'        => false,
		  'add_fragment'    => ''
		);
		$paginate_links = paginate_links($pagination_args);
	  
		if ($paginate_links) {
		  echo "<div class='pagination'><ul>";
		  echo "<li class='page-number'>". $paginate_links . "</li>";
		  echo "</ul></div>";
		}
	  
	  }
// ****************************** Blog list Pagination End ******************************  

// Our custom post type function
// function create_posttype() {
  
//     register_post_type( 'Services',
//     // CPT Options
//         array(
//             'labels' => array(
//                 'name' => __( 'Services' ),
//                 'singular_name' => __( 'Service' )
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'services'),
//             'show_in_rest' => true,
  
//         )
//     );
// }
// // Hooking up our function to theme setup
// add_action( 'init', 'create_posttype' );


/*
* Creating a function to Service CPT
*/
  
function custom_post_type() {

	add_rewrite_tag('%top_service%','([^&]+)');
  
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'naomedical_theme' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'naomedical_theme' ),
		'menu_name'           => __( 'Services', 'naomedical_theme' ),
		'parent_item_colon'   => __( 'Parent Service', 'naomedical_theme' ),
		'all_items'           => __( 'All Services', 'naomedical_theme' ),
		'view_item'           => __( 'View Service', 'naomedical_theme' ),
		'add_new_item'        => __( 'Add New Service', 'naomedical_theme' ),
		'add_new'             => __( 'Add New', 'naomedical_theme' ),
		'edit_item'           => __( 'Edit Service', 'naomedical_theme' ),
		'update_item'         => __( 'Update Service', 'naomedical_theme' ),
		'search_items'        => __( 'Search Service', 'naomedical_theme' ),
		'not_found'           => __( 'Not Found', 'naomedical_theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
	);
		
// Set other options for Custom Post Type
		
	$args = array(
		'label'               => __( 'Services', 'naomedical_theme' ),
		'description'         => __( 'Service news and reviews', 'naomedical_theme' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres','post_tag'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,
		'rewrite' => [
			'slug' => 'services/%top_service%',
			'with_front' => false,
		],
	);
		
	// Registering your Custom Post Type
	register_post_type( 'services', $args );

	// Register taxonomy
	$cat_labels = array(
		'name'              => _x( 'Service Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Services', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Services' ),
		'all_items'         => __( 'All Services' ),
		'parent_item'       => __( 'Parent Service Categories' ),
		'parent_item_colon' => __( 'Parent Services:' ),
		'edit_item'         => __( 'Edit Services' ),
		'update_item'       => __( 'Update Services' ),
		'add_new_item'      => __( 'Add New Service Category' ),
		'new_item_name'     => __( 'New Services Name' ),
		'menu_name'         => __( 'Category' ),
	);
	$cat_args = array(
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'        => true,
		'rewrite'           => [ 'slug' => 'services-category' ],
	);
	register_taxonomy( 'services_category', [ 'services' ], $cat_args );

	// flush_rewrite_rules();
	
}
	  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
	
add_action( 'init', 'custom_post_type', 0 );


function service_post_link( $permalink, $post ) {

    if ( stripos( $permalink, '%top_service%' ) == false || 'services' != $post->post_type || empty($post->post_name))
        return $permalink;

    if ( is_object( $post ) && 'services' == $post->post_type) {

        $default_top_service = 'urgent-care';
		$get_top_service_id = get_post_meta( $post->ID, 'top_service', true );
		$top_service = get_post_field( 'post_name',$get_top_service_id);
		// echo $top_service;
		// exit;
		if($get_top_service_id){
			if( $top_service = get_post_field( 'post_name',$get_top_service_id) ){
				$permalink = str_replace( '%top_service%', $top_service, $permalink );
			} else {
				$permalink = str_replace( '%top_service%', $default_top_service, $permalink );
			}
		} else {
			$permalink = str_replace( '%top_service%', $default_top_service, $permalink );
		}
        

    }

    return $permalink;
}

add_filter( 'post_type_link', 'service_post_link', 55, 2 );
	  
function create_query_vars($vars){
	$vars[] = 'top_service';
	return $vars;
}

add_filter( 'query_vars', 'create_query_vars');

// if(!is_admin()){
// 	add_action('parse_request', 'debug_func');
// 	//add_action('the_post', 'query_debug');
// }

// function debug_func($query){
// 	global $wp_rewrite;
// 	echo "<pre>";
// 	//print_r($query);
// 	//print_r($wp_rewrite);
// 	echo "</pre>";
// 	//exit;
// }

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

// CHANGE SLUGS OF CUSTOM POST TYPES 

// function change_post_types_slug( $args, $post_type ) {

// 	/*item post type slug*/   
// 	if ( 'services' === $post_type ) {
// 	   $args['rewrite']['slug'] = 'our-services';
// 	}
 
// 	return $args;
//  }

//  add_filter( 'register_post_type_args', 'change_post_types_slug', 10, 2 );

// Displaying Custom Post Types on The Front Page
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'services' ) );
    return $query;
}


/** TOP LEVEL SERVICE META BOX TO SERVICE POST */

add_action( 'add_meta_boxes', 'top_service_category_custom_meta_box' );

function top_service_category_custom_meta_box($post){
	$post_types = array('services');
    add_meta_box(
		'services_category_metadata', 
		'Top Service', 
		'top_services_category_meta_box',
		$post_types, 
		'side', 
		'high');
}

add_action('save_post', 'top_service_category_save_meta_box');
function top_service_category_save_meta_box(){
    global $post;
	// print_r($_POST["top_service"]); exit;
    // if(isset($_POST["service_category"])){
	if($post->post_type == "services"){
		if(isset($_POST["top_service"])){
			$service_categories = $_POST["top_service"];
		}else{
			$service_categories = '';
		}
		

        update_post_meta($post->ID, 'top_service', $service_categories); 
        apply_filters( 'post_type_link', 'service_post_link', 1000, 2 );
    }
	
}

function top_services_category_meta_box($post){
    $getTopService = get_post_meta( $post->ID, 'top_service', true );
	
		$top_services = get_posts([
			'post_type' => 'topservices',
			'post_status' => 'publish',
			'numberposts' => -1
			// 'order'    => 'ASC'
		  ]);
		$urgent_care = 0;
	?>
    <select name="top_service" id="top_service">
    	<option value="">Select Top Service</option>
		<?php foreach ( $top_services as $top_service ) : 
			if(($top_service->ID == $getTopService)){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			if($top_service->post_title == 'Urgent Care'){
				$urgent_care =$top_service->ID;
			}
			?>
			<option value="<?php echo esc_attr( $top_service->ID ); ?>" <?php echo $selected; ?>><?php echo esc_html( $top_service->post_title ); ?></option>
		<?php endforeach; ?>
    </select>
	<script>
		jQuery(document).ready(function(){
			var select_val = <?php echo $urgent_care; ?>;
			if(jQuery('#top_service').val() === ''){
				jQuery('#top_service').val(select_val)
			}
		})
	</script>
 <?php }


 /*** AVAILABLE AT SERVICE META BOX FOR SERVICE POST */

 add_action( 'add_meta_boxes', 'available_at_home_custom_meta_box' );

 function available_at_home_custom_meta_box($post){
	 $post_types = array('services');
	 add_meta_box(
		 'available_at_home_metadata', 
		 'Home Service', 
		 'available_at_home_meta_box',
		 $post_types, 
		 'side', 
		 'high');
 }
 
 add_action('save_post', 'available_at_home_save_meta_box');
 function available_at_home_save_meta_box(){
	 global $post;
	 // print_r($_POST["top_service"]); exit;
	 
	 if($post->post_type == "services"){
		 if(isset($_POST["available_at_home"])){
			 $service_categories = $_POST["available_at_home"];
		 }else{
			 $service_categories = false;
		 }
		 
 
		 update_post_meta($post->ID, 'available_at_home', $service_categories); 
		 
	 }
 }
 
 function available_at_home_meta_box($post){
	 $getService = get_post_meta( $post->ID, 'available_at_home', true );
	 
	 ?>
	 <input type="checkbox" id="available_at_home" name="available_at_home" value="true" <?php echo ($getService) ? 'checked="checked"' : ''; ?>>
	 <label for="available_at_home"></label>Available at home<br>
 <?php }

 
// Add Meta Box to posts and custom post types
/**** BLOCK EDITOR META BOX */

// // register custom meta tag field
// function myguten_register_post_meta() {
//     register_post_meta( 'services', 'myguten_meta_block_field', array(
//         'show_in_rest' => true,
//         'single' => true,
//         'type' => 'string',
//     ) );
// }
// add_action( 'init', 'myguten_register_post_meta' );


/**** VISUAL EDITOR META BOX - SERVICE BENEFITS 
define('WYSIWYG_SB_META_BOX_ID', 'service-benefits-editor');
define('WYSIWYG_SB_EDITOR_ID', 'servicebenefits'); //Important for CSS that this is different
define('WYSIWYG_SB_META_KEY', 'extra-content');
define('WYSIWYG_CONTENT_SB_META_BOX_ID', 'service-benefits');
define('WYSIWYG_CONTENT_SB_EDITOR_ID', 'service-benefits');


/**** VISUAL EDITOR META BOX - SERVICE BENEFITS */
define('WYSIWYG_SB_META_BOX_ID', 'service-benefits-editor');
define('WYSIWYG_SB_EDITOR_ID', 'servicebenefits'); //Important for CSS that this is different
define('WYSIWYG_SB_META_KEY', 'extra-content');
define('WYSIWYG_CONTENT_SB_META_BOX_ID', 'service-benefits');
define('WYSIWYG_CONTENT_SB_EDITOR_ID', 'service-benefits');

add_action('admin_init', 'wysiwyg_register_services_benefits_meta_box');
function wysiwyg_register_services_benefits_meta_box(){
		$post_types = array('services');
        add_meta_box(WYSIWYG_SB_META_BOX_ID, __('SERVICE BENEFITS', 'wysiwyg'), 'wysiwyg_render_service_benefits_meta_box', $post_types);

}

function wysiwyg_render_service_benefits_meta_box(){
	
        global $post;
        
        $meta_box_id = WYSIWYG_CONTENT_SB_META_BOX_ID;
        $editor_id = WYSIWYG_CONTENT_SB_EDITOR_ID;
        
        //Add CSS jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$meta_box_id #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id #$editor_id_fullscreen{display:none;}
                </style>
            
                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });
                                
                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }
                                
                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });
                                
                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });
								setTimeout(function(){
									tinymce.execCommand( 'mceRemoveEditor', false, 'service-benefits' );
									tinymce.execCommand( 'mceAddEditor', false, 'service-benefits' );
								}, 1000);	
                        });
                </script>
        ";
        
        $description = get_post_meta( $post->ID, 'service-benefits', true );
		$content   = html_entity_decode($description);
		$editor_id = 'service-benefits';
		$settings  = array( 'media_buttons' => false );
		
		wp_editor( $content, $editor_id, $settings );
        
        //Clear The Room!
        echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_service_description_save_meta');
function wysiwyg_service_description_save_meta(){
		global $post;
        $editor_id = 'service-benefits';
        $meta_key = 'service-benefits';

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		
		update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}


/**** VISUAL EDITOR META BOX - SERVICE DETAILS */

define('WYSIWYG_META_BOX_ID', 'my-editor');
define('WYSIWYG_EDITOR_ID', 'myeditor'); //Important for CSS that this is different
define('WYSIWYG_META_KEY', 'extra-content');
define('WYSIWYG_CONTENT_META_BOX_ID', 'service-description');
define('WYSIWYG_CONTENT_EDITOR_ID', 'service-description');

add_action('admin_init', 'wysiwyg_register_meta_box');
function wysiwyg_register_meta_box(){
		$post_types = array('services');
        add_meta_box(WYSIWYG_META_BOX_ID, __('SERVICE DETAILS', 'wysiwyg'), 'wysiwyg_render_meta_box', $post_types);
}

function wysiwyg_render_meta_box(){
	
        global $post;
        
        $meta_box_id = WYSIWYG_CONTENT_META_BOX_ID;
        $editor_id = WYSIWYG_CONTENT_EDITOR_ID;
        
        //Add CSS jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$meta_box_id #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id #$editor_id_fullscreen{display:none;}
                </style>
            
                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });
                                
                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }
                                
                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });
                                
                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });		
								setTimeout(function(){
									tinymce.execCommand( 'mceRemoveEditor', false, 'service-description' );
									tinymce.execCommand( 'mceAddEditor', false, 'service-description' );
								}, 1000);					
								
                        });
                </script>
        ";
        
        $description = get_post_meta( $post->ID, 'service-description', true );
		$content   = html_entity_decode($description);
		$editor_id = 'service-description';
		$settings  = array( 'media_buttons' => false );
		
		wp_editor( $content, $editor_id, $settings );
        
        //Clear The Room!
        echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_save_meta');
function wysiwyg_save_meta(){
		global $post;
        $editor_id = 'service-description';
        $meta_key = 'service-description';

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		
		//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
		update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}

/**** PRICE META BOX */

function add_price_meta_boxes() {
	$post_types = array('services');
    add_meta_box(
        "post_metadata_prices_post", // div id containing rendered fields
        "Price($)", // section heading displayed as text
        "post_meta_box_prices_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_price_meta_boxes" );

// save field value
// function save_price_meta_boxes(){
//     global $post;
//     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
//         return;
//     }
//     // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
//     //     return;
//     // }
// 	if($post){
// 		update_post_meta( $post->ID, "_price", sanitize_text_field( $_POST[ "_price" ] ) );
// 	}    
// }
// add_action( 'save_post', 'save_price_meta_boxes' );

// // callback function to render fields
// function post_meta_box_prices_post(){
//     global $post;
//     $custom = get_post_custom( $post->ID );
// 	$price = '';
// 	if (array_key_exists("_price",$custom)){
//    		$price = $custom[ "_price" ][ 0 ];
// 	}
//     echo "<input type=\"text\" name=\"_price\" value=\"".$price."\" placeholder=\"Enter Price ($)\">";
// }

// save field value
function save_price_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
		update_post_meta( $post->ID, "_price", sanitize_text_field( $_POST[ "_price" ] ) );
		update_post_meta( $post->ID, "_price_message", sanitize_text_field( $_POST[ "_price_message" ] ) );
	}    
}
add_action( 'save_post', 'save_price_meta_boxes' );

// callback function to render fields
function post_meta_box_prices_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	$price = $price_message = '';
	if (array_key_exists("_price",$custom)){
   		$price = $custom[ "_price" ][ 0 ];
	}
	if (array_key_exists("_price_message",$custom)){
		$price_message = $custom[ "_price_message" ][ 0 ];
 	}
    echo "<input type=\"text\" name=\"_price\" value=\"".$price."\" placeholder=\"Enter Price ($)\">";
    echo "<br><br><input type=\"text\" name=\"_price_message\" value=\"".$price_message."\" placeholder=\"Enter Message\">";
}
/**** DATE META BOX */

function add_date_meta_boxes() {
	$post_types = array('services');
    add_meta_box(
        "post_metadata_events_post", // div id containing rendered fields
        "Event Date", // section heading displayed as text
        "post_meta_box_events_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_date_meta_boxes" );

// save field value
function save_post_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
    	update_post_meta( $post->ID, "_event_date", sanitize_text_field( $_POST[ "_event_date" ] ) );
	}
}
add_action( 'save_post', 'save_post_meta_boxes' );

// callback function to render fields
function post_meta_box_events_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	$advertisingCategory = '';
	if (array_key_exists("_event_date",$custom)){
		$advertisingCategory = $custom[ "_event_date" ][ 0 ];
	}
	
    
    echo "<input type=\"date\" name=\"_event_date\" value=\"".$advertisingCategory."\" placeholder=\"Event Date\">";
}


/**** MEDIA UPLOAD META BOX ****/
add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );

function multi_media_uploader_meta_box() {
	// Register Meta Box for Multiple Post Types
	$post_types = array('services');
	add_meta_box( 'my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', $post_types, 'normal', 'high' );
}

function multi_media_uploader_meta_box_func($post) {
	$banner_img = get_post_meta($post->ID,'post_banner_img',true);
	?>
	<style type="text/css">
		.multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
		.multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
		.multi-upload-medias ul li img { width: 100%; }
	</style>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<td>Banner Image</td>
			<td>
				<?php echo multi_media_uploader_field( 'post_banner_img', $banner_img ); ?>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
		jQuery(function($) {

			$('body').on('click', '.wc_multi_upload_image_button', function(e) {
				e.preventDefault();

				var button = $(this),
				custom_uploader = wp.media({
					title: 'Insert image',
					button: { text: 'Use this image' },
					multiple: true 
				}).on('select', function() {
					var attech_ids = '';
					attachments
					var attachments = custom_uploader.state().get('selection'),
					attachment_ids = new Array(),
					i = 0;
					attachments.each(function(attachment) {
						attachment_ids[i] = attachment['id'];
						attech_ids += ',' + attachment['id'];
						if (attachment.attributes.type == 'image') {
							$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class="delete-img"></i></li>');
						} else {
							$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class="delete-img"></i></li>');
						}

						i++;
					});

					var ids = $(button).siblings('.attechments-ids').attr('value');
					if (ids) {
						var ids = ids + attech_ids;
						$(button).siblings('.attechments-ids').attr('value', ids);
					} else {
						$(button).siblings('.attechments-ids').attr('value', attachment_ids);
					}
					$(button).siblings('.wc_multi_remove_image_button').show();
				})
				.open();
			});

			$('body').on('click', '.wc_multi_remove_image_button', function() {
				$(this).hide().prev().val('').prev().addClass('button').html('Add Media');
				$(this).parent().find('ul').empty();
				return false;
			});

		});

		jQuery(document).ready(function() {
			jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
				var ids = [];
				var this_c = jQuery(this);
				jQuery(this).parent().remove();
				jQuery('.multi-upload-medias ul li').each(function() {
					ids.push(jQuery(this).attr('data-attechment-id'));
				});
				jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
			});
		})
	</script>

	<?php
}


function multi_media_uploader_field($name, $value = '') {
	$image = '">Add Media';
	$image_str = '';
	$image_size = 'full';
	$display = 'none';
	$value = explode(',', $value);

	if (!empty($value)) {
		foreach ($value as $values) {
			if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
				$image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="delete-img"></i></li>';
			}
		}

	}

	if($image_str){
		$display = 'inline-block';
	}

	return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}

// Save Meta Box values.
add_action( 'save_post', 'wc_meta_box_save' );

function wc_meta_box_save( $post_id ) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;	
	}

	if( !current_user_can( 'edit_post' ) ){
		return;	
	}
	
	if( isset( $_POST['post_banner_img'] ) ){
		update_post_meta( $post_id, 'post_banner_img', $_POST['post_banner_img'] );
	}
}

/**** OLD PRICE META BOX */

function add_old_price_meta_boxes() { 
	$post_types = array('services');
    add_meta_box(
        "post_metadata_old_prices_post", // div id containing rendered fields
        "Old Price($)", // section heading displayed as text
        "post_meta_box_old_prices_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_old_price_meta_boxes" );

// save field value
function save_old_price_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
		update_post_meta( $post->ID, "_oldprice", sanitize_text_field( $_POST[ "_oldprice" ] ) );
	}
    
}
add_action( 'save_post', 'save_old_price_meta_boxes' );

// callback function to render fields
function post_meta_box_old_prices_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	$price = '';
	if (array_key_exists("_oldprice",$custom)){
    	$price = $custom[ "_oldprice" ][ 0 ];
	}
    echo "<input type=\"text\" name=\"_oldprice\" value=\"".$price."\" placeholder=\"Enter Old Price ($)\">";
}

/**** INSURANCE COVERED PRICE META BOX */

function add_insurance_price_meta_boxes() {
	$post_types = array('services');
    add_meta_box(
        "post_metadata_insurance_prices_post", // div id containing rendered fields
        "Insurance Covered Price($)", // section heading displayed as text
        "post_meta_box_insurance_prices_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_insurance_price_meta_boxes" );

// save field value
function save_insurance_price_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
		update_post_meta( $post->ID, "_insuranceprice", sanitize_text_field( $_POST[ "_insuranceprice" ] ) );
		update_post_meta( $post->ID, "_insuranceprice_message", sanitize_text_field( $_POST[ "_insuranceprice_message" ] ) );
	}
    
}
add_action( 'save_post', 'save_insurance_price_meta_boxes' );

// callback function to render fields
function post_meta_box_insurance_prices_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	$price = $insuranceprice_message = '';
	if (array_key_exists("_insuranceprice",$custom)){
    	$price = $custom[ "_insuranceprice" ][ 0 ];
	}
	if (array_key_exists("_insuranceprice_message",$custom)){
		$insuranceprice_message = $custom[ "_insuranceprice_message" ][ 0 ];
 	}
    echo "<input type=\"text\" name=\"_insuranceprice\" value=\"".$price."\" placeholderr=\"Enter Covered Price ($)\">";
    echo "<br><br><input type=\"text\" name=\"_insuranceprice_message\" value=\"".$insuranceprice_message."\" placeholder=\"Enter Message\">";
}

/* STAR RATINGS META BOX */

add_action( 'add_meta_boxes', 'ratings_custom_meta_box' );

function ratings_custom_meta_box($post){
	$post_types = array('services','testimonials');
    add_meta_box('ratings_meta_box', 'Ratings', 'custom_ratings_meta_box', $post_types, 'side' , 'high');
}

add_action('save_post', 'ratings_save_meta_box');
function ratings_save_meta_box(){ 
    global $post;
    if(isset($_POST["custom_element_rating_class"])){
         //UPDATE: 
        $meta_element_class = $_POST['custom_element_rating_class'];
        //END OF UPDATE

        update_post_meta($post->ID, 'custom_ratings_meta_box', $meta_element_class);
        //print_r($_POST);
    }
}

function custom_ratings_meta_box($post){
    $meta_element_class = get_post_meta($post->ID, 'custom_ratings_meta_box', true); //true ensures you get just one value instead of an array
    ?>   
    <label>Star Ratings :  </label>

    <select name="custom_element_rating_class" id="custom_element_rating_class">
    	<option value=""></option>
		<option value="1" <?php selected( $meta_element_class, '1' ); ?>>1 Star</option>
      	<option value="2" <?php selected( $meta_element_class, '2' ); ?>>2 Star</option>
      	<option value="3" <?php selected( $meta_element_class, '3' ); ?>>3 Star</option>
      	<option value="4" <?php selected( $meta_element_class, '4' ); ?>>4 Star</option>
	  	<option value="5" <?php selected( $meta_element_class, '5' ); ?>>5 Star</option>
    </select>

<?php } 

/* STAR RATINGS META BOX ENDS */

/**** BOOK NOW LINK META BOX */

function add_book_now_meta_boxes() {
	$post_types = array('services','page','topservices');
    add_meta_box(
        "post_metadata_book_now_post", // div id containing rendered fields
        "Link for appointment", // section heading displayed as text
        "post_meta_box_book_now_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_book_now_meta_boxes" );

// save field value
function save_book_now_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
		update_post_meta( $post->ID, "appointment_link", sanitize_text_field( $_POST[ "appointment_link" ] ) );
	}
    
}
add_action( 'save_post', 'save_book_now_meta_boxes' );

// callback function to render fields
function post_meta_box_book_now_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	$appointment_link = '';
	if (array_key_exists("appointment_link",$custom)){
    	$appointment_link = $custom[ "appointment_link" ][ 0 ];
	}
    echo "<input type=\"url\" name=\"appointment_link\" value=\"".$appointment_link."\" placeholderr=\"Enter Book Now Link\">";
}

/**** VISUAL EDITOR META BOX - Short Description */

define('WYSIWYG_META_SD_BOX_ID', 'short-desc-editor');
define('WYSIWYG_SD_EDITOR_ID', 'shortdesceditor'); //Important for CSS that this is different
define('WYSIWYG_SD_META_KEY', 'extra-content');
define('WYSIWYG_CONTENT_SD_META_BOX_ID', 'short-desc-description');
define('WYSIWYG_CONTENT_SD_EDITOR_ID', 'short-desc-description');

add_action('admin_init', 'wysiwyg_register_short_desc_meta_box');
function wysiwyg_register_short_desc_meta_box(){
		$post_types = array('services','topservices');
        add_meta_box(WYSIWYG_META_SD_BOX_ID, __('SHORT DESCRIPTION', 'wysiwyg'), 'wysiwyg_render_short_desc_meta_box', $post_types);
}

function wysiwyg_render_short_desc_meta_box(){
	
        global $post;
        
        $meta_box_id = WYSIWYG_CONTENT_SD_META_BOX_ID;
        $editor_id = WYSIWYG_CONTENT_SD_EDITOR_ID;
        
        //Add CSS jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$meta_box_id #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id {display:none;}
                </style>
            
                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });
                                
                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }
                                
                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });
                                
                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });		
								setTimeout(function(){
									tinymce.execCommand( 'mceRemoveEditor', false, 'short-description' );
									tinymce.execCommand( 'mceAddEditor', false, 'short-description' );
								}, 1000);					
								
                        });
                </script>
        ";
        
        $description = get_post_meta( $post->ID, 'short-description', true );
		$content   = html_entity_decode($description);
		$editor_id = 'short-description';
		$settings  = array( 'media_buttons' => false );
		
		wp_editor( $content, $editor_id, $settings );
        
        //Clear The Room!
        echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_short_desc_save_meta');
function wysiwyg_short_desc_save_meta(){
		global $post;
        $editor_id = 'short-description';
        $meta_key = 'short-description';

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		
		//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
		update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}

/*****
 * short Description End
 */


 /*** VISUAL EDITOR META BOX - Service Schema script */

 define('WYSIWYG_META_SS_BOX_ID', 'schema-script-editor');
 define('WYSIWYG_SS_EDITOR_ID', 'schemascripteditor'); //Important for CSS that this is different
 define('WYSIWYG_SS_META_KEY', 'extra-content');
 define('WYSIWYG_CONTENT_SS_META_BOX_ID', 'schema-script-content');
 define('WYSIWYG_CONTENT_SS_EDITOR_ID', 'schema-script-content');
 
 add_action('admin_init', 'wysiwyg_register_schema_script_meta_box');
 function wysiwyg_register_schema_script_meta_box(){
		 $post_types = array('services','page','post');
		 add_meta_box(WYSIWYG_META_SS_BOX_ID, __('SCHEMA SCRIPT', 'wysiwyg'), 'wysiwyg_render_schema_script_meta_box', $post_types);
 }
 
 function wysiwyg_render_schema_script_meta_box(){
	 
		 global $post;
		 
		 $meta_box_id = WYSIWYG_CONTENT_SS_META_BOX_ID;
		 $editor_id = WYSIWYG_CONTENT_SS_EDITOR_ID;
		 
		 //Add CSS jQuery goodness to make this work like the original WYSIWYG
		 echo "
				 <style type='text/css'>
						 #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
						 #$meta_box_id #$editor_id{width:100%;}
						 #$meta_box_id #editorcontainer{background:#fff !important;}
						 #$meta_box_id {display:none;}
						 #schema-script-tmce{display:none;}
				 </style>
			 
				 <script type='text/javascript'>
						 jQuery(function($){
							 
								 $('#schema-script-tmce').attr('onclick', null);
								 $('#$meta_box_id #editor-toolbar > a').click(function(){
										 $('#$meta_box_id #editor-toolbar > a').removeClass('active');
										 $(this).addClass('active');
								 });
								 
								 if($('#$meta_box_id #edButtonPreview').hasClass('active')){
										 $('#$meta_box_id #ed_toolbar').hide();
								 }
								 
								 $('#$meta_box_id #edButtonPreview').click(function(){
										 $('#$meta_box_id #ed_toolbar').hide();
								 });
								 
								 $('#$meta_box_id #edButtonHTML').click(function(){
										 $('#$meta_box_id #ed_toolbar').show();
								 });		
								//  setTimeout(function(){
								// 	 tinymce.execCommand( 'mceRemoveEditor', false, 'schema-script' );
								// 	 tinymce.execCommand( 'mceAddEditor', false, 'schema-script' );
								//  }, 1000);					
								 
						 });
				 </script>
		 ";
		 
		 $description = get_post_meta( $post->ID, 'schema-script', true );
		 $content   = html_entity_decode($description);
		 $editor_id = 'schema-script';
		 $settings  = array( 'media_buttons' => false );
		 
		 wp_editor( $content, $editor_id, $settings );
		 
		 //Clear The Room!
		 echo "<div style='clear:both; display:block;'></div>";
 }
 
 add_action('save_post', 'wysiwyg_schema_script_save_meta');
 function wysiwyg_schema_script_save_meta(){
		 global $post;
		 $editor_id = 'schema-script';
		 $meta_key = 'schema-script';
 
		 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			 return;
		 }
		 
		 //update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
		 update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
 }
 
 /*****
  * Service Schema script End
  */
 
  
  /*** VISUAL EDITOR META BOX - Location Schema script */
 
 define('WYSIWYG_META_LS_BOX_ID', 'location-schema-script-editor');
 define('WYSIWYG_LS_EDITOR_ID', 'location-schemascripteditor'); //Important for CSS that this is different
 define('WYSIWYG_LD_META_KEY', 'location-extra-content');
 define('WYSIWYG_CONTENT_LOC_SS_META_BOX_ID', 'location-schema-script-content');
 define('WYSIWYG_CONTENT_LOC_SS_EDITOR_ID', 'location-schema-script-content');
 
 add_action('admin_init', 'wysiwyg_register_location_schema_script_meta_box');
 function wysiwyg_register_location_schema_script_meta_box(){
		 $post_types = array('location');
		 add_meta_box(WYSIWYG_META_LS_BOX_ID, __('SCHEMA SCRIPT', 'wysiwyg'), 'wysiwyg_render_location_schema_script_meta_box', $post_types);
 }
 
 function wysiwyg_render_location_schema_script_meta_box(){
	 
		 global $post;
		 
		 $meta_box_id = WYSIWYG_CONTENT_LOC_SS_META_BOX_ID;
		 $editor_id = WYSIWYG_CONTENT_LOC_SS_EDITOR_ID;
		 
		 //Add CSS jQuery goodness to make this work like the original WYSIWYG
		 echo "
				 <style type='text/css'>
						 #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
						 #$meta_box_id #$editor_id{width:100%;}
						 #$meta_box_id #editorcontainer{background:#fff !important;}
						 #$meta_box_id {display:none;}
						 #location-schema-script-tmce{display:none;}
				 </style>
			 
				 <script type='text/javascript'>
						 jQuery(function($){
								 $('#location-schema-script-tmce').attr('onclick', null);
								 $('#$meta_box_id #editor-toolbar > a').click(function(){
										 $('#$meta_box_id #editor-toolbar > a').removeClass('active');
										 $(this).addClass('active');
								 });
								 
								 if($('#$meta_box_id #edButtonPreview').hasClass('active')){
										 $('#$meta_box_id #ed_toolbar').hide();
								 }
								 
								 $('#$meta_box_id #edButtonPreview').click(function(){
										 $('#$meta_box_id #ed_toolbar').hide();
								 });
								 
								 $('#$meta_box_id #edButtonHTML').click(function(){
										 $('#$meta_box_id #ed_toolbar').show();
								 });		
								//  setTimeout(function(){
								// 	 tinymce.execCommand( 'mceRemoveEditor', false, 'location-schema-script' );
								// 	 tinymce.execCommand( 'mceAddEditor', false, 'location-schema-script' );
								//  }, 1000);					
								 
						 });
				 </script>
		 ";
		 
		 $description = get_post_meta( $post->ID, 'location-schema-script', true );
		 $content   = html_entity_decode($description);
		 $editor_id = 'location-schema-script';
		 $settings  = array( 'media_buttons' => false );
		 
		 wp_editor( $content, $editor_id, $settings );
		 
		 //Clear The Room!
		 echo "<div style='clear:both; display:block;'></div>";
 }
 
 add_action('save_post', 'wysiwyg_location_schema_script_save_meta');
 function wysiwyg_location_schema_script_save_meta(){
		 global $post;
		 $editor_id = 'location-schema-script';
		 $meta_key = 'location-schema-script';
 
		 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			 return;
		 }
		 
		 //update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
		 update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
 }
 
 /*****
  * Location Schema script End
  */

  
  
  /*** VISUAL EDITOR META BOX - Topservices Schema script */
 
 define('WYSIWYG_META_TP_BOX_ID', 'topservices-schema-script-editor');
 define('WYSIWYG_TP_EDITOR_ID', 'topservices-schemascripteditor'); //Important for CSS that this is different
 define('WYSIWYG_TS_META_KEY', 'topservices-extra-content');
 define('WYSIWYG_CONTENT_TOP_SS_META_BOX_ID', 'topservices-schema-script-content');
 define('WYSIWYG_CONTENT_TOP_SS_EDITOR_ID', 'topservices-schema-script-content');
 
 add_action('admin_init', 'wysiwyg_register_topservices_schema_script_meta_box');
 function wysiwyg_register_topservices_schema_script_meta_box(){
		 $post_types = array('topservices');
		 add_meta_box(WYSIWYG_META_TP_BOX_ID, __('SCHEMA SCRIPT', 'wysiwyg'), 'wysiwyg_render_topservices_schema_script_meta_box', $post_types);
 }
 
 function wysiwyg_render_topservices_schema_script_meta_box(){
	 
		 global $post;
		 
		 $meta_box_id = WYSIWYG_CONTENT_TOP_SS_META_BOX_ID;
		 $editor_id = WYSIWYG_CONTENT_TOP_SS_EDITOR_ID;
		 
		 //Add CSS jQuery goodness to make this work like the original WYSIWYG
		 echo "
				 <style type='text/css'>
						 #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
						 #$meta_box_id #$editor_id{width:100%;}
						 #$meta_box_id #editorcontainer{background:#fff !important;}
						 #$meta_box_id {display:none;}
						 #topservices-schema-script-tmce{display:none;}
				 </style>
			 
				 <script type='text/javascript'>
						 jQuery(function($){
								 $('#topservices-schema-script-tmce').attr('onclick', null);
								 $('#$meta_box_id #editor-toolbar > a').click(function(){
										 $('#$meta_box_id #editor-toolbar > a').removeClass('active');
										 $(this).addClass('active');
								 });
								 
								 if($('#$meta_box_id #edButtonPreview').hasClass('active')){
										 $('#$meta_box_id #ed_toolbar').hide();
								 }
								 
								 $('#$meta_box_id #edButtonPreview').click(function(){
										 $('#$meta_box_id #ed_toolbar').hide();
								 });
								 
								 $('#$meta_box_id #edButtonHTML').click(function(){
										 $('#$meta_box_id #ed_toolbar').show();
								 });		
								//  setTimeout(function(){
								// 	 tinymce.execCommand( 'mceRemoveEditor', false, 'topservices-schema-script' );
								// 	 tinymce.execCommand( 'mceAddEditor', false, 'topservices-schema-script' );
								//  }, 1000);					
								 
						 });
				 </script>
		 ";
		 
		 $description = get_post_meta( $post->ID, 'topservices-schema-script', true );
		 $content   = html_entity_decode($description);
		 $editor_id = 'topservices-schema-script';
		 $settings  = array( 'media_buttons' => false );
		 
		 wp_editor( $content, $editor_id, $settings );
		 
		 //Clear The Room!
		 echo "<div style='clear:both; display:block;'></div>";
 }
 
 add_action('save_post', 'wysiwyg_topservices_schema_script_save_meta');
 function wysiwyg_topservices_schema_script_save_meta(){
		 global $post;
		 $editor_id = 'topservices-schema-script';
		 $meta_key = 'topservices-schema-script';
 
		 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			 return;
		 }
		 
		 //update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
		 update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
 }
 
 /*****
  * Topservices Schema script End
  */


/*** SERVICE CATEGORY ON TOP LEVEL SERVICE META BOX */

add_action( 'add_meta_boxes', 'service_category_custom_meta_box' );

function service_category_custom_meta_box($post){
	$post_types = array('topservices');
    add_meta_box(
		'services_category_metadata', 
		'Service Carousel', 
		'services_category_meta_box',
		$post_types, 
		'side', 
		'high');
}

add_action('save_post', 'service_category_save_meta_box');
function service_category_save_meta_box(){
    global $post;
	// print_r($_POST); exit;
    // if(isset($_POST["service_category"])){
	if($post->post_type == "topservices"){
		if(isset($_POST["service_category"])){
			$service_categories = implode(',',$_POST["service_category"]);
		}else{
			$service_categories = '';
		}
		

        update_post_meta($post->ID, 'service_category', $service_categories); 
        
    }
}

function services_category_meta_box($post){
    $meta_element_class = get_post_meta( $post->ID, 'service_category', true );
	
	$getServiceCategories = explode(',',$meta_element_class);

		$args = array(
			'taxonomy' => 'services_category',
			'orderby' => 'name',
			'order'   => 'ASC'
		);

		$top_service_categories = get_categories($args);
		// echo '<pre>';
		// print_r($top_service_categories);
		// print_r($getServiceCategories);
		// echo '</pre>';
	?>
    <select multiple name="service_category[]" id="service_category" <?php echo $meta_element_class;  ?>>
    	<option value="">Select Service Categories</option>
		<?php foreach ( $top_service_categories as $top_service_category ) : 
			$selected = in_array($top_service_category->term_id,$getServiceCategories)?'selected':'';
			?>
			<option value="<?php echo esc_attr( $top_service_category->term_id ); ?>" <?php echo $selected; ?>><?php echo esc_html( $top_service_category->name ); ?></option>
		<?php endforeach; ?>
    </select>
	<style>
		.select2-container{
			width:100% !important;
		}
	</style>
	<script>
		jQuery(document).ready(function() {
			jQuery('#service_category').select2({
				placeholder: "Select Aviable Service Category",
				allowClear: true
			});
		});
	</script>
 <?php }
 
 // register the ajax action for authenticated users
add_action('wp_ajax_get_category_locations', 'get_category_locations');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_get_category_locations', 'get_category_locations');

// handle the ajax request
function get_category_locations() {
    $category_id = $_REQUEST['category_id'];

    $args = array(
		'post_type' => 'location',
		'tax_query' => array(
			array(
			'taxonomy' => 'location-category',
			'field' => 'term_id',
			'terms' => $category_id
			 )
		  )
		);
	$get_locations = new WP_Query( $args );
	$cat_locations = [];
	if(!empty($get_locations)){
		foreach($get_locations->posts as $i =>$post){
			$post_title 		= !empty(get_post_meta( $post->ID, 'post_title', true )) ? get_post_meta( $post->ID, 'post_title', true ) : '';
			$location_address 		= !empty(get_post_meta( $post->ID, 'location_address', true )) ? get_post_meta( $post->ID, 'location_address', true ) : '';
			$location_info 			= !empty(get_post_meta( $post->ID, 'insurance_info', true )) ? get_post_meta( $post->ID, 'insurance_info', true ) : '';
			$location_phone 	    = !empty(get_post_meta( $post->ID, 'location_phone', true )) ? get_post_meta( $post->ID, 'location_phone', true ) : '';

			$location_latitude 	    = !empty(get_post_meta( $post->ID, 'location_latitude', true )) ? get_post_meta( $post->ID, 'location_latitude', true ) : '';
			$location_longitude     = !empty(get_post_meta( $post->ID, 'location_longitude', true )) ? get_post_meta( $post->ID, 'location_longitude', true ) : '';

			
			//Working hours slote start
							
			$slot_string    = '';
			$mon_fri_slot     = !empty(get_post_meta( $post->ID, 'mon-fri', true )) ? get_post_meta( $post->ID, 'mon-fri', true ) : '';

			$mon_fri_start     = !empty(get_post_meta( $post->ID, 'mon-fri-start', true )) ? get_post_meta( $post->ID, 'mon-fri-start', true ) : '';
			$mon_fri_close     = !empty(get_post_meta( $post->ID, 'mon-fri-close', true )) ? get_post_meta( $post->ID, 'mon-fri-close', true ) : '';
			if($mon_fri_slot){
				$mon_fri_string =  '<li><b>Mon – Fri:</b> '.date('g:i
 a', strtotime($mon_fri_start)).' - '.date('g:i
 a', strtotime($mon_fri_close)).'</li>';
				$slot_string .=  '<li><b>Mon – Fri:</b> '.date('g:i
 a', strtotime($mon_fri_start)).' - '.date('g:i
 a', strtotime($mon_fri_close)).'</li>';
			}else{
				$mon_fri_string = '';
				$slot_string .= '';
			}

			$monday_slot     = !empty(get_post_meta( $post->ID, 'monday', true )) ? get_post_meta( $post->ID, 'monday', true ) : '';
			$monday_start     = !empty(get_post_meta( $post->ID, 'monday-start', true )) ? get_post_meta( $post->ID, 'monday-start', true ) : '';
			$monday_close     = !empty(get_post_meta( $post->ID, 'monday-close', true )) ? get_post_meta( $post->ID, 'monday-close', true ) : '';
			if($monday_slot){
				$monday_string =  '<li><b>Monday:</b> '.date('g:i
 a', strtotime($monday_start)).' - '.date('g:i
 a', strtotime($monday_close)).'</li>';
				$slot_string .=  '<li><b>Monday:</b> '.date('g:i
 a', strtotime($monday_start)).' - '.date('g:i
 a', strtotime($monday_close)).'</li>';
			}else{
				$monday_string = '';
				$slot_string .= '';
			}

			$tuesday_slot     = !empty(get_post_meta( $post->ID, 'tuesday', true )) ? get_post_meta( $post->ID, 'tuesday', true ) : '';
			$tuesday_start     = !empty(get_post_meta( $post->ID, 'tuesday-start', true )) ? get_post_meta( $post->ID, 'tuesday-start', true ) : '';
			$tuesday_close     = !empty(get_post_meta( $post->ID, 'tuesday-close', true )) ? get_post_meta( $post->ID, 'tuesday-close', true ) : '';
			if($tuesday_slot){
				$tuesday_string =  '<li><b>Tuesday:</b> '.date('g:i
 a', strtotime($tuesday_start)).' - '.date('g:i
 a', strtotime($tuesday_close)).'</li>';
				$slot_string .=  '<li><b>Tuesday:</b> '.date('g:i
 a', strtotime($tuesday_start)).' - '.date('g:i
 a', strtotime($tuesday_close)).'</li>';
			}else{
				$tuesday_string = '';
				$slot_string .= '';
			}

			$wednesday_slot     = !empty(get_post_meta( $post->ID, 'wednesday', true )) ? get_post_meta( $post->ID, 'wednesday', true ) : '';
			$wednesday_start     = !empty(get_post_meta( $post->ID, 'wednesday-start', true )) ? get_post_meta( $post->ID, 'wednesday-start', true ) : '';
			$wednesday_close     = !empty(get_post_meta( $post->ID, 'wednesday-close', true )) ? get_post_meta( $post->ID, 'wednesday-close', true ) : '';
			if($wednesday_slot){
				$wednesday_string =  '<li><b>Wednesday:</b> '.date('g:i
 a', strtotime($wednesday_start)).' - '.date('g:i
 a', strtotime($wednesday_close)).'</li>';
				$slot_string .=  '<li><b>Wednesday:</b> '.date('g:i
 a', strtotime($wednesday_start)).' - '.date('g:i
 a', strtotime($wednesday_close)).'</li>';
			}else{
				$wednesday_string = '';
				$slot_string .= '';
			}

			$thursday_slot     = !empty(get_post_meta( $post->ID, 'thursday', true )) ? get_post_meta( $post->ID, 'thursday', true ) : '';
			$thursday_start     = !empty(get_post_meta( $post->ID, 'thursday-start', true )) ? get_post_meta( $post->ID, 'thursday-start', true ) : '';
			$thursday_close     = !empty(get_post_meta( $post->ID, 'thursday-close', true )) ? get_post_meta( $post->ID, 'thursday-close', true ) : '';
			if($thursday_slot){
				$thursday_string =  '<li><b>Thursday:</b> '.date('g:i
 a', strtotime($thursday_start)).' - '.date('g:i
 a', strtotime($thursday_close)).'</li>';
				$slot_string .=  '<li><b>Thursday:</b> '.date('g:i
 a', strtotime($thursday_start)).' - '.date('g:i
 a', strtotime($thursday_close)).'</li>';
			}else{
				$thursday_string = '';
				$slot_string .= '';
			}

			$friday_slot     = !empty(get_post_meta( $post->ID, 'friday', true )) ? get_post_meta( $post->ID, 'friday', true ) : '';
			$friday_start     = !empty(get_post_meta( $post->ID, 'friday-start', true )) ? get_post_meta( $post->ID, 'friday-start', true ) : '';
			$friday_close     = !empty(get_post_meta( $post->ID, 'friday-close', true )) ? get_post_meta( $post->ID, 'friday-close', true ) : '';
			if($friday_slot){
				$friday_string =  '<li><b>Friday:</b> '.date('g:i
 a', strtotime($friday_start)).' - '.date('g:i
 a', strtotime($friday_close)).'</li>';
				$slot_string .=  '<li><b>Friday:</b> '.date('g:i
 a', strtotime($friday_start)).' - '.date('g:i
 a', strtotime($friday_close)).'</li>';
			}else{
				$friday_string = '';
				$slot_string .= '';
			}

			$saturday_slot     = !empty(get_post_meta( $post->ID, 'saturday', true )) ? get_post_meta( $post->ID, 'saturday', true ) : '';
			$saturday_start     = !empty(get_post_meta( $post->ID, 'saturday-start', true )) ? get_post_meta( $post->ID, 'saturday-start', true ) : '';
			$saturday_close     = !empty(get_post_meta( $post->ID, 'saturday-close', true )) ? get_post_meta( $post->ID, 'saturday-close', true ) : '';
			if($saturday_slot){
				$saturday_string =  '<li><b>Saturday:</b> '.date('g:i
 a', strtotime($saturday_start)).' - '.date('g:i
 a', strtotime($saturday_close)).'</li>';
				$slot_string .=  '<li><b>Saturday:</b> '.date('g:i
 a', strtotime($saturday_start)).' - '.date('g:i
 a', strtotime($saturday_close)).'</li>';
			}else{
				$saturday_string = '';
				$slot_string .= '';
			}

			$sunday_slot     = !empty(get_post_meta( $post->ID, 'sunday', true )) ? get_post_meta( $post->ID, 'sunday', true ) : '';
			$sunday_start     = !empty(get_post_meta( $post->ID, 'sunday-start', true )) ? get_post_meta( $post->ID, 'sunday-start', true ) : '';
			$sunday_close     = !empty(get_post_meta( $post->ID, 'sunday-close', true )) ? get_post_meta( $post->ID, 'sunday-close', true ) : '';
			if($sunday_slot){
				$sunday_string =  '<li><b>Sunday:</b> '.date('g:i
 a', strtotime($sunday_start)).' - '.date('g:i
 a', strtotime($sunday_close)).'</li>';
				$slot_string .= '<li><b>Sunday:</b> '.date('g:i
 a', strtotime($sunday_start)).' - '.date('g:i
 a', strtotime($sunday_close)).'</li>';
			}else{
				$sunday_string = '';
				$slot_string .='';
			}


			//Working hours slote end
			$cat_locations[$i]['ID'] = $post->ID;
			$cat_locations[$i]['title'] = $post_title;
			$cat_locations[$i]['address'] = $location_address;
			$cat_locations[$i]['location_phone'] = $location_phone;
			$cat_locations[$i]['slot'] = $slot_string;
			$cat_locations[$i]['link'] = get_permalink($post->ID);
			$cat_locations[$i]['lat'] = $location_latitude;
			$cat_locations[$i]['lng'] = $location_longitude;
		}
		wp_send_json_success($cat_locations);
	}else{
		wp_send_json_error('No locations found');
	}
    // in the end, returns success json data
    

    // or, on error, return error json data
    // wp_send_json_error([/ some data here /]);
}

function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
	if($count >=150){
		return '<span class="views_count">'.$count.' views</span>';
	}else{
		return '';
	}
    
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
   
/** LOCATION PAGE AVAILABLE SERVICE CATEGORY META BOX **/
add_action( 'add_meta_boxes', 'location_avaiable_service_category_custom_meta_box' );

function location_avaiable_service_category_custom_meta_box($post){
	$post_types = array('location');
    add_meta_box(
		'avaiable_services_category_metadata', 
		'Available Service Category', 
		'available_services_category_meta_box',
		$post_types, 
		'side', 
		'high');
}


add_action('save_post', 'available_services_category_save_meta_box');
function available_services_category_save_meta_box(){
    global $post;	
	// if($post->post_type == "location"){
		if(isset($_POST["available_service_category"])){
			$service_categories = implode(',',$_POST["available_service_category"]);
			
			//UPDATE: 
			$meta_element_class = $service_categories;
			//END OF UPDATE

			update_post_meta($post->ID, 'available_service_category', $meta_element_class); 
			
		}else{
			update_post_meta($post->ID, 'available_service_category', []);
		}
	// }
}

function available_services_category_meta_box($post){
    $meta_element_class = get_post_meta( $post->ID, 'available_service_category', true );
	if($meta_element_class){
		$getServiceCategories = explode(',',$meta_element_class);
	}else{
		$getServiceCategories = [];
	}
	

		$args = array(
			'taxonomy' => 'services_category',
			'orderby' => 'name',
			'order'   => 'ASC'
		);

		$top_service_categories = get_categories($args);
		// echo '<pre>';
		// print_r($top_service_categories);
		// print_r($getServiceCategories);
		// echo '</pre>';
	?>
    <select multiple name="available_service_category[]" id="available_service_category" <?php echo $meta_element_class;  ?>>
		<?php foreach ( $top_service_categories as $top_service_category ) : 
			$selected = in_array($top_service_category->term_id,$getServiceCategories)?'selected':'';
			?>
			<option value="<?php echo esc_attr( $top_service_category->term_id ); ?>" <?php echo $selected; ?>><?php echo esc_html( $top_service_category->name ); ?></option>
		<?php endforeach; ?>
    </select>
	<style>
		.select2-container{
			width:100% !important;
		}
	</style>
	<script>
		jQuery(document).ready(function() {
			jQuery('#available_service_category').select2({
				placeholder: "Select Aviable Service Category",
				allowClear: true
			});
		});
	</script>
<?php }


// LOCATION AVAILABLE SERVICES TAXONOMY
add_action( 'init', 'create_available_service_tag_taxonomy', 0 );
  
function create_available_service_tag_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Available Services', 'taxonomy general name' ),
    'singular_name' => _x(
 'Available Service', 'taxonomy singular name' ),
    'search_items' =>  __( 'Available Services' ),
    'all_items' => __( 'All Available Services' ),
    'parent_item' => __( 'Parent Available Service' ),
    'parent_item_colon' => __( 'Parent Available Service:' ),
    'edit_item' => __( 'Edit Available Service' ), 
    'update_item' => __( 'Update Available Service' ),
    'add_new_item' => __( 'Add New Available Service' ),
    'new_item_name' => __( 'New Available Service Name' ),
    'menu_name' => __( 'Available Services' ),
  );    
 
  register_taxonomy('available_services',array('location'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'available_services' ),
  ));
 
}

function pre($arr, $status=0){
	if(is_array($arr) || is_object($arr)){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}else{
		echo $arr;
	}
	if($status){
		exit;
	}
}

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 9;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $cat = (isset($_POST['pageNumber'])) ? $_POST['cat'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'cat' => $cat,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

	if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
		$permalink = get_permalink();
		$post_thumbnail = get_the_post_thumbnail();
		$title = get_the_title();
		$author_posts_link = get_the_author_posts_link();
		$content = wp_trim_words(get_the_content(), 24, '...');
        $out .= '<div class="col-12 col-sm-12 col-md-6 col-lg-4 most-blog-pad"><div id="post-'.get_the_ID().'"><div class="blog-image"><a href="'.$permalink.'">';
                    if ( has_post_thumbnail() ) {
                        $out .= $post_thumbnail;
                        } else { 
                        $out .= '<img src="'.bloginfo('template_directory').'/assets/images/placeholder.png" alt="'.$title.'" />';
                	}
				$out .='</a></div>';

				$out .='<div class="blog-title"><h2><a href="'.$permalink.'">'.$title.'</a></h2></div><div class="blog-description"><p>'.$content.'</p></div><div class="row align-items-center"><div class="col-lg-8 col-md-12 col-sm-8 col-8"><div class="green_blog_btn">'.$author_posts_link.'</div></div><div class="col-lg-4  col-md-12  col-sm-4 col-4  text-end  share_block"><div class="dropdown"><button class="btn btn-secondary dropdown-toggle share_btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Share</button><ul class="dropdown-menu social_icon_inline" aria-labelledby="dropdownMenuButton1"><li class="tw"><a href="https://twitter.com/share?url='.$permalink.'&text='.$title.'" target="_blank" title="Twitter">Twitter</a></li><li class="in"><a href="http://www.linkedin.com/shareArticle?url='.$permalink.'" target="_blank" title="Linkedin">Linkedin</a></li><li class="ins"><a href="#" target="_blank" title="Instagram">Instagram</a></li></ul></div></div></div></div></div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


/* SERVICE PAGE AVAILABLE LOCATIONS META BOX */
add_action( 'add_meta_boxes', 'service_available_location_meta_box' );

function service_available_location_meta_box($post){
	$post_types = array('services');
    add_meta_box(

		'service_avaiable_location_metadata', 
		'Available Locations', 
		'service_avaiable_location_meta_box',
		$post_types, 
		'side', 
		'high');
}


add_action('save_post', 'service_avaiable_location_save_meta_box');
function service_avaiable_location_save_meta_box(){
    global $post;	
	// if($post->post_type == "location"){
		if(isset($_POST["service_avaiable_location"])){
			$locations = implode(',',$_POST["service_avaiable_location"]);
			
			//UPDATE: 
			$meta_element_class = $locations;
			//END OF UPDATE

			update_post_meta($post->ID, 'service_avaiable_location', $meta_element_class); 
			
		}else{
			update_post_meta($post->ID, 'service_avaiable_location', []);
		}
	// }
}

function service_avaiable_location_meta_box($post){
    $meta_element_class = get_post_meta( $post->ID, 'service_avaiable_location', true );
	if($meta_element_class){
		$getAvailableLocations = explode(',',$meta_element_class);
	}else{
		$getAvailableLocations = [];
	}
	

		$locations = get_posts([
		'post_type' => 'location',
		'post_status' => 'publish',
		'numberposts' => -1,
		'orderby' => 'title',
		'order'    => 'ASC'
	  ]);

		// echo '<pre>';
		// print_r($locations);
		// print_r($getAvailableLocations);
		// echo '</pre>';
	?>
    <select multiple name="service_avaiable_location[]" id="service_avaiable_location" <?php echo $meta_element_class;  ?>>
		<?php foreach ( $locations as $location ) : 
			$selected = in_array($location->ID,$getAvailableLocations)?'selected':'';
			?>
			<option value="<?php echo esc_attr( $location->ID ); ?>" <?php echo $selected; ?>><?php echo esc_html( $location->post_title ); ?></option>
		<?php endforeach; ?>
    </select>
	<style>
		.select2-container{
			width:100% !important;
		}
	</style>
	<script>
		jQuery(document).ready(function() {
			jQuery('#service_avaiable_location').select2({
				placeholder: "Select Aviable Locations",
				allowClear: true
			});
		});
	</script>
<?php }

/**************************Press Releases CUSTOM POST TYPE START******************** */

// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Press Release', 'Post Type General Name', 'naomedical_theme' ),
	'singular_name'       => _x( 'Press Release', 'Post Type Singular Name', 'naomedical_theme' ),
	'menu_name'           => __( 'What\'s New', 'naomedical_theme' ),
	'parent_item_colon'   => __( 'Parent Press Release', 'naomedical_theme' ),
	'all_items'           => __( 'All Press Releases', 'naomedical_theme' ),
	'view_item'           => __( 'View Press Release', 'naomedical_theme' ),
	'add_new_item'        => __( 'Add New Press Release', 'naomedical_theme' ),
	'add_new'             => __( 'Add New', 'naomedical_theme' ),
	'edit_item'           => __( 'Edit Press Release', 'naomedical_theme' ),
	'update_item'         => __( 'Update Press Release', 'naomedical_theme' ),
	'search_items'        => __( 'Search Press Release', 'naomedical_theme' ),
	'not_found'           => __( 'Not Found', 'naomedical_theme' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'Press Release', 'naomedical_theme' ),
	'description'         => __( 'Press release news', 'naomedical_theme' ),
	'labels'              => $labels,
	// Features this CPT supports in Post Editor
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	
	'taxonomies'          => array( 'category' ),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/ 
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
	'show_in_rest' 		  => true,
	'rewrite'             => [ 'slug' => 'press-release' , 'with_front' => false],

);


// Registering your Custom Post Type
register_post_type( 'press_release', $args );

/**************************Press Releases CUSTOM POST TYPE END******************** */

/**************************Media Coverage CUSTOM POST TYPE START******************** */

// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Media Coverage', 'Post Type General Name', 'naomedical_theme' ),
	'singular_name'       => _x( 'Media Coverage', 'Post Type Singular Name', 'naomedical_theme' ),
	'menu_name'           => __( 'Media Coverage', 'naomedical_theme' ),
	'parent_item_colon'   => __( 'Parent Media Coverage', 'naomedical_theme' ),
	'all_items'           => __( 'All Media Coverages', 'naomedical_theme' ),
	'view_item'           => __( 'View Media Coverage', 'naomedical_theme' ),
	'add_new_item'        => __( 'Add New Media Coverage', 'naomedical_theme' ),
	'add_new'             => __( 'Add New', 'naomedical_theme' ),
	'edit_item'           => __( 'Edit Media Coverage', 'naomedical_theme' ),
	'update_item'         => __( 'Update Media Coverage', 'naomedical_theme' ),
	'search_items'        => __( 'Search Media Coverage', 'naomedical_theme' ),
	'not_found'           => __( 'Not Found', 'naomedical_theme' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'Media Coverage', 'naomedical_theme' ),
	'description'         => __( 'Media Coverage news', 'naomedical_theme' ),
	'labels'              => $labels,
	// Features this CPT supports in Post Editor
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	
	'taxonomies'          => array( 'category' ),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/ 
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => 'edit.php?post_type=press_release',
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
	'show_in_rest' => true,
	'rewrite'           => [ 'slug' => 'media-coverage', 'with_front' => false],

);


// Registering your Custom Post Type
register_post_type( 'media_coverage', $args );


add_action( 'admin_init', 'remove_press_release_default_type' );

function remove_press_release_default_type() {
	 
	//******************************Remove default functions for custom post types in add and edit page start****************************
	$custom_post_type['post_type'] = array('media_coverage');
	if(!empty($custom_post_type['post_type'])){
		foreach($custom_post_type['post_type'] as $types){
			remove_post_type_support($types, 'title');
			remove_post_type_support($types, 'editor');
			remove_post_type_support($types, 'revisions');
			remove_post_type_support($types, 'Comments');
			remove_post_type_support($types, 'excerpt');
			remove_post_type_support($types, 'post-thumbnails');
			remove_post_type_support($types, 'postbox-container-2', 10, 1);
			remove_meta_box('wpseo_meta',$types,'normal');
		}
	}
}

/**
 * Register meta box(es).
 */

function media_coverage_register_meta_boxes() {
    add_meta_box( 'meta-box-id-media-coverage', __( 'Basic Information', 'textdomain' ), 'media_coverage_my_display_callback', 'media_coverage' );
}
add_action( 'add_meta_boxes', 'media_coverage_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function media_coverage_my_display_callback( $post ) {
	// Display code/markup goes here. Don't forget to include nonces!
	global $post;
	//echo  get_theme_file_path( __FILE__ );

	require_once get_theme_file_path( 'media_coverage_basic_info.php' );
}
add_action( 'save_post',  'custom_post_type_media_coverage_save_post', 10, 1 );


function custom_post_type_media_coverage_save_post() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post start****************
		
		if($post->post_type == 'media_coverage'){
			$post_id = $post->ID;
			//Fisrtname
			update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
			$post_title = $_POST['post_title'];
			$where = array( 'ID' => $post_id );
			$wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
			update_post_meta( $post_id, 'media_name', $_POST['media_name'] );
			update_post_meta( $post_id, 'link', $_POST['link'] );
			// update_post_meta( $post_id, 'suffix', $_POST['suffix'] );
			// update_post_meta( $post_id, 'email', $_POST['email'] );
				
				
		}
		//********Save post end****************	
			
		}
	}


add_filter( 'manage_media_coverage_posts_columns', 'custom_post_media_coverage_columns', 10, 2 );
function custom_post_media_coverage_columns( $columns ) {
	
    unset(
	//   $columns['author'],
	  $columns['comments'],
	  $columns['post_views'],
	//   $columns['date'],
	);
	$columns['inc_media'] = __( 'Media', 'nao_live' );
	return $columns;
// }
}


add_action( 'manage_media_coverage_posts_custom_column' , 'custom_media_coverage_column', 10, 2 );
function custom_media_coverage_column( $column, $post_id ) {

    switch ( $column ) {

        case 'inc_media' :
			echo get_post_meta( $post_id, 'media_name', true );

    }
}

/**************************Media Coverage CUSTOM POST TYPE END*********************/

/**************************Nao Partnership CUSTOM POST TYPE START*********************/

// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Nao Partnership', 'Post Type General Name', 'naomedical_theme' ),
	'singular_name'       => _x( 'Nao Partnership', 'Post Type Singular Name', 'naomedical_theme' ),
	'menu_name'           => __( 'Nao Partnership', 'naomedical_theme' ),
	'parent_item_colon'   => __( 'Parent Nao Partnership', 'naomedical_theme' ),
	'all_items'           => __( 'All Nao Partnerships', 'naomedical_theme' ),
	'view_item'           => __( 'View Nao Partnership', 'naomedical_theme' ),
	'add_new_item'        => __( 'Add New Nao Partnership', 'naomedical_theme' ),
	'add_new'             => __( 'Add New', 'naomedical_theme' ),
	'edit_item'           => __( 'Edit Nao Partnership', 'naomedical_theme' ),
	'update_item'         => __( 'Update Nao Partnership', 'naomedical_theme' ),
	'search_items'        => __( 'Search Nao Partnership', 'naomedical_theme' ),
	'not_found'           => __( 'Not Found', 'naomedical_theme' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'Nao Partnership', 'naomedical_theme' ),
	'description'         => __( 'Nao Partnership news', 'naomedical_theme' ),
	'labels'              => $labels,
	// Features this CPT supports in Post Editor
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	
	'taxonomies'          => array( 'category' ),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/ 
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => 'edit.php?post_type=press_release',
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
	'show_in_rest' => true,
	// 'rewrite'           => [ 'slug' => 'partnerships', 'with_front' => false],

);


// Registering your Custom Post Type
register_post_type( 'nao_partnership', $args );


add_action( 'admin_init', 'remove_nao_partnership_default_type' );

function remove_nao_partnership_default_type() {
	 
	//******************************Remove default functions for custom post types in add and edit page start****************************
	$custom_post_type['post_type'] = array('nao_partnership');
	if(!empty($custom_post_type['post_type'])){
		foreach($custom_post_type['post_type'] as $types){
			remove_post_type_support($types, 'title');
			remove_post_type_support($types, 'editor');
			remove_post_type_support($types, 'revisions');
			remove_post_type_support($types, 'Comments');
			remove_post_type_support($types, 'excerpt');
			remove_post_type_support($types, 'post-thumbnails');
			remove_post_type_support($types, 'postbox-container-2', 10, 1);
			remove_meta_box('wpseo_meta',$types,'normal');
		}
	}
}

/**
 * Register meta box(es).
 */

function nao_partnership_register_meta_boxes() {
    add_meta_box( 'meta-box-id-nao-partnership', __( 'Basic Information', 'textdomain' ), 'nao_partnership_my_display_callback', 'nao_partnership' );
}
add_action( 'add_meta_boxes', 'nao_partnership_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function nao_partnership_my_display_callback( $post ) {
	// Display code/markup goes here. Don't forget to include nonces!
	global $post;
	//echo  get_theme_file_path( __FILE__ );

	require_once get_theme_file_path( 'nao_partnership_basic_info.php' );
}
add_action( 'save_post',  'custom_post_type_nao_partnership_save_post', 10, 1 );


function custom_post_type_nao_partnership_save_post() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post start****************
		
		if($post->post_type == 'nao_partnership'){
			$post_id = $post->ID;
		//Fisrtname
				update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
				$post_title = $_POST['post_title'];
				 $where = array( 'ID' => $post_id );
				 $wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
				update_post_meta( $post_id, 'brand', $_POST['brand'] );
				update_post_meta( $post_id, 'partner_logo', $_POST['partner_logo'] );
				update_post_meta( $post_id, 'youtube_video_link', $_POST['youtube_video_link'] );
				// update_post_meta( $post_id, 'suffix', $_POST['suffix'] );
				// update_post_meta( $post_id, 'email', $_POST['email'] );
				
				
			}
		//********Save post end****************	
			
		}
	}


add_filter( 'manage_nao_partnership_posts_columns', 'custom_post_nao_partnership_columns', 10, 2 );
function custom_post_nao_partnership_columns( $columns ) {
	
    unset(
	//   $columns['author'],
	  $columns['comments'],
	  $columns['post_views'],
	//   $columns['date'],
	);
	$columns['inc_media'] = __( 'Media', 'nao_live' );
	return $columns;
// }
}


add_action( 'manage_nao_partnership_posts_custom_column' , 'custom_nao_partnership_column', 10, 2 );
function custom_nao_partnership_column( $column, $post_id ) {

    switch ( $column ) {

        case 'inc_media' :
			echo get_post_meta( $post_id, 'media_name', true );

    }
}

/**************************Nao Partnership CUSTOM POST TYPE END******************** */



/**************************Community + Event CUSTOM POST TYPE START******************** */

// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Community Event', 'Post Type General Name', 'naomedical_theme' ),
	'singular_name'       => _x( 'Community Event', 'Post Type Singular Name', 'naomedical_theme' ),
	'menu_name'           => __( 'What\'s New', 'naomedical_theme' ),
	'parent_item_colon'   => __( 'Parent Community Event', 'naomedical_theme' ),
	'all_items'           => __( 'All Community Events', 'naomedical_theme' ),
	'view_item'           => __( 'View Community Event', 'naomedical_theme' ),
	'add_new_item'        => __( 'Add New Community Event', 'naomedical_theme' ),
	'add_new'             => __( 'Add New', 'naomedical_theme' ),
	'edit_item'           => __( 'Edit Community Event', 'naomedical_theme' ),
	'update_item'         => __( 'Update Community Event', 'naomedical_theme' ),
	'search_items'        => __( 'Search Community Event', 'naomedical_theme' ),
	'not_found'           => __( 'Not Found', 'naomedical_theme' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'Community Event', 'naomedical_theme' ),
	'description'         => __( 'Community Event news', 'naomedical_theme' ),
	'labels'              => $labels,
	// Features this CPT supports in Post Editor
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	
	'taxonomies'          => array( 'category' ),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/ 
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        =>'edit.php?post_type=press_release',
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
	'show_in_rest' 		  => true,
	'rewrite'             => [ 'slug' => 'community-event' , 'with_front' => false],

);


// Registering your Custom Post Type
register_post_type( 'community_events', $args );

/**************************Community + Events  CUSTOM POST TYPE END******************** */





function load_more_post_ajax(){
	// pre($_POST);
    $post_length = (isset($_POST["post_length"])) ? $_POST["post_length"] : 9;
    $post_type = (isset($_POST['post_type'])) ? $_POST['post_type'] : '';
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    // $cat = (isset($_POST['pageNumber'])) ? $_POST['cat'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => $post_type,
        'posts_per_page' => $post_length,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);
	// pre($loop->posts);
    $out = '';
	if($post_type == 'media_coverage'){
		$out .='<div class="col-md-12 col-sm-12 col-12 media_coverage_list">
		<div class="row">';
	}
	$i=0;
	if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
		$permalink = get_permalink();
		$title = get_the_title();
		$post_thumbnail = get_the_post_thumbnail();			
		$date = get_the_date();
		$post = $loop->post;
		if($post_type == 'press_release'){
			
			
			$out .= '<a href="'.$permalink.'" class="press-max-link"><div class="col-md-12 col-sm-12 col-12 press-release-div"><div class="press_release_img">';
				if ( has_post_thumbnail() ) {
					$out .= $post_thumbnail;
					} else { 
					$out .= '<img src="'.get_template_directory_uri().'/assets/images/placeholder.png" alt="'.$title.'" />';
				}
			$out .='</div>';

			$out .='<div class="press_release_content"><label>'.$date.'</label><p>'.$title.'</p><div class=""><a href="'.$permalink.'" class="press_readmore">Read More </a></div></div></div></a>';
		}else if($post_type == 'media_coverage'){
			$media_name 		= !empty(get_post_meta( $post->ID, 'media_name', true )) ? get_post_meta( $post->ID, 'media_name', true ) : '';
            $link 		= !empty(get_post_meta( $post->ID, 'link', true )) ? get_post_meta( $post->ID, 'link', true ) : ''; 
			if($i % 3 == 0 && $i != 0) { 
				$out .='</div></div>
				<div class="col-md-12 col-sm-12 col-12 media_coverage_list">
				<div class="row">';
			}
			$out .='<div class="col-md-4 col-sm-12 col-12">
				<a href="'.$link.'">
					<div class="media_coverage_content">
						<label>'.$media_name.'</label>
						<p>'.$title.'</p>
						<div>
							<a href="'.$link.'" class="press_readmore">Read More</a>
						</div>
					</div>
				</a>
			</div>';
			
		}
		$i++;
    endwhile;
	if($post_type == 'media_coverage'){
		$out .='</div></div>';
	}
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_load_more_post_ajax', 'load_more_post_ajax');
add_action('wp_ajax_load_more_post_ajax', 'load_more_post_ajax');


/*** contactform thankyou redirecting */
add_action( 'wp_footer', 'mycustom_wp_footer' );
  
function mycustom_wp_footer() {
?>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
	console.log(event.detail.inputs);
	var get_inputs = event.detail.inputs;
	var redirect_link = '';
	get_inputs.find((input)=>{
		if(input.name == 'thankyouURL'){
			redirect_link = input.value;
		}
	});
	console.log(redirect_link);
	if(redirect_link != ''){
		location = redirect_link;
	}	
	
}, false );
</script>
<?php
}

/*** VISUAL EDITOR META BOX - Service Schema script */

define('WYSIWYG_META_BT_BOX_ID', 'bulk-testing-editor');
define('WYSIWYG_BT_EDITOR_ID', 'bulktestingeditor'); //Important for CSS that this is different
define('WYSIWYG_BT_META_KEY', 'extra-content');
define('WYSIWYG_CONTENT_BT_META_BOX_ID', 'bulk-testing-content');
define('WYSIWYG_CONTENT_BT_EDITOR_ID', 'bulk-testing-content');

add_action('admin_init', 'wysiwyg_register_bulk_testing_meta_box');
function wysiwyg_register_bulk_testing_meta_box(){
		$post_types = array('page');
		add_meta_box(WYSIWYG_META_BT_BOX_ID, __('BULK TESTING SECTION', 'wysiwyg'), 'wysiwyg_render_bulk_testing_meta_box', $post_types);
}

function wysiwyg_render_bulk_testing_meta_box(){
	
		global $post;
		
		$meta_box_id = WYSIWYG_CONTENT_BT_META_BOX_ID;
		$editor_id = WYSIWYG_CONTENT_BT_EDITOR_ID;
		$title = get_post_meta( $post->ID, 'bulk_testing_title', true );
		
		//Add CSS jQuery goodness to make this work like the original WYSIWYG
		echo "
		<p>
			<input type='text' placeholder='Title' name='bulk_testing_title' class='widefat' value='$title'>
		</p>
				<style type='text/css'>
						#$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
						#$meta_box_id #$editor_id{width:100%;}
						#$meta_box_id #editorcontainer{background:#fff !important;}
						#$meta_box_id {display:none;}
						#bulk-testing-tmce{display:none;}
				</style>
			
				<script type='text/javascript'>
						jQuery(function($){
							
								$('#bulk-testing-tmce').attr('onclick', null);
								$('#$meta_box_id #editor-toolbar > a').click(function(){
										$('#$meta_box_id #editor-toolbar > a').removeClass('active');
										$(this).addClass('active');
								});
								
								if($('#$meta_box_id #edButtonPreview').hasClass('active')){
										$('#$meta_box_id #ed_toolbar').hide();
								}
								
								$('#$meta_box_id #edButtonPreview').click(function(){
										$('#$meta_box_id #ed_toolbar').hide();
								});
								
								$('#$meta_box_id #edButtonHTML').click(function(){
										$('#$meta_box_id #ed_toolbar').show();
								});		
							   //  setTimeout(function(){
							   // 	 tinymce.execCommand( 'mceRemoveEditor', false, 'bulk-testing' );
							   // 	 tinymce.execCommand( 'mceAddEditor', false, 'bulk-testing' );
							   //  }, 1000);					
								
						});
				</script>
		";
		
		$description = get_post_meta( $post->ID, 'bulk-testing', true );
		$content   = html_entity_decode($description);
		$editor_id = 'bulk-testing';
		$settings  = array( 'media_buttons' => false );
		
		wp_editor( $content, $editor_id, $settings );
		
		//Clear The Room!
		echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_bulk_testing_save_meta');
function wysiwyg_bulk_testing_save_meta(){
		global $post;
		$editor_id = 'bulk-testing';
		$meta_key = 'bulk-testing';

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		
		//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
		update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
		
		$title = $_POST['bulk_testing_title'];
		update_post_meta( $post->ID, 'bulk_testing_title', $title );
}

/*****
 * Service Schema script End
 */

 
 /*** AVAILABLE AT SERVICE META BOX FOR SERVICE POST */

 add_action( 'add_meta_boxes', 'available_bulk_testing_custom_meta_box' );

 function available_bulk_testing_custom_meta_box($post){
	 $post_types = array('services');
	 add_meta_box(
		 'available_bulk_testing_metadata', 
		 'Bulk Testing', 
		 'available_bulk_testing_meta_box',
		 $post_types, 
		 'side', 
		 'high');
 }
 
add_action('save_post', 'available_bulk_testing_save_meta_box');
function available_bulk_testing_save_meta_box(){
	 global $post;
	 // print_r($_POST["top_service"]); exit;
	 
	 if($post->post_type == "services"){
		 if(isset($_POST["available_bulk_testing"])){
			 $available_bulk_testing = $_POST["available_bulk_testing"];
		 }else{
			$available_bulk_testing = false;
		 }
		 
 
		 update_post_meta($post->ID, 'available_bulk_testing', $available_bulk_testing); 
		 
	 }
 }
 
 function available_bulk_testing_meta_box($post){
	 $getService = get_post_meta( $post->ID, 'available_bulk_testing', true );
	 
	 ?>
	 <input type="checkbox" id="available_bulk_testing" name="available_bulk_testing" value="true" <?php echo ($getService) ? 'checked="checked"' : ''; ?>>
	 <label for="available_bulk_testing"></label>Available bulk testing Inquiries<br>
 <?php }

 /*****SERVICE CPT TAGS******/
 //add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
// function create_tag_taxonomies() 
// {
//   // Add new taxonomy, NOT hierarchical (like tags)
//   $labels = array(
//     'name' => _x( 'Tags', 'taxonomy general name' ),
//     'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
//     'search_items' =>  __( 'Search Tags' ),
//     'popular_items' => __( 'Popular Tags' ),
//     'all_items' => __( 'All Tags' ),
//     'parent_item' => null,
//     'parent_item_colon' => null,
//     'edit_item' => __( 'Edit Tag' ), 
//     'update_item' => __( 'Update Tag' ),
//     'add_new_item' => __( 'Add New Tag' ),
//     'new_item_name' => __( 'New Tag Name' ),
//     'separate_items_with_commas' => __( 'Separate tags with commas' ),
//     'add_or_remove_items' => __( 'Add or remove tags' ),
//     'choose_from_most_used' => __( 'Choose from the most used tags' ),
//     'menu_name' => __( 'Tags' ),
//   ); 

//   register_taxonomy('tag','services',array(
//     'hierarchical' => false,
//     'labels' => $labels,
//     'show_ui' => true,
// 	'show_admin_column' => true,
// 	'show_in_rest' =>true,
//     'update_count_callback' => '_update_post_term_count',
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'tag' ),
//   ));
// }
// ///////////////////Block /////////////////////////////////
function pages_with_category_and_tag_register(){
	/*add categories and tags to pages*/
	// Register taxonomy
	$cat_labels = array(
		'name'              => _x( 'Category', 'Category' ),
		'singular_name'     => _x( 'Category', 'Category' ),
		'search_items'      => __( 'Search Category' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Category' ),
	);
	$cat_args = array(
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'        => true,
		'rewrite'           => [ 'slug' => 'page' ],
	);
	register_taxonomy( 'page-category', [ 'page' ], $cat_args );
}
add_action( 'init', 'pages_with_category_and_tag_register');


/* Custom Short Code - Testimonials */
function service_carousel($attr=[]) {
	ob_start();
	extract(
		shortcode_atts(
		  array(
			'title' => '',
			'description' => '',
			'post_ids' => '',
			'class' => '',
			'button_link' =>'',
		),
	  $attr)
	);
	$service_ids = explode(",",$post_ids); ?>
	<div class="main-service-overall">
		<div class="services-slider-one <?php echo $class; ?>">
			<div class="container">
				<div class="col-md-12 col-sm-12 col-12">
					<div class="service-slider-title">
						<h3><?php echo $title; ?></h3>
						<p><?php echo $description; ?></p>
						<?php
							if(!empty($button_link)){ ?>
								<div class="new-sb-button">
                                    <a class="wp-block-button__link" style="border-radius:6px" role="link" href="<?php echo $button_link; ?>">Learn More</a>
                                </div>
							<?php } ?>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-12 mainservices-slidlist <?php if(!empty($description)){ echo "categoryDesc"; } ?>"> 
					<div class="row">
						<div class="subservice-slider">
						<?php 
						if(is_array($service_ids)){
							foreach($service_ids as $service_id){
								$post = get_post($service_id);
								if($post){ 
									if($post->post_status == 'publish'){ 
									// pre($post);
									$appointment_url = !empty(get_post_meta( $post->ID, 'appointment_link', true )) ? get_post_meta(  $post->ID, 'appointment_link', true ) : 'https://naomedical.io/';	
									?>
									<div class="col-md-12 col-sm-12 col-12 hms-dym-box">
										<a href="<?php echo get_post_permalink($post->ID); ?>">
											<div  class="col-md-12 col-sm-12 col-12 ">
												<h3><?php echo get_the_title($post->ID); ?></h3>
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
														<a href="<?php echo get_post_permalink($post->ID); ?>" class="btn btn-learnmre">Learn More</a>
													</div>
													<div class="col-md-6 col-sm-12 col-6">
													<a href="javascript:void(0)" data-appointment_url="<?php echo $appointment_url; ?>" class="btn btn-booknow appointment_modal">Book Now</a>  
													</div>
												</div>
											</div>
										</a>
									</div>
									<?php
									}
								}
							}
							
						}					
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();   
} 
add_shortcode( 'service_carousel', 'service_carousel');
add_filter( 'manage_services_posts_columns', 'custom_post_service_columns', 10, 2 );
function custom_post_service_columns( $columns ) {
	
   
	$columns['service_id'] = __( 'Service ID', 'nao_live' );
	return $columns;
// }
}

add_action( 'manage_services_posts_custom_column' , 'custom_services_column', 10, 2 );
function custom_services_column( $column, $post_id ) {

    switch ( $column ) {

        case 'service_id' :
			echo $post_id;

    }
}
/*** COMING SOON META BOX FOR LOCATION POST */
add_action( 'add_meta_boxes', 'comingsoon_at_locations_custom_meta_box' );
function comingsoon_at_locations_custom_meta_box($post){
	$post_types = array('location');
	add_meta_box(
		'comingsoon_at_locations_metadata', 
		'Coming Soon', 
		'comingsoon_at_locations_meta_box',
		$post_types, 
		'side', 
		'high');
}
add_action('save_post', 'comingsoon_at_locations_save_meta_box');
function comingsoon_at_locations_save_meta_box(){
	global $post;
	// print_r($_POST["top_service"]); exit;
	
	if($post->post_type == "location"){
		if(isset($_POST["comingsoon_at_locations"])){
			$LocationStatus = $_POST["comingsoon_at_locations"];
		}else{
			$LocationStatus = false;
		}
		update_post_meta($post->ID, 'comingsoon_at_locations', $LocationStatus); 
	}
}
function comingsoon_at_locations_meta_box($post){
	$LocationStatus = get_post_meta( $post->ID, 'comingsoon_at_locations', true );
	
	?>
	<input type="checkbox" id="comingsoon_at_locations" name="comingsoon_at_locations" value="true" <?php echo ($LocationStatus) ? 'checked="checked"' : ''; ?>>
	<label for="comingsoon_at_locations">Coming Soon</label>
<?php }


/*
* Creating a function to Provider CPT
*/
  
function provider_custom_post_type() {

	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Providers', 'Post Type General Name', 'naomedical_theme' ),
			'singular_name'       => _x( 'Provider', 'Post Type Singular Name', 'naomedical_theme' ),
			'menu_name'           => __( 'Providers', 'naomedical_theme' ),
			'parent_item_colon'   => __( 'Parent Provider', 'naomedical_theme' ),
			'all_items'           => __( 'All Providers', 'naomedical_theme' ),
			'view_item'           => __( 'View Provider', 'naomedical_theme' ),
			'add_new_item'        => __( 'Add New Provider', 'naomedical_theme' ),
			'add_new'             => __( 'Add New', 'naomedical_theme' ),
			'edit_item'           => __( 'Edit Provider', 'naomedical_theme' ),
			'update_item'         => __( 'Update Provider', 'naomedical_theme' ),
			'search_items'        => __( 'Search Provider', 'naomedical_theme' ),
			'not_found'           => __( 'Not Found', 'naomedical_theme' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
		);
			
	// Set other options for Custom Post Type	
		$args = array(
			'label'               => __( 'Providers', 'naomedical_theme' ),
			'description'         => __( 'Provider news and reviews', 'naomedical_theme' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'genres' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
			//'rewrite' => [
			//	'slug' => 'providers/%top_provider%',
			//	'with_front' => false,
			//],
		);
			
		// Registering your Provider Post Type
		register_post_type( 'providers', $args );
		// Register taxonomy
		$cat_labels = array(
			'name'              => _x( 'Provider Department', 'Category' ),
			'singular_name'     => _x( 'Provider Department', 'Category' ),
			'search_items'      => __( 'Search Provider' ),
			'all_items'         => __( 'All Providers' ),
			'parent_item'       => __( 'Parent Provider Department' ),
			'parent_item_colon' => __( 'Parent Providers:' ),
			'edit_item'         => __( 'Edit Providers' ),
			'update_item'       => __( 'Update Providers' ),
			'add_new_item'      => __( 'Add New Provider Department' ),
			'new_item_name'     => __( 'New Providers Name' ),
			'menu_name'         => __( 'Departments' ),
		);
		$cat_args = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $cat_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'        => true,
			'rewrite'           => [ 'slug' => 'providers-category' ],
		);
		register_taxonomy( 'providers_category', [ 'providers' ], $cat_args );
		// flush_rewrite_rules();
	}
		  
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	add_action( 'init', 'provider_custom_post_type', 0 ); 



/**** NAME META BOX */

function add_provider_meta_boxes() {
	$post_types = array('providers');
    add_meta_box(
        "post_metadata_names_post", // div id containing rendered fields
        "Prodvider Info", // section heading displayed as text
        "post_meta_box_provider_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_provider_meta_boxes" );

// save field value
function save_provider_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
		update_post_meta( $post->ID, "_provider_job_position", sanitize_text_field( $_POST[ "_provider_job_position" ] ) ); 
		update_post_meta( $post->ID, "_provider_education", sanitize_textarea_field( $_POST[ "_provider_education" ] ) );
		update_post_meta( $post->ID, "_provider_board_cerificate", sanitize_textarea_field( $_POST[ "_provider_board_cerificate" ] ) );
		update_post_meta( $post->ID, "_provider_residency", sanitize_textarea_field( $_POST[ "_provider_residency" ] ) );
	}    
}
add_action( 'save_post', 'save_provider_meta_boxes' );

// callback function to render fields
function post_meta_box_provider_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	if (array_key_exists("_provider_education",$custom)){
		$provider_education = $custom[ "_provider_education" ][ 0 ];
 	}
	if (array_key_exists("_provider_board_cerificate",$custom)){
   		$provider_board_cerificate = $custom[ "_provider_board_cerificate" ][ 0 ];
	}
	if (array_key_exists("_provider_residency",$custom)){
		$provider_residency = $custom[ "_provider_residency" ][ 0 ];
 	}
	 
	if (array_key_exists("_provider_job_position",$custom)){
		$provider_job_position = $custom[ "_provider_job_position" ][ 0 ];
 	}
	
	echo "<label style='display:inline-block;width:100%;margin-bottom:10px'>Job Position</label><input type='text' class=\"form-control\" name=\"_provider_job_position\" value=\"".$provider_job_position."\" placeholder=\"Enter Job Position\">";
	echo "<br><br><label style='display:inline-block;width:100%;margin-bottom:10px'>Education <span>( <em>Enter a new line for the following information</em> )</span></label><textarea name=\"_provider_education\" placeholder=\"Enter Education\" style='width:100%; height:100px'>".$provider_education."</textarea>";
    echo "<br><br><label style='display:inline-block;width:100%;margin-bottom:10px'>Board Certification <span>( <em>Enter a new line for the following information</em> )</span></label><br/><textarea name=\"_provider_board_cerificate\" placeholder=\"Enter Board Certification\" style='width:100%; height:100px'>".$provider_board_cerificate."</textarea>";
    echo "<br><br><label style='display:inline-block;width:100%;margin-bottom:10px'>Residency <span>( <em>Enter a new line for the following information</em> )</span></label><br/><textarea name=\"_provider_residency\" placeholder=\"Enter Residency\" style='width:100%; height:100px'>".$provider_residency."</textarea>"; 
}

/**** VISUAL EDITOR META BOX - Why is health and wellness important to you? */ 

define('WYSIWYG_META_BOX_ID', 'provider-health-and-wellness-editor');
define('WYSIWYG_EDITOR_ID', 'providerhealthandwellnesseditor'); //Important for CSS that this is different
define('WYSIWYG_META_KEY', 'extra-content');
define('WYSIWYG_CONTENT_META_BOX_ID', 'provider-health-and-wellness-description');
define('WYSIWYG_CONTENT_EDITOR_ID', 'provider-health-and-wellness-description');

add_action('admin_init', 'wysiwyg_register_provider_health_and_wellness_meta_box'); 
function wysiwyg_register_provider_health_and_wellness_meta_box(){
		$post_types = array('providers');
        add_meta_box(WYSIWYG_META_BOX_ID, __('Why is health and wellness important to you?', 'wysiwyg'), 'wysiwyg_render_provider_health_and_wellness_meta_box', $post_types);
}

function wysiwyg_render_provider_health_and_wellness_meta_box(){
	global $post;
	$meta_box_id = WYSIWYG_CONTENT_META_BOX_ID;
	$editor_id = WYSIWYG_CONTENT_EDITOR_ID;
	//Add CSS jQuery goodness to make this work like the original WYSIWYG
	echo "
			<style type='text/css'>
					#$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
					#$meta_box_id #$editor_id{width:100%;}
					#$meta_box_id #editorcontainer{background:#fff !important;}
					#$meta_box_id #$editor_id_fullscreen{display:none;}
			</style>
		
			<script type='text/javascript'>
					jQuery(function($){
							$('#$meta_box_id #editor-toolbar > a').click(function(){
									$('#$meta_box_id #editor-toolbar > a').removeClass('active');
									$(this).addClass('active');
							});
							
							if($('#$meta_box_id #edButtonPreview').hasClass('active')){
									$('#$meta_box_id #ed_toolbar').hide();
							}
							
							$('#$meta_box_id #edButtonPreview').click(function(){
									$('#$meta_box_id #ed_toolbar').hide();
							});
							
							$('#$meta_box_id #edButtonHTML').click(function(){
									$('#$meta_box_id #ed_toolbar').show();
							});		
							setTimeout(function(){
								tinymce.execCommand( 'mceRemoveEditor', false, 'provider-health-and-wellness-description' );
								tinymce.execCommand( 'mceAddEditor', false, 'provider-health-and-wellness-description' );
							}, 1000);					
							
					});
			</script>
	";
	$description = get_post_meta( $post->ID, 'provider-health-and-wellness-description', true );
	$content   = html_entity_decode($description);
	$editor_id = 'provider-health-and-wellness-description';
	$settings  = array( 'media_buttons' => false );
	
	wp_editor( $content, $editor_id, $settings );
	//Clear The Room!
	echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_provider_health_and_wellness_save_meta');
function wysiwyg_provider_health_and_wellness_save_meta(){ 
	global $post;
	$editor_id = 'provider-health-and-wellness-description';
	$meta_key = 'provider-health-and-wellness-description';

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
	update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}



/**** VISUAL EDITOR META BOX - How do you approach or help your patients? */ 

define('WYSIWYG_PH_META_BOX_ID', 'provider-help-your-patients-editor'); 
define('WYSIWYG_PH_EDITOR_ID', 'providerhelpyourpatientseditor'); //Important for CSS that this is different
define('WYSIWYG_PH_META_KEY', 'extra-content');
define('WYSIWYG_PH_CONTENT_META_BOX_ID', 'provider-help-your-patients-description'); 
define('WYSIWYG_PH_CONTENT_EDITOR_ID', 'provider-help-your-patients-description');

add_action('admin_init', 'wysiwyg_register_provider_help_your_patients_meta_box');  
function wysiwyg_register_provider_help_your_patients_meta_box(){ 
		$post_types = array('providers');
        add_meta_box(WYSIWYG_PH_META_BOX_ID, __('How do you approach or help your patients?', 'wysiwyg'), 'wysiwyg_render_provider_help_your_patients_meta_box', $post_types);
}

function wysiwyg_render_provider_help_your_patients_meta_box(){
	global $post;
	$meta_box_id = WYSIWYG_PH_CONTENT_META_BOX_ID;
	$editor_id = WYSIWYG_PH_CONTENT_EDITOR_ID; 
	//Add CSS jQuery goodness to make this work like the original WYSIWYG
	echo "
			<style type='text/css'>
					#$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
					#$meta_box_id #$editor_id{width:100%;}
					#$meta_box_id #editorcontainer{background:#fff !important;}
					#$meta_box_id #$editor_id_fullscreen{display:none;}
			</style>
		
			<script type='text/javascript'>
					jQuery(function($){
							$('#$meta_box_id #editor-toolbar > a').click(function(){
									$('#$meta_box_id #editor-toolbar > a').removeClass('active');
									$(this).addClass('active');
							});
							
							if($('#$meta_box_id #edButtonPreview').hasClass('active')){
									$('#$meta_box_id #ed_toolbar').hide();
							}
							
							$('#$meta_box_id #edButtonPreview').click(function(){
									$('#$meta_box_id #ed_toolbar').hide();
							});
							
							$('#$meta_box_id #edButtonHTML').click(function(){
									$('#$meta_box_id #ed_toolbar').show();
							});		
							setTimeout(function(){
								tinymce.execCommand( 'mceRemoveEditor', false, 'provider-help-your-patients-description' );
								tinymce.execCommand( 'mceAddEditor', false, 'provider-help-your-patients-description' );
							}, 1000);					
							
					});
			</script>
	";
	$description = get_post_meta( $post->ID, 'provider-help-your-patients-description', true );
	$content   = html_entity_decode($description);
	$editor_id = 'provider-help-your-patients-description';
	$settings  = array( 'media_buttons' => false );
	
	wp_editor( $content, $editor_id, $settings );
	//Clear The Room!
	echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_provider_help_your_patients_save_meta');
function wysiwyg_provider_help_your_patients_save_meta(){ 
	global $post;
	$editor_id = 'provider-help-your-patients-description';
	$meta_key = 'provider-help-your-patients-description';

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
	update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}

/**** VISUAL EDITOR META BOX - Why do you love working at Nao Medical? */ 

define('WYSIWYG_WHY_META_BOX_ID', 'provider-whyworking-editor'); 
define('WYSIWYG_WHY_EDITOR_ID', 'providerhelpyourpatientseditor'); //Important for CSS that this is different
define('WYSIWYG_WHY_META_KEY', 'extra-content');
define('WYSIWYG_WHY_CONTENT_META_BOX_ID', 'provider-whyworking-description'); 
define('WYSIWYG_WHY_CONTENT_EDITOR_ID', 'provider-whyworking-description');

add_action('admin_init', 'wysiwyg_register_provider_whyworking_meta_box');  
function wysiwyg_register_provider_whyworking_meta_box(){ 
		$post_types = array('providers');
        add_meta_box(WYSIWYG_WHY_META_BOX_ID, __("Why do you love working at Nao Medical?", 'wysiwyg'), 'wysiwyg_render_provider_whyworking_meta_box', $post_types);
}

function wysiwyg_render_provider_whyworking_meta_box(){
	global $post;
	$meta_box_id = WYSIWYG_WHY_CONTENT_META_BOX_ID;
	$editor_id = WYSIWYG_WHY_CONTENT_EDITOR_ID; 
	//Add CSS jQuery goodness to make this work like the original WYSIWYG
	echo "
			<style type='text/css'>
					#$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
					#$meta_box_id #$editor_id{width:100%;}
					#$meta_box_id #editorcontainer{background:#fff !important;}
					#$meta_box_id #$editor_id_fullscreen{display:none;}
			</style>
		
			<script type='text/javascript'>
					jQuery(function($){
							$('#$meta_box_id #editor-toolbar > a').click(function(){
									$('#$meta_box_id #editor-toolbar > a').removeClass('active');
									$(this).addClass('active');
							});
							
							if($('#$meta_box_id #edButtonPreview').hasClass('active')){
									$('#$meta_box_id #ed_toolbar').hide();
							}
							
							$('#$meta_box_id #edButtonPreview').click(function(){
									$('#$meta_box_id #ed_toolbar').hide();
							});
							
							$('#$meta_box_id #edButtonHTML').click(function(){
									$('#$meta_box_id #ed_toolbar').show();
							});		
							setTimeout(function(){
								tinymce.execCommand( 'mceRemoveEditor', false, 'provider-whyworking-description' );
								tinymce.execCommand( 'mceAddEditor', false, 'provider-whyworking-description' );
							}, 1000);					
							
					});
			</script>
	";
	$description = get_post_meta( $post->ID, 'provider-whyworking-description', true );
	$content   = html_entity_decode($description);
	$editor_id = 'provider-whyworking-description';
	$settings  = array( 'media_buttons' => false );
	
	wp_editor( $content, $editor_id, $settings );
	//Clear The Room!
	echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_provider_whyworking_save_meta');
function wysiwyg_provider_whyworking_save_meta(){ 
	global $post;
	$editor_id = 'provider-whyworking-description';
	$meta_key = 'provider-whyworking-description';

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
	update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}



/**** VISUAL EDITOR META BOX - Additional achievements both personal  or professional you'd like us to brag about on the website. */ 

define('WYSIWYG_PA_META_BOX_ID', 'provider-fun-facts-editor'); 
define('WYSIWYG_PA_EDITOR_ID', 'providerfunfactseditor'); //Important for CSS that this is different
define('WYSIWYG_PA_META_KEY', 'extra-content');
define('WYSIWYG_PA_CONTENT_META_BOX_ID', 'provider-fun-facts-description'); 
define('WYSIWYG_PA_CONTENT_EDITOR_ID', 'provider-fun-facts-description');

add_action('admin_init', 'wysiwyg_register_provider_fun_facts_meta_box');  
function wysiwyg_register_provider_fun_facts_meta_box(){ 
		$post_types = array('providers');
        add_meta_box(WYSIWYG_PA_META_BOX_ID, __("Fun Facts", 'wysiwyg'), 'wysiwyg_render_provider_fun_facts_meta_box', $post_types);
}

function wysiwyg_render_provider_fun_facts_meta_box(){
	global $post;
	$meta_box_id = WYSIWYG_PA_CONTENT_META_BOX_ID;
	$editor_id = WYSIWYG_PA_CONTENT_EDITOR_ID; 
	//Add CSS jQuery goodness to make this work like the original WYSIWYG
	echo "
			<style type='text/css'>
					#$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
					#$meta_box_id #$editor_id{width:100%;}
					#$meta_box_id #editorcontainer{background:#fff !important;}
					#$meta_box_id #$editor_id_fullscreen{display:none;}
			</style>
		
			<script type='text/javascript'>
					jQuery(function($){
							$('#$meta_box_id #editor-toolbar > a').click(function(){
									$('#$meta_box_id #editor-toolbar > a').removeClass('active');
									$(this).addClass('active');
							});
							
							if($('#$meta_box_id #edButtonPreview').hasClass('active')){
									$('#$meta_box_id #ed_toolbar').hide();
							}
							
							$('#$meta_box_id #edButtonPreview').click(function(){
									$('#$meta_box_id #ed_toolbar').hide();
							});
							
							$('#$meta_box_id #edButtonHTML').click(function(){
									$('#$meta_box_id #ed_toolbar').show();
							});		
							setTimeout(function(){
								tinymce.execCommand( 'mceRemoveEditor', false, 'provider-fun-facts-description' );
								tinymce.execCommand( 'mceAddEditor', false, 'provider-fun-facts-description' );
							}, 1000);					
							
					});
			</script>
	";
	$description = get_post_meta( $post->ID, 'provider-fun-facts-description', true );
	$content   = html_entity_decode($description);
	$editor_id = 'provider-fun-facts-description';
	$settings  = array( 'media_buttons' => false );
	
	wp_editor( $content, $editor_id, $settings );
	//Clear The Room!
	echo "<div style='clear:both; display:block;'></div>";
}

add_action('save_post', 'wysiwyg_provider_fun_facts_save_meta');
function wysiwyg_provider_fun_facts_save_meta(){ 
	global $post;
	$editor_id = 'provider-fun-facts-description';
	$meta_key = 'provider-fun-facts-description';

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	//update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
	update_post_meta($post->ID, $meta_key, $_POST[$editor_id]);
}


/**** Locations META BOX */

function add_location_meta_boxes() {
	$post_types = array('providers');
    add_meta_box(
        "post_meta_box_location_post", // div id containing rendered fields
        "Locations", // section heading displayed as text
        "post_meta_box_location_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "low" // placement priority
    );
}
add_action( "admin_init", "add_location_meta_boxes" );

// save field value
function save_locations_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if ( get_post_status( $post->ID ) === 'auto-draft' ) {
    //     return;
    // }
	if($post){
		update_post_meta( $post->ID, "_provider_location", sanitize_text_field( $_POST[ "_provider_location" ] ) );
		update_post_meta( $post->ID, "_provider_video_link", sanitize_text_field( $_POST[ "_provider_video_link" ] ) );

	}    
}
add_action( 'save_post', 'save_locations_meta_boxes' );

// callback function to render fields
function post_meta_box_location_post(){
    global $post;
    $get_provider_location = get_post_meta( $post->ID, '_provider_location', true );
	
	

	$locations = get_posts([
		'post_type' => 'location',
		'post_status' => 'publish',
		'numberposts' => -1,
		'orderby' => 'title',
		'order'    => 'ASC'
	]);

	// echo '<pre>';
	// print_r($locations);
	// print_r($getAvailableLocations);
	// echo '</pre>';
	?>
	<div class="form-group">
		<select name="_provider_location" id="_provider_location" >
			<option>Select Location</option>
			<?php foreach ( $locations as $location ) : 
				$selected = ($get_provider_location == $location->ID)?'selected':'';
				?>
				<option value="<?php echo esc_attr( $location->ID ); ?>" <?php echo $selected; ?>><?php echo esc_html( $location->post_title ); ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
	<br>
      <label for="_provider_video_link">Youtube Video Link:</label><br><br>
      <input type="text" class="form-control" name="_provider_video_link" onchange="validateYouTubeUrl(this.value)" required value="<?php echo get_post_meta( $post->ID, '_provider_video_link', true );?>">
    </div>
	<?php
}


 /*** FOUNDER CHECKBOX META BOX FOR PROVIDERS POST */

 add_action( 'add_meta_boxes', 'founder_custom_meta_box' );

 function founder_custom_meta_box($post){
	 $post_types = array('providers');
	 add_meta_box(
		 'founder_metadata', 
		 'Nao Medical Founder', 
		 'founder_home_meta_box',
		 $post_types, 
		 'side', 
		 'high');
 }
 
 add_action('save_post', 'founder_save_meta_box');
 function founder_save_meta_box(){
	 global $post;
	 // print_r($_POST["top_service"]); exit;
	 
	 if($post->post_type == "providers"){
		 if(isset($_POST["founder"])){
			 $founder_status = $_POST["founder"];
		 }else{
			 $founder_status = false;
		 }
		 
 
		 update_post_meta($post->ID, 'founder', $founder_status); 
		 
	 }
 }
 
 function founder_home_meta_box($post){
	 $getService = get_post_meta( $post->ID, 'founder', true );
	 
	 ?>
	 <input type="checkbox" id="founder" name="founder" value="true" <?php echo ($getService) ? 'checked="checked"' : ''; ?>>
	 <label for="founder"></label>Nao Medical Founder<br>
 <?php }

/* Media Meda box*/

/**
 * Add custom attachment metabox.
 */
function doctor_include_myuploadscript() {
    /*
     * I recommend to add additional conditions just to not to load the scipts on each page
     * like:
     * if ( !in_array('post-new.php','post.php') ) return;
     */
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

    wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/customscript.js', array('jquery'), null, false );
}

add_action( 'admin_enqueue_scripts', 'doctor_include_myuploadscript' );

function doctor_image_uploader_field( $name, $value = '') {
    $image = ' button">Upload image';
    $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
    $display = 'none'; // display state ot the "Remove image" button

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

        // $image_attributes[0] - image URL
        // $image_attributes[1] - image width
        // $image_attributes[2] - image height

        $image = '"><img src="' . $image_attributes[0] . '" style="max-width:100px;display:block;" />';
        $display = 'inline-block';

    } 

    return '
    <div>
        <a href="#" class="doctor_upload_image_button' . $image . '</a>
        <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
        <a href="#" class="doctor_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
    </div>';
}

/*
 * Add a meta box
 */
add_action( 'admin_menu', 'doctor_meta_box_add' );
function doctor_meta_box_add() {
    add_meta_box('doctordiv', // meta box ID
        'Upload Doctor Image', // meta box title
        'doctor_print_box', // callback function that prints the meta box HTML 
        'post', // post type where to add it
        'normal', // priority
        'high' ); // position
}
/** Meta Box HTML */
function doctor_print_box( $post ) {
    $meta_key = 'second_featured_img';
    echo doctor_image_uploader_field( $meta_key, get_post_meta($post->ID, $meta_key, true) );?>
	<script>
		jQuery(function($){
    /** Select/Upload image(s) event*/
    $('body').on('click', '.doctor_upload_image_button', function(e){
        e.preventDefault();

            var button = $(this),
                custom_uploader = wp.media({
            title: 'Insert image',
            library : {
                // uncomment the next line if you want to attach image to the current post
                // uploadedTo : wp.media.view.settings.post.id, 
                type : 'image'
            },
            button: {
                text: 'Use this image' // button label text
            },
            multiple: false // for multiple image selection set to true
        }).on('select', function() { // it also has "open" and "close" events 
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:100px;display:block;" />').next().val(attachment.id).next().show();
            /* if you sen multiple to true, here is some code for getting the image IDs
            var attachments = frame.state().get('selection'),
                attachment_ids = new Array(),
                i = 0;
            attachments.each(function(attachment) {
                attachment_ids[i] = attachment['id'];
                console.log( attachment );
                i++;
            });
            */
        })
        .open();
    });
    /** Remove image event */
    $('body').on('click', '.doctor_remove_image_button', function(){
        $(this).hide().prev().val('').prev().addClass('button').html('Upload image');
        return false;
    });
});
	</script>
<?php } 
/** Save Meta Box data */
add_action('save_post', 'doctor_image_save');

function doctor_image_save( $post_id ) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;
    $meta_key = 'second_featured_img';
    update_post_meta( $post_id, $meta_key, $_POST[$meta_key] );
    // if you would like to attach the uploaded image to this post, uncomment the line:
    // wp_update_post( array( 'ID' => $_POST[$meta_key], 'post_parent' => $post_id ) );
    return $post_id;
}

/*Doctor Name Meta box*/
function add_doctor_name_meta_boxes() {
	$post_types = array('post');
    add_meta_box(
        "post_meta_box_doctor_name_post", // div id containing rendered fields
        "Doctor Name", // section heading displayed as text
        "post_meta_box_doctor_name_post", // callback function to render fields
        $post_types, // name of post type on which to render fields
        "normal", // location on the screen
        "high" // placement priority
    );
}
add_action( "admin_init", "add_doctor_name_meta_boxes" );

// save field value
function save_doctor_name_meta_boxes(){
    global $post;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
	if($post){
		update_post_meta( $post->ID, "_doctor_name", sanitize_text_field( $_POST[ "_doctor_name" ] ) );
	}    
}
add_action( 'save_post', 'save_doctor_name_meta_boxes');

// callback function to render fields
function post_meta_box_doctor_name_post(){
    global $post;
    $custom = get_post_custom( $post->ID );
	$doctor_name = '';
	if (array_key_exists("_doctor_name",$custom)){
   		$doctor_name = $custom[ "_doctor_name" ][ 0 ];
	}
    echo "<input type=\"text\" name=\"_doctor_name\" value=\"".$doctor_name."\" placeholder=\"Enter Doctor Name\" style='width:300px; margin-top:10px'>";
}

/**reviews-loadmore **/

function ajax_load_more_review(){

    $limit = (isset($_POST["limit"])) ? $_POST["limit"] : 10;
    $pagenum = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;
	$offset = ($limit*$pagenum);	
	// echo ($limit*$pagenum)+1;
	// echo '<br>';
	global $wpdb;
	$table_name = $wpdb->prefix . 'google_reviews'; 

    header("Content-Type: text/html");
	// echo "SELECT * FROM $table_name WHERE review<>'' AND rating IN(4,5) ORDER BY date DESC LIMIT $limit,$offset";

	$records = $wpdb->get_results("SELECT * FROM $table_name WHERE review<>'' AND rating IN(4,5) ORDER BY date DESC LIMIT $offset,$limit");
	$data = "";
	if($records){
		$count = 1;
		foreach($records as $review){  
			$data .='<div class="review-grid-item col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="review-grid-item-inner">
					<div class="grs-user-avatar"></div>
					<h3 class="grs-name">'.$review->owner.'<span>'.$review->location.'</span></h3>
					<div class="ssb-review-list">
						<ul>
							<li class="ss-ratings">
								<div id="fixture">
									<span class="stars-container stars-'.$review->rating.'"></span>
								</div>
							</li>
							<li class="grs-reviewr-nm">'.date("F d, Y h:i A",strtotime($review->date)).'</li>
						</ul>
					</div>
					<div class="grs-review-txt-height">
						<div class="grs-review-toggle os-review-toggle"> 
							<p>'.$review->review.'</p>
						</div>
					</div>
				</div>
			</div>';
			$count++;
 		}
	}
	echo $data;



}

add_action('wp_ajax_nopriv_ajax_load_more_review', 'ajax_load_more_review');
add_action('wp_ajax_ajax_load_more_review', 'ajax_load_more_review');

/**************************GOOGLE NEWS CUSTOM POST TYPE START******************** */


function custom_post_types() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Google News', 'Post Type General Name', 'naomedical_theme' ),
		'singular_name'       => _x( 'Google News', 'Post Type Singular Name', 'naomedical_theme' ),
		'menu_name'           => __( 'Google News', 'naomedical_theme' ),
		'parent_item_colon'   => __( 'Parent Google News', 'naomedical_theme' ),
		'all_items'           => __( 'All Google News', 'naomedical_theme' ),
		'view_item'           => __( 'View Google News', 'naomedical_theme' ),
		'add_new_item'        => __( 'Add New Google News', 'naomedical_theme' ),
		'add_new'             => __( 'Add New', 'naomedical_theme' ),
		'edit_item'           => __( 'Edit Google News', 'naomedical_theme' ),
		'update_item'         => __( 'Update Google News', 'naomedical_theme' ),
		'search_items'        => __( 'Search Google News', 'naomedical_theme' ),
		'not_found'           => __( 'Not Found', 'naomedical_theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
	);
		
// Set other options for Custom Post Type
		
	$args = array(
		'label'               => __( 'Google News', 'naomedical_theme' ),
		'description'         => __( 'Google news', 'naomedical_theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 2,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
			
		// This is where we add taxonomies to our CPT
		// 'taxonomies'          => array( 'category','post_tag' ),
	);
		
	// Registering your Custom Post Type
	register_post_type( 'google_news', $args );
	
}
	 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
	
add_action( 'init', 'custom_post_types', 0 );


 /*** Google News Available for POST */


/**************************GOOGLE NEWS CUSTOM POST TYPE END******************** */

// add_action('save_post', 'add_google_news');
// function add_google_news($post_id) {
//     global $post, $wpdb;
// 	// $post->post_type == 'insurance';
// 	// pre($post,1);
// 	// if($post->post_type == 'post')
					
// }

// for "post" and custom post types
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
// for "page" post type
add_filter( 'page_row_actions', 'rd_duplicate_post_link', 10, 2 );


function rd_duplicate_post_link( $actions, $post ) {

	if( ! current_user_can( 'edit_posts' ) ) {
		return $actions;
	}
	if($post->post_type == 'post'){
		$url = wp_nonce_url(
			add_query_arg(
				array(
					'action' => 'rd_duplicate_post_as_draft',
					'post' => $post->ID,
				),
				'admin.php'
			),
			basename(__FILE__),
			'duplicate_nonce'
		);
	
		$actions[ 'duplicate' ] = '<a href="' . $url . '" title="Duplicate this item" rel="permalink">Clone to Google News</a>';
	}
	

	return $actions;
}


/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

function rd_duplicate_post_as_draft(){

	// check if post ID has been provided and action
	if ( empty( $_GET[ 'post' ] ) ) {
		wp_die( 'No post to duplicate has been provided!' );
	}

	// Nonce verification
	if ( ! isset( $_GET[ 'duplicate_nonce' ] ) || ! wp_verify_nonce( $_GET[ 'duplicate_nonce' ], basename( __FILE__ ) ) ) {
		return;
	}

	// Get the original post id
	$post_id = absint( $_GET[ 'post' ] );

	// And all the original post data then
	$post = get_post( $post_id );

	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	// if post data exists (I am sure it is, but just in a case), create the post duplicate
	if ( $post ) {

		// new post data array
		$args = array(
			'comment_status' => $post->comment_status,
			// 'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'publish',
			'post_title'     => $post->post_title,
			'post_type'      => 'google_news',
			// 'to_ping'        => $post->to_ping,
			// 'menu_order'     => $post->menu_order
		);

		// insert the post by wp_insert_post() function
		$new_post_id = wp_insert_post( $args );

		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies( get_post_type( $post ) ); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		if( $taxonomies ) {
			foreach ( $taxonomies as $taxonomy ) {
				$post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
				wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
			}
		}

		// duplicate all post meta
		$post_meta = get_post_meta( $post_id );
		if( $post_meta ) {

			foreach ( $post_meta as $meta_key => $meta_values ) {

				if( '_wp_old_slug' == $meta_key ) { // do nothing for this meta key
					continue;
				}

				foreach ( $meta_values as $meta_value ) {
					add_post_meta( $new_post_id, $meta_key, $meta_value );
				}
			}
		}

		// finally, redirect to the edit post screen for the new draft
		// wp_safe_redirect(
		// 	add_query_arg(
		// 		array(
		// 			'action' => 'edit',
		// 			'post' => $new_post_id
		// 		),
		// 		admin_url( 'post.php' )
		// 	)
		// );
		// exit;
		// or we can redirect to all posts with a message
		wp_safe_redirect(
			add_query_arg(
				array(
					'post_type' => ( 'post' !== get_post_type( $post ) ? get_post_type( $post ) : false ),
					'saved' => 'post_duplication_created' // just a custom slug here
				),
				admin_url( 'edit.php' )
			)
		);
		exit;

	} else {
		wp_die( 'Post clone tot google news failed, could not find original post.' );
	}

}

/*
 * In case we decided to add admin notices
 */
add_action( 'admin_notices', 'rudr_duplication_admin_notice' );

function rudr_duplication_admin_notice() {

	// Get the current screen
	$screen = get_current_screen();

	if ( 'edit' !== $screen->base ) {
		return;
	}

    //Checks if settings updated
    if ( isset( $_GET[ 'saved' ] ) && 'post_duplication_created' == $_GET[ 'saved' ] ) {

		 echo '<div class="notice notice-success is-dismissible"><p>Post cloned to Google News.</p></div>';
		 
    }
}

//wp-contact form page title and url
add_filter( 'wpcf7_form_hidden_fields', 'add_page_info' );
function add_page_info($args) {
    $args[ 'page_title' ] = get_the_title();
    $args[ 'page_link' ] = get_page_link();
    return $args;
}


/******** Stay Healthy Nao Cust post type*********/


// Set UI labels for Custom Post Type
$labels = array(
	'name'                => _x( 'Stay Health', 'Post Type General Name', 'naomedical_theme' ),
	'singular_name'       => _x( 'Stay Health', 'Post Type Singular Name', 'naomedical_theme' ),
	'menu_name'           => __( 'Stay Health', 'naomedical_theme' ),
	'parent_item_colon'   => __( 'Parent Stay Health', 'naomedical_theme' ),
	'all_items'           => __( 'All Stay Health', 'naomedical_theme' ),
	'view_item'           => __( 'View Stay Health', 'naomedical_theme' ),
	'add_new_item'        => __( 'Add New Stay Health', 'naomedical_theme' ),
	'add_new'             => __( 'Add New', 'naomedical_theme' ),
	'edit_item'           => __( 'Edit Stay Health', 'naomedical_theme' ),
	'update_item'         => __( 'Update Stay Health', 'naomedical_theme' ),
	'search_items'        => __( 'Search Stay Health', 'naomedical_theme' ),
	'not_found'           => __( 'Not Found', 'naomedical_theme' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
	'label'               => __( 'stay_health', 'naomedical_theme' ),
	'description'         => __( 'Stay Health Informations', 'naomedical_theme' ),
	'labels'              => $labels,
	// Features this CPT supports in Post Editor
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	// You can associate this CPT with a taxonomy or custom taxonomy. 
	
	'taxonomies'          => array( 'category' ),
	/* A hierarchical CPT is like Pages and can have
	* Parent and child items. A non-hierarchical CPT
	* is like Posts.
	*/ 
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 8,
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
	'show_in_rest' => true,
	'rewrite' => array('slug' => 'stay-healthy-nao'),

);


// Registering your Custom Post Type
register_post_type( 'stay_health', $args );



add_action( 'admin_init', 'remove_default_option_stay_health' );

function remove_default_option_stay_health() {
		
	//******************************Remove default functions for custom post types in add and edit page start****************************
	$custom_post_type['post_type'] = array('stay_health');
	if(!empty($custom_post_type['post_type'])){
		foreach($custom_post_type['post_type'] as $types){
			// remove_post_type_support($types, 'title');
			// remove_post_type_support($types, 'editor');
			remove_post_type_support($types, 'revisions');
			remove_post_type_support($types, 'Comments');
			remove_post_type_support($types, 'excerpt');
			// remove_post_type_support($types, 'post-thumbnails');
			remove_post_type_support($types, 'postbox-container-2', 10, 1);
			remove_meta_box('wpseo_meta',$types,'normal');
		}
	}
}


	/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes_stay_health() {
	add_meta_box( 'meta-box-id', __( 'Health Information', 'textdomain' ), 'wpdocs_my_display_callback_stay_health', 'stay_health' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes_stay_health' );

/**
* Meta box display callback.
*
* @param WP_Post $post Current post object.
*/
function wpdocs_my_display_callback_stay_health( $post ) {
// Display code/markup goes here. Don't forget to include nonces!

	global $post;
	require_once get_theme_file_path( 'stay_health_form_health_info.php' );
}



add_action( 'save_post',  'custom_post_type_save_post_stay_health', 10, 1 );



function custom_post_type_save_post_stay_health() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post for Location Information****************
		
		if($post->post_type == 'stay_health'){
			$post_id = $post->ID;
				

		//Fisrtname
			// update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
			// $post_title = $_POST['post_title'];
			// 	$where = array( 'ID' => $post_id );
			// 	$wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
			update_post_meta( $post_id, 'health_title1', $_POST['health_title1'] );
			update_post_meta( $post_id, 'health_image1', $_POST['health_image1'] );	
			update_post_meta( $post_id, 'description1', $_POST['description1'] );	

			update_post_meta( $post_id, 'health_title2', $_POST['health_title2'] );
			update_post_meta( $post_id, 'health_image2', $_POST['health_image2'] );	
			update_post_meta( $post_id, 'description2', $_POST['description2'] );	

			update_post_meta( $post_id, 'health_title3', $_POST['health_title3'] );
			update_post_meta( $post_id, 'health_image3', $_POST['health_image3'] );	
			update_post_meta( $post_id, 'description3', $_POST['description3'] );	

			update_post_meta( $post_id, 'health_title4', $_POST['health_title4'] );
			update_post_meta( $post_id, 'health_image4', $_POST['health_image4'] );	
			update_post_meta( $post_id, 'description4', $_POST['description4'] );			

		}
		//********Save post for Location Information****************	
			
	}
}