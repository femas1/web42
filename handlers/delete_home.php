<?php

include dirname(__DIR__) . '/config/db.php';

if(isset($_POST['home_id'])){
    
$id = $_POST['home_id'];
$sql = "DELETE FROM homes WHERE home_id = ?";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
};

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);
header('Location: /ferienhaus');
};