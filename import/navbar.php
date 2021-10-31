<div class="ui secondary menu container">
  <div class="header item">Δαίδαλος Academy</div>
  <a class="active item">Scoreboard</a>
  <a class="item">Challenges</a>
  <div class="right menu">
<?php if((isset($_SESSION['username']))) { ?>
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
<?php } else { ?>
    <button class="violet inverted ui button"> <i class="discord icon"></i> Login</button>
<?php } ?>
  </div>
</div>
