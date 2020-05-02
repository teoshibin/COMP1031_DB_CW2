<?php 
    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("SELECT   language_id, name FROM language");

       
        $statement->execute();
        $result = $statement->fetchAll();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <!-- <script type="text/javascript" src="insert.js"></script> -->
    <script type="text/javascript" src="film_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Rental</h3>
  
    <form name="myform" action="film_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Rental ID</h5>
                <input type="text" name="rental_id" id="rental_id" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Inventory ID</h5>
                <input type="text" name="inventory_id" id="inventory_id" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Customer ID</h5>
                <input type="text" name="customer_id" id="customer_id" class="input">
            </div>
        </div>
        
        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Return Date</h5>
                <input type="text" name="return_date" id="return_date" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Staff ID</h5>
                <input type="text" name="staff_id" id="staff_id" class="input">
            </div>
        </div>


        <input class="btn btn-primary" type="submit" name="submit" style="margin-top:30px">

        <br>

        <a href="rental.php" class="btn-back" style="margin-bottom:100px;">BACK</a>
        
    </form>
</div>
</body>

</html>