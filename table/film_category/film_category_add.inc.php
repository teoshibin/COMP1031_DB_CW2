<?php 

if(isset($_POST['submit'])){
    require "../../include/config.php";
    require "../../include/common.php";
    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO film_category (film_id, category_id, last_update) 
        VALUES (?,?,NOW()) ");

        $statement ->bindParam(1,$_POST['film_id'],PDO::PARAM_INT);
        $statement ->bindParam(2,$_POST['category_id'],PDO::PARAM_INT);

    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

            echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: film_category.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 
}
?>
