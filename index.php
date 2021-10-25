<!DOCTYPE HTML>
<html>

<head>


  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Δαίδαλος Academy</title>

<?php include($_SERVER['DOCUMENT_ROOT'].'/import/css.php') ?>


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

  <div class="ui secondary menu container">
    <div class="header item">Δαίδαλος Academy</div>
    <a class="active item">Scoreboard</a>
    <a class="item">Challenges</a>
    <div class="right menu">
      
      <div class="ui dropdown item">
        geomint#4925
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item">Profile</div>
          <div class="item">Settings</div>
          <div class="divider"></div>
          <div class="item">Log out</div>
        </div>
      </div>
      <!-- <div class="item">
        <div class="ui action left icon input">
          <i class="search icon"></i>
          <input type="text" placeholder="Search">
          <button class="ui button">Submit</button>
        </div>
      </div> -->
      <!-- <div class="ui dropdown item">
        Dropdown Left<i class="dropdown icon"></i>
        <div class="menu">
          <a class="item">Link</a>
          <a class="item">Link</a>
          <div class="divider"></div>
          <div class="header">Header</div>
          <div class="item">
            <i class="dropdown icon"></i>
            Sub Menu
            <div class="menu">
              <a class="item">Link</a>
              <div class="item">
                <i class="dropdown icon"></i>
                Sub Sub Menu
                <div class="menu">
                  <a class="item">Link</a>
                  <a class="item">Link</a>
                </div>
              </div>
              <a class="item">Link</a>
            </div>
          </div>
          <a class="item">Link</a>
        </div>
      </div> -->
      <button class="violet inverted ui button"> <i class="discord icon"></i> Login</button>
    </div>
  </div>


  <div class="ui container">

    <!-- <h1>Δαίδαλος Academy</h1> -->

    <h2 class="ui header">Scoreboard</h2>
    <table class="ui striped right aligned table">
      <thead>
        <tr><th class="left aligned">discord username</th>
        <th>Points</th>
        <th>First Bloods</th>
        <th>Challenges Solved</th>
      </tr></thead>
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

  </div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/import/js.php') ?>

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
            .removeClass('active')
          ;
        })
      ;
    })
  ;
  </script>

</body>
</html>
