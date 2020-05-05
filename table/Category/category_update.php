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
  <script type="text/javascript" src="category_valid.js"></script>
  <script type="text/javascript" src="../../js/dropdown_update.js"></script>
</head>
<body>

  <?php

  require "../../include/config.php";
  require "../../include/common.php";
  //update custoer info
  // if (isset($_POST['submit'])) {
  //   try {
  //     $connection = new PDO($dsn, $username, $password, $options);
  //     $category = [
  //       "category_id"            => $_POST['category_id'],
  //       "name"           => $_POST['name'],
  //       "last_update"         => $_POST['last_update']
  //     ];

  //     $statement = $connection->prepare(
  //       "UPDATE category 
  //     SET category_id     = :category_id,
  //         name            = :name,
  //         last_update     = NOW()
  //     WHERE category_id   = :category_id "
  //     );

  //     $statement->execute($category);
  //   } catch (PDOException $error) {
  //     echo "<br>" . $error->getMessage();
  //   }
  // }

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM category WHERE category_id= :category_id");
      $statement->bindValue(':category_id', $_GET['id']);
      $statement->execute();

      $category = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['category_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
      header("location: category.php");
      exit();
    ?> 
  <?php endif; ?>

  <form name="myform" method="post" action="category_update.inc.php" onsubmit="return validateForm()">
    <div class="content">
      <h3 class="title">Update Category Information</h3>

      <?php foreach ($category as $key => $value): ?>

          <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
              <h5><?php echo str_replace('_',' ',ucfirst($key)) ?></h5>
              <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'category_id'||$key=='last_update') ? 'readonly' : '') ?>>
            </div>
          </div>
      <?php endforeach; ?>

      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px"/>
      <a href="category.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>
</html>