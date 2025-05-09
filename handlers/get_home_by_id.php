<?php

include '../config/db.php';

$sanitized_id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM homes WHERE home_id = ?";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
};

mysqli_stmt_bind_param($stmt, "i", $sanitized_id);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$home_values = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

// get user to show owner

$user_id = $_GET['user_id'];

$sanitized_user_id = filter_var($user_id, FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM users WHERE user_id = ?";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
};

mysqli_stmt_bind_param($stmt, "i", $sanitized_user_id);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);