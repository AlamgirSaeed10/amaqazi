<?php
session_start(); // Start or resume the current session

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
