<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://https://www.naomedical.com/
 * @since      1.0.0
 *
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Nao_Google_Review
 * @subpackage Nao_Google_Review/includes
 * @author     Nao Medical <baskarv@naomedical.com>
 */
class Nao_Google_Review_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;

		$wpdb->hide_errors();

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	}

	public static function get_tables() {
		global $wpdb;

		$tables = array(
			"{$wpdb->prefix}google_reviews"			
			);

		return $tables;
	}


	/**
	 * Drop velan_form_wizard tables.
	 *
	 * @return void
	 */
	public static function drop_tables() {
		global $wpdb;

		$tables = self::get_tables();

		foreach ( $tables as $table ) {
			$wpdb->query( "DROP TABLE IF EXISTS {$table}" );
		}
	}

}
