<?php

session_start();
include  "../database/dbConnection.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
 
    $sql = "INSERT INTO `productcategories` (CategoryName) VALUE ('$name')";

    if (mysqli_query($db_con, $sql)) {
        header("Location: all_category.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db_con);
    }
}

// Close the database connection
mysqli_close($db_con);
?>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
<!-- <a href="logout.php">Logout</a> -->
    <div class="container">
        <h1>Add Product</h1>

        <form method="POST" action="" enctype="multipart/form-data">
          
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
            <a href="all_category.php" class="btn btn-secondary">Back to Category</a>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
