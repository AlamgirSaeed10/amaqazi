<?php
session_start();
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name =$_POST['product_name'];
    $product_image =$_POST['product_image'];
    $price = $_POST['price'];
    addToCart($product_id, $product_name,$product_image, $price);
    $_SESSION['success_message'] = 'Product added to cart successfully.';
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    exit();
}
function addToCart($product_id, $product_name,$product_image, $price)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
    $_SESSION['product_name'][$product_id] = $product_name;
    $_SESSION['product_image'][$product_id] = $product_image;
    $_SESSION['price'][$product_id] = $price;
}

?>
