<?php
    require_once "../include/login-check.php";
    require_once "../include/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakila Home page</title>
    <link rel="stylesheet" href="/DB_CW2/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script defer type="text/javascript" src="/DB_CW2/js/main.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
            
        <h2 class="title">SAKILA</h2>
        <p>A film renting website.</p>

    <div class="row">
        <div class="column">
            <a href="\DB_CW2\table\actor\actor.php" class="tile">Actor</a>
            <a href="\DB_CW2\table\address\address.php" class="tile">Address</a>
            <a href="\DB_CW2\table\category\category.php" class="tile">Category</a>
            <a href="\DB_CW2\table\store\store.php" class="tile">Store</a>
        </div>

        <div class="column">
            <a href="\DB_CW2\table\city\city.php" class="tile">City</a>
            <a href="\DB_CW2\table\country\country.php" class="tile">Country</a>
            <a href="\DB_CW2\table\customer\customer.php" class="tile">Customer</a>
        </div>

        <div class="column">
            <a href="\DB_CW2\table\film\film.php" class="tile">Film</a>
            <a href="\DB_CW2\table\film_actor\film_actor.php" class="tile">Film Actor</a>
            <a href="\DB_CW2\table\film_category\film_category.php" class="tile">Film Category</a>
        </div>

        <div class="column">
            <a href="\DB_CW2\table\film_text\film_text.php" class="tile">Film Text</a>
            <a href="\DB_CW2\table\inventory\inventory.php" class="tile">Inventory</a>
            <a href="\DB_CW2\table\language\language.php" class="tile">Language</a>
        </div>

        <div class="column">
            <a href="\DB_CW2\table\payment\payment.php" class="tile">Payment</a>
            <a href="\DB_CW2\table\rental\rental.php" class="tile">Rental</a>
            <a href="\DB_CW2\table\staff\staff.php" class="tile">Staff</a>
        </div>

    </div>

</body>
</html>