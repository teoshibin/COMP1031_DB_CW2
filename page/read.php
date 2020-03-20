<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>
<body>
<?php 
    if(isset($_POST['submit'])) {
        require "../include/config.php";
        require "../include/common.php";

        try {
            $connection = new PDO ($dsn, $username, $password, $options);
            $statement = $connection->prepare("SELECT * FROM students WHERE school= :school");
            //$sql = "SELECT * FROM students WHERE school = ? ";
            //$school = $_POST ['school'];
            //$statement = $connection->prepare($sql);
            $statement->bindParam(':school', $_POST ['school'], PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll();

        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }

    }

?>

<?php include "../include/header.php"; ?>
<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table id="table_id" class="display">
      <thead>
<tr>
  <th>#</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email Address</th>
  <th>Age</th>
  <th>Address</th>
  <th>School Platoon</th>
  <th>Date</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) : ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["firstname"]); ?></td>
<td><?php echo escape($row["lastname"]); ?></td>
<td><?php echo escape($row["email"]); ?></td>
<td><?php echo escape($row["age"]); ?></td>
<td><?php echo escape($row["address"]); ?></td>
<td><?php echo escape($row["school"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
      </tr>
  <?php endforeach; ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['school']); ?>.
  <?php }
} ?>

<h2> Search student based on School </h2>

    <form  method ="post">
        <label for= "school"> School Platoon </label>
        <input type= "text" id="school" name = "school" >
        <input type="submit" name="submit" id="submit" value="View Results">
    </form>

    <a href=inner-main.php> Main Page </a>

<?php require "../include/footer.php"; ?>
<script>
$(document).ready(function () {
        $('#table_id').DataTable();

    });
</script>

</body>
</html>