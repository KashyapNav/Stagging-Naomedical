<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://www.naomedical.com/
 * @since             1.0.0
 * @package           Nao_Google_Review
 *
 * @wordpress-plugin
 * Plugin Name:       Nao Google Review
 * Plugin URI:        https://https://www.naomedical.com/
 * Description:       Retrieve the google reviews from MongoDB and display them on the website.
 * Version:           1.0.0
 * Author:            Nao Medical
 * Author URI:        https://https://www.naomedical.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nao-google-review
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NAO_GOOGLE_REVIEW_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nao-google-review-activator.php
 */
function activate_nao_google_review() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nao-google-review-activator.php';
	Nao_Google_Review_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nao-google-review-deactivator.php
 */
function deactivate_nao_google_review() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nao-google-review-deactivator.php';
	Nao_Google_Review_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nao_google_review' );
register_deactivation_hook( __FILE__, 'deactivate_nao_google_review' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nao-google-review.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nao_google_review() {

	$plugin = new Nao_Google_Review();
	$plugin->run();

}
run_nao_google_review();
