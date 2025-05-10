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
    <form class="newHome-form form" action="../includes/signup.inc.php" method="POST">
        <h2>Neues Konto anlegen</h2>
                <div class="first-name-input">
                    <label for="first_name">Vorname</label>
                    <input type="text" name="first_name">
                </div>
                <div class="last-name-input">
                    <label for="last_name">Nachname</label>
                    <input type="text" name="last_name">
                </div>
                <div class="email-input">
                    <label for="email">E-Mail-Adresse</label>
                    <input type="email" name="email">
                </div>
                <div class="password-input">
                    <label for="password">Passwort</label>
                    <input type="password" name="password">
                </div>
                <div class="repeat-password-input">
                    <label for="repeat-password">Passwort wiederholen</label>
                    <input type="password" name="repeat-password">
                </div>
                <input type="hidden" name="user_id">
                <button type="submit" name="submit" class="form-btn btn">Neu</button>
            </form>

            <?php 
        if(isset($_GET['error'])){
            if($_GET['error'] === 'emptyinput'){
                echo "<h2>Bitte alle Felder ausfüllen.</h2>";
            }
            if($_GET['error'] === 'invalidmail'){
                echo "<h2>E-Mail-Adresse ungültig.</h2>";
            }
            if($_GET['error'] === 'pwdmatcherror'){
                echo "<h2>Passwörter stimmen nicht überein.</h2>";
            }
            if($_GET['error'] === 'userexists'){
                echo "<h2>Ein Nutzer mit dieser E-Mail-Adresse existiert bereits.</h2>";
            }
            if($_GET['error'] === 'generic-error'){
                echo "<h2>Unbekannter Fehler.</h2>";
            }
            if($_GET['error'] === 'none'){
                echo "<h2>Registrierung abgeschlossen. Du kannst dich jetzt einloggen.</h2>";
            }
        }
    ?>
    </main>

  
   
    <?php include '../partials/footer.php'?>
  </body>
</html>
