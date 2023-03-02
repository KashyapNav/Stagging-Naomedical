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
	// wp_enqueue_style(
	// 	'naomedical_theme-datatables',
	// 	get_stylesheet_directory_uri() . '/assets/css/datatables.min.css'
	// );
	
	
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
	// wp_enqueue_script(
	// 	'naomedical_theme-datatables',
	// 	get_stylesheet_directory_uri() . '/assets/js/datatables.min.js',
	// 	[ 'jquery' ],
	// 	true
	// );
	// wp_enqueue_script(
	// 	'naomedical_theme-map',
	// 	get_stylesheet_directory_uri() . '/assets/js/map.js',
	// 	[ 'jquery' ],
	// 	true
	// );
	


	// wp_enqueue_script(
	// 	'naomedical_theme-lottie-player',
	// 	'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js',
	// 	[ 'jquery' ], 
	// 	true
	// );

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



 	 //******************************Custom post  Testimonials start ****************************
	  register_post_type( 'testimonials',
	  array(
		  'labels' => array(
			  'name' => __( 'Testimonials' ),
			  'singular_name' => __( 'Testimonials' )
		  ),
		  'public' => true,
		 'has_archive' => true,
		 'rewrite' => array('slug' => '/'),
		 'show_in_rest' => true,

	  )
  );
$labels = array(
'name'                => _x( 'Testimonials', 'Post Type General Name', 'naomedical_theme' ),
'singular_name'       => _x( 'Testimonials', 'Post Type Singular Name', 'naomedical_theme' ),
'menu_name'           => __( 'Testimonials', 'naomedical_theme' ),
'parent_item_colon'   => __( 'Parent Testimonials', 'naomedical_theme' ),
'all_items'           => __( 'All Testimonials', 'naomedical_theme' ),
'view_item'           => __( 'View Testimonials', 'naomedical_theme' ),
'add_new_item'        => __( 'Add New Testimonials', 'naomedical_theme' ),
'add_new'             => __( 'Add New', 'naomedical_theme' ),
'edit_item'           => __( 'Edit Testimonials', 'naomedical_theme' ),
'update_item'         => __( 'Update Testimonials', 'naomedical_theme' ),
'search_items'        => __( 'Search Testimonials', 'naomedical_theme' ),
'not_found'           => __( 'Not Found', 'naomedical_theme' ),
'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
);

// Set other options for Custom Post Type

$args = array(
'label'               => __( 'Testimonials', 'naomedical_theme' ),
'description'         => __( 'Testimonials news and reviews', 'naomedical_theme' ),
'labels'              => $labels,
// Features this CPT supports in Post Editor
'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
// You can associate this CPT with a taxonomy or custom taxonomy. 
'taxonomies'          => array( 'genres' ),
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
register_post_type( 'testimonials', $args );

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
 
/* Custom Short Code - servicespecific */
function servicespecific_shortcode() {
	ob_start();
	get_template_part('servicespecific');
	return ob_get_clean();
 } 
 add_shortcode( 'servicespecific_shortcode', 'servicespecific_shortcode' );




/* Custom Short Code - nick-slider */
	function nickslider_shortcode() {
	ob_start();
	get_template_part('nick-slider');
	return ob_get_clean();
} 
add_shortcode( 'nickslider_shortcode', 'nickslider_shortcode' );

/* Custom Short Code - customer-review */
function customer_reviews_shortcode() {
	ob_start();
	get_template_part('customer-review');
	return ob_get_clean();
	} 
add_shortcode( 'customer_reviews_shortcode', 'customer_reviews_shortcode' );

/* Custom Short Code -topservices-list */
function topserviceslist_list_shortcode() {
	ob_start();
	get_template_part('topservices-list');
	return ob_get_clean();
	} 
add_shortcode( 'topserviceslist_list_shortcode', 'topserviceslist_list_shortcode' );



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
					$provider .= '<div class="col-md-4 col-12 col-sm-12">';
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



function _thz_filter_disable_block_editor_pt( $use_block_editor, $post_type ){
	if( 'post' == $post_type){
	  $use_block_editor = false;
	}
	return $use_block_editor;
  }
  add_filter( 'use_block_editor_for_post_type', '_thz_filter_disable_block_editor_pt', 10, 2 );





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
	
	
	// register_taxonomy(
	// 	'Insurance Category', 'location_information', array(
	// 	'hierarchical' => true,
	// 	'label' => 'Location Information Category',
	// 	'show_admin_column' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'rewrite' => true
	// ));
	
	// Registering your Custom Post Type
	register_post_type( 'location', $args );
	
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
				update_post_meta( $post_id, 'location_info', $_POST['location_info'] );
				update_post_meta( $post_id, 'location_phone', $_POST['location_phone'] );	
				
				update_post_meta( $post_id, 'location_search_name', $_POST['location_search_name'] );
				update_post_meta( $post_id, 'location_latitude', $_POST['location_latitude'] );
				update_post_meta( $post_id, 'location_longitude', $_POST['location_longitude'] );
				update_post_meta( $post_id, 'location_help', $_POST['location_help'] );	
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





  ///Medical Services Information


	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Medical Services', 'Post Type General Name', 'naomedical_theme' ),
		'singular_name'       => _x( 'Medical Services', 'Post Type Singular Name', 'naomedical_theme' ),
		'menu_name'           => __( 'Medical Services', 'naomedical_theme' ),
		'parent_item_colon'   => __( 'Parent Medical Services', 'naomedical_theme' ),
		'all_items'           => __( 'All Medical Services', 'naomedical_theme' ),
		'view_item'           => __( 'View Medical Services', 'naomedical_theme' ),
		'add_new_item'        => __( 'Add New Medical Services', 'naomedical_theme' ),
		'add_new'             => __( 'Add New', 'naomedical_theme' ),
		'edit_item'           => __( 'Edit Medical Services', 'naomedical_theme' ),
		'update_item'         => __( 'Update Medical Services', 'naomedical_theme' ),
		'search_items'        => __( 'Search Medical Services', 'naomedical_theme' ),
		'not_found'           => __( 'Not Found', 'naomedical_theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
	);
	
	// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'medical_information', 'naomedical_theme' ),
		'description'         => __( 'Medical Services news and reviews', 'naomedical_theme' ),
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
	register_post_type( 'medical_information', $args );
	
	add_action( 'admin_init', 'remove_default_type_medicalservices' );
	
	function remove_default_type_medicalservices() {
		 
		//******************************Remove default functions for custom post types in add and edit page start****************************
		$custom_post_type['post_type'] = array('medical_information');
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
function wpdocs_register_meta_boxes_medicalservices() {
	add_meta_box( 'meta-box-id', __( 'Basic Information', 'textdomain' ), 'wpdocs_my_display_callback_medicalservices', 'medical_information' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes_medicalservices' );

/**
* Meta box display callback.
*
* @param WP_Post $post Current post object.
*/
function wpdocs_my_display_callback_medicalservices( $post ) {
// Display code/markup goes here. Don't forget to include nonces!
	global $post;
	require_once get_theme_file_path( 'medical_service_form_basic_info.php' );
}



add_action( 'save_post',  'custom_post_type_save_post_medicalservices', 10, 1 );


function custom_post_type_save_post_medicalservices() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post for Medical Information****************
		
		if($post->post_type == 'medical_information'){
			$post_id = $post->ID;
		//Fisrtname
				update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
				$post_title = $_POST['post_title'];
				 $where = array( 'ID' => $post_id );
				 $wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
				update_post_meta( $post_id, 'medicalservices_discription', $_POST['medicalservices_discription'] );
				//update_post_meta( $post_id, 'contact_info', $_POST['contact_info'] );
				update_post_meta( $post_id, 'medicalservices_price', $_POST['medicalservices_price'] );		
			}
		//********Save post for Contact Information****************	
			
		}
	}

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
		  'base'            => get_pagenum_link(1) . '%_%',
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





  ///Services Information
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Services Information', 'Post Type General Name', 'naomedical_theme' ),
		'singular_name'       => _x( 'Service Information', 'Post Type Singular Name', 'naomedical_theme' ),
		'menu_name'           => __( 'Services Information', 'naomedical_theme' ),
		'parent_item_colon'   => __( 'Parent Services Information', 'naomedical_theme' ),
		'all_items'           => __( 'All Services Information', 'naomedical_theme' ),
		'view_item'           => __( 'View Services Information', 'naomedical_theme' ),
		'add_new_item'        => __( 'Add New Services Information', 'naomedical_theme' ),
		'add_new'             => __( 'Add New', 'naomedical_theme' ),
		'edit_item'           => __( 'Edit Services Information', 'naomedical_theme' ),
		'update_item'         => __( 'Update Services Information', 'naomedical_theme' ),
		'search_items'        => __( 'Search Services Information', 'naomedical_theme' ),
		'not_found'           => __( 'Not Found', 'naomedical_theme' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'naomedical_theme' ),
	);
	
	// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'services_information', 'naomedical_theme' ),
		'description'         => __( 'Services Information news and reviews', 'naomedical_theme' ),
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
	// 	'Topservices Category', 'services', array(
	// 	'hierarchical' => true,
	// 	'label' => 'Topservices Category',
	// 	'show_admin_column' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'rewrite' => true
	// ));
	
	
	// Registering your Custom Post Type
	register_post_type( 'services', $args );
	
	add_action( 'admin_init', 'remove_default_type_services' );
	
	function remove_default_type_services() {
		 
		//******************************Remove default functions for custom post types in add and edit page start****************************
		$custom_post_type['post_type'] = array('services');
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
function wpdocs_register_meta_boxes_services() {
	add_meta_box( 'meta-box-id', __( 'Basic Information', 'textdomain' ), 'wpdocs_my_display_callback_services', 'services' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes_services' );

/**
* Meta box display callback.
*
* @param WP_Post $post Current post object.
*/
function wpdocs_my_display_callback_services( $post ) {
// Display code/markup goes here. Don't forget to include nonces!

	global $post;
	require_once get_theme_file_path( 'services_form_basic_info.php' );
}



add_action( 'save_post',  'custom_post_type_save_post_services', 10, 1 );


function custom_post_type_save_post_services() {
	global $post, $wpdb;
	if(!empty($post)){
		//********Save post for Services Information****************
		
		if($post->post_type == 'services'){
			$post_id = $post->ID;
		      //Fisrtname
				update_post_meta( $post_id, 'post_title', esc_attr($_POST['post_title']) );
				$post_title = $_POST['post_title'];
				 $where = array( 'ID' => $post_id );
				 $wpdb->update( $wpdb->posts, array( 'post_title' => esc_attr($post_title) ), $where );
				//update_post_meta( $post_id, 'services_address', $_POST['services_address'] );
				// update_post_meta( $post_id, 'services_views', $_POST['services_views'] );
				// update_post_meta( $post_id, 'services_baseprice', $_POST['services_baseprice'] );
				// update_post_meta( $post_id, 'services_price_discount', $_POST['services_price_discount'] );
				// update_post_meta( $post_id, 'services_price', $_POST['services_price'] );
				// update_post_meta( $post_id, 'services_price_description', $_POST['services_price_description'] );
				// update_post_meta( $post_id, 'services_booking_time', $_POST['services_booking_time'] );

				//update_post_meta( $post_id, 'post_rated_title', $_POST['post_rated_title'] );
				update_post_meta( $post_id, 'toprated_discription', $_POST['toprated_discription'] );
				update_post_meta( $post_id, 'toprated_price', $_POST['toprated_price'] );
			}
		   //********Save post for Services Information****************	
			
		}
	}


	// function custom_redirect() {
	// 	global $wp;
	
	// 	if( $wp->request == 'service' ) {
	// 		wp_redirect( site_url( 'services' ) );
	// 		exit;
	// 	}
	// }
	
	add_action ('template_redirect', 'custom_redirect', 1, 10);