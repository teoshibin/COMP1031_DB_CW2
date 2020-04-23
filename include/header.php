<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakila Mainpage</title>
    <link rel="stylesheet" href="../../css/fixednavbar(main).css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script defer type="text/javascript" src="js/main.js"></script>
    <!-- <script src="../fontawesome/js/all.min.js"></script> -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- css related to table display -->
    <link rel="stylesheet" href="/DB_CW2/css/view.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>
<body>
    <nav class="navbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img src="../../img/logo.png" alt="Sakila logo">
    <ul>
        <li><img src="../../img/logo.png" alt="Sakila logo" class="logo"></li>
        <li><a href="main.php">Home</a></li>
        <li><a href="/DB_CW2/table/customer/view.php">Customer</a></li>
        <li><a href="#">Film</a></li>
        <li><a href="#">Inventory</a></li>
        <li><a href="#">Rental</a></li>
        <li><a href="#">Staff</a></li>
        <li><a href="#">Store</a></li>
        <li><a href="/DB_CW2/page/reset-password.php">reset_password</a></li>
        <li><a href="/DB_CW2/include/logout.inc.php"><i class="fa fa-sign-out-alt logout"></i></a></li>
    </ul>
    </nav>