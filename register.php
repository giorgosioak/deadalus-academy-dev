<?php
    // if already logged in, redirect to home page
    if (isset($_SESSION["loggedin"])) {
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

    <h2 class="ui header">Εγγραφή νέου χρήστη</h2>

    <div class="ui middle aligned grid">
      <div class="column">
        <form id="register-form" class="ui large form">
          <div class="ui segment">
            <div class="two fields">
              <div class="required field">
                <label>Όνομα χρήστη</label>
                <input id="username" type="text" name="username" maxlength="32" placeholder="Username">
              </div>
              <div class="required field">
                <label>Ιδρυματικό email</label>
                <input id="email" type="text" name="email" maxlength="28" placeholder="user@csd.uoc.gr">
              </div>
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
              <button id="register-button" class="ui right labeled icon primary button" type="button">Εγγραφή<i class="right chevron icon"></i></button>
            </div>
          </div>
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
        $("#register-form").validate({
            errorElement: "li",
            rules: {
                username: {
                    required: true,
                    minlength: 2,
                    maxlength: 32
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters",
                        maxlength: "Your username must consist of at most 32 characters"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password"
					},
					email: "Please enter a valid email address",
				},
				errorPlacement: function ( error, element ) {
				    error.appendTo($("#error-list"));
                },
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".field" ).addClass( errorClass );
                    if ( this.numberOfInvalids() > 0 ) { $("#errors").addClass("visible"); }
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".field" ).removeClass( errorClass );
                    if ( this.numberOfInvalids() == 0 ) { $("#errors").removeClass("visible"); } 
				}
            });
        });
        $('#register-button')
          .on('click', function() {
            if ( !$("#register-form").valid() ){
                return;
            }
            $.ajax({
                url : '/api/register.php',
                type : 'POST',
                data : {
                    'username' : $('input[name=username]').val(),
                    'password': $('input[name=password]').val(),
                    'email': $('input[name=email]').val()
                },
                dataType:'json',
                success : function(data) {              
                    window.location.href = 'index.php';
                },
                error : function(request,error) {
                    console.log(JSON.stringify(request));
                }
            });
        });
    </script>

</body>

</html>
