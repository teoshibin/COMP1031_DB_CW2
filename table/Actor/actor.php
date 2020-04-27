
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
        $statement = $connection->prepare("DELETE FROM actor WHERE actor_id= :actor_id");
        $statement->bindValue(':actor_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "Actor successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT actor.actor_id, actor.first_name, actor.last_name, actor.last_update FROM actor");

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
        <a class="insertbtn" href="actor_add.php" role="button" style="width: 12.5%;"><strong>Create New Actor</strong></a>
        <h2 class="title">Actor</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Actor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["actor_id"]); ?></td>
                        <td><?php echo escape($row["first_name"]); ?></td>
                        <td><?php echo escape($row["last_name"]); ?></td>
                        <td><?php echo escape($row["last_update"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="actor_view.php?id=<?php echo escape($row["actor_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="actor_update.php?id=<?php echo escape($row["actor_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="actor.php?id=<?php echo escape($row["actor_id"]); ?>" onClick='return confirm("Are you sure want to delete this ?");'>
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