
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
        $statement = $connection->prepare("DELETE FROM address WHERE address_id= :address_id");
        $statement->bindValue(':address_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "Address successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT address.address_id, address.address,address.address2,address.district,address.city_id,address.postal_code,address.phone, address.last_update FROM address");

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
        <a class="insertbtn" href="address_add.php" role="button" style="width: 14%;"><strong>Create New Address</strong></a>
        <h2 class="title">Address</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Address ID</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>District</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Phone</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["address_id"]); ?></td>
                        <td><?php echo escape($row["address"]); ?></td>
                        <td><?php echo escape($row["address2"]); ?></td>
                        <td><?php echo escape($row["district"]); ?></td>
                        <td><?php echo escape($row["city_id"]); ?></td>
                        <td><?php echo escape($row["postal_code"]); ?></td>
                        <td><?php echo escape($row["phone"]); ?></td>
                        <td><?php echo escape($row["last_update"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="address_view.php?id=<?php echo escape($row["address_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="address_update.php?id=<?php echo escape($row["address_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="address.php?id=<?php echo escape($row["address_id"]); ?>" onClick='return confirm("Are you sure want to delete <?php echo escape($row["address"]); ?>  ?");'>
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