<?php

require "../../include/config.php";
require "../../include/common.php";

if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $language = [
      "language_id"            => $_POST['language_id'],
      "name"          => $_POST['name'],
      "last_update"         => $_POST['last_update']
    ];

    $statement = $connection->prepare(
      "UPDATE language 
    SET language_id     = :language_id,
        name      = :name,
        last_update     = NOW()
    WHERE language_id   = :language_id "
    );

    $statement->execute($language);
  } catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
  }



if (isset($_POST['submit']) && $statement) {
    header("Location: language.php");
    exit();
} else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
} 
}