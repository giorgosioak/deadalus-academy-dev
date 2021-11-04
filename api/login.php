<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// if already logged in, redirect to home page
	if (isset($_SESSION["loggedin"])) {
		header("location: /index.php");
		exit;
	}

	//Check required data missing
	if (!isset($_POST['username'], $_POST['password'])) {
		// Could not get the data that should have been sent.
		exit('Please fill both the username and password fields!');
	}

	// New Connection
	$db = new mysqli('localhost', 'php', '20e21o22A', 'academy');

	// Check connection
	if ($db->connect_errno) {
		exit("Failed to connect to database"); // $db->connect_error
	}

	// Charset
	$db->set_charset('utf8mb4');

	// Perform query
	// $result = $db->query("SELECT * FROM `Player` WHERE `username`='$username' AND `password`='$password';");
	$stmt = $$db->prepare('SELECT * FROM `Player` WHERE `username` = ? ;');
	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute(); $result = $stmt->get_result();

	if (mysqli_num_rows($result) == 1) {

		// TODO: Use register with password_hash and verify later with password_verify
		if($row['password'] != $_POST['password']){
			exit("Incorrect password");
		}

		$_SESSION['loggedin'] = time();

		$row = mysqli_fetch_assoc($result);

		$_SESSION['id'] = $row['id'];
		$_SESSION['user'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['discord'] = $row['discord'];
		$_SESSION['points'] = $row['points'];
		$_SESSION['firstbloods'] = $row['firstbloods'];
		$_SESSION['challenges_solved'] = $row['challenges_solved'];
	} else {

		exit("User does not exist")
	}

	$result->free_result();
	$db->close();
	header("location: /index.php");
	exit;
} else {

	echo "You won't find here what you looking at ;)";
}
