<?php

require "../../include/config.php";
require "../../include/common.php";


if (isset($_POST['submit'])) {
        try {
          $connection = new PDO($dsn, $username, $password, $options);
          $inventory = [
            "inventory_id"            => $_POST['inventory_id'],
            "film_id"          => $_POST['film_id'],
            "store_id"           => $_POST['store_id'],
            "last_update"         => $_POST['last_update']
          ];
    
          $statement = $connection->prepare(
            "UPDATE inventory 
          SET inventory_id     = :inventory_id,
              film_id      = :film_id,
              store_id       = :store_id,
              last_update     = NOW()
          WHERE inventory_id   = :inventory_id "
          );
    
          $statement->execute($inventory);
        } catch (PDOException $error) {
          echo "<br>" . $error->getMessage();
        }
      

if (isset($_POST['submit']) && $statement) {
    header("Location: inventory.php");
    exit();
} else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
} 
}
