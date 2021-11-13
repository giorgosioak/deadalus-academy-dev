<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    // if already logged in, redirect to home page
    if (isset($_SESSION['loggedin'])) {
        http_response_code(401);
        exit('{"status":"failure","message":"Already logged in"}');
    }

    //Check required data missing
    if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        // Could not get the data that should have been sent.
        http_response_code(401);
        exit('{"status":"failure","message":"Please fill all fields"}');
    }

    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        // Could not get the data that should have been sent.
        http_response_code(401);
        exit('{"status":"failure","message":"Empty form fields"}');
    }

    if ( substr($_POST['email'], strpos($_POST['email'], "@") + 1) != "csd.uoc.gr" ){
        // Not a @csd.uoc.gr email
        http_response_code(401);
        exit('{"status":"failure","message":"Only emails from csd uoc are allowed"}');
    }

     // New Connection
    $db = new mysqli('localhost', 'php', '20e21o22A', 'academy');

    // Check connection
    if ($db->connect_errno) {
        http_response_code(502);
        exit('{"status":"failure","message":"Failed to connect to database"}'); // $db->connect_error
    }

    // Charset
    $db->set_charset('utf8mb4');

    // Check if username or email is already used
    $stmt = $db->prepare('SELECT * FROM `Player` WHERE `username` = ? OR `email` = ?');
    $stmt->bind_param('ss', $_POST['username'], $_POST['email']);
    $stmt->execute(); $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        http_response_code(401);
        exit('{"status":"failure","message":"username or email is already used"}'); // TODO: Better checking
    }

    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Lets insert user to database
    $stmt = $db->prepare('INSERT INTO `Player` (`username`, `email`, `password`) VALUES ( ? , ? , ? )');
    $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $pass);
    $stmt->execute();

    $nrows = $stmt->affected_rows;
    if (!$nrows) {
        http_response_code(502);
        exit('{"status":"failure","message":"Could not insert user to database"}');
    }

    $result->free_result();
    $db->close();

    http_response_code(201);
    exit('{"status":"success"}');

} else {
    http_response_code(404);
    exit;
}
