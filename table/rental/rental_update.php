<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="../../css/update.css">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
  <script defer type="text/javascript" src="../../js/main.js"></script>
  <script type="text/javascript" src="../../js/dropdown_update.js"></script>
</head>
<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";
  require_once "../../include/login-check.php";
  require_once "../../include/header.php";
  
  $connection = new PDO($dsn, $username, $password, $options);

  //#2 Prepare Sql QUery 
  $statement2 = $connection->prepare("SELECT customer_id,first_name,last_name FROM customer");
  $statement2->execute();
  $result2 = $statement2->fetchAll();

  $statement3 = $connection->prepare("SELECT staff_id,first_name,last_name FROM staff");
  $statement3->execute();
  $result3 = $statement3->fetchAll();

  
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
      // exit();
    ?> 
  <?php endif; ?>

  <form method="post">
    <div class="content">
      <h3 class="title">Update Rental Information</h3>

      <?php foreach ($rental as $key => $value): 
      
        if($key == 'customer_id'){
          ?>
          <br>
          <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
          <select type="text" name="customer_id" id="customer_id" class="input">
          <option value="hide" selected>Customer ID</option>
          <?php foreach ($result2 as $customer) {
              echo "<option value =$customer[customer_id]>$customer[customer_id]. $customer[first_name] $customer[last_name]</option>";
          } ?>
      </select>
      <script defer>storeValue(<?php echo $value?>,"customer_id")</script>
          
          <?php
          continue;
        } elseif($key == 'staff_id'){
          ?>
              <br>
              <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <select type="text" name="staff_id" id="staff_id" class="input">
                <option value="hide" selected>Staff ID</option>
                <?php foreach ($result3 as $staff) {
                    echo "<option value =$staff[staff_id]>$staff[staff_id]. $staff[first_name] $staff[last_name]</option>";
                } ?>
            </select> 
            <script defer>storeValue(<?php echo $value?>,"staff_id")</script>
          <?php
          continue;
        }
      ?>
    
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