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
    $statement = $connection->prepare("SELECT address_id FROM store");

    $statement->execute();
    $store_result = $statement->fetchAll();

    //#2 Prepare Sql QUery 
    $statement = $connection->prepare("SELECT staff_id, first_name, last_name FROM staff");

    $statement->execute();
    $staff_result = $statement->fetchAll();

    //#2 Prepare Sql QUery 
    $statement = $connection->prepare("SELECT address_id, address FROM address");

    $statement->execute();
    $address_result = $statement->fetchAll();
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
    <script type="text/javascript" src="store_valid.js"></script>
</head>
<style>.select{font-size:13px; height: 44px;}</style>

<div class="content">
    <h3 class="title">New Store</h3>
    <form name="myform" action="store_add.inc.php" onsubmit="return validateForm()" method="post">

        <select name="manager_staff_id" id="manager_staff_id">
            <option value="hide">Manager</option>
            <?php foreach ($staff_result as $staff) : ?>
                <option value=<?php echo ($staff["staff_id"]) ?>><?php echo ('( ID :' . $staff['staff_id'] . ' ) ' . $staff["first_name"] . ' ' . $staff["last_name"]) ?></option>
            <?php endforeach; ?>
        </select>
        
        <br>

        <select name="address_id" id="address_id">
            <option value="hide">Store Address</option>
            <?php 
                foreach ($address_result as $address) :
                    // $available = true; 
                    // foreach ($store_result as $store_row -> $used_address){
                    //     if($address["address_id"] == $used_address){
                    //         $available = false;
                    //     }                      
                    // }
                    // if($available == true){
            ?>
                <option value=<?php echo ($address["address_id"]) ?>><?php echo ("(ID : " . $address['address_id'] . " ) " . $address["address"]) ?></option>
            <?php
                    // }
                endforeach; 
            ?>
        </select>

        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="store.php" class="btn-back">BACK</a>

    </form>
</div>
</body>

</html>