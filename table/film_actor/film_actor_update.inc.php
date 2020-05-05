<?php

require "../../include/config.php";
require "../../include/common.php";

if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $film_actor = [
            "film_id"           => $_POST['film_id'],
            "actor_id"       => $_POST['actor_id'],
            "old_film_id"       => $_POST['old_film_id'],
            "old_actor_id"   => $_POST['old_actor_id']
        ];

        $statement = $connection->prepare(
            "UPDATE film_actor 
            SET film_id = :film_id,
            actor_id = :actor_id,
            last_update = NOW()
            WHERE film_actor.film_id = :old_film_id AND film_actor.actor_id = :old_actor_id;"
        );

        $statement->execute($film_actor);
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: film_actor.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    }
}
