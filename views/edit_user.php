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
      <?php if(isset($_SESSION['user_session_id']) && $_SESSION['user_session_id'] == $_GET['user_id']) : ?>
<form action="../handlers/edit_user.php" method="POST">
 <input type="text" value="<?php echo $user['user_name'];?>">   
 <input type="text" value="<?php echo $user['email'];?>">   
 <button type="submit" class="btn">Änderungen speichern</button>
 </form>

 <form action="../handlers/edit_password.php" method="POST">
 <input type="password" placeholder="Altes passwort eingeben..." name="old-password">   
 <input type="password" placeholder="Neues passwort eingeben..." name="new-password">   
 <input type="password" placeholder="Altes passwort wiederholen..." name="new-password-repeat">
 <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">

 <button type="submit" name="submit" class="btn">Passwort ändern</button>
 </form>
 <?php else: 
    header("Location: ./edit_user.php?user_id=" . $_SESSION['user_session_id']);
    exit();
endif; 
?>
    </main>
<?php include dirname(__DIR__) . '/partials/footer.php'; ?>
</body>
</html>