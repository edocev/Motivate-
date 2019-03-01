<?php
/*
Plugin Name: Motivate!
Pluggin URI: https://github.com/edocev/Motivate
Description: A very simple plugin that displays random quote using shortcode
Version: 1.0
Author: edocev
Author URI: https://profiles.wordpress.org/edocev
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

global $jal_db_version;
$jal_db_version = '1.0';

//
//	Adds the DB Table
//
function ed_jal_install() {
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'ed_quotes';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		quote varchar(300) NOT NULL,
		author varchar(100) NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
}

//
// Inserts demo quotes to the table
//
/*function ed_jal_install_data() {
	global $wpdb;

	$welcome_name = 'Mr. WordPress';
	$welcome_text = 'Congratulations, you just completed the installation!';

	$table_name = $wpdb->prefix . 'ed_quotes';

	$wpdb->query("INSERT INTO $table_name
				(quote, author)
				VALUES
				('But man is not made for defeat. A man can be destroyed but not defeated.','Ernest Hemingway' )
				('The way get started is to quit talking and begin doing.','Walt Disney' )" );
}*/

register_activation_hook( __FILE__, 'ed_jal_install' );
/*register_activation_hook( __FILE__, 'ed_jal_install_data' );*/