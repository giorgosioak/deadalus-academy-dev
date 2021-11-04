<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// if not already logged in, redirect to home page
	if (!isset($_SESSION["loggedin"])) {
		header("location: /index.php");
		exit;
	}
	
	//Check required data missing
        if (!isset($_POST['old_password'], $_POST['new_password'])) {
		// Could not get the data that should have been sent.
		exit('Please fill all fields!');
	}

	// New Connection
	$db = new mysqli('localhost', 'php', '20e21o22A', 'academy');

	// Check connection
	if ($db->connect_errno) {
		exit("Failed to connect to database"); // $db->connect_error
	}

	// Charset
	$db->set_charset('utf8mb4');

	// Get password from db to verify

	$stmt = $db->prepare('SELECT `password` FROM `Player` WHERE `username` = ?');
	$stmt->bind_param('s', $_SESSION["user"]);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = mysqli_fetch_assoc($result);

	if($row['password'] != $_POST['old_password']){
		exit("Incorrect password");
	}

        // Change password [ No exit ~> verified ]

        $stmt = $db->prepare('Update `Player` SET password= ? WHERE id= ?');
	// TODO: Use register with password_hash and verify later with password_verify
        $stmt->bind_param('si', $_POST["new_password"], $_SESSION['id']);
	$stmt->execute();
	
	// Check if it was updated
	$nrows = $stmt->affected_rows;
	if (!$nrows) {
		exit("Could not update database");
	}

	$result->free_result();
	$db->close();
	header("location: /index.php");
	exit;
} else {

	echo "You won't find here what you looking at ;)";
}
