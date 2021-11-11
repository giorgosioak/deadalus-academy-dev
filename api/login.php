<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// if already logged in, redirect to home page
	if (isset($_SESSION['loggedin'])) {
		http_response_code(401);
        exit('{"status":"success","message":"Already logged in"}');
	}

	//Check required data missing
	if (!isset($_POST['username'], $_POST['password'])) {
		// Could not get the data that should have been sent.
        http_response_code(401);
		exit('{"status":"success","message":"Please fill both the username and password fields!"}');
	}

	// New Connection
	$db = new mysqli('localhost', 'php', '20e21o22A', 'academy');

	// Check connection
	if ($db->connect_errno) {
		http_response_code(502);
        exit('{"status":"success","message":"Failed to connect to database"}'); // $db->connect_error
	}

	// Charset
	$db->set_charset('utf8mb4');

	// Perform query
	$stmt = $db->prepare('SELECT * FROM `Player` WHERE `username` = ?');
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute(); $result = $stmt->get_result();

	if (mysqli_num_rows($result) == 1) {

		$row = mysqli_fetch_assoc($result);

		if(!password_verify($_POST['password'],$row['password'])){
            http_response_code(401);
			exit('{"status":"success","message":Incorrect password"}');
		}
		

		$_SESSION['loggedin'] = time();
		$_SESSION['id'] = $row['id'];
        // $_SESSION['isAdmin'] = False;
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['discord'] = $row['discord'];
		$_SESSION['points'] = $row['points'];
		$_SESSION['firstbloods'] = $row['firstbloods'];
		$_SESSION['challenges_solved'] = $row['challenges_solved'];
	} else {
	    http_response_code(401);
		exit('{"status":"success","message":"User does not exist"}');
	}

    $stmt = $db->prepare('SELECT count(*) as isAdmin FROM `admin` WHERE `id` = ?');
    $stmt->bind_param('s', $row['id']);
    $stmt->execute(); $admin_result = $stmt->get_result();

    $row = mysqli_fetch_assoc($admin_result);
    $_SESSION['isAdmin'] = ($row['isAdmin'] > 0) ? True : False;

	$result->free_result();
	$admin_result->free_result();
	$db->close();

    http_response_code(200);
    exit('{"status":"success"}');
} else {
	http_response_code(404);
    exit;
}
