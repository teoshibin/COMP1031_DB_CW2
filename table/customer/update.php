<?php

/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */

require "../../include/config.php";
require "../../include/common.php";

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
        SET customer_id     =:customer_id,
            store_id        = :store_id,
            first_name      = :first_name,
            last_name       = :last_name,
            email           = :email,
            address_id      = :address_id,
            active          = :active,
            create_date     = :create_date,
            last_update     = :last_update
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

<html>

<head>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/body.css">
</head>

<body>


  <!-- <?php //require "../../table/templates/header.php"; 
        ?> -->

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['last_name']); ?> successfully updated.
  <?php endif; ?>

  <div class="my-body">
    <div class="my-form">
      <form method="post">
        <h2>Update Customer Information</h2>
        <?php foreach ($customer as $key => $value) : ?>
          <!-- printing the information here -->

          <?php echo (($key == 'customer_id' || $key == 'first_name' || $key == 'email' || $key == 'address_id' || $key == 'active' || $key == 'create_date') ? '<div class="form-row">' : ''); ?>

          <div class="form-group <?php echo (($key == 'customer_id' || $key == 'store_id' || $key == 'first_name' || $key == 'last_name' || $key == 'create_date' || $key == 'last_update') ? 'col-md-6' : 'col-md-12'); ?>">
            <label for="<?php echo $key; ?>">
              <?php echo ucfirst($key); ?>
            </label>
            <input class="form-control type=" text" name="<?php echo $key; ?>" id="<?php echo $key ?>" value="<?php echo escape($value); ?>" <?php echo ($key == 'customer_id' ? 'readonly' : ''); ?>>
          </div>

          <?php echo (($key == 'store_id' || $key == 'last_name' || $key == 'email' || $key == 'address_id' || $key == 'active' || $key == 'last_update') ? '</div>' : ''); ?>


        <?php endforeach; ?>

        <div class="form-row">
          <div class="form-group">
            <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit">
            <a class="btn btn-outline-dark" href="view.php#anchor">
              Back 
            </a> 
          </div> 
        </div>
      </form>
    </div>
  </div>

</body>
</html>