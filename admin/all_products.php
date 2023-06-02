<?php
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include  "../database/dbConnection.php";
?>
<body>
<div class="card border-dark mb-3">
    <div class="card-header">
        <h2>Products</h2>
        <a href="add_product.php" class="btn btn-success text-right">Add New Product</a>
    </div>
    <div class="card-body">

        <table id="datatable" class="table table-striped" style="width:100%">
            <thead class="bg-dark text-white">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Sale Price</th>
                <th>Purchase Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Size</th>
                <th>Color</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Fetch products from the database
            $sql = "SELECT * FROM Products";
            $result = mysqli_query($db_con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['Code']}</td>";
                    echo "<td>{$row['Name']}</td>";
                    echo "<td>{$row['Qty']}</td>";
                    echo "<td>{$row['SalePrice']}</td>";
                    echo "<td>{$row['PurchasePrice']}</td>";
                    echo "<td>{$row['CategoryID']}</td>";
                    echo "<td>{$row['Description']}</td>";
                    echo "<td><img src='" .($row['Image'] == null ? 'no-found.jpg':$row['Image']) . "' alt='image not found' width='50'> </td>";
                    echo "<td>{$row['Size']}</td>";
                    echo "<td>{$row['Color']}</td>";
                    echo "<td>
                                <a href='edit_product.php?id={$row['ID']}' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete_product.php?id={$row['ID']}' class='btn btn-danger btn-sm' >Delete</a>
                            </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>No products found.</td></tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
</body>
</html>

