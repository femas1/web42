<!DOCTYPE html>
<html lang="de">

<?php include 'config/db.php'; ?>
<?php include './handlers/get_all_homes.php'?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="./assets/favicon/favicon.ico" />
    <title>Ferienhäuser</title>
  </head>
  <body>
    <?php include './partials/nav.php'?>
    <main class="main-container">
    <?php foreach($homes as $home) {?>
      <div class="house">
        <figure class="house_picture">
            <img src="./assets/sample-home.jpg" alt="house-outdoor-1">
        </figure>
        <div class="house_information">
            <h2 class="house_information_heading">Informationen</h2>

            <ul class="house_information_list">
                <li class="house_information_list_item"><span><?php echo $home['name']?></span></li>
                <li class="house_information_list_item"><span><?php echo $home['location']?></span></li>
                <li class="house_information_list_item"><span><?php echo $home['size']?>m²</span></li>
                <li class="house_information_list_item"><span><?php echo $home['beds']?> Gäste</span></li>
                <li class="house_information_list_item"><span>€ <?php echo $home['price']?> pro Nacht</span></li>
            </ul>
            <!-- Make a button to pass home and user id in a post request instead of URL get param -->
           <a class="btn house_information_detail_btn" href="./views/home_detail.php?home_id=<?php echo $home['home_id'];?>&user_id=<?php echo $home['user_id'];?>">Details ansehen</a>

                       <!-- if session issett send the id as post request -->
                       <?php if(isset($_SESSION['user_session_id'])){ ?>
              <input type="hidden" name="user_id" value="<?php echo $home['user_id']; ?>">
            <?php } ?>
           <form action="./handlers/delete_home.php" method="POST">
            <input type="hidden" name="home_id" value="<?php echo $home['home_id'];?>">
           <button type="submit" class="btn btn-warning house_information_delete_btn">Unterkunft entfernen</button>
           </form>
        </div>
      </div>
      <?php }?>
    </main>
    <?php include './partials/footer.php'?> 
  </body>
</html>