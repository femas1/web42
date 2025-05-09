<?php 

include dirname(__DIR__) . '/config/db.php';

if(isset($_POST['submit'])){

    // sanitizing values using filter constants
    
    $sanitized_user_id = filter_var(trim($_POST['user_id']), FILTER_SANITIZE_NUMBER_INT);
    $sanitizedName = filter_var(trim($_POST['name']), FILTER_SANITIZE_SPECIAL_CHARS);
    $sanitizedLocation = filter_var(trim($_POST['location']), FILTER_SANITIZE_SPECIAL_CHARS);
    $sanitizedSize = filter_var(trim($_POST['size']), FILTER_SANITIZE_NUMBER_INT);
    $sanitizedBeds = filter_var(trim($_POST['beds']), FILTER_SANITIZE_NUMBER_INT);
    // if the flag allow fraction is not used, it will delete the . from the float
    $sanitizedPrice = filter_var(trim($_POST['price']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if(empty($sanitizedName)){
        die("Name cannot be empty!");
    } else if (empty($sanitizedLocation)){
        die("Location cannot be empty");
    } else if (empty($sanitizedSize)){
        die("Size cannot be empty");
    } else if (empty($sanitizedBeds)){
        die("Beds cannot be empty");
    } else if (empty($sanitizedPrice)){
        die("Price cannot be empty");
    };

    // ADD ERROR HANDLING IF THE USER ID IS NOT AVAILABLE

$sql = "INSERT INTO homes (name, location, size, beds, price, user_id) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
};

mysqli_stmt_bind_param($stmt, "ssiidi", $sanitizedName, $sanitizedLocation, $sanitizedSize, $sanitizedBeds, $sanitizedPrice, $sanitized_user_id);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header('Location: /ferienhaus');
};