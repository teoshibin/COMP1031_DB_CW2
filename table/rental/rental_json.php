<?php
header('Content-Type: application/json');
//view customer information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";

if (isset($_GET["id"])) {

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        //sql command to delete student
        $statement = $connection->prepare("DELETE FROM rental WHERE rental_id= :rental_id");
        $statement->bindValue(':rental_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "rental successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}
try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT rental.rental_id, rental.rental_date, rental.inventory_id, rental.customer_id, rental.return_date, 
    rental.staff_id,rental.last_update FROM rental");
    //execute with PDO
    $statement->execute();
    //store result in $result
    $data = $statement->fetchAll();

    echo json_encode($data);
} catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
}


