<?php
include('header.php');
include('database/dbConnection.php');
?>

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
        $productDescription = $row['Description'];
        $productImage = $row['Image'];
        ?>

            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img class="card-img-left" src="img/cat-1.jpg" alt="Product Image">
                        </div>
                        <div class="col-md-8">
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
} else {
    echo "No products found.";
}

include('footer.php');
?>
</body>