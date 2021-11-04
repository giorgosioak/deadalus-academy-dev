<?php


	// Unset all of the session variables
	$_SESSION = array();
 
	// Destroy the session
	session_destroy();
 
	// Redirect to home page
	header("location: /index.php");
	exit;

?>
