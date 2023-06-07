<?php
include_once('database/dbConnection.php');

$imagePaths = [
    'uploads/product-01.jpg',
    'uploads/product-02.jpg',
    'uploads/product-03.jpg',
    'uploads/product-04.jpg',
    'uploads/product-05.jpg',
    'uploads/product-06.jpg',
    'uploads/product-07.jpg',
    'uploads/product-08.jpg',
    'uploads/product-09.jpg',
    'uploads/product-10.jpg',
    'uploads/product-11.jpg',
    'uploads/product-12.jpg',
];

$imageCount = count($imagePaths);
$productCount = 0;

// Loop through the product IDs and update the database
for ($id = 1; $id <= 50; $id++) {
    $imagePath = $imagePaths[$productCount % $imageCount];

    // SQL query to update the Image column
    $sql = "UPDATE products SET Image='$imagePath' WHERE ID=$id";

    // Execute the query
    $result = $db_con->query($sql);

    if ($result) {
        echo "Image path updated successfully for ID: $id<br>";
    } else {
        echo "Error updating image path for ID: $id - " . $db_con->error . "<br>";
    }

    $productCount++;
}

// Close the database connection
$db_con->close();
?>
