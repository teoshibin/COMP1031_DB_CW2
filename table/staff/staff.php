
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
        $statement = $connection->prepare("DELETE FROM staff WHERE staff_id =:staff_id");
        $statement->bindValue(':staff_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "staff successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

try {

    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT * FROM staff");

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
        <a class="insertbtn" href="staff_add.php" role="button" style="width: 12%;"><strong>Add New Staff</strong></a>
        <h2 class="title">Staff</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Staff ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address ID</th>
                    <th>Picture</th>
                    <th>Email</th>
                    <th>Store ID</th>
                    <th>Active</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["staff_id"]); ?></td>
                        <td><?php echo escape($row["first_name"]); ?></td>
                        <td><?php echo escape($row["last_name"]); ?></td>
                        <td><?php echo escape($row["address_id"]); ?></td>
                        <td>
                            <?php 
                                if(isset($row['picture'])){
                            ?>
                                    <a type="buttons" class="btn" name="view_image" href="<?php echo('imageView.php?id=' . $row['staff_id']) ?>" target="_blank"
                                        style="margin-left: 17px; "><i class="fas fa-images button" style="text-align:center; font-size:20px;"></i></a>
                            <?php  
                                }
                            ?>
                        </td>
                        <td><?php echo escape($row["email"]); ?></td>
                        <td><?php echo escape($row["store_id"]); ?></td>
                        <td><?php echo escape($row["active"]); ?></td>
                        <td><?php echo escape($row["last_update"]); ?> </td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="staff_view.php?id=<?php echo escape($row["staff_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="staff_update.php?id=<?php echo escape($row["staff_id"]); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="staff.php?id=<?php echo escape($row["staff_id"]); ?>" onClick='return confirm("Are you sure want to delete <?php echo escape($row["first_name"]); ?> <?php echo escape($row["last_name"]); ?> ?");'>
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