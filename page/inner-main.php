<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<?php
require_once "../include/header.php";
require_once "../include/navbar.php";
?>


<div class="my-body vh-100">



    <!-- <u1>
        <li>
            <a href="create.php"><strong>Create</strong></a> - Register a Student
        </li>
        <li>
            <a href="read.php"><strong>Search</strong></a> - Search a Student
        </li>
        <li>
            <a href="#"><strong>Edit</strong></a> - Edit Student Information
        </li>
        <li>
            <a href="#"><strong>Delete</strong></a> - Delete Student Information
        </li>
    </u1> -->
</div>

<?php
require_once "../include/footer.php";
?>