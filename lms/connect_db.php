<?php
	//1. Create a database connection
	$db = new Mysqli;

	$dbhost= "localhost";
	$dbuser= "root";
	$dbpass= "Bakwas12";
	$dbname= "dbdesign";
	$db -> connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//Test if connection occurred.
	if(mysqli_connect_errno()){
		die("Database connection failed: " .
			mysqli_connect_error().
			"(" . mysqli_connect_errno() . ")"
		);
	}    
?>