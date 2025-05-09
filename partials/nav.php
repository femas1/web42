<?php session_start(); ?>
<?php include dirname (__DIR__) . '/config/config.php'?>

<nav class="nav">
      <input type="text" class="nav_link link search" placeholder="Ferienhaus suchen..."/>

      <a href="/ferienhaus/index.php" class="nav_link link home">Home</a>
<!-- Only show mein konto if there is a session  -->
 <?php if (isset($_SESSION['user_session_id'])) {
      $user_id = $_SESSION['user_session_id'];
      echo "<a href='$base_url" . "views/user_detail.php?user_id=$user_id'" . "class='nav_link link account'> Mein Konto </a>";
 } ?>
      <?php if(isset($_SESSION['user_session_id'])){ ?>
      <?php echo "<a href=$base_url" . "views/new_home.php class='nav_link link new-home_btn btn'> Neues Ferienhaus </a>" ?>
      <?php echo "Hello, " . $_SESSION['user_session_name'] ?>
      <?php } ?>
      <?php
            if(isset($_SESSION['user_session_email'])){
                  echo '<form id="logout-form" action="' . $base_url . 'includes/logout.inc.php" method="POST"><button class="btn" type="submit" name="submit">Ausloggen</button></form>';
            } else {
                  echo '<a href="' . $base_url . 'views/signup.php" class="btn">Registrieren</a>';
                  echo '<a href="' . $base_url . 'views/login.php" class="btn">Einloggen</a>';
            }
      ?>
</nav>