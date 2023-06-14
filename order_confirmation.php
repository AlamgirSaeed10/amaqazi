<?php
include_once ('database/dbConnection.php');
include('header.php');

$query = "SELECT max(customerID) AS last_customerID FROM cart_table ORDER BY customerID DESC";
$result = mysqli_query($db_con, $query);
$row = mysqli_fetch_assoc($result);
$lastCustomerID = $row['last_customerID'];

$query = "SELECT * FROM cart_table WHERE customerID = $lastCustomerID";
$result1 = mysqli_query($db_con, $query);
?>
<body>
<?php
include('navbar.php');?>
  <div class="container py-5">
    <div class="text-center">
      <h1 class="display-4">Thank You for Your Order</h1>
      <p class="lead">We appreciate your business!</p>
    </div>

    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <p class="card-text">Here are the details of your order:</p>
            <div class="container py-2">    
                <div class="bg-light mb-2">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php
                         $line_total=0;
                         $total_cost=0;
                         $shipping_cost=15;
                            if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {  
                                $total_cost += $row['quantity'] *  $row['price'];
                                ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $row['product_name']?></p>
                            <h6><?php echo $row['quantity']?> <sub class="text-muted"><?php echo $row['quantity']?> X <?php echo $row['price']?></sub></h6>
                            <p> $ <?php echo $row['price']?></p>
                            <p> $ <?php echo $row['quantity'] * $row['price']?></p>
                        </div>
                        <?php
                            }
                            } else {
                                echo '<p class="text-center">No cart data found.</p>';
                            }
                            ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$ <?php echo $total_cost;?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$ <?php echo $shipping_cost;?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$ <?php echo $total_cost + $shipping_cost;?> </h5>
                        </div>
                    </div>
                </div>

  </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5">
      <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
