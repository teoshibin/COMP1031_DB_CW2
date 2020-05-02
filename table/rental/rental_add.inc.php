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
        $statement = $connection->prepare("INSERT INTO rental (rental_id,rental_date,inventory_id,customer_id,return_date,staff_id,last_update) 
        VALUES (?,NOW(),?,?,?,?,NOW()) ");

        $statement ->bindParam(1,$_POST['rental_id'],PDO::PARAM_INT);
        $statement ->bindParam(2,$_POST['rental_date'],PDO::PARAM_INT);
        $statement ->bindParam(3,$_POST['inventory_id'],PDO::PARAM_INT);
        $statement ->bindParam(4,$_POST['customer_id'],PDO::PARAM_INT);
        $statement ->bindParam(3,$_POST['return_date'],PDO::PARAM_INT);
        $statement ->bindParam(4,$_POST['staff_id'],PDO::PARAM_INT);


    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

            echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {
        // echo '<p class="">Data successfully added</p>';
        header("Location: rental.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 
}
// header("Location: customer_add.php")
?>
