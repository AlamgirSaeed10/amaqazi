<?php
session_start();
include  "../database/dbConnection.php";

$productID = $_GET['id'];

// Fetch the product
$sql = "SELECT * FROM Products WHERE ID = $productID";
$result = mysqli_query($db_con, $sql);
$product = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input fields
    $code = $_POST['code'];
    $name = $_POST['name'];
    $qty = (int)$_POST['qty'];
    $salePrice = (float)$_POST['sale_price'];
    $purchasePrice = (float)$_POST['purchase_price'];
    $categoryID = (int)$_POST['category_id'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $size = $_POST['size'];
    $color = $_POST['color'];

    // Update the product in the database
    $sql = "UPDATE Products SET Code = '$code', Name = '$name', Qty = $qty, SalePrice = $salePrice,
            PurchasePrice = $purchasePrice, CategoryID = $categoryID, Description = '$description',
            Image = '$image', Size = '$size', Color = '$color' WHERE ID = $productID";

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
        <h1>Edit Product</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" name="code" value="<?php echo $product['Code']; ?>" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $product['Name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="qty">Quantity:</label>
                <input type="number" class="form-control" name="qty" value="<?php echo $product['Qty']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price:</label>
                <input type="number" step="0.01" class="form-control" name="sale_price" value="<?php echo $product['SalePrice']; ?>" required>
            </div>
            <div class="form-group">
                <label for="purchase_price">Purchase Price:</label>
                <input type="number" step="0.01" class="form-control" name="purchase_price" value="<?php echo $product['PurchasePrice']; ?>" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" name="category_id" required>
                    <?php foreach ($categories as $categoryID => $categoryName) { ?>
                        <option value="<?php echo $categoryID; ?>" <?php if ($categoryID == $product['CategoryID']) echo 'selected'; ?>><?php echo $categoryName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description"><?php echo $product['Description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" value="<?php echo $product['Image']; ?>">
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                <input type="text" class="form-control" name="size" value="<?php echo $product['Size']; ?>">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color" value="<?php echo $product['Color']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="all_products.php" class="btn btn-secondary">Back to Products</a>
        </form>
    </div>
</body>
</html>
