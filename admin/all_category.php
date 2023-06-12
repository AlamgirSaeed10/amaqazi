<?php
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include  "../database/dbConnection.php";
?>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin-style.css">

</head>
<body>
<div class="card border-dark mb-3">
    <div class="card-header">
        <h2>Products</h2>
        <a href="add_product.php" class="btn btn-success text-right">Add New Product</a>
        <a href="add_category.php" class="btn btn-success text-right">Add Category</a>
    </div>
    <div class="card-body">

        <table id="datatable" class="table table-striped" style="width:100%">
            <thead class="bg-dark text-white">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Fetch products from the database
            $sql = "SELECT * FROM Productcategories";
            $result = mysqli_query($db_con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['CategoryID']}</td>";
                    echo "<td>{$row['CategoryName']}</td>";
                    echo "<td>
                                <a href='edit_category.php?id={$row['CategoryID']}' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete_category.php?id={$row['CategoryID']}' class='btn btn-danger btn-sm' >Delete</a>
                            </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>No Category found.</td></tr>";
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

