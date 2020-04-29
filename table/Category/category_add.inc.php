<?php 

if(isset($_POST['submit'])){

    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO category ( name, last_update) 
        VALUES (?,NOW()) ");

        $statement ->bindParam(1,$_POST['name'],PDO::PARAM_STR);
    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {

        header("Location: category.php");
        exit();

    } else {

        echo '<p style="color:white">Please fill in all the details correctly</p>';

    } 
}

?>
