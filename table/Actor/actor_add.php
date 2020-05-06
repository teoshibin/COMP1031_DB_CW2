<?php
    require_once "../../include/login-check.php";
    require_once "../../include/header.php";
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
    <script type="text/javascript" src="actor_valid.js"></script>
    
</head>

<div class="content">
    <h3 class="title">New Actor</h3>
    <form name="myform" action="actor_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>First name</h5>
                <input type="text" name="first_name" id="first_name" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Last name</h5>
                <input type="text" name="last_name" id="last_name" class="input">
            </div>
        </div>

        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="actor.php" class="btn-back">BACK</a>
        
    </form>
</div>
</body>

</html>