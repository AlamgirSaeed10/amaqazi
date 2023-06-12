<?php
session_start();
include  "../database/dbConnection.php";

$productID = $_GET['id'];

// Fetch the product
$sql = "SELECT * FROM productcategories WHERE CategoryID = $productID";
$result = mysqli_query($db_con, $sql);
$category = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];

    $sql = "UPDATE productcategories SET CategoryName = '$name' WHERE CategoryID = $productID";

    if (mysqli_query($db_con, $sql)) {
        header("Location: all_category.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db_con);
    }
}

mysqli_close($db_con);
?>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin-style.css">

</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        <form method="POST" action="">
         
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $category['CategoryName']; ?>" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="all_category.php" class="btn btn-secondary">Back to Category</a>
        </form>
    </div>
</body>
</html>
