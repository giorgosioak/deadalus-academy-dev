<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 


	// Unset all of the session variables
	$_SESSION = array();
 
	// Destroy the session
	session_destroy();
 
	// Redirect to home page
	header("location: /index.php");
	exit;

} else {

echo "You won't find here what you looking at ;)";

}
