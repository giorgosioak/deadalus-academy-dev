<?php
    // if not logged in, redirect to home page
    if (!isset($_SESSION["loggedin"])) {
        header("location: /index.php");
        exit;
    }
    // HEHE BOI
    if ($_SESSION["user"] !== "giorgosioak") {
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


    <div class="ui top attached tabular menu">
      <a class="item active" data-tab="first">First</a>
      <a class="item" data-tab="second">Second</a>
      <a class="item" data-tab="third">Third</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="first">
      First
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
      Second
    </div>
    <div class="ui bottom attached tab segment" data-tab="third">
      Third
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
