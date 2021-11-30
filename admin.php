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
      <a class="item active" data-tab="first">SESSION</a>
      <a class="item" data-tab="second">Challenges</a>
      <a class="item" data-tab="third">Third</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="first">
      <?php echo '<pre>'; var_export($_SESSION); echo '</pre>'; ?>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">

        <div class="ui middle aligned grid">
          <div class="column">
            <form id="new-challenge-form" class="ui large form">
              <div class="ui segment">
                  <div class="required field">
                    <label>Τίτλος</label>
                    <input id="title" type="text" name="title" maxlength="120" placeholder="Τίτλος challenge">
                  </div>
                  <div class="required field">
                    <label>Περιγραφή</label>
                    <textarea maxlength="450"></textarea>
                  </div>
                    <div class="field">
                        <label>Δυσκολία</label>
                        <select>
                          <option value="1">very easy</option>
                          <option value="2">easy</option>
                          <option value="3">medium</option>
                          <option value="4">a bit hard</option>
                          <option value="5">hard</option>
                          <option value="6">impossible</option>

                        </select>
                      </div>
                <div class="two fields">
                  <div class="required field">
                    <label>Κωδικός πρόσβασης</label>
                    <input id="password" type="password" name="password" placeholder="Password">
                  </div>
                  <div class="required field">
                    <label>Επανάληψη κωδικού</label>
                    <input id="confirm_password" type="password" name="confirm_password" placeholder="Repeat Password">
                  </div>
                </div>
                <div id="errors" class="ui error message">
                  <div class="header">Προσοχή!</div>
                  <ul id="error-list" class="list">
                  </ul>
                </div>
                <div id="info" class="ui message">
                  <div class="header">Λάβετε υπόψιν</div>
                  <ul class="list">
                    <li>Θα αποσταλεί στο email σας link για την ενεργοποιήση του λογαριασμού σας</li>
                  </ul>
                </div>
                <div class="ui right aligned basic segment">
                  <button id="new-challenge-button" class="ui right labeled icon primary button" type="button">Εγγραφή<i class="right chevron icon"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>

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
