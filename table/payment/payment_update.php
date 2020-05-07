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

  $statement = false;

  try {

    //#1 Open Connection
    $connection = new PDO($dsn, $username, $password, $options);

    //#2 Prepare Sql QUery 
    $statement1 = $connection->prepare("SELECT customer_id,first_name,last_name FROM customer");
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    $statement2 = $connection->prepare("SELECT staff_id,first_name,last_name FROM staff");
    $statement2->execute();
    $result2 = $statement2->fetchAll();
  } catch (PDOException $error) {

    echo "<br>" . $error->getMessage();
  }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM payment WHERE payment_id= :payment_id");
      $statement->bindValue(':payment_id', $_GET['id']);
      $statement->execute();

      $payment = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['payment_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
    header("location: payment.php");
    exit();
    ?>
  <?php endif; ?>

  <form name="myform" method="post" action="payment_update.inc.php" onsubmit="return validateForm()" enctype="multipart/form-data">
    <div class="content">
      <h3 class="title">Update Payment Information</h3>

      <?php
      foreach ($payment as $key => $value) :
        if ($key == 'customer_id') {
      ?>
          <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
          <select type="text" name="customer_id" id="customer_id" class="input">
            <option value="hide" selected>Customer ID</option>
            <?php foreach ($result1 as $customer) {
              echo "<option value =$customer[customer_id]>$customer[customer_id]. $customer[first_name] $customer[last_name]</option>";
            } ?>
          </select>
          <script defer>
            storeValue(<?php echo $value ?>, "customer_id")
          </script>

        <?php
          continue;
        } elseif ($key == 'staff_id') {
        ?>
          <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
          <select type="text" name="staff_id" id="staff_id" class="input">
            <option value="hide" selected>Staff ID</option>
            <?php foreach ($result2 as $staff) {
              echo "<option value =$staff[staff_id]>$staff[staff_id]. $staff[first_name] $staff[last_name]</option>";
            } ?>
          </select>
          <script defer>
            storeValue(<?php echo $value ?>, "staff_id")
          </script>
        <?php
          continue;
        }
        ?>


        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'payment_id' || $key == 'last_update') ? 'readonly' : '') ?>>
          </div>
        </div>

      <?php endforeach; ?>


      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
      <a href="payment.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>


</body>
<script>


</script>

</html>