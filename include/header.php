<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakila</title>
    
    <link rel="stylesheet" href="/DB_CW2/css/fixednavbar(main).css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script defer type="text/javascript" src="/DB_CW2/js/main.js"></script>
    <!-- <script src="../fontawesome/js/all.min.js"></script> -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- css related to table display -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/DB_CW2/css/view.css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</head>
<body>
    <nav class="navbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img src="/DB_CW2/img/logo.png" alt="Sakila logo">
        <a href="/DB_CW2/include/logout.inc.php"><i class="fa fa-sign-out-alt" id="logout"></i></a>
    <ul>
        <li><a href="main.php">Home</a></li>
        <hr class="nav-line">
        <li><a href="/DB_CW2/table/actor/actor.php">Actor</a></li>
        <li><a href="/DB_CW2/table/address/address.php">Address</a></li>
        <li><a href="/DB_CW2/table/category/category.php">Category</a></li>
        <li><a href="/DB_CW2/table/city/city.php">City</a></li>
        <li><a href="/DB_CW2/table/country/country.php">Country</a></li>
        <li><a href="/DB_CW2/table/customer/customer.php">Customer</a></li>
        <li><a href="/DB_CW2/table/film/film.php">Film</a></li>
        <li><a href="/DB_CW2/table/film_actor/film_actor.php">Film Actor</a></li>
        <li><a href="/DB_CW2/table/film_category/film_category.php">Film Category</a></li>
        <li><a href="#">Film Text</a></li>
        <li><a href="#">Inventory</a></li>
        <li><a href="#">Language</a></li>
        <li><a href="#">Payment</a></li>
        <li><a href="#">Rental</a></li>
        <li><a href="#">Staff</a></li>
        <li><a href="#">Store</a></li>
        <hr class="nav-line">
        <li><a href="/DB_CW2/page/reset-password.php">Reset Password</a></li>
    </ul>
    </nav>