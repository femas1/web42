<!DOCTYPE html>
<html lang="de">
 <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Anmelden</title>
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <?php include '../partials/nav.php'?>
    <main class="main-container">
    <form class="newHome-form form" action="../includes/login.inc.php" method="POST">
        <h2>Einloggen</h2>
                <div class="email-input">
                    <label for="email">E-Mail-Adresse</label>
                    <input type="text" name="email">
                </div>
                <div class="password-input">
                    <label for="password">Passwort</label>
                    <input type="password" name="password">
                </div>

                <button type="submit" name="submit" class="form-btn btn">Einloggen</button>
                <?php if(isset($_GET['error'])){
                  if($_GET['error'] === 'emptyinput') {
                    echo "<h2>Bitte alle Felder ausfüllen.</h2>";
                  }
                  else if($_GET['error'] === 'wronglogin' || $_GET['error'] === 'wrongemail') {
                    echo '<h2>E-Mail stimmt nicht.</h2>';
                  } else if ($_GET['error'] === 'wrongpassword') {
                    echo '<h2>Passwort stimmt nicht.</h2>';
                  }
                }?>
            </form>
    </main>
    <?php include '../partials/footer.php'?>
  </body>
</html>
