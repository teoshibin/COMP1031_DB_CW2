<?php 
    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("SELECT film_id, title FROM film");

       
        $statement->execute();
        $film_result = $statement->fetchAll();


        $statement = $connection->prepare("SELECT actor_id, first_name, last_name FROM actor");

        $statement->execute();
        $actor_result = $statement->fetchAll();

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
    <script type="text/javascript" src="film_actor_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Film Actor</h3>
    <form name="myform" action="film_actor_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Actor</h5>
                <select type="text" name="actor_id" id="actor_id" class="input">
                    <option value="-" selected> --NULL-- </option>
                    <?php foreach($actor_result as $actor) { echo "<option value =$actor[actor_id]>$actor[first_name] $actor[last_name]</option>";}?>
                </select>
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Film</h5>
                <select type="text" name="film_id" id="film_id" class="input">
                    <option value="NULL" selected> --NULL-- </option>
                    <?php foreach($film_result as $film) { echo "<option value =$film[film_id]>$film[title]</option>";}?>
                </select>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="film_actor.php" class="btn-back">BACK</a>
        
    </form>
</div>
</body>

</html>