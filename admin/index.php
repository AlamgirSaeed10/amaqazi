<?php
session_start();
if($_SESSION['user_id'] !== null){
    header("Location: all_products.php");
}
include  "../database/dbConnection.php";
// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db_con, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Store user details in the session
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['username'] = $user['username'];

        header("Location: all_products.php");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}

// Close the database connection
mysqli_close($db_con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin-style.css">

</head>
<body>
<div class="container">
    <h1>Login</h1>

    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
