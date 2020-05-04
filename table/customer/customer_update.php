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
</head>

<body>

  <?php
  /**
   * Use an HTML form to edit an entry in the
   * users table.
   *
   */

  // $statement = $connection->prepare("SELECT cu.customer_id AS id, CONCAT(cu.first_name, _utf8mb4' ', cu.last_name) AS name, a.address AS address, a.postal_code AS `zip code`,
  // cu.email AS email, a.phone AS phone, city.city AS city, country.country AS country, IF(cu.active, _utf8mb4'active',_utf8mb4'') AS notes, cu.store_id AS SID
  // FROM customer AS cu JOIN address AS a ON cu.address_id = a.address_id JOIN city ON a.city_id = city.city_id
  // JOIN country ON city.country_id = country.country_id");

  require "../../include/config.php";
  require "../../include/common.php";

  try{

    //#1 Open Connection
    $connection = new PDO ($dsn,$username,$password,$options);
    
    //#2 Prepare Sql QUery 
    $statement = $connection->prepare("SELECT store_id  FROM store");
   
    $statement->execute();
    $customer_result = $statement->fetchAll();

} catch (PDOException $error){

    echo "<br>".$error->getMessage();

}
  //update custoer info
  if (isset($_POST['submit'])) {
    try {
      $connection = new PDO($dsn, $username, $password, $options);
      $customer = [
        "customer_id"            => $_POST['customer_id'],
        "store_id"               => $_POST['store_id'],
        "first_name"             => $_POST['first_name'],
        "last_name"              => $_POST['last_name'],
        "email"                  => $_POST['email'],
        "address_id"             => $_POST['address_id'],
        "active"                 => $_POST['active'],
        "create_date"            => $_POST['create_date'],
        "last_update"            => $_POST['last_update']
      ];

      $statement = $connection->prepare(
        "UPDATE customer 
      SET customer_id     = :customer_id,
          store_id        = :store_id,
          first_name      = :first_name,
          last_name       = :last_name,
          email           = :email,
          address_id      = :address_id,
          active          = :active,
          create_date     = :create_date,
          last_update     = NOW()
      WHERE customer_id   = :customer_id "
      );

      $statement->execute($customer);
    } catch (PDOException $error) {
      echo "<br>" . $error->getMessage();
    }
  }

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

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php
    echo escape($_POST['last_name'] . 'successfully updated.');
    header("location: customer.php");
    exit();
    ?>
  <?php endif; ?>

  <form name="myform" action="customer_update.php" onsubmit="return validateForm()" method="post">
    <div class="content">
      <h3 class="title">Update Customer Information</h3>

      <?php
      foreach ($customer as $key => $value) :
        if ($key == 'store_id') {
          $col_name = $key;
          $col_value = $value;
      ?>
          <select type="text" name="store_id" id="store_id" class="input">
            <option value="hide" selected>Store ID</option>
            <?php foreach ($customer_result as $customer) {
              echo "<option value =$customer[store_id]>$customer[store_id]</option>";
            } ?>
          </select>
        <?php
          continue;
        } else if ($key == 'active') {
          $col_name = $key;
          $col_value = $value;
          continue;
        }
        ?>


        <div class="input-div">
          <div class="i">
          </div>
          <div class="div">
            <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'customer_id' || $key == 'create_date' || $key == 'last_update') ? 'readonly' : '') ?>>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- <h5 class="active-label">Active?</h5>
      <div class="checkbox-container">
        <label class="checkbox-label">
          <input type="checkbox" name="active" id="active" class="checkbox">
          <span class="checkbox-custom"></span>
        </label>
      </div> -->


      <h5 class="active-label">Active?</h5>
      <div class="toggle">
        <input type="radio" name="active" id="sizeWeight" <?php echo (($col_value == '1') ? "checked='checked'" : "") ?> value="1" />
        <label for="sizeWeight">Yes</label>
        <input type="radio" name="active" id="sizeDimensions" value="0" <?php echo (($col_value == '0') ? "checked='checked'" : "") ?> />
        <label for="sizeDimensions">No</label>
      </div>


      <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" onclick="update()" />
      <a href="customer.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
    </div>
  </form>
</body>

<script>
  function update() {
    alert("You have successfully updated the record!");
  }
</script>

</html>