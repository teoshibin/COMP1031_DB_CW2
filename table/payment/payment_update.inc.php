<?php

  require "../../include/config.php";
  require "../../include/common.php";

  //update payment info
  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $payment = [
        "payment_id"            => $_POST['payment_id'],
        "customer_id"          => $_POST['customer_id'],
        "staff_id"           => $_POST['staff_id'],
        "rental_id"           => $_POST['rental_id'],
        "amount"           => $_POST['amount'],
        "last_update"         => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE payment 
      SET payment_id     = :payment_id,
          customer_id      = :customer_id,
          staff_id       = :staff_id,
          rental_id       = :rental_id,
          amount       = :amount,
          last_update     = NOW()
      WHERE payment_id   = :payment_id "
      );

      $statement->execute($payment);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: payment.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 

}

