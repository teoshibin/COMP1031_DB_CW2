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
        $statement = $connection->prepare("SELECT country_id, country FROM country");

       
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
    <script type="text/javascript" src="city_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New City</h3>
    <form name="myform" action="city_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>City name</h5>
                <input type="text" name="city" id="city" class="input">
            </div>
        </div>

                <select type="text" name="country_id" id="country_id" class="input">
                    <option value="-" selected> Country </option>
                    <?php foreach($result as $country) { echo "<option value =$country[country_id]>$country[country]</option>";}?>
                </select>

        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="city.php" class="btn-back">BACK</a>
        
    </form>
</div>
</body>

</html>