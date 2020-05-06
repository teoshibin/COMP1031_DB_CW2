 
  <?php

require "../../include/config.php";
require "../../include/common.php";
require_once "../../include/login-check.php";
require_once "../../include/header.php";
  
    //use $_GET to retrieve information from the URL 
  if (isset($_GET['id'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare("SELECT * FROM actor WHERE actor_id= :actor_id");
      $statement->bindValue(':actor_id', $_GET['id']);
      $statement->execute();
      
      $actor = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
    //echo $_GET['actor_id']; 
  } else {
    echo "Something went wrong!";
    exit();
  }
  ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
      header("location: actor.php");
      exit();
      ?> 
  <?php endif; ?>

  <link rel="stylesheet" href="../../css/update.css">
  <script type="text/javascript" src="actor_valid.js"></script>
  
  <form name="myform" action="actor_update.inc.php" onsubmit="return validateForm()" method="post">
    <div class="content">
      <h3 class="title">Update Actor Information</h3>

      <?php foreach ($actor as $key => $value): ?>

          <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
              <h5><?php echo str_replace('_',' ',ucfirst($key)) ?></h5>
              <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'actor_id'||$key=='last_update') ? 'readonly' : '') ?>>
            </div>
          </div>
      <?php endforeach; ?>

      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px"/>
      <a href="actor.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>
</html>