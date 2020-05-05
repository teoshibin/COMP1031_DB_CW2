<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta city="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="../../css/update.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script defer type="text/javascript" src="../../js/main.js"></script>
  <script src="city_valid.js"></script>
  <script type="text/javascript" src="../../js/dropdown_update.js"></script>
</head>
<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";

  try{

      //#1 Open Connection
      $connection = new PDO ($dsn,$username,$password,$options);
      
      //#2 Prepare Sql QUery 
      $statement = $connection->prepare("SELECT country_id, country FROM country");
     
      $statement->execute();
      $country_result = $statement->fetchAll();

  } catch (PDOException $error){

      echo "<br>".$error->getMessage();

  }

  // //update custoer info
  // if (isset($_POST['submit'])) {
  //   try {
  //     $connection = new PDO($dsn, $username, $password, $options);
  //     $city = [
  //       "city_id"            => $_POST['city_id'],
  //       "city"           => $_POST['city'],
  //       "country_id"           => $_POST['country_id'],
  //       "last_update"         => $_POST['last_update']
  //     ];

  //     $statement = $connection->prepare(
  //       "UPDATE city 
  //     SET city_id     = :city_id,
  //         city            = :city,
  //         country_id       = :country_id,
  //         last_update     = NOW()
  //     WHERE city_id   = :city_id "
  //     );

  //     $statement->execute($city);
  //   } catch (PDOException $error) {
  //     echo "<br>" . $error->getMessage();
  //   }
  // }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM city WHERE city_id= :city_id");
      $statement->bindValue(':city_id', $_GET['id']);
      $statement->execute();

      $city = $statement->fetch(PDO::FETCH_ASSOC);

      $statement = $connection->prepare("SELECT country FROM country WHERE country_id= :country_id");
      $statement->bindValue(':country_id', $city['country_id']);
      $statement->execute();

      $country_text = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['city_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
      header("location: city.php");
      exit();
    ?> 
  <?php endif; ?>

  <form name="myform" action="city_update.inc.php" onsubmit="return validateForm()" method="post">
    <div class="content">
      <h3 class="title">Update City Information</h3>

      <?php 
      foreach ($city as $key => $value): 
        if($key == 'country_id'){
      ?>
        <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
        <select type="text" name="country_id" id="country_id" class="input">
          <option value="hide">Country</option>
          <!-- <?php echo "<option value></option>"?> -->
          <?php foreach($country_result as $country) { echo "<option value =$country[country_id]>$country[country_id]. $country[country]</option>";}?>
        </select>
        <script defer>storeValue(<?php echo $value?>,"country_id")</script>
      <?php
          continue;
        }
      ?>

          <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
              <h5><?php echo str_replace('_',' ',ucfirst($key)) ?></h5>
              <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'city_id'||$key=='last_update') ? 'readonly' : '') ?>>
            </div>
          </div>
      <?php endforeach; ?>



      <input class="btn btn-dark ml-1" type="submit" name="submit" value="submit" style="margin-bottom: 15px"/>
      <a href="city.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>
</html>