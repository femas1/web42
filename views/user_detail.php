<?php include dirname(__DIR__) . '/config/config.php';?>
<?php include '../handlers/get_user_detail.php';?>

<!DOCTYPE html>
<html lang="de">
 <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Mein Konto</title>
    <link rel="stylesheet" href="../style.css" />
  </head>

  <body>
    
  <?php include dirname(__DIR__) . '/partials/nav.php';?>

    <main class="main-container">

    <h3>Gastgeber: </h3><p><?php echo $user['first_name'] . " " . $user['last_name'];?></p>
    <h3>Kontakt:</h3> <p><?php echo $user['email'];?></p>
<!-- The "Konto Einstellungen" button is only shown if 1. The user is logged in 2. If the logged in user is viewing its own user detail page (otherwise each user could change the settings of all other users by just being logged in) -->
    <?php if(isset($_SESSION['user_session_id']) && $_SESSION['user_session_id'] == $_GET['user_id']){echo "<a href='./edit_user.php?user_id=" . $user['user_id'] . "' class='btn'>Konto Einstellungen</a>";} ?>

    </main>


<?php include dirname(__DIR__) . '/partials/footer.php'; ?>
</body>
</html>