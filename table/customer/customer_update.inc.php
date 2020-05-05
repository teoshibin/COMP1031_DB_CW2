<?php
  require "../../include/config.php";
  require "../../include/common.php";

  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $customer = [
        "customer_id"            => $_POST['customer_id'],
        "store_id"               => $_POST['store_id'],
        "first_name"             => $_POST['first_name'],
        "last_name"              => $_POST['last_name'],
        "email"                  => $_POST['email'],
        "address_id"             => $_POST['address_id'],
        "active"                 => $_POST['active'],
        "create_date"            => $_POST['create_date'],
        "last_update"            => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE customer 
      SET customer_id     = :customer_id,
          store_id        = :store_id,
          first_name      = :first_name,
          last_name       = :last_name,
          email           = :email,
          address_id      = :address_id,
          active          = :active,
          create_date     = :create_date,
          last_update     = NOW()
      WHERE customer_id   = :customer_id "
      );

      $statement->execute($customer);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: customer.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 
  }