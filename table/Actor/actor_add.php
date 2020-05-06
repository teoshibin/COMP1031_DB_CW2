<?php
    require_once "../../include/login-check.php";
    require_once "../../include/header.php";
?>

<link rel="stylesheet" href="../../css/insert.css">
<script type="text/javascript" src="actor_valid.js"></script>

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