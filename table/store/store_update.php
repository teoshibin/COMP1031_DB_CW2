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
  <script type="text/javascript" src="store_valid.js"></script>
  <style>.select{font-size:13px; height: 44px;}</style>
</head>

<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";
  require_once "../../include/login-check.php";
  require_once "../../include/header.php";

  try {

    //#1 Open Connection
    $connection = new PDO($dsn, $username, $password, $options);

    //#2 Prepare Sql QUery 
    $statement = $connection->prepare("SELECT staff_id, first_name, last_name FROM staff");

    $statement->execute();
    $staff_result = $statement->fetchAll();

    $statement = $connection->prepare("SELECT address_id, address FROM address");

    $statement->execute();
    $address_result = $statement->fetchAll();

    // $statement = $connection->prepare("SELECT original_language_id,name FROM language");

    // $statement->execute();
    // $language_result = $statement->fetchAll();

  } catch (PDOException $error) {

    echo "<br>" . $error->getMessage();
  }
  //update custoer info
  // if (isset($_POST['submit'])) {
  //   try {
  //     $connection = new PDO($dsn, $username, $password, $options);
  //     $store = [
  //       "store_id"            => $_POST['store_id'],
  //       "manager_staff_id"    => $_POST['manager_staff_id'],
  //       "address_id"          => $_POST['address_id'],
  //       "last_update"         => $_POST['last_update']
  //     ];

  //     $statement = $connection->prepare(
  //       "UPDATE store 
  //     SET store_id     =:store_id,
  //         manager_staff_id = :manager_staff_id,
  //         address_id   =:address_id,
  //         last_update  = NOW()
  //     WHERE store_id   =:store_id "
  //     );

  //     $statement->execute($store);
  //   } catch (PDOException $error) {
  //     echo "<br>" . $error->getMessage();
  //   }
  // }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM store WHERE store_id= :store_id");
      $statement->bindValue(':store_id', $_GET['id']);
      $statement->execute();

      $store = $statement->fetch(PDO::FETCH_ASSOC);

      $statement = $connection->prepare("SELECT address FROM address WHERE address_id= :address_id");
      $statement->bindValue(':address_id', $store['address_id']);
      $statement->execute();

      $address_text = $statement->fetch(PDO::FETCH_ASSOC);

      $statement = $connection->prepare("SELECT first_name, last_name FROM staff WHERE staff_id= :staff_id");
      $statement->bindValue(':staff_id', $store['manager_staff_id']);
      $statement->execute();

      $staff_text = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['store_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
    header("location: store.php");
    exit();
    ?>
  <?php endif; ?>

  <form name="myform" method="post" action="store_update.inc.php" onsubmit="return validateForm()">
    <div class="content">
      <h3 class="title">Update Store Information</h3>

      <?php
      foreach ($store as $key => $value) :
        if ($key == 'manager_staff_id') {
      ?>
                <select type="text" name="manager_staff_id" id="manager_staff_id" class="input">
                    <option value="hide" selected>Manager</option>
                    <?php foreach ($staff_result as $staff) : ?>
                      <option value=<?php echo ($staff["staff_id"]) ?>><?php echo ($staff["first_name"].' '. $staff["last_name"]) ?></option>
                    <?php endforeach; ?>
                </select>
                <script defer>storeValue(<?php echo $value?>,"<?php echo($staff_text['first_name'].' '.$staff_text['last_name'])?>","manager_staff_id")</script>
                <br>

        <?php
          continue;
        } else if ($key == 'address_id') {
          ?>
              <select type="text" name="address_id" id="address_id" class="input">
                  <option value="hide" selected>Store Address</option>
                  <?php foreach ($address_result as $address) : ?>
                      <option value=<?php echo ($address["address_id"]) ?>><?php echo ('(ID: ' . $address["address_id"].') '. $address["address"]) ?></option>
                    <?php endforeach; ?>
              </select>
              <script defer>storeValue(<?php echo $value?>,"<?php echo $address_text['address']?>","address_id")</script>
          <?php
          continue;
        }
        ?>

        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'store_id' || $key == 'last_update') ? 'readonly' : '') ?>>
          </div>
        </div>
      <?php endforeach; ?>

      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
      <a href="store.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>

</html>