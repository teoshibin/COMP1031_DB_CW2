<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../../page/login.php");
    exit;
}
?>

<?php
// require_once "../include/header.php";
// require_once "../include/navbar.php";
?>

<?php
// require_once "../include/footer.php";
?>