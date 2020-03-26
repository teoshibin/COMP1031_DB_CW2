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
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tables
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#" onclick="<?php ?>">Actor</a>
                    <a class="dropdown-item" href="#">Address</a>
                    <a class="dropdown-item" href="#">Category</a>
                    <a class="dropdown-item" href="#">city</a>
                    <a class="dropdown-item" href="#">country</a>
                    <a class="dropdown-item" href="#">custormer</a>
                    <a class="dropdown-item" href="#">film</a>
                    <a class="dropdown-item" href="#">film actor</a>
                    <a class="dropdown-item" href="#">film category</a>
                    <a class="dropdown-item" href="#">film text</a>
                    <a class="dropdown-item" href="#">inventory</a>
                    <a class="dropdown-item" href="#">language</a>
                    <a class="dropdown-item" href="#">payment</a>
                    <a class="dropdown-item" href="#">rental</a>
                    <a class="dropdown-item" href="#">staff</a>
                    <a class="dropdown-item" href="#">store</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlspecialchars($_SESSION["first_name"])." ".htmlspecialchars($_SESSION["last_name"]); ?>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="reset-password.php">Change Password</a>
                    <a class="dropdown-item" href="../include/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

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