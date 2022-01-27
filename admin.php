<?php
    // if not logged in, redirect to home page
    if (!isset($_SESSION["loggedin"])) {
        header("location: /index.php");
        exit;
    }
    // HEHE BOI
    if ($_SESSION["isAdmin"] == False) {
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

    <!-- <h1>Δαίδαλος Academy</h1> -->

    <h2 class="ui header">Admin Panel</h2>
    <br />

    <div class="row">
      <div class="column">
        <div class="ui grid">
          <div class="four wide column">
            <div class="ui secondary vertical pointing menu">
              <a class="item active" data-tab="session">SESSION</a>
              <a class="item" data-tab="new-challenge">Challenges</a>
              <a class="item" data-tab="admins">Admins</a>
            </div>
          </div>
          <div class="twelve wide stretched column">
            <div class="ui basic segment tab active" data-tab="session">
              <h2>PHPSESSION:</h2>
              <?php echo '<pre>'; var_export($_SESSION); echo '</pre>'; ?>
            </div>
            <div class="ui basic segment tab" data-tab="new-challenge">
              <p>Moved to <a href="/challenges.php">challenges.php</a></p>
            </div>
            <div class="ui basic segment tab" data-tab="admins">
              <p>Wow you are an admin! Congrats 🥳</p>

              <?php include($_SERVER['DOCUMENT_ROOT'] . '/import/admins.php') ?>
            </div>
          </div>
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
        $('.menu .item')
          .tab();
      });
  </script>

</body>

</html>
