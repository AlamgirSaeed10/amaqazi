<?php
$DATABASE_NAME = "amaqazi";
$DATABASE_USER = 'root';
$DATABASE_PASS = null;
$DATABASE_HOST = 'localhost';

$db_con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
