
<?php

//view customer information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";
require "../../include/header.php";

if (isset($_GET["film_id"])&&isset($_GET["category_id"])) {

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        //sql command to delete student
        $statement = $connection->prepare("DELETE FROM film_category WHERE film_id= :film_id and category_id= :category_id");
        $statement->bindValue(':film_id', $_GET["film_id"]);
        $statement->bindValue(':category_id', $_GET["category_id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "film_category successfully deleted";

    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT film_category.film_id, film_category.category_id, film_category.last_update FROM film_category");

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
        <a class="insertbtn" href="film_category_add.php" role="button" style="width: 14.5%;"><strong>Add New Film Category</strong></a>
        <h2 class="title">Film Category</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Film ID</th>
                    <th>Category ID</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["film_id"]); ?></td>
                        <td><?php echo escape($row["category_id"]);?></td>
                        <td><?php echo escape($row["last_update"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="film_category_view.php?film_id=<?php echo escape($row["film_id"]); ?>&category_id=<?php echo escape($row["category_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="film_category_update.php?film_id=<?php echo escape($row["film_id"]); ?>&category_id=<?php echo escape($row["category_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="film_category.php?film_id=<?php echo escape($row["film_id"]); ?>&category_id=<?php echo escape($row["category_id"]); ?>" onClick='return confirm("Are you sure want to delete film <?php echo escape($row["film_id"]); ?> category <?php echo escape($row["category_id"]); ?> ?");'>
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