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

    <h2 class="ui header">Settings</h2>

    <div class="row">
      <div class="column">
        <div class="ui grid">
          <div class="four wide column">
            <div class="ui vertical fluid tabular menu">
              <a class="item active" data-tab="password-reset">
                Επαναφορά κωδικού
              </a>
            </div>
          </div>
          <div class="twelve wide stretched column">
            <div class="ui basic segment" data-tab="password-reset">
              <form class="ui large form" action="/api/update_password.php" method="POST">
                <div class="ui segment">
                  <div class="two fields">
                    <div class="required field">
                      <label>Τρέχων κωδικός πρόσβασης</label>
                      <input type="password" name="old_password" placeholder="Old password">
                    </div>
                    <div class="required field">
                      <label>Νέος κωδικός προσβασης</label>
                      <input type="password" name="new_password" placeholder="New password">
                    </div>
                  </div>
                  <div class="ui right aligned basic segment">
                    <button class="ui primary button">Αλλαγή<i class="right chevron icon"></i></button>
                  </div>
                  <div class="ui error message"></div>
                </div>
              </form>
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