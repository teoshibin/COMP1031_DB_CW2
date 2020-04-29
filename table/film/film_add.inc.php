<?php 

/**
 * Open a connection via PDO to insert a
 * customer and table with structure.
 */
/**
 * all the inputs are placed into 
 * a $_POST array. 
 * it runs only if the form has been submitted.
 */


if(isset($_POST['submit'])){
    require "../../include/config.php";
    require "../../include/common.php";
    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO film (title,description,release_year,languagae_id,original_language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features,last_update) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW()) ");

        $statement ->bindParam(1,$_POST['title'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['description'],PDO::PARAM_STR);
        $statement ->bindParam(3,$_POST['release_year'],PDO::PARAM_INT);
        $statement ->bindParam(4,$_POST['languagae_id'],PDO::PARAM_INT);
        $statement ->bindParam(5,$_POST['original_language_id'],PDO::PARAM_INT);
        $statement ->bindParam(6,$_POST['rental_duration'],PDO::PARAM_STR);
        $statement ->bindParam(7,$_POST['rental_rate'],PDO::PARAM_STR);
        $statement ->bindParam(8,$_POST['length'],PDO::PARAM_INT);
        $statement ->bindParam(9,$_POST['replacement_cost'],PDO::PARAM_STR);
        $statement ->bindParam(10,$_POST['rating'],PDO::PARAM_STR);
        $statement ->bindParam(11,$_POST['special_features'],PDO::PARAM_STR);

    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

            echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {
        // echo '<p class="">Data successfully added</p>';
        header("Location: film.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 
}
// header("Location: customer_add.php")
?>
