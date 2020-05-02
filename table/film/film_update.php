<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="../../css/update.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script defer type="text/javascript" src="../../js/main.js"></script>
</head>

<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";

  try {

    //#1 Open Connection
    $connection = new PDO($dsn, $username, $password, $options);

    //#2 Prepare Sql QUery 
    $statement = $connection->prepare("SELECT language_id,name FROM language");

    $statement->execute();
    $language_result = $statement->fetchAll();

    // $statement = $connection->prepare("SELECT original_language_id,name FROM language");

    // $statement->execute();
    // $language_result = $statement->fetchAll();

  } catch (PDOException $error) {

    echo "<br>" . $error->getMessage();
  }
  //update custoer info
  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $film = [
        "film_id"            => $_POST['film_id'],
        "title"          => $_POST['title'],
        "description"           => $_POST['description'],
        "release_year"           => $_POST['release_year'],
        "language_id"           => $_POST['language_id'],
        "original_language_id"           => $_POST['original_language_id'],
        "rental_duration"           => $_POST['rental_duration'],
        "rental_rate"           => $_POST['rental_rate'],
        "length"           => $_POST['length'],
        "replacement_cost"           => $_POST['replacement_cost'],
        "rating"           => $_POST['rating'],
        "special_features"           => $_POST['special_features'],
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
  }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM film WHERE film_id= :film_id");
      $statement->bindValue(':film_id', $_GET['id']);
      $statement->execute();

      $film = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['film_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
    header("location: film.php");
    exit();
    ?>
  <?php endif; ?>

  <form method="post">
    <div class="content">
      <h3 class="title">Update Film Information</h3>

      <?php
      foreach ($film as $key => $value) :
        if ($key == 'description') {
          // $col_name = $key;
          // $col_value = $value;
      ?>
          <textarea type="text" placeholder="Description" name="description" id="description" class="input" cols="10" rows="5" maxlength="6000" style="margin-top:20px; margin-bottom:20px;"></textarea>

        <?php
          continue;
        } else if ($key == 'language_id') {

        ?>
          <select type="text" name="language_id" id="language_id" class="input">
            <option value="hide" selected>Language</option>
            <?php foreach ($language_result as $language) {
              echo "<option value =$language[language_id]>$language[name]</option>";
            } ?>
          </select>
        <?php
          continue;
        } else if ($key == 'original_language_id') {

        ?>
          <select type="text" name="original_language_id" id="original_language_id" class="input">
            <option value="hide" selected>Original Language</option>
            <?php foreach ($language_result as $language) {
              echo "<option value =$language[language_id]>$language[name]</option>";
            } ?>
          </select>
        <?php
          continue;
        } else if ($key == 'rating') {

        ?>
          <select type="text" name="rating" id="rating" class="input">
            <option value="hide" selected>Rating</option>
            <option value="G">G</option>
            <option value="R">R</option>
            <option value="PG">PG</option>
            <option value="PG-13">PG-13</option>
            <option value="NC-17">NC-17</option>
          </select>
        <?php
          continue;
        } else if ($key == 'special_features') {
        ?>
          <h5 class="checkbox-title">Special Features</h5>
          <div class="checkbox">
            <input class="check" type="checkbox" name="special_features" id="special_features1" />
            <label for="special_features1"></label>
          </div>
          <h5 class="checkbox-label">Behind the scenes</h5>

          <div class="checkbox">
            <input class="check" type="checkbox" name="special_features" id="special_features2" />
            <label for="special_features2"></label>
          </div>
          <h5 class="checkbox-label">Trailers</h5>

          <div class="checkbox">
            <input class="check" type="checkbox" name="special_features" id="special_features3" />
            <label for="special_features3"></label>
          </div>
          <h5 class="checkbox-label">Commentaries</h5>

          <div class="checkbox">
            <input class="check" type="checkbox" name="special_features" id="special_features4"/>
            <label for="special_features4"></label>
          </div>
          <h5 class="checkbox-label">Deleted scenes</h5>
          <br>
        <?php
          continue;
        }
        ?>

        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'film_id' || $key == 'last_update') ? 'readonly' : '') ?>>
          </div>
        </div>
      <?php endforeach; ?>

      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
      <a href="film.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>

</html>