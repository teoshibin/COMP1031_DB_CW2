<?php 

if(isset($_POST['submit'])){

    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO actor ( first_name, last_name, last_update) 
        VALUES (?,?,NOW()) ");

        $statement ->bindParam(1,$_POST['first_name'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['last_name'],PDO::PARAM_STR);
    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {

        // echo '<h1 class="">Data successfully added</p>';
        header("Location: actor.php");
        exit();

    } else {

        echo '<p style="color:white">Please fill in all the details correctly</p>';

    } 
}

?>
