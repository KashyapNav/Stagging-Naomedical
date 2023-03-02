<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://www.naomedical.com/
 * @since      1.0.0
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/includes
 * @author     Nao Medical <baskarv@naomedical.com>
 */
class Nao_Google_Review_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;

		$wpdb->hide_errors();

		set_transient( 'naogooglereview_installing', 'yes', MINUTE_IN_SECONDS * 10 );

		self::get_schema();
	    
		delete_transient( 'naogooglereview_installing' );

	}

	private static function get_schema() {

		global $wpdb;
		//table rs_settings for plugin on off purpase
		 $tables = "CREATE TABLE {$wpdb->prefix}google_reviews (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`mongodb_id` varchar(200) NOT NULL,
						`owner` varchar(200) NOT NULL,
						`review` mediumtext NULL,
						`location` varchar(200) NULL,
						`rating` int(11) NULL DEFAULT 0,
						`date` datetime NOT NULL,
						`status` int(11) NOT NULL DEFAULT 1,
						`created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
						PRIMARY KEY  (id),
						INDEX (id,mongodb_id)
					) $collate;
					";

	    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        
		dbDelta( $tables );
		
	}

}
