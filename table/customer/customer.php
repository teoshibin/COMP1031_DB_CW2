
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
        $statement = $connection->prepare("DELETE FROM customer WHERE customer_id= :customer_id");
        $statement->bindValue(':customer_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "Customer successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);
    //sql command to display customer information
    // $statement = $connection->prepare("SELECT cu.customer_id AS id, CONCAT(cu.first_name, _utf8mb4' ', cu.last_name) AS name, a.address AS address, a.postal_code AS `zip code`,
    // cu.email AS email, a.phone AS phone, city.city AS city, country.country AS country, IF(cu.active, _utf8mb4'active',_utf8mb4'') AS notes, cu.store_id AS SID
    // FROM customer AS cu JOIN address AS a ON cu.address_id = a.address_id JOIN city ON a.city_id = city.city_id
    // JOIN country ON city.country_id = country.country_id");

    $statement = $connection->prepare("SELECT customer.customer_id,customer.store_id,customer.first_name,
                customer.last_name,customer.email,customer.address_id,customer.active,
                customer.create_date,customer.last_update FROM customer");

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
        <a class="insertbtn" href="customer_add.php" role="button"><strong>Create New Customer</strong></a>
        <h2 class="title">Customer</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Customer ID</th>
                    <th>Store ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address ID</th>
                    <th>Active Status</th>
                    <th>Create Date </th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["customer_id"]); ?></td>
                        <td><?php echo escape($row["store_id"]); ?></td>
                        <td><?php echo escape($row["first_name"]); ?></td>
                        <td><?php echo escape($row["last_name"]); ?></td>
                        <td><?php echo escape($row["email"]); ?></td>
                        <td><?php echo escape($row["address_id"]); ?></td>
                        <td><?php echo escape($row["active"]); ?> </td>
                        <td><?php echo escape($row["create_date"]); ?> </td>
                        <td><?php echo escape($row["last_update"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="update" href="customer_view.php?id=<?php echo escape($row["customer_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="customer_update.php?id=<?php echo escape($row["customer_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="customer.php?id=<?php echo escape($row["customer_id"]); ?>" onClick='return confirm("Are you sure want to delete this ?");'>
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