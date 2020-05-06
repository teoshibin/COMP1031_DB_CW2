<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../../css/update.css">
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="staff_valid.js"></script>
    <script type="text/javascript" src="../../js/dropdown_update.js"></script>
    <style>.select{font-size:13px; height: 44px;}</style>
</head>

<body>

    <?php

    require "../../include/config.php";
    require "../../include/common.php";
    require_once "../../include/login-check.php";
    require_once "../../include/header.php";

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

    //use $_GET to retrieve information from the URL 
    if (isset($_GET['id'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $statement = $connection->prepare("SELECT * FROM staff WHERE staff_id= :staff_id");
            $statement->bindValue(':staff_id', $_GET['id']);
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            $statement = $connection->prepare("SELECT address FROM address WHERE address_id= :address_id");
            $statement->bindValue(':address_id', $result['address_id']);
            $statement->execute();
      
            $address_text = $statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }
        //echo $_GET['actor_id']; 
    } else {
        echo "Something went wrong!";
        exit;
    }
    ?>

    <?php if (isset($_POST['submit']) && $statement) : ?>
        <?php
        header("location: staff.php");
        exit();
        ?>
    <?php endif; ?>

    <form name="myform" action="staff_update.inc.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
        <div class="content">
            <h3 class="title">Update Staff Information</h3>

            <?php
            foreach ($result as $key => $value) :
                if ($key == 'address_id') {
            ?>
                    <select name="address_id" id="address_id">
                        <option value="hide">Staff Address</option>
                        <?php foreach ($address_result as $address) : ?>
                        <option value=<?php echo ($address["address_id"]) ?> <?php echo(($value == $address["address_id"])?'selected':'')?> ><?php echo ("( ID : " . $address['address_id'] . " ) " . $address["address"]) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <script defer>storeValue(<?php echo $value?>,"address_id")</script>
                <?php
                    continue;
                } elseif ($key == 'store_id') {
                ?>
                    <select name="store_id" id="store_id">
                        <option value="hide">Store</option>
                        <?php foreach ($store_result as $store) : ?>
                            <option value=<?php echo ($store["store_id"]) ?>><?php echo ($store["store_id"]) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <script defer>storeValue(<?php echo $value?>,"store_id")</script>
                <?php
                    continue;
                } elseif ($key == 'picture') {
                ?>
                    <div class="input-file-container">
                        <input class="input-file" id="my-file" type="file" name="picture" onchange="return fileValidation()">
                        <label tabindex="0" for="my-file" class="input-file-trigger">Update Selfie :)</label>
                    </div>
                    <p class="file-return"></p>
                    <img src=<?php echo ('"imageView.php?id=' . $_GET['id']) . '"' ?> />
                <?php
                    continue;
                } elseif ($key == 'active') {
                ?>
                    <h5 class="active-label">Active?</h5>
                    <div class="toggle">
                        <input type="radio" name="active" id="sizeWeight" <?php echo (($value == '1') ? "checked='checked'" : "") ?> value="1" />
                        <label for="sizeWeight">Yes</label>
                        <input type="radio" name="active" id="sizeDimensions" value="0" <?php echo (($value == '0') ? "checked='checked'" : "") ?> />
                        <label for="sizeDimensions">No</label>
                    </div>
                <?php
                    continue;
                }
                ?>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                        <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                        <input type="<?php echo (($key == 'password') ? 'password' : 'text'); ?>" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'staff_id' || $key == 'username' || $key == 'password' || $key == 'last_update') ? 'readonly' : '') ?>>
                    </div>
                </div>
            <?php endforeach; ?>

            <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
            <a href="staff.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
        </div>
    </form>
</body>

</html>