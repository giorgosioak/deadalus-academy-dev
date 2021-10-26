<?php

// New Connection
$db = new mysqli('remotemysql.com:3306', 'dl4hzzeU5a', 'tYCzePnf4t', 'dl4hzzeU5a');

// Check connection
if ($db->connect_errno) {
  echo "Failed to connect to MySQL: " . $db->connect_error;
  exit();
}

// Charset
$db->set_charset('utf8mb4');

?>

<table class="ui striped left collapsing table">
  <thead>
    <tr>
      <th>Points</th>
      <th>Difficulty level</th>
    </tr>
  </thead>
  <tbody>

    <?php

    // Perform query
    if ($result = $db->query("SELECT * FROM difficulty")) {
      // echo "Returned rows are: " . $result -> num_rows . "\n";
      // Free result set
      while ($row = $result->fetch_row()) {
        printf("<tr>\n");
        printf("<td>%s</td>\n", $row[0]);
        printf("<td>%s</td>\n", $row[1]);
        printf("</tr>\n");
      }
      $result->free_result();
    }


    $db->close();

    ?>


  </tbody>
</table>

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
    <tr>
      <td class="left aligned">Rosaline</td>
      <td>5</td>
      <td>35g</td>
      <td>6g</td>
    </tr>
    <tr>
      <td class="left aligned">Barrie</td>
      <td>27</td>
      <td>23g</td>
      <td>28g</td>
    </tr>
    <tr>
      <td class="left aligned">Trinidad</td>
      <td>14</td>
      <td>50g</td>
      <td>7g</td>
    </tr>
    <tr>
      <td class="left aligned">Jaqueline</td>
      <td>31</td>
      <td>30g</td>
      <td>50g</td>
    </tr>
    <tr>
      <td class="left aligned">Tamala</td>
      <td>18</td>
      <td>6g</td>
      <td>13g</td>
    </tr>
  </tbody>
</table>