<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="../../css/update.css">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
  <script defer type="text/javascript" src="../../js/main.js"></script>
  <script type="text/javascript" src="address_valid.js"></script>
  <script type="text/javascript" src="../../js/dropdown_update.js"></script>
</head>

<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";
  require_once "../../include/login-check.php";
  require_once "../../include/header.php";


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
    header("Location: address.php");
    exit();
    ?>
  <?php endif; ?>

  <form name="myform" method="post" action="address_update.inc.php" onsubmit="return validateForm()">
    <div class="content">
      <h3 class="title">Update Address Information</h3>

      <?php
      foreach ($address as $key => $value) : 
        if($key == 'city_id'){
      ?>
        <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
        <select name="city_id" id="city_id">
            <option value="hide">City</option>
            <?php foreach ($city_result as $city) { ?>
              <option value =<?php echo($city["city_id"])?>><?php echo($city["city"])?></option>
            <?php } ?>
        </select>
        <script defer>storeValue(<?php echo $value?>,"city_id")</script>

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