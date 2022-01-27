<?php

// SELECT  
//     b.username admin1, c.username admin2
// FROM
//     admin
//         LEFT JOIN
//     Player AS b ON admin.id = b.id
//         LEFT JOIN
//     Player AS c ON admin.promoted_by = c.id

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
      <th class="left aligned">Admin</th>
      <th>Promoted By</th>
    </tr>
  </thead>
  <tbody>
      <?php

    // Perform query
    if ($result = $db->query("SELECT  b.username admin1, c.username admin2 FROM admin LEFT JOIN Player AS b ON admin.id = b.id LEFT JOIN Player AS c ON admin.promoted_by = c.id")) {
      // echo "Returned rows are: " . $result -> num_rows . "\n";
      // Free result set
      while ($row = mysqli_fetch_assoc($result)) {
        printf("<tr>\n");
        printf("<td class=\"left aligned\">%s</td>\n", !empty($row['admin1']) ? $row['admin1'] : "NULL");
        printf("<td>%s</td>\n", !empty($row['admin2']) ? $row['admin2'] : "NULL");
        printf("</tr>\n");
      }
      $result->free_result();
    }


    $db->close();

    ?>
  </tbody>
</table>
