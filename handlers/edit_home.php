<?php

include '../config/db.php';

if(isset($_POST['submit'])){

// 1. sanitize

$sanitized_id = filter_var($_POST['home_id'], FILTER_SANITIZE_NUMBER_INT);
$sanitized_name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$sanitized_location = filter_var($_POST['location'], FILTER_SANITIZE_SPECIAL_CHARS);
$sanitized_size = filter_var($_POST['size'], FILTER_SANITIZE_NUMBER_INT);
$sanitized_beds = filter_var($_POST['beds'], FILTER_SANITIZE_NUMBER_INT);
$sanitized_price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
$sanitized_user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_FLOAT);

// 2. validate
if(empty($sanitized_name)){
    die("Bitte einen Namen eingeben.");
} else if(empty($sanitized_location)){
    die("Bitte einen Ort eingeben.");
} else if(empty($sanitized_size)){
    die("Bitte einen Wert für die Fläche eingeben.");
} else if(empty($sanitized_beds)){
    die("Bitte einen Wert für Schlafplätze eingeben.");
} else if(empty($sanitized_price)){
    die("Bitte einen Preis eingeben");
};
// 3. sql string with placeholders

$sql = "UPDATE homes SET name = ?, location = ?, size = ?, beds = ?, price = ? WHERE home_id = ?;";

// 4. initialize

$stmt = mysqli_stmt_init($conn);

// 5. prepare to check syntax

if(!mysqli_stmt_prepare($stmt, $sql)){
    die("check your query");
};
// 6. binding to connect placeholders to values

mysqli_stmt_bind_param($stmt, "ssiiii", $sanitized_name, $sanitized_location, $sanitized_size, $sanitized_beds, $sanitized_price, $sanitized_id);
// 7. execute and redirect

mysqli_stmt_execute($stmt);
header("Location: /ferienhaus/views/home_detail.php?home_id=$sanitized_id&user_id=$sanitized_user_id");
}