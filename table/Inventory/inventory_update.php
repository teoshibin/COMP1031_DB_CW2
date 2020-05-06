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
  <script src="inventory_valid.js"></script>
  <script type="text/javascript" src="../../js/dropdown_update.js"></script>
</head>
<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";
  require_once "../../include/login-check.php";
  require_once "../../include/header.php";

  try{

    //#1 Open Connection
    $connection = new PDO ($dsn,$username,$password,$options);
    
    //#2 Prepare Sql QUery 
    $statement1 = $connection->prepare("SELECT film_id,title FROM film");
    $statement2 = $connection->prepare("SELECT store_id FROM store");

   
    $statement1->execute();
    $statement2->execute();
    $result1 = $statement1->fetchAll();
    $result2 = $statement2->fetchAll();

} catch (PDOException $error){

    echo "<br>".$error->getMessage();

}

  // try {

  //   //#1 Open Connection
  //   $connection = new PDO($dsn, $username, $password, $options);

  //   //#2 Prepare Sql QUery 
  //   $statement = $connection->prepare("SELECT film_id, title FROM film");

  //   $statement->execute();
  //   $film_result = $statement->fetchAll();

  //   $statement = $connection->prepare("SELECT store_id FROM store");

  //   $statement->execute();
  //   $store_result = $statement->fetchAll();
  

    // $statement = $connection->prepare("SELECT original_language_id,name FROM language");

    // $statement->execute();
    // $language_result = $statement->fetchAll();

  // } catch (PDOException $error) {

  //   echo "<br>" . $error->getMessage();
  // }
  //update custoer info
  // if (isset($_POST['submit'])) {
  //   try {
  //     $connection = new PDO($dsn, $username, $password, $options);
  //     $inventory = [
  //       "inventory_id"            => $_POST['inventory_id'],
  //       "film_id"          => $_POST['film_id'],
  //       "store_id"           => $_POST['store_id'],
  //       "last_update"         => $_POST['last_update']
  //     ];

  //     $statement = $connection->prepare(
  //       "UPDATE inventory 
  //     SET inventory_id     = :inventory_id,
  //         film_id      = :film_id,
  //         store_id       = :store_id,
  //         last_update     = NOW()
  //     WHERE inventory_id   = :inventory_id "
  //     );

  //     $statement->execute($inventory);
  //   } catch (PDOException $error) {
  //     echo "<br>" . $error->getMessage();
  //   }
  // }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM inventory WHERE inventory_id= :inventory_id");
      $statement->bindValue(':inventory_id', $_GET['id']);
      $statement->execute();

      $inventory = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['inventory_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
      header("location: inventory.php");
      exit();
    ?> 
  <?php endif; ?>

  <form name="myform" method="post" action="inventory_update.inc.php" onsubmit="return validateForm()" enctype="multipart/form-data">
    <div class="content">
      <h3 class="title">Update Inventory Information</h3>

      <?php
      foreach ($inventory as $key => $value) :
        if ($key == 'film_id') {
      ?>
              <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                <select type="text" name="film_id" id="film_id" class="input" style="margin-left: 15px;">
                    <option value="hide" selected>Film ID</option>
                    <?php foreach($result1 as $film) { echo "<option value =$film[film_id]>$film[title]</option>";}?>
                </select>
                <script defer>storeValue(<?php echo $value?>,"film_id")</script>

                <br>

        <?php
          continue;
        } else if ($key == 'store_id') {
          ?>
              <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
              <select type="text" name="store_id" id="store_id" class="input">
                  <option value="hide" selected>Store ID</option>
                  <?php foreach($result2 as $store) { echo "<option value =$store[store_id]>$store[store_id]</option>";}?>
              </select>
              <script defer>storeValue(<?php echo $value?>,"store_id")</script>
          <?php
          continue;
        }
        ?>
        

          <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
              <h5><?php echo str_replace('_',' ',ucfirst($key)) ?></h5>
              <input type="text" name="<?php echo $key; ?>" id="<?php echo($key); ?>" class="input" value="<?php echo escape($value); ?>" <?php echo (($key == 'inventory_id'||$key=='last_update') ? 'readonly' : ''); ?>>
            </div>
          </div>
      <?php endforeach; ?>


      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px"/>
      <a href="inventory.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>
</html>