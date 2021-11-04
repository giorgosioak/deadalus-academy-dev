<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

	session_start();

	// if already logged in, redirect to home page
	if(isset($_SESSION["loggedin"])){
		header("location: /index.php");
		exit;

	}


	$username = $password = "";

	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);

	// New Connection
	$db = new mysqli('localhost', 'php', '20e21o22A', 'academy');

	// Check connection
	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: " . $db->connect_error;
		exit();
	}

	// Charset
	$db->set_charset('utf8mb4');

	// Perform query
	$result = $db->query("SELECT * FROM `Player` WHERE `username`=$username AND `password`=$password;");

	if (mysqli_num_rows($result) == 1){

		$_SESSION['loggedin'] = time();

		$row = mysqli_fetch_assoc($result);

		$_SESSION['id'] = $row['id'];
		$_SESSION['user'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['discord'] = $row['discord'];
		$_SESSION['points'] = $row['points'];
		$_SESSION['firstbloods'] = $row['firstbloods'];
		$_SESSION['challenges_solved'] = $row['challenges_solved'];

		$result->free_result();
		$db->close();

	}


	header("location: /index.php");
	exit;



} else {

	echo "You won't find here what you looking at ;)";

}
