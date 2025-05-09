<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unterkunft Bearbeiten</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../partials/nav.php' ?>
    <?php 
    
     $id = $_GET['home_id'];
     $name = $_GET['name'];
     $location = $_GET['location'];
     $size = $_GET['size'];
     $beds = $_GET['beds'];
     $price = $_GET['price'];
     $user_id = $_GET['user_id'];
    ?>
    
    <div class="house">
        <figure class="house_picture">
            <img src="../assets/sample-home.jpg" alt="house-outdoor-1">
        </figure>
        <div class="house_information">
            <h2 class="house_information_heading">Informationen</h2>
            
         
<form class="house_information_list" action="../handlers/edit_home.php" method="POST">
            <input type="hidden" name="home_id" value="<?php echo $id;?>">
            <div class="name-input">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $name?>">
            </div>
            <div class="location-input">
                <label for="location">Ort</label>
                <input type="text" name="location" value="<?php echo $location?>">
            </div>
            <div class="size-input">
                <label for="size">Fläche</label>
                <input type="number" name="size" value="<?php echo $size?>">
            </div>
            <div class="beds-input">
                <label for="beds">Schlafplätze</label>
                <input type="number" name="beds" value="<?php echo $beds?>">
            </div>
            <div class="price-input">
                <label for="price">Preis pro Nacht</label>
                <input type="number" name="price" value="<?php echo $price?>">
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
           <button class="btn house_information__btn" type="submit" name="submit">Änderungen speichern</button>
           </form>
           <form action="./handlers/delete_home.php" method="POST">
            <input type="hidden" name="home_id" value="id">
           <button type="submit" class="btn btn-warning house_information_delete_btn">Unterkunft entfernen</button>
           </form>
        </div>
      </div>
    <?php include '../partials/footer.php' ?>
</body>
</html>