<?php
session_start();
include  "../database/dbConnection.php";

$productID = $_GET['id'];

// Delete the product from the database
$sql = "DELETE FROM Products WHERE ID = $productID";

if (mysqli_query($db_con, $sql)) {
    header("Location: all_products.php");
    exit();
} else {
    echo "Error deleting product: " . mysqli_error($db_con);
}

mysqli_close($db_con);
?>

