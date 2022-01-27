<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // if not already logged in, redirect to home page
  if (!isset($_SESSION["loggedin"])) {
      header("location: /index.php");
      exit;
  }

  // Only Admins can add challenges
  if ($_SESSION["isAdmin"] == False) {
    header("location: /index.php");
    exit;
  }

  //Check required data missing
  if (!isset($_POST['title'], $_POST['description'], $_POST['difficulty'])) {
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

  // Lets insert challenge to database
  $stmt = $db->prepare('INSERT INTO `Challenge` (`title`, `description`,`difficulty`) VALUES ( ? , ? , ? )');
  $stmt->bind_param('ssi', $_POST['title'], $_POST['description'], $_POST['difficulty']);
  $stmt->execute();

  $nrows = $stmt->affected_rows;
  if (!$nrows) {
      http_response_code(502);
      exit('{"status":"failure","message":"Could not insert challenge to database"}');
  }

  $db->close();

  http_response_code(201);
  exit('{"status":"success"}');

} else {

echo "You won't find here what you looking at ;)";
}
