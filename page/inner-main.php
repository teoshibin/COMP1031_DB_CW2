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
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="anchor">
    <a class="navbar-brand" href="inner-main.php">SAKILA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#header">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="my-body">


    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site. ignore this ugly part</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../include/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <u1>
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
    </u1>
</div>

<?php
require_once "../include/footer.php";
?>