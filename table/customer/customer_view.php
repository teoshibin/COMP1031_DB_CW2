<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>View</title>
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" /> -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/update.css">
</head>
<body>
  <?php
  /**
   * Use an HTML form to edit an entry in the
   * users table.
   *
   */

  require "../../include/config.php";
  require "../../include/common.php";

  //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM customer WHERE customer_id= :customer_id");
      $statement->bindValue(':customer_id', $_GET['id']);
      $statement->execute();

      $customer = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['customer_id']; 
  } else {
    echo "Something went wrong!";
    exit;
  }
  ?>

  <form method="post">
    <div class="content">
      <h3 class="title">Customer Information</h3>

      <?php 
        foreach ($customer as $key => $value): 
          if($key == 'active'){
            $col_name = $key;
            $col_value = $value;
            continue;
          }
      ?>

        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_',' ',ucfirst($key))  ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" readonly>
          </div>
        </div>

      <?php endforeach; ?>

      <h5 class="active-label">Active?</h5>
      <div class="toggle" style="margin-bottom: 15px;">
            <input type="radio" name="active" id="sizeWeight" value="1" <?php echo(($col_value=='1')?"checked='checked'":"") ?> disabled/>
            <label for="sizeWeight">Yes</label>
            <input type="radio" name="active" id="sizeDimensions" value="0" <?php echo(($col_value =='0')?"checked='checked'":"") ?> disabled/>
            <label for="sizeDimensions">No</label>
      </div>

      <a href="customer.php" class="btn-back" style="margin-bottom: 15px;">BACK</a>
    </div>
  </form>
</body>
</html>