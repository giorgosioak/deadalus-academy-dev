<div class="ui secondary menu container">
  <div class="header item">Δαίδαλος Academy</div>
  <a class="item" href="/index.php">Scoreboard</a>
  <a class="item" href="/challenges.php">Challenges</a>

  <?php if ($_SESSION["isAdmin"] == True ) { ?> 
    <a class="item" href="/admin.php">Admin</a>
  <?php } ?>

  <div class="right menu">
    <?php if ((isset($_SESSION['loggedin']))) { ?>
      <div class="ui dropdown item">
        <?php printf($_SESSION['username']); ?>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="/profile.php">Profile</a>
          <a class="item" href="/settings.php">Settings</a>
          <div class="divider"></div>
          <a class="item" href="/api/logout.php">Log out</a>
        </div>
      </div>
    <?php } else { ?>
        
        <a class="item" href="/login.php">Σύνδεση</a>
        <a class="item" href="/register.php">Εγγραφή</a>

    <?php } ?>
  </div>
</div>
