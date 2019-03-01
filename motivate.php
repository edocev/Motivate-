<?php 
/*
Plugin Name: Motivate!
Pluggin URI: https://github.com/edocev/Motivate-
Description: A very simple plugin that displays random quote, using shortcode
Author: edocev
Author URI: https://profiles.wordpress.org/edocev
License: GPL2
*/ 

define( 'DXP_VERSION', '1.6' );
define( 'DXP_PATH', dirname( __FILE__ ) );
define( 'DXP_PATH_INCLUDES', dirname( __FILE__ ) . '/inc' );
define( 'DXP_FOLDER', basename( DXP_PATH ) );
define( 'DXP_URL', plugins_url() . '/' . DXP_FOLDER );
define( 'DXP_URL_INCLUDES', DXP_URL . '/inc' );


global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'quotes';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		quote VARCHAR(300) NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
}

function jal_instsall_data() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'quotes';

	$wpdb->insert( $table_name, array('id' => '1', 'quote'=>'blah') );

}

register_activation_hook( __FILE__, 'jal_install' );
register_activation_hook( __FILE__, 'jal_install_data' );