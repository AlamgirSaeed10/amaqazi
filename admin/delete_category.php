<?php
session_start();
include  "../database/dbConnection.php";

$productID = $_GET['id'];

// Delete the product from the database
$sql = "DELETE FROM productcategories WHERE CategoryID = $productID";

if (mysqli_query($db_con, $sql)) {
    header("Location: all_category.php");
    exit();
} else {
    echo "Error deleting product: " . mysqli_error($db_con);
}

mysqli_close($db_con);
?>

