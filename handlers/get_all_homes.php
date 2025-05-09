<?php

include './config/db.php';

$sql = 'SELECT * FROM homes';

$result = mysqli_query($conn, $sql);

$homes = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

