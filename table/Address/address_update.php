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

  $statement = false;

  try {

      //#1 Open Connection
      $connection = new PDO($dsn, $username, $password, $options);

      //#2 Prepare Sql QUery 
      $statement = $connection->prepare("SELECT city_id, city FROM city");


      $statement->execute();
      $city_result = $statement->fetchAll();
  } catch (PDOException $error) {

      echo "<br>" . $error->getMessage();
  }

  //update custoer info
  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $address = [
        "address_id"        => $_POST['address_id'],
        "address"           => $_POST['address'],
        "address2"          => $_POST['address2'],
        "district"          => $_POST['district'],
        "city_id"           => $_POST['city_id'],
        "postal_code"       => $_POST['postal_code'],
        "phone"             => $_POST['phone'],
        "last_update"       => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE address 
      SET address_id    = :address_id,
          address       = :address,
          address2      = :address2,
          district      = :district,
          city_id       = :city_id,
          postal_code   = :postal_code,
          phone         = :phone,
          last_update     = NOW()
      WHERE address_id   = :address_id "
      );

      $statement->execute($address);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
  }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM address WHERE address_id= :address_id");
      $statement->bindValue(':address_id', $_GET['id']);
      $statement->execute();

      $address = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['address_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
    header("location: address.php");
    exit();
    ?>
  <?php endif; ?>

  <form method="post">
    <div class="content">
      <h3 class="title">Update Address Information</h3>

      <?php
      foreach ($address as $key => $value) : 
        if($key == 'city_id'){
      ?>
        <select name="city_id" id="city_id">
            <option value="hide">City</option>
            <?php foreach ($city_result as $city) { ?>
              <option value =<?php echo($city["city_id"])?>><?php echo($city["city"])?></option>
            <?php } ?>
        </select>

      <?php
        continue;
      }
      ?>

        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'address_id' || $key == 'last_update') ? 'readonly' : '') ?>>
          </div>
        </div>
      <?php endforeach; ?>


      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
      <a href="address.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>

</html>