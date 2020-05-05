<?php

require "../../include/config.php";
require "../../include/common.php";

  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $address = [
        "address_id"        => $_POST['address_id'],
        "address"           => $_POST['address'],
        "address2"          => $_POST['address2'],
        "district"          => $_POST['district'],
        "city_id"           => $_POST['city_id'],
        "postal_code"       => $_POST['postal_code'],
        "phone"             => $_POST['phone'],
        "last_update"       => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE address 
      SET address_id    = :address_id,
          address       = :address,
          address2      = :address2,
          district      = :district,
          city_id       = :city_id,
          postal_code   = :postal_code,
          phone         = :phone,
          last_update     = NOW()
      WHERE address_id   = :address_id "
      );

      $statement->execute($address);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }

if (isset($_POST['submit']) && $statement) {
    // header("Location: address.php");
    // exit();
} else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
} 
}