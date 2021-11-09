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

    <?php # echo '<pre>'; var_dump($_SESSION); echo '</pre>'; 
    ?>

    <h2 class="ui header">Challenges</h2>
    <div class="ui centered cards">
      <div class="card">
        <div class="content">
          <i class="right floated star icon"></i>
          <div class="header">Example challenge #1</div>
          <div class="description">
            <p>These challenges are static data to design ui</p>
          </div>
        </div>
        <div class="extra content">
          <span class="left floated check">
            <i class="check icon"></i>
            Solved
          </span>
          <span class="right floated star">
            <i class="star icon"></i>
            very easy
          </span>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <i class="right floated like icon"></i>
          <i class="right floated star icon"></i>
          <div class="header">Example challenge #2</div>
          <div class="description">
            <p></p>
          </div>
        </div>
        <div class="extra content">
          <span class="left floated check">
            <i class="check icon"></i>
            Solved
          </span>
          <span class="right floated star">
            <i class="star icon"></i>
            easy
          </span>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <i class="right floated like icon"></i>
          <i class="right floated star icon"></i>
          <div class="header">Example challenge #3</div>
          <div class="description">
            <p></p>
          </div>
        </div>
        <div class="extra content">
          <span class="left floated check">
            <i class="check icon"></i>
            Solved
          </span>
          <span class="right floated star">
            <i class="star icon"></i>
            medium
          </span>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <i class="right floated like icon"></i>
          <i class="right floated star icon"></i>
          <div class="header">Example challenge #4</div>
          <div class="description">
            <p></p>
          </div>
        </div>
        <div class="extra content">
          <span class="left floated check">
            <i class="check icon"></i>
            Solved
          </span>
          <span class="right floated star">
            <i class="star icon"></i>
            a bit hard
          </span>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <i class="right floated like icon"></i>
          <i class="right floated star icon"></i>
          <div class="header">Example challenge #5</div>
          <div class="description">
            <p></p>
          </div>
        </div>
        <div class="extra content">
          <span class="left floated check">
            <i class="check icon"></i>
            Solved
          </span>
          <span class="right floated star">
            <i class="star icon"></i>
            hard
          </span>
        </div>
      </div>
      <div class="card">
        <div class="content">
          <i class="right floated like icon"></i>
          <i class="right floated star icon"></i>
          <div class="header">Example challenge #6</div>
          <div class="description">
            <p></p>
          </div>
        </div>
        <div class="extra content">
          <span class="left floated check">
            <i class="check icon"></i>
            Solved
          </span>
          <span class="right floated star">
            <i class="star icon"></i>
            impossible
          </span>
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
