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

?>

<table class="ui striped right aligned table">
  <thead>
    <tr>
      <th class="left aligned">discord username</th>
      <th>Points</th>
      <th>First Bloods</th>
      <th>Challenges Solved</th>
    </tr>
  </thead>
  <tbody>
      <?php

    // Perform query
    if ($result = $db->query("SELECT * FROM Player ORDER BY points DESC, firstbloods DESC, challenges_solved DESC LIMIT 25")) {
      // echo "Returned rows are: " . $result -> num_rows . "\n";
      // Free result set
      while ($row = mysqli_fetch_assoc($result)) {
        printf("<tr>\n");
        printf("<td class=\"left aligned\">%s</td>\n", $row['username']);
        printf("<td>%s</td>\n", $row['points']);
        printf("<td>%s</td>\n", $row['firstbloods']);
        printf("<td>%s</td>\n", $row['challenges_solved']);
        printf("</tr>\n");
      }
      $result->free_result();
    }


    $db->close();

    ?>
  </tbody>
</table>
