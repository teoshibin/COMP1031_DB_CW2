<?php 
    require "../../include/config.php";
    require "../../include/common.php";
    require_once "../../include/login-check.php";
    require_once "../../include/header.php";
    

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement1 = $connection->prepare("SELECT film_id,title FROM film");
        $statement2 = $connection->prepare("SELECT store_id FROM store");

       
        $statement1->execute();
        $statement2->execute();
        $result1 = $statement1->fetchAll();
        $result2 = $statement2->fetchAll();

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
    <script type="text/javascript" src="inventory_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Inventory</h3>
  
    <form name="myform" action="inventory_add.inc.php" onsubmit="return validateForm()" method="post">

                <select type="text" name="film_id" id="film_id" class="input">
                    <option value="hide" selected>Film ID</option>
                    <?php foreach($result1 as $film) { echo "<option value =$film[film_id]>$film[title]</option>";}?>
                </select>

                <br>
                
                <select type="text" name="store_id" id="store_id" class="input">
                    <option value="hide" selected>Store ID</option>
                    <?php foreach($result2 as $store) { echo "<option value =$store[store_id]>$store[store_id]</option>";}?>
                </select>


        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="inventory.php" class="btn-back">BACK</a>
        
    </form>
</div>
</body>

</html>