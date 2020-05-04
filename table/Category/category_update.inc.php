<?php

require "../../include/config.php";
require "../../include/common.php";
//update custoer info
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $category = [
      "category_id"            => $_POST['category_id'],
      "name"           => $_POST['name'],
      "last_update"         => $_POST['last_update']
    ];

    $statement = $connection->prepare(
      "UPDATE category 
    SET category_id     = :category_id,
        name            = :name,
        last_update     = NOW()
    WHERE category_id   = :category_id "
    );

    $statement->execute($category);
  } catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
  }

if (isset($_POST['submit']) && $statement) {
    header("Location: category.php");
    exit();
} else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
} 
}