<?php

session_start();
include  "../database/dbConnection.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $code = $_POST['code'];
    $name = $_POST['name'];
    $qty = (int)$_POST['qty'];
    $salePrice = (float)$_POST['sale_price'];
    $purchasePrice = (float)$_POST['purchase_price'];
    $categoryID = (int)$_POST['category_id'];
    $description = $_POST['description'];

    $size = $_POST['size'];
    $color = $_POST['color'];

    $uploadDirectory = 'uploads/'; // Directory where images will be stored

    $file = $_FILES['image'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    // Check if the file has no errors
    if ($fileError === 0) {
        $fileDestination = $uploadDirectory . $fileName;

        // Move the uploaded file to the specified destination
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "Image uploaded successfully.";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Error uploading image: " . $fileError;
    }


    // Insert the product into the database
    $sql = "INSERT INTO Products (Code, Name, Qty, SalePrice, PurchasePrice, CategoryID, Description, Image, Size, Color)
            VALUES ('$code', '$name', $qty, $salePrice, $purchasePrice, $categoryID, '$description', '$fileDestination', '$size', '$color')";

    if (mysqli_query($db_con, $sql)) {
        header("Location: all_products.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db_con);
    }
}

// Fetch product categories
$sql = "SELECT * FROM ProductCategories";
$result = mysqli_query($db_con, $sql);
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[$row['CategoryID']] = $row['CategoryName'];
}

// Close the database connection
mysqli_close($db_con);
?>

<body>
    <div class="container">
        <h1>Add Product</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" name="code" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="qty">Quantity:</label>
                <input type="number" class="form-control" name="qty" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price:</label>
                <input type="number" step="0.01" class="form-control" name="sale_price" required>
            </div>
            <div class="form-group">
                <label for="purchase_price">Purchase Price:</label>
                <input type="number" step="0.01" class="form-control" name="purchase_price" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" name="category_id" required>
                    <?php foreach ($categories as $categoryID => $categoryName) { ?>
                        <option value="<?php echo $categoryID; ?>"><?php echo $categoryName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" accept="image/*" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" name="size">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="all_products.php" class="btn btn-secondary">Back to Products</a>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
