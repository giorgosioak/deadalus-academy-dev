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

    <h2 class="ui centered header">Σύνδεση χρήστη</h2>

    <div class="ui middle aligned centered grid">
      <div class="eight wide column">
        <form class="ui form" action="/api/login.php" method="POST">
          <div class="ui segment">
              <div class="required field">
                <label>Όνομα χρήστη</label>
                <input type="text" name="username" placeholder="Username">
              </div>
              <div class="required field">
                <label>Κωδικός πρόσβασης</label>
                <input type="password" name="password" placeholder="Password">
              </div>
              <div class="right floated field">
                  <button class="ui right labeled icon primary button">Σύνδεση<i class="right chevron icon"></i></button>
              </div>
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
