<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
include_once ('database/dbConnection.php');
include('header.php');

function storeCartData($cart, $db_con)
{
    $cfname = mysqli_real_escape_string($db_con, $_POST['cfname']);
    $clname = mysqli_real_escape_string($db_con, $_POST['clname']);
    $cemail = mysqli_real_escape_string($db_con, $_POST['cemail']);
    $cmobile = mysqli_real_escape_string($db_con, $_POST['cmobile']);
    $caddress = mysqli_real_escape_string($db_con, $_POST['caddress']);
    $ccity = mysqli_real_escape_string($db_con, $_POST['ccity']);
    $cstate = mysqli_real_escape_string($db_con, $_POST['cstate']);
    $czip = mysqli_real_escape_string($db_con, $_POST['czip']);
    $orderNo = rand(0001, 1000000);

    $sql = "INSERT INTO `customer_detail` (`CustomerFName`, `CustomerLName`, `CustomerEmail`, `CustomerMobile`, `CustomerAddress`, `CustomerCity`, `CustomerState`, `CustomerZip`, `OrderNo`)
            VALUES ('$cfname', '$clname', '$cemail', '$cmobile', '$caddress', '$ccity', '$cstate', '$czip', '$orderNo')";

    if (mysqli_query($db_con, $sql)) {
        $customerID = mysqli_insert_id($db_con);

        foreach ($cart as $product_id => $quantity) {
            $product_name = mysqli_real_escape_string($db_con, $_SESSION['product_name'][$product_id]);
            $price = $_SESSION['price'][$product_id];
            $sql = "INSERT INTO `cart_table` (`product_id`, `customerID`, `OrderNo`, `product_name`, `quantity`, `price`)
                    VALUES ('$product_id', '$customerID', '$orderNo', '$product_name', '$quantity', '$price')";

            if (!mysqli_query($db_con, $sql)) {
                echo "Error inserting cart data: " . mysqli_error($db_con);
            }
        }

    } else {
        echo "Error inserting customer detail: " . mysqli_error($db_con);
    }

    mysqli_close($db_con);
}

function clearCart()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION['cart']);
    unset($_SESSION['product_name']);
    unset($_SESSION['price']);
}

if (isset($_POST['checkout'])) {
    storeCartData($_SESSION['cart'], $db_con);
    clearCart();
    header('Location: order_confirmation.php');
    exit();
}
?>
<style>
    body {
  min-height: 100vh;
}
</style>
<body>
<?php
include('navbar.php');

?>
    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    
                    <form method="POST" action="" >
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="cfname" required placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="clname" required placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="cemail" required placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="cmobile" required placeholder="+123 456 789">
                            </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="caddress" required placeholder="123 Street">
                        </div>
                      
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="ccity" required placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="cstate" required placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" name="czip" required placeholder="123">
                        </div>
                        <div class="col-md-12 form-group">
                        <div class="text-right">
                            <button  name="checkout"  class="btn btn-primary">Checkout</button>
                </div>
                </div>
                        </form>


                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>


                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">

                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                       $line_total=0;
                       $total_cost=0;
                       $shipping_cost=15;

                       if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        foreach ($_SESSION['cart'] as $product_id =>$quantity) {
                            $total_cost += $quantity * $_SESSION['price'][$product_id];
                            ?>
                                <tr>
                                    <td width="40%"><?php echo $_SESSION['product_name'][$product_id]?></td>
                                    <td width="10%"><?php echo $quantity?></td>
                                    <td width="25%"> $ <?php echo $_SESSION['price'][$product_id]?></td>
                                    <td width="25%"> $ <?php echo $quantity * $_SESSION['price'][$product_id]?></td>
                        </tr>
                            <?php } }?>
                        </tbody>
                    </table>

                    </div>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6> $ <?php echo $total_cost;?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$ <?php echo $shipping_cost;?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5> $ <?php echo $total_cost + $shipping_cost;?></h5>
                        </div>
                    </div>
                </div>
               
                
        </div>
        </div>
    </div>
    <!-- Checkout End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <?php include('footer.php')?>
</body>

</html>