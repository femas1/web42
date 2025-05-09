<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css" />
</head>


<body>
    
    <?php include '../config/db.php'?>
    <?php include '../partials/nav.php'?>
    <?php include '../handlers/new_home.php'?>
    <?php $user_id = $_SESSION['user_session_id']?>

    <main class="main-container">
    
            <form class="newHome-form form" action="../handlers/new_home.php" method="POST">
                <div class="name-input">
                    <label for="name">Name</label>
                    <input type="text" name="name">
                </div>
                <div class="location-input">
                    <label for="location">Ort</label>
                    <input type="text" name="location">
                </div>
                <div class="size-input">
                    <label for="size">Fläche</label>
                    <input type="number" name="size">
                </div>
                <div class="beds-input">
                    <label for="beds">Schlafplätze</label>
                    <input type="number" name="beds">
                </div>
                <div class="price-input">
                    <label for="price">Preis pro Nacht</label>
                    <input type="number" name="price">
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <button type="submit" name="submit" class="form-btn btn">Neu</button>
            </form>

    </main>
    <?php include '../partials/footer.php'?>
</body>
</html>