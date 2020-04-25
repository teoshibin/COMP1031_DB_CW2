
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
        $statement = $connection->prepare("DELETE FROM film WHERE film_id= :film_id");
        $statement->bindValue(':film_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "Film successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT * FROM film");

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
        <a class="insertbtn" href="film_add.php" role="button"><strong>Create New Film</strong></a>
        <h2 class="title">Film</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Film ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Release Year</th>
                    <th>Language ID</th>
                    <th>Original Language ID</th>
                    <th>Rental Duration</th>
                    <th>Rental Length</th>
                    <th>Length</th>
                    <th>Replacement Cost</th>
                    <th>Rating</th>
                    <th>Special Features</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["film_id"]); ?></td>
                        <td><?php echo escape($row["title"]); ?></td>
                        <td><?php echo escape($row["description"]); ?></td>
                        <td><?php echo escape($row["release_year"]); ?></td>
                        <td><?php echo escape($row["language_id"]); ?></td>
                        <td><?php echo escape($row["original_language_id"]); ?></td>
                        <td><?php echo escape($row["rental_duration"]); ?></td>
                        <td><?php echo escape($row["rental_rate"]); ?></td>
                        <td><?php echo escape($row["length"]); ?></td>
                        <td><?php echo escape($row["replacement_cost"]); ?></td>
                        <td><?php echo escape($row["rating"]); ?></td>
                        <td><?php echo escape($row["special_features"]); ?></td>
                        <td><?php echo escape($row["last_update"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="film_view.php?id=<?php echo escape($row["film_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="film_update.php?id=<?php echo escape($row["film_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="film.php?id=<?php echo escape($row["film_id"]); ?>" onClick='return confirm("Are you sure want to delete this ?");'>
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