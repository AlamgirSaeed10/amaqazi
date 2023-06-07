<?php
include('header.php');
include('database/dbConnection.php');
?>
<head>
    <style>
    .card-img-left {
        padding:10px;
        width: 180px;
        height: 160px;
        object-fit: cover;
        object-position: center;
        }
</style>
</head>
<body>
    <?php include('navbar.php');
$CategoryID = $_GET['CategoryID'];

$sql = "SELECT * FROM products WHERE CategoryID = $CategoryID";
$result = mysqli_query($db_con, $sql);
?>
    <div class="card-deck m-4">
        <div class="row">
            <?php if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productName = $row['Name'];
        $ID = $row['ID'];
        $productDescription = $row['Description'];
        $productImage = $row['Image'];
        ?>

            <div class="col-sm-12 col-lg-4 col-md-4">
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
                            <a href="detail.php?ID=<?php echo $ID?>">
                                <img class="card-img-left" src="img/<?php echo $productImage;?>" alt="Product Image">
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-12 col-lg-4 col-xl-4">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $productName?></h5>
                                <p class="card-text"> <?php echo $productDescription?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
   ?>
        </div>
    </div>
    <?php
} else { ?>
<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-center m-5">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-3"> <span class="text-danger">Opps!</span> Product not Found!</p>
            <p class="lead">
                It seems that the product you're looking for has taken a vacation to a <br> tropical island.Please feel free to browse our other amazing products in the meantime. 
            </p>
            <br>  <strong class="display-4 fw-bold"> Happy shopping!</strong>
            <br> <a href="https://forms.gle/DgkqvTe9A98bnr3y9" class="btn btn-primary mt-5">Request Product</a>
        </div>
    </div>
</div>
<?php }

?>
<!-- Vendor End -->
    
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
</body>
<?php include('footer.php');?>