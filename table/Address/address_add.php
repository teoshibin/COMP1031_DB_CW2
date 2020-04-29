<?php 
    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("SELECT city_id, city FROM city");

       
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
    <script type="text/javascript" src="address_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Address</h3>
    <!-- <form name="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()" method="post"> -->
    <form name="myform" action="address_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Address</h5>
                <input type="text" name="address" id="address" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Address Line 2</h5>
                <input type="text" name="address2" id="address2" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>District</h5>
                <input type="text" name="district" id="district" class="input">
            </div>
        </div>
            
            
            
            <select name="city_id" id="city_id">
                <option value="hide">City</option>
                <!-- <select type="text" name="city_id" id="city_id" class="input">
                    <option value="-" selected> Please select your city </option> -->
                    <?php foreach($result as $city) { echo "<option value =$city[city_id]>$city[city]</option>";}?>
                </select>


        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Postal Code</h5>
                <input type="text" name="postal_code" id="postal_code" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Phone</h5>
                <input type="text" name="phone" id="phone" class="input">
            </div>
        </div>



        <input class="btn btn-primary" type="submit" name="submit">

        <br>

        <a href="address.php" class="btn-back">BACK</a>
        
    </form>
</div>
</body>

</html>