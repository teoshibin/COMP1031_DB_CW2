<?php
require "../../include/config.php";
require "../../include/common.php";
require_once "../../include/login-check.php";
require_once "../../include/header.php";

$statement = false;

try {

    //#1 Open Connection
    $connection = new PDO($dsn, $username, $password, $options);

    //#2 Prepare Sql QUery 
    $statement1 = $connection->prepare("SELECT inventory_id FROM inventory");
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    $statement2 = $connection->prepare("SELECT customer_id,first_name,last_name FROM customer");
    $statement2->execute();
    $result2 = $statement2->fetchAll();

    $statement3 = $connection->prepare("SELECT staff_id,first_name,last_name FROM staff");
    $statement3->execute();
    $result3 = $statement3->fetchAll();
} catch (PDOException $error) {

    echo "<br>" . $error->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <!-- <script type="text/javascript" src="insert.js"></script> -->
    <script type="text/javascript" src="film_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Rental</h3>

    <form name="myform" action="rental_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Inventory</h5>
                <input type="text" name="inventory_id" id="inventory_id" class="input">
            </div>
        </div>

        <br>

        <select type="text" name="customer_id" id="customer_id" class="input">
            <option value="hide" selected>Customer ID</option>
            <?php foreach ($result2 as $customer) {
                echo "<option value =$customer[customer_id]>$customer[customer_id]. $customer[first_name] $customer[last_name]</option>";
            } ?>
        </select>

        <br>

        <select type="text" name="staff_id" id="staff_id" class="input">
            <option value="hide" selected>Staff ID</option>
            <?php foreach ($result3 as $staff) {
                echo "<option value =$staff[staff_id]>$staff[staff_id]. $staff[first_name] $staff[last_name]</option>";
            } ?>
        </select>

        <br>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Return Date</h5>
                <input type="text" name="return_date" id="return_date" class="input">
            </div>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" style="margin-top:30px">

        <br>

        <a href="rental.php" class="btn-back" style="margin-bottom:100px;">BACK</a>

    </form>
</div>
</body>

</html>