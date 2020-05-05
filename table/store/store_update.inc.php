<?php

require "../../include/config.php";
require "../../include/common.php";

  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $store = [
        "store_id"            => $_POST['store_id'],
        "manager_staff_id"    => $_POST['manager_staff_id'],
        "address_id"          => $_POST['address_id'],
        "last_update"         => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE store 
      SET store_id     =:store_id,
          manager_staff_id = :manager_staff_id,
          address_id   =:address_id,
          last_update  = NOW()
      WHERE store_id   =:store_id "
      );

      $statement->execute($store);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }

  
if (isset($_POST['submit']) && $statement) {
    header("Location: store.php");
    exit();
} else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
} 
}