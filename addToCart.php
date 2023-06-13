<?php
// addToCart.php

session_start();

// Check if the product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name =$_POST['product_name'];
    $product_image =$_POST['product_image'];
    $price = $_POST['price'];
    
addToCart($product_id, $product_name,$product_image, $price);

    // Set a success message
    $_SESSION['success_message'] = 'Product added to cart successfully.';

    // Redirect back to the product page
    header('Location: index.php');
    exit();
}

// Function to add the product to the cart
// addCart method
function addToCart($product_id, $product_name,$product_image, $price)
{
    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product to the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Increment the quantity if the product is already in the cart
        $_SESSION['cart'][$product_id]++;
    } else {
        // Set the quantity to 1 if it's a new product
        $_SESSION['cart'][$product_id] = 1;
    }
    // session_start();

    // // Check if the cart is empty or not
    // if (isset($_SESSION['cart'])) {
    //     // Check if the product already exists in the cart
    //     if (isset($_SESSION['cart'][$product_id])) {
    //         // If the product exists, increase the quantity
    //         $_SESSION['cart'][$product_id]++;
    //     } else {
    //         // If the product doesn't exist, add it to the cart
    //         $_SESSION['cart'][$product_id] = 1;
    //     }
    // } else {
    //     // If the cart is empty, create a new cart and add the product
    //     $_SESSION['cart'] = array($product_id => $quantity);
    // }

    // Store the product details in session variables
    $_SESSION['product_name'][$product_id] = $product_name;
    $_SESSION['product_image'][$product_id] = $product_image;
    $_SESSION['price'][$product_id] = $price;
}

?>
