
<?php
header('Content-Type: application/json');
//view customer information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";


try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT payment.payment_id, payment.customer_id, payment.staff_id, 
    payment.rental_id, payment.amount, payment.payment_date,payment.last_update FROM payment");

    //execute with PDO
    $statement->execute();
    

    //store result in $result
    $data = $statement->fetchAll();
    echo json_encode($data);
} catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
}

?>