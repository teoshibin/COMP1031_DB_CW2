<?php

require "../../include/config.php";
require "../../include/common.php";

$statement = false;

try {
   
    //#1 Open Connection
    $connection = new PDO($dsn, $username, $password, $options);

    //address_id dropdown
    $statement = $connection->prepare("SELECT address_id, address FROM address");
    $statement->execute();
    $address_result = $statement->fetchAll();

    //store_id dropdown
    $statement = $connection->prepare("SELECT store_id FROM store");
    $statement->execute();
    $store_result = $statement->fetchAll();

} catch (PDOException $error) {

    echo "<br>" . $error->getMessage();

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
    <script type="text/javascript" src="staff_valid.js"></script>
    <style>.select{font-size:13px; height: 44px;}</style>
</head>

<div class="content">
    <h3 class="title">Add Staff</h3>
    <form name="myform" action="staff_add.inc.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">

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

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Email</h5>
                <input type="text" name="email" id="email" class="input">
            </div>
        </div>

        <select name="address_id" id="address_id">
            <option value="hide">Staff Address</option>
            <?php foreach ($address_result as $address) : ?>
                <option value=<?php echo ($address["address_id"]) ?>><?php echo ("( ID : " . $address['address_id'] . " ) " . $address["address"]) ?></option>
            <?php endforeach; ?>
        </select>


            <div class="input-file-container">  
                <input class="input-file" id="my-file" type="file" name="picture" onchange="return fileValidation()">
                <label tabindex="0" for="my-file" class="input-file-trigger">Put your Selfie here :)</label>
            </div>
            <p class="file-return"></p>

        <select name="store_id" id="store_id">
            <option value="hide">Store</option>
            <?php foreach ($store_result as $store) : ?>
                <option value=<?php echo ($store["store_id"]) ?>><?php echo ($store["store_id"]) ?></option>
            <?php endforeach; ?>
        </select>

        <h5 class="active-label">Active?</h5>
        <div class="toggle">
            <input class="activeYes" type="radio" name="active" value=1 id="sizeWeight" checked="checked" />
            <label for="sizeWeight">Yes</label>
            <input class="activeNo" type="radio" name="active" value=0 id="sizeDimensions" />
            <label for="sizeDimensions">No</label>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Username</h5>
                <input type="text" name="username" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Password</h5>
                <input type="password" name="password" class="input">
            </div>
        </div>

        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="staff.php" class="btn-back">BACK</a>

    </form>
</div>
</body>

</html>