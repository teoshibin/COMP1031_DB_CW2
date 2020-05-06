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
  require_once "../../include/login-check.php";
  require_once "../../include/header.php";
  //update custoer info
  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $rental = [
        "rental_id"            => $_POST['rental_id'],
        "rental_date"          => $_POST['rental_date'],
        "inventory_id"           => $_POST['inventory_id'],
        "customer_id"           => $_POST['customer_id'],
        "return_date"           => $_POST['return_date'],
        "staff_id"           => $_POST['staff_id'],
        "last_update"         => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE rental 
      SET rental_id     = :rental_id,
          rental_date      = :rental_date,
          inventory_id       = :inventory_id,
          customer_id       = :customer_id,
          return_date       = :return_date,
          staff_id       = :staff_id,
          last_update     = NOW()
      WHERE rental_id   = :rental_id "
      );

      $statement->execute($rental);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
  }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM rental WHERE rental_id= :rental_id");
      $statement->bindValue(':rental_id', $_GET['id']);
      $statement->execute();

      $rental = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['rental_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
      header("location: rental.php");
      exit();
    ?> 
  <?php endif; ?>

  <form method="post">
    <div class="content">
      <h3 class="title">Update Rental Information</h3>

      <?php foreach ($rental as $key => $value): ?>

          <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
              <h5><?php echo str_replace('_',' ',ucfirst($key)) ?></h5>
              <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'rental_id'||$key=='last_update') ? 'readonly' : '') ?>>
            </div>
          </div>
      <?php endforeach; ?>

      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px"/>
      <a href="rental.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>
</html>