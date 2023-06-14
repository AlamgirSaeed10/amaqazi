<?php
include('header.php');
include_once ('database/dbConnection.php');
?>
<style>
    .prod_img{
        padding: 10px;
    width: 422px;
    height: 422px;
    object-fit: cover;
    object-position: center;
    }
</style>
<body>
    <?php
    include('navbar.php');
    ?>
<div class="col-lg-11 col-md-11 mx-auto">
    <div class="row justify-content-center pb-3">
    <?php
   $productsPerPage = 12;
   $totalProducts = 0;
   $totalPages = 0;
   
   $currentPage = 1;
   if (isset($_GET['page'])) {
       $currentPage = $_GET['page'];
   }
   
   $resultCount = $db_con->query("SELECT COUNT(*) AS total FROM products");
   if ($resultCount->num_rows > 0) {
       $row = $resultCount->fetch_assoc();
       $totalProducts = $row['total'];
   }
   
   $totalPages = ceil($totalProducts / $productsPerPage);
   $startIndex = ($currentPage - 1) * $productsPerPage;
   $sql = "SELECT * FROM products LIMIT $startIndex, $productsPerPage";
   $result = $db_con->query($sql);
   ?>
   
   <div class="col-lg-11 col-md-11 mx-auto">
       <div class="row justify-content-center pb-3">
           <?php
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                $Name = $row['Name'];
                $ID = $row['ID'];
                $SalePrice = $row['SalePrice'];
                $image = $row['Image'];

                   ?>
                   <form id="add-cart<?php echo $ID?>" method="post" action="addToCart.php">
                            <input type="hidden" name="product_id" value="<?php echo $ID;?>">
                            <input type="hidden" name="product_name" value="<?php echo $Name;?>">
                            <input type="hidden" name="product_image" value="<?php echo $image;?>">
                            <input type="hidden" name="price" value="<?php echo $SalePrice;?>">
                        </form>

                   <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                       <div class="product-item bg-light mb-4">
                       <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 prod_img" src="img/<?php echo $row['Image']?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" onclick="add_cart(<?php echo $ID; ?>)"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?php echo $row['Name']?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?php echo $row['SalePrice']?></h5><h6 class="text-muted ml-2"><del><?php echo $row['SalePrice']?></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                       </div>
                   </div>
                   <?php
               }
           } else {
               echo "No products found.";
           }
           ?>
       </div>
   </div>
   
   <div class="col-12">
       <nav>
           <ul class="pagination justify-content-center">
               <?php
               if ($currentPage > 1) {
                   echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
               } else {
                   echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
               }
               for ($i = 1; $i <= $totalPages; $i++) {
                   if ($i == $currentPage) {
                       echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                   } else {
                       echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                   }
               }
               if ($currentPage < $totalPages) {
                   echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
               } else {
                   echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
               }
               ?>
           </ul>
       </nav>
   </div>
   

   <script>
    function add_cart(formIndex) {
        document.getElementById("add-cart" + formIndex).submit();
    }
</script>
    <!-- Shop End -->
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