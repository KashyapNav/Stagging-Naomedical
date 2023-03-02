<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://www.naomedical.com/
 * @since      1.0.0
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/public
 * @author     Nao Medical <baskarv@naomedical.com>
 */
class Nao_Google_Review_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nao_Google_Review_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nao_Google_Review_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nao-google-review-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nao_Google_Review_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nao_Google_Review_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nao-google-review-public.js', array( 'jquery' ), $this->version, false );
	}

	public function register_shortcodes() {
		add_shortcode( 'recent_reviews', array( $this, 'shortcode_function') );
		add_shortcode( 'review_slider', array( $this, 'review_slider_function') );
	}

	public function shortcode_function($attr=[]){
		// ob_start();
		// $limit = 4;
		// $ratings = '4,5';
		extract(
			shortcode_atts(
			array(
				'limit' => '',
				'ratings' => '',
			),
		$attr)
		);
		$limit = (!empty($limit))?$limit:4;
		$ratings = (!empty($ratings))?$ratings:'4,5';
		global $wpdb;
		$table_name = $wpdb->prefix . 'google_reviews'; 
		$customer_reviews = $wpdb->get_results("SELECT * FROM $table_name WHERE review<>'' AND status=1 AND rating IN($ratings) ORDER BY date DESC LIMIT $limit");

		// pre($customer_reviews);
		$output = '';
		if(!empty($customer_reviews)){
			$output .='<div class="max-os-review-new">
			<div class="col-md-12 col-sm-12 col-12 os-review-title os-review-new">
				<h3>Customer Reviews</h3>
			</div>';
			foreach($customer_reviews as $review){ 
					$output .='<div class="col-md-12 col-sm-12 col-12 os-review-new">
					<div class="ssb-review-list">
						<ul>
							<li class="ss-ratings">
								<div id="fixture">
									<span class="stars-container stars-'.$review->rating.'"></span>
								</div>
							</li>
							<li class="os-reviewr-nm">'.date("F d, Y h:i A",strtotime($review->date)).'</li>
						</ul>
					</div>
					<div class="os-review-txt-height">
							<div class="os-review-toggle">
								<p>'.$review->review.'</p>
							</div>
							<p class="os-customer-nm"><span>'.$review->owner.'</span> , <span>'.$review->location.'</span></p>
						</div>
					<!-- <div><a href="javascript:void(0)" class="view-more">View More</a></div> -->
				</div>';
			}
			$output .='<div class="col-md-12 col-sm-12 col-12" style="text-align:center;padding: 0px 30px;">
			<div class="d-grid">
			<a href="'.site_url('/reviews').'">   <button class="btn btn-os-loadmr btn-block"> View all reviews</button> </a>
			</div>
		</div></div>';
		}

		return $output;
	}

	public function review_slider_function($attr=[]){
		// ob_start();
		// $limit = 4;
		// $ratings = '4,5';
		extract(
			shortcode_atts(
			array(
				'limit' => '',
				'ratings' => '',
			),
		$attr)
		);
		$limit = (!empty($limit))?$limit:4;
		$ratings = (!empty($ratings))?$ratings:'4,5';
		global $wpdb;
		$table_name = $wpdb->prefix . 'google_reviews'; 
		$customer_reviews = $wpdb->get_results("SELECT * FROM $table_name WHERE review<>'' AND status=1 AND rating IN($ratings) ORDER BY date DESC LIMIT $limit");

		// pre($customer_reviews);
		$output = '';
		if(!empty($customer_reviews)){
			$output .='<div class="reviews-slider__wrapper">
			<div class="reviews-slider__wrapper_title">
				<h3>Customer Reviews</h3>
			</div>';
			$output .='<div class="google-reviews-slider" id="google-reviews-slider">';
			foreach($customer_reviews as $review){ 
					$output .='<div class="review-slide-item">
					<div class="review-slide-item-inner">
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
							<div class="grs-review-toggle">
								<p>'.$review->review.'</p>
							</div>
						</div>
					</div>
				</div>';
			}
			$output .='</div>';
			$output .='<div class="reviews-slider__button text-center">
			<a href="'.site_url('/reviews').'"> View all reviews</a>
		</div></div>';
		}

		return $output;
	}

	// public function shortcode_function(){
	// 	require_once plugin_dir_path( __FILE__ ). 'partials/nao-google-review-public-display.php';
	// }

}
