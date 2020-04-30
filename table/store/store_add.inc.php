<?php 

if(isset($_POST['submit'])){

    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO store (manager_staff_id, address_id, last_update) 
        VALUES (?,?,NOW())");

        $statement ->bindParam(1,$_POST['manager_staff_id'],PDO::PARAM_INT);
        $statement ->bindParam(2,$_POST['address_id'],PDO::PARAM_INT);
    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {

        echo '<h1 class="">Data successfully added</p>';
        header("Location: store.php");
        exit();

    } else {

        echo '<p style="color:white">Please fill in all the details correctly</p>';

    } 
}

?>
