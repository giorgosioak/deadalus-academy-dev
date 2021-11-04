<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 


    // if already logged in, redirect to home page
    if (isset($_SESSION["loggedin"])) {
        header("location: /index.php");
        exit;
    }

    //Check required data missing
    if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
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

    // Check if username or email is already used
    $stmt = $db->prepare('SELECT * FROM `Player` WHERE `username` = ? OR `email` = ?');
    $stmt->bind_param('ss', $_POST['username'], $_POST['email']);
    $stmt->execute(); $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        exit("username or email is already used"); // TODO: Better checking
    }

    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Lets insert user to database
    $stmt = $db->prepare('INSERT INTO `Player` (`username`, `email`, `password`) VALUES ( ? , ? , ? )');
    $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $pass);
    $stmt->execute();

    $nrows = $stmt->affected_rows;
    if (!$nrows) {
        exit("Could not insert user to database");
    }

    $result->free_result();
    $db->close();
    header("Location: /index.php");
    exit;

} else {

    echo "You won't find here what you looking at ;)";

}
