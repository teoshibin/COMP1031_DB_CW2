<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>View</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/update.css">
</head>

<body>
  <?php

  require "../../include/config.php";
  require "../../include/common.php";
  require_once "../../include/login-check.php";
  require_once "../../include/header.php";

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM staff WHERE staff_id = :staff_id");
      $statement->bindValue(':staff_id', $_GET['id']);
      $statement->execute();

      $staff = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <form method="post">
    <div class="content">
      <h3 class="title">Staff Information</h3>

      <?php
      foreach ($staff as $key => $value) :
        if ($key == 'picture') {
      ?>
          <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
          <img src=<?php echo ('"imageView.php?id=' . $_GET['id']) . '"' ?> />
        <?php
          continue;
        } elseif ($key == 'password' || $key == 'username') {
          continue;
        }
        ?>

        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" readonly>
          </div>
        </div>

      <?php endforeach; ?>

      <a href="staff.php" class="btn-back" style="margin-bottom: 15px;">BACK</a>
    </div>
  </form>
</body>

</html>