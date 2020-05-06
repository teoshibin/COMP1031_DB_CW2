
<?php

require "../../include/config.php";
require "../../include/common.php";
require "../../include/login-check.php";
require "../../include/header.php";

// if (isset($_GET["id"])) {

//     try {
//         $connection = new PDO($dsn, $username, $password, $options);
//         //sql command to delete student
//         $statement = $connection->prepare("DELETE FROM film_text WHERE film_id= :film_id");
//         $statement->bindValue(':film_id', $_GET["id"]);
//         //execute with PDO
//         $statement->execute();
        
//         //store a string in variable
//         $success = "Film Text successfully deleted";
//     } catch (PDOException $error) {
//         echo "<br>" . $error->getMessage();
//     }
// }

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $statement = $connection->prepare("SELECT film_text.film_id, film_text.title, film_text.description FROM film_text");

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
        <a class="insertbtn" href="#" onclick="return alert('Please insert in film table');" role="button" style="width: 12.5%;"><strong>Add New Film Text</strong></a>
        <h2 class="title">Film Text</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Film Text ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr class="tr-back">
                        <td><?php echo escape($row["film_id"]); ?></td>
                        <td><?php echo escape($row["title"]); ?></td>
                        <td><?php echo escape($row["description"]); ?></td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="film_text_view.php?id=<?php echo escape($row["film_id"]); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="#" onclick="return alert('Please update in film table');">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="#" onclick="return alert('Please delete in film table');">
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