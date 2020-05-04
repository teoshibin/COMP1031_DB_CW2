<?php
require "../../include/config.php";
require "../../include/common.php";
//update custoer info
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $actor = [
            "actor_id"            => $_POST['actor_id'],
            "first_name"          => $_POST['first_name'],
            "last_name"           => $_POST['last_name'],
            "last_update"         => $_POST['last_update']
        ];

        $statement = $connection->prepare(
            "UPDATE actor 
      SET actor_id     = :actor_id,
          first_name      = :first_name,
          last_name       = :last_name,
          last_update     = NOW()
      WHERE actor_id   = :actor_id "
        );

        $statement->execute($actor);
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: actor.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 

}
