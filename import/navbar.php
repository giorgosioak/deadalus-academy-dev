<div class="ui secondary menu container">
  <div class="header item">Δαίδαλος Academy</div>
  <a class="item">Scoreboard</a>
  <a class="item">Challenges</a>
  <div class="right menu">
    <?php if ((isset($_SESSION['loggedin']))) { ?>
      <div class="ui dropdown item">
        <?php printf($_SESSION['user']); ?>
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item">Profile</div>
          <div class="item">Settings</div>
          <div class="divider"></div>
          <a class="item" href="/api/logout.php">Log out</a>
        </div>
      </div>
    <?php } else { ?>

      <div class="ui dropdown item">
        Σύνδεση
        <i class="dropdown icon"></i>
        <div class="menu">
          <div class="ui basic segment">
            <form class="ui form" action="/api/login.php" method="POST">
              <div class="field">
                <input type="text" name="username" placeholder="Username">
              </div>
              <div class="field">
                <input type="password" name="password" placeholder="Password">
              </div>
              <div class="ui checkbox">
                <input type="checkbox" tabindex="0" class="hidden">
                <label>Keep me logged in</label>
              </div>
              <div class="item">
                <button class="ui primary button" type="submit">Σύνδεση<i class="right chevron icon"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
