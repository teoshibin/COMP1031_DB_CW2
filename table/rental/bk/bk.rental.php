
<?php

//view customer information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";
require "../../include/header.php";

if (isset($_GET["id"])) {

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        //sql command to delete student
        $statement = $connection->prepare("DELETE FROM rental WHERE rental_id= :rental_id");
        $statement->bindValue(':rental_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "rental successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT rental.rental_id, rental.rental_date, rental.inventory_id, rental.customer_id, rental.return_date, rental.staff_id FROM rental");

    //execute with PDO
    $statement->execute();

    //store result in $result
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo "<br>" . $error->getMessage();
}

?>

<section class="content">
    <!-- outer most one - transparent -->

    <div class="top">
        <a class="insertbtn" href="rental_add.php" role="button" style="width: 12.5%;"><strong>Create New Rental</strong></a>
        <h2 class="title">rental</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Rental ID</th>
                    <th>Rental Date</th>
                    <th>Inventory ID</th>
                    <th>Customer ID</th>
                    <th>Return Date</th>
                    <th>Staff ID</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["rental_id"]); ?></td>
                        <td><?php echo escape($row["rental_date"]); ?></td>
                        <td><?php echo escape($row["inventory_id"]); ?></td>
                        <td><?php echo escape($row["customer_id"]); ?> </td>
                        <td><?php echo escape($row["return_date"]); ?> </td>
                        <td><?php echo escape($row["staff_id"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="rental_view.php?id=<?php echo escape($row["rental_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="rental_update.php?id=<?php echo escape($row["rental_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="rental.php?id=<?php echo escape($row["rental_id"]); ?>" onClick='return confirm("Are you sure want to delete this rental id <?php echo escape($row["rental_id"]); ?> ?");'>
                                <i class="fa fa-trash button" aria-hidden="true">
                                </i>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script language="JavaScript" type="text/javascript" script src="../../js/tablesort.js"></script>
</body>
</html>