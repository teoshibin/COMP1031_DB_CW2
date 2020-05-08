<?php
header('Content-Type: application/json');
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";
if (isset($_GET["id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $statement = $connection->prepare("DELETE FROM payment WHERE payment_id= :payment_id");
        $statement->bindValue(':payment_id', $_GET["id"]);
        $statement->execute();
        $success = "Payment successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}
try {
    $connection = new PDO($dsn, $username, $password, $options);
    $statement = $connection->prepare("SELECT payment.payment_id, payment.customer_id, payment.staff_id, 
    payment.rental_id, payment.amount, payment.payment_date,payment.last_update FROM payment");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
}
?>