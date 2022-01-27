<?php
// if not logged in, redirect to home page
if (!isset($_SESSION["loggedin"])) {
  header("location: /index.php");
  exit;
}
?>

<!DOCTYPE HTML>
<html>

<head>


  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Δαίδαλος Academy</title>
  <link rel="icon" type="image/png" href="/favicon.png" />

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/import/css.php') ?>


  <style type="text/css">
    /* h2 {
      margin: 2em 0em;
    } */

    .ui.container {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .ui.container>h1 {
      font-size: 3em;
      text-align: center;
      font-weight: normal;
    }

    .ui.container>h2.dividing.header {
      font-size: 2em;
      font-weight: normal;
      margin: 4em 0em 3em;
    }

    .ui.table {
      table-layout: fixed;
    }
  </style>

</head>

<body>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/import/navbar.php') ?>


  <div class="ui container">

    <div class="row">
      <div class="column">
        <h2 class="ui center aligned icon header">
            <i class="circular user icon"></i>
            <?php print $_SESSION["username"] ?>
          </h2>
          <h3 class="ui center aligned header">
            <?php print $_SESSION["email"]; ?>
          </h3>
          <br />

          <div class="ui four column centered grid">
            <div class="column">
              <table class="ui center very basic table">
                <tbody>
                  <tr>
                    <td>Points</td>
                    <td class="right aligned"><?php print $_SESSION["points"]; ?></td>
                  </tr>
                  <tr>
                    <td>First Bloods</td>
                    <td class="right aligned"><?php print $_SESSION["firstbloods"]; ?></td>
                  </tr>
                  <tr>
                    <td>Challenges Solved</td>
                    <td class="right aligned"><?php print $_SESSION["challenges_solved"]; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          
          
      </div>
    </div>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '/import/js.php') ?>

  <script>
    $(document)
      .ready(function() {
        $('.ui.menu .ui.dropdown').dropdown({
          on: 'hover'
        });
        $('.ui.menu a.item')
          .on('click', function() {
            $(this)
              .addClass('active')
              .siblings()
              .removeClass('active');
          });
      });
  </script>

</body>

</html>
