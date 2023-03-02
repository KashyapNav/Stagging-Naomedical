<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://www.naomedical.com/
 * @since      1.0.0
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/admin
 * @author     Nao Medical <baskarv@naomedical.com>
 */
class Nao_Google_Review_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nao-google-review-admin.css', array(), $this->version, 'all' );
		// wp_enqueue_style( $this->plugin_name, 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nao-google-review-admin.js', array( 'jquery' ), $this->version, false );

		// wp_enqueue_script( $this->plugin_name, 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

	}

	public function customAdminMenu() {
		add_menu_page('Google Reviews', 'Google Reviews', 'manage_options', 'nao-google-reviews', array($this, 'googleReviewList') );
		add_submenu_page('nao-google-reviews', 'Import','Import', 'manage_options', 'import-reviews', array($this, 'importNaoGoogleReviews') );
	}

	public function googleReviewList(){
		require_once plugin_dir_path( __FILE__ ). 'partials/nao-google-review-admin-display.php';

	}
	
	public function importNaoGoogleReviews(){
		require_once plugin_dir_path( __FILE__ ). 'partials/import-google-reviews.php';

	}

	public function importMangodbGoogleReviews(){
		require_once plugin_dir_path( __FILE__ ). 'partials/ajax-import-google-reviews.php';

	}

}
