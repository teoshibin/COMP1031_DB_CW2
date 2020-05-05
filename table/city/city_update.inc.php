<?php

require "../../include/config.php";
require "../../include/common.php";

if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $city = [
      "city_id"             => $_POST['city_id'],
      "city"                => $_POST['city'],
      "country_id"          => $_POST['country_id'],
      "last_update"         => $_POST['last_update']
    ];

    $statement = $connection->prepare(
      "UPDATE city 
    SET city_id     = :city_id,
        city            = :city,
        country_id       = :country_id,
        last_update     = NOW()
    WHERE city_id   = :city_id "
    );

    $statement->execute($city);
  } catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
  }

  if (isset($_POST['submit']) && $statement) {
    header("Location: city.php");
    exit();
  } else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
  }
}
