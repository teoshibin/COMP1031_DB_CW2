<?php 

if(isset($_POST['submit'])){

    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO address (address, address2,district,city_id,postal_code,phone, last_update) 
        VALUES (?,?,?,?,?,?,NOW())");

        $statement ->bindParam(1,$_POST['address'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['address2'],PDO::PARAM_STR);
        $statement ->bindParam(3,$_POST['district'],PDO::PARAM_STR);
        $statement ->bindParam(4,$_POST['city_id'],PDO::PARAM_INT);
        $statement ->bindParam(5,$_POST['postal_code'],PDO::PARAM_INT);
        $statement ->bindParam(6,$_POST['phone'],PDO::PARAM_INT);
    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {

        // echo '<h1 class="">Data successfully added</p>';
        header("Location: address.php");
        exit();

    } else {

        echo '<p style="color:white">Please fill in all the details correctly</p>';

    } 
}

?>
