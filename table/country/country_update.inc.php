<?php

require "../../include/config.php";
require "../../include/common.php";

  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $country = [
        "country_id"            => $_POST['country_id'],
        "country"          => $_POST['country'],
        "last_update"         => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE country 
      SET country_id     = :country_id,
          country      = :country,
          last_update     = NOW()
      WHERE country_id   = :country_id "
      );

      $statement->execute($country);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }

if (isset($_POST['submit']) && $statement) {
    header("Location: country.php");
    exit();
} else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
} 
}