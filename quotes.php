<?php 

function add_quotes_to_db( ){
	
	global $wpdb; 


	$create_table = "CREATE TABLE Quotes (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				quote VARCHAR(300) NOT_NULL )"

	$insert_into_table = "INSERT INTO Quotes
		(id, quote) VALUES ( 1, "You are what you eat" )";
}