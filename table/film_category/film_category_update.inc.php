<?php

require "../../include/config.php";
require "../../include/common.php";

if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $film_category = [
            "film_id"           => $_POST['film_id'],
            "category_id"       => $_POST['category_id'],
            "old_film_id"       => $_POST['old_film_id'],
            "old_category_id"   => $_POST['old_category_id']
        ];

        $statement = $connection->prepare(
            "UPDATE film_category 
            SET film_id = :film_id,
            category_id = :category_id,
            last_update = NOW()
            WHERE film_category.film_id = :old_film_id AND film_category.category_id = :old_category_id;"
        );

        $statement->execute($film_category);
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: film_category.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    }
}
