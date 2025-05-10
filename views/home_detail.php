<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<?php include '../partials/nav.php'; ?>
<main class="main-container">
    
  <?php
  $id =  $_GET['home_id'];
  include '../handlers/get_home_by_id.php';
  ?>
  
  <?php foreach($home_values as $home_value){ ?>
  
    <div class="home">
        <figure class="home_picture">
            <img src="../assets/sample-home.jpg" alt="home-outdoor-1">
        </figure>
        <div class="home_information">
            <h2 class="home_information_heading">Informationen</h2>
  
            <ul class="home_information_list">
                <li
                  class="home_information_list_item"
                >
                <span><?php echo $home_value['name']?></span>
              </li>
                <li class="home_information_list_item"><span><?php echo $home_value['location']?></span></li>
                <li class="home_information_list_item"><span><?php echo $home_value['size']?>m²</span></li>
                <li class="home_information_list_item"><span><?php echo $home_value['beds']?> Gäste</span></li>
                <li class="home_information_list_item"><span>€ <?php echo $home_value['price']?> pro Nacht</span></li>
                <li class="home_information_list_item"><span>Gastgeber: <a href="../views/user_detail.php?user_id=<?php echo $home_value['user_id']?>"><?php echo $user["user_name"]?> </a></span></li>
            </ul>
            <!-- edit and delete button only show if user is logged in and is host -->
            <?php };?>
            <?php if(isset($_SESSION['user_session_id']) && $_SESSION['user_session_id'] == $_GET['user_id']): ?>
    <button class="btn home_edit_btn">
        <a href="./edit_home.php?home_id=<?= $id ?>&name=<?= $home_value['name'] ?>&location=<?= $home_value['location'] ?>&size=<?= $home_value['size'] ?>&beds=<?= $home_value['beds'] ?>&price=<?= $home_value['price'] ?>&user_id=<?= $home_value['user_id'] ?>">
            Bearbeiten
        </a>
    </button>
    <form action="../handlers/delete_home.php" method="POST">
            <input type="hidden" name="home_id" value="<?php echo $id;?>">
           <button type="submit" class="btn btn-warning home_information_delete_btn">Unterkunft entfernen</button>
               </form>
<?php endif; ?>
           
           
        </div>
      </div>
      </main>
      <?php include '../partials/footer.php' ?>

</body>
</html>