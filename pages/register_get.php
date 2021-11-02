<?php session_start(); ?>
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

    <h2 class="ui header">Εγγραφή νέου χρήστη</h2>

    <div class="ui middle aligned grid">
      <div class="column">
        <form class="ui large form">
          <div class="ui segment">
            <div class="two fields">
              <div class="required field">
                <label>Όνομα χρήστη</label>
                <input type="text" name="username" placeholder="Username">
              </div>
              <div class="required field">
                <label>Ιδρυματικό email</label>
                <input type="text" name="email" placeholder="user@csd.uoc.gr">
              </div>
            </div>
            <div class="two fields">
              <div class="required field">
                <label>Κωδικός πρόσβασης</label>
                <input type="password" name="password" placeholder="Password">
              </div>
              <div class="required field">
                <label>Επανάληψη κωδικού</label>
                <input type="password" name="password_rep" placeholder="Repeat Password">
              </div>
            </div>
            <div class="ui message">
              <div class="header">Λάβετε υπόψιν</div>
              <ul class="list">
                <li>Θα αποσταλεί στο email σας link για την ενεργοποιήση του λογαριασμού σας</li>
              </ul>
            </div>
            <div class="ui right aligned basic segment">
              <button class="ui primary button">Εγγραφή<i class="right chevron icon"></i></button>
            </div>

            <div class="ui error message"></div>

        </form>
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