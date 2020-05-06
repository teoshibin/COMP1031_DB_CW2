<?php

require "../../include/config.php";
require "../../include/common.php";

$statement = false;

//update custoer info
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $special_features = '';
    if (isset($_POST['special_features1'])) {
      $special_features .= 'Trailers';
    }
    if (isset($_POST['special_features2'])) {
      $special_features .= ',Commentaries';
    }
    if (isset($_POST['special_features3'])) {
      $special_features .= ',Deleted Scenes';
    }
    if (isset($_POST['special_features4'])) {
      $special_features .= ',Behind the Scenes';
    }

    if($_POST['original_language_id'] == 'hide'){
        $ori_lang = null;
    } else {
        $ori_lang = $_POST['original_language_id'];
    }
    
    $film = [
      "film_id"            => $_POST['film_id'],
      "title"          => $_POST['title'],
      "description"           => $_POST['description'],
      "release_year"           => $_POST['release_year'],
      "language_id"           => $_POST['language_id'],
      "original_language_id"           => $ori_lang,
      "rental_duration"           => $_POST['rental_duration'],
      "rental_rate"           => $_POST['rental_rate'],
      "length"           => $_POST['length'],
      "replacement_cost"           => $_POST['replacement_cost'],
      "rating"           => $_POST['rating'],
      "special_features"           => $special_features,
      "last_update"         => $_POST['last_update']
    ];

    $statement = $connection->prepare(
      "UPDATE film 
      SET film_id     = :film_id,
          title      = :title,
          description       = :description,
          release_year       = :release_year,
          language_id       = :language_id,
          original_language_id       = :original_language_id,
          rental_duration       = :rental_duration,
          rental_rate       = :rental_rate,
          length       = :length,
          replacement_cost       = :replacement_cost,
          rating       = :rating,
          special_features       = :special_features,
          last_update     = NOW()
      WHERE film_id   = :film_id "
    );

    $statement->execute($film);
  } catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
  }
  
  if (isset($_POST['submit']) && $statement) {
    header("Location: film.php");
    exit();
  } else {
    echo '<p style="color:white">Please fill in all the details correctly</p>';
  }
}
