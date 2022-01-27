<?php

// New Connection
$db = new mysqli('localhost', 'php', '20e21o22A', 'academy');

// Check connection
if ($db->connect_errno) {
  echo "Failed to connect to MySQL: " . $db->connect_error;
  exit();
}

// Charset
$db->set_charset('utf8mb4');

function difficulty_to_str($num) {
  switch ($num) {
    case 1:
      return "very easy"; break;
    case 2:
      return "easy"; break;
    case 3:
      return "medium"; break;
    case 4:
      return "a bit hard"; break;
    case 5:
      return "hard"; break;
    case 6:
      return "impossible"; break;
  }
}

?>

<div class="ui three column grid">
  <div class="sixteen wide column">

    <?php

    // Perform query
    if ($result = $db->query("SELECT * FROM Challenge")) {
      // echo "Returned rows are: " . $result -> num_rows . "\n";
      // Free result set
      while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="ui fluid card">
          <div class="content">
            <i class="right floated star icon"></i>
            <div class="header"><?php echo $row['title']; ?></div>
            <div class="description">
              <p><?php echo $row['description']; ?></p>
            </div>
          </div>
          <div class="extra content">
            <span class="left floated check">
              <i class="check icon"></i>
              Solved
            </span>
            <span class="right floated star">
              <i class="star icon"></i>
              <?php echo difficulty_to_str($row['difficulty']); ?>
            </span>
          </div>
        </div>


        <?php
      }
      $result->free_result();
    }

    $db->close();

    ?>

  </div>
</div>