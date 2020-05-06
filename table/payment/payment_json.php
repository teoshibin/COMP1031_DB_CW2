
<?php
header('Content-Type: application/json');
//view payment information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";

if (isset($_GET["id"])) {

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        //sql command to delete student
        $statement = $connection->prepare("DELETE FROM payment WHERE payment_id= :payment_id");
        $statement->bindValue(':payment_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "Payment successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}
try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT payment.payment_id, payment.customer_id, payment.staff_id, 
    payment.rental_id, payment.amount, payment.payment_date,payment.last_update FROM payment");

    //execute with PDO
    $statement->execute();
    

    //store result in $result
    $data = $statement->fetchAll();
    // $data['data'] = $payment;
    echo json_encode($data);
} catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
}

