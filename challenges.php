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
    <div class="ui secondary  menu">
      <a class="item">
        Hide Solved
      </a>
      <a class="item">
        Categories selector?
      </a>
      <a class="item">
        ...
      </a>
      <div class="right menu">
        <div class="item">
          <div class="ui icon input">
            <input type="text" placeholder="Search...">
            <i class="search link icon"></i>
          </div>
        </div>
        <?php if ($_SESSION["isAdmin"] == True) { ?>
          <button id="new-challenge-button" class="ui small labeled icon button">
            <i class="icon plus"></i> New Challenge
          </button>
        <?php } ?>
      </div>
    </div>


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/import/new_challenge_modal.php') ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/import/challenges.php') ?>


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
      <?php if ($_SESSION["isAdmin"] == True) { ?>
        $('#new-challenge-button')
          .on('click', function() {
          $('.ui.longer.modal')
            .modal('show');
        });
        $('.ui.longer.modal')
          .modal({
            closable  : true,
            onApprove : function() {
              $.ajax({
                url : '/api/new_challenge.php',
                type : 'POST',
                data : {
                    'title': $('input[name=title]').val(),
                    'description': $('textarea[name=description]').val(),
                    'difficulty': $('#difficulty option:selected').val()
                },
                dataType:'json',
                success : function(data) {
                    window.location.href = 'challenges.php';
                },
                error : function(request,error) {
                    console.log(JSON.stringify(request));
                }
            });
          }
        });
      <?php } ?>
  </script>


</body>
</html>
