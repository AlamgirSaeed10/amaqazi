<?php
error_reporting(E_ALL);
include_once ('database/dbConnection.php');
ini_set('display_errors', 1);
include('header.php');
session_start();
if (isset($_GET['del_id'])) {
    $product_id = $_GET['del_id'];

    // Remove the product with the given ID from the cart
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)  {
        unset($_SESSION['cart'][$product_id]);
        unset($_SESSION['product_name'][$product_id]);
        unset($_SESSION['price'][$product_id]);
    }
}
function storeCartData($cart, $db_con)
{
    // Iterate through the cart items and insert into the database
    foreach ($cart as $product_id => $quantity) {
        $product_name = $_SESSION['product_name'][$product_id];
        $price = $_SESSION['price'][$product_id];
        
        // Prepare the SQL query
        $sql = "INSERT INTO `cart_table`(`product_id`, `product_name`, `quantity`, `price`)
                VALUES ('$product_id', '$product_name', '$quantity', '$price')";
        
        // Execute the query
        if (!mysqli_query($db_con, $sql)) {
            echo "Error inserting cart data: " . mysqli_error($db_con);
        }
    }
    
    // Close the database connection
    mysqli_close($db_con);
}


function clearCart()
{
    session_start();
    unset($_SESSION['cart']);
    unset($_SESSION['product_name']);
    unset($_SESSION['price']);
}
if (isset($_POST['checkout'])) {
    
    storeCartData($_SESSION['cart'], $db_con);
    clearCart();
    header("Location: index.php");
    exit();
}
?>
<style>
    body {
  min-height: 100vh;
}
</style>
<?php
include('navbar.php');
?>
<body>
<div class="px-4 px-lg-0">

  <div class="pb-5 py-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Total</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php

    // Check if the cart exists and is not empty
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $product_id =>$quantity) {
            ?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                    <img src="admin/<?php echo $_SESSION['product_image'][$product_id]; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="detail.php?ID=<?php echo $product_id?>" class="text-dark d-inline-block align-middle"><?php echo $_SESSION['product_name'][$product_id]?></a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?php echo $_SESSION['price'][$product_id]?></strong></td>
                  <td class="border-0 align-middle">
                      <button class="btn btn-sm btn-secondary" onclick="decrementQuantity(<?php echo $product_id?>)"><i class="fa-solid fa-cart-minus "></i></button>
                      <span class="border-0 align-middle" id="quantity-<?php echo $product_id?>"><strong><?php echo $quantity?></strong></span>
                      <button class="btn btn-sm btn-secondary" onclick="incrementQuantity(<?php echo $product_id?>)"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </td>
                  <td class="border-0 align-middle"><span class="border-0 align-middle"><?php echo $quantity * $_SESSION['price'][$product_id] ?></span>
                <br><sub><?php echo $quantity ?> x <?php echo $_SESSION['price'][$product_id] ?></sub>
                </td>
                  <td class="border-0 align-middle"><a href="cart.php?del_id=<?php echo $product_id; ?>" class="text-dark" id="del_pro"><i class="fa fa-trash"></i></a></td>
                </tr>

              <?php } }else{
                ?>
                
                <tr>
                  <th class="border-0 text-center">
                    <p>Cart is empty...!</p>
                  </th>
                </tr>
                <?php
              }?>
              </tbody>
            </table>
            <tfoot>
                <div class="text-right">
                <form action="checkout.php" method="post">
                    <a href="index.php" class="btn btn-secondary">Back to Shopping</a>
                    <button type="submit" name="checkout"  class="btn btn-success">Checkout</button>
                </form>
                </div>
                </tfoot>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function incrementQuantity(productId) {
            var quantityElement = document.getElementById('quantity-' + productId);
            var quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        }

        function decrementQuantity(productId) {
            var quantityElement = document.getElementById('quantity-' + productId);
            var quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;
            }
        }
</script>

    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/main.js"></script>
    <?php include('footer.php');?>
</body>