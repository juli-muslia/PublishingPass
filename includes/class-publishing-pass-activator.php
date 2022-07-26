<?php

/**
 * Fired during plugin activation
 *
 * @link       https://julianmuslia.com
 * @since      1.0.0
 *
 * @package    Publishing_Pass
 * @subpackage Publishing_Pass/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Publishing_Pass
 * @subpackage Publishing_Pass/includes
 * @author     Julian Muslia <#>
 */
class Publishing_Pass_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		datatable_creation ();
			
	}

}

function datatable_creation (){
	global $wpdb;
	
	$table_name = $wpdb->prefix . "publishingpass";

	$table_query = "CREATE TABLE $table_name (
	pass_id int(11) NOT NULL AUTO_INCREMENT,
	weburl longtext NOT NULL,
	user_email varchar(200) NOT NULL,
	user_pass varchar(200) NOT NULL,
	notes text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY  (pass_id)
    )ENGINE=InnoDB DEFAULT CHARSET=latin1";
	require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta( $table_query);
}