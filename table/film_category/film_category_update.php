<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../../css/update.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="film_category_valid.js"></script>
    <script type="text/javascript" src="../../js/dropdown_update.js"></script>
</head>

<body>

    <?php

    require "../../include/config.php";
    require "../../include/common.php";
    require_once "../../include/login-check.php";
    require_once "../../include/header.php";

    $statement = false;

    try {
  
        $connection = new PDO($dsn, $username, $password, $options);
   
        $statement = $connection->prepare("SELECT film_id, title FROM film ORDER BY film_id");
        $statement->execute();
        $film_result = $statement->fetchAll();

        $statement = $connection->prepare("SELECT category_id, name FROM category");
        $statement->execute();
        $category_result = $statement->fetchAll();

    } catch (PDOException $error) {
  
        echo "<br>" . $error->getMessage();
    }

    //use $_GET to retrieve information from the URL 
    if (isset($_GET["film_id"]) && isset($_GET["category_id"])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $statement = $connection->prepare("SELECT * FROM film_category WHERE film_id = :film_id and category_id= :category_id ");
            $statement->bindValue(':film_id', $_GET["film_id"]);
            $statement->bindValue(':category_id', $_GET["category_id"]);
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }
    } else {
        echo "Something went wrong!";
        exit();
    }
    ?>

    <?php if (isset($_POST['submit']) && $statement) : ?>
        <?php
        header("location: film_category.php");
        exit();
        ?>
    <?php endif; ?>

    <form name="myform" action="film_category_update.inc.php" onsubmit="return validateForm()" method="post">
        <div class="content">
            <h3 class="title">Update Film Category Information</h3>

            <input type="hidden" name="old_film_id" value="<?php echo($_GET['film_id']) ?>">
            <input type="hidden" name="old_category_id" value="<?php echo($_GET['category_id']) ?>">

            <?php foreach ($result as $key => $value) :
                if ($key == 'film_id') {
            ?>
                    <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                    <select name="film_id" id="film_id">
                        <option value="hide">Film</option>
                        <?php foreach ($film_result as $film) { ?>
                            <option value=<?php echo ($film["film_id"]) ?>><?php echo ($film["film_id"].'. '.$film["title"]) ?></option>
                        <?php } ?>
                    </select>
                    <script defer>storeValue(<?php echo $value ?>, "film_id")</script>

                <?php
                    continue;
                } elseif ($key == 'category_id') {
                ?>
                    <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                    <select name="category_id" id="category_id">
                        <option value="hide">Category</option>
                        <?php foreach ($category_result as $category) { ?>
                            <option value=<?php echo ($category["category_id"]) ?>><?php echo ($category['category_id'].'. '.$category["name"]) ?></option>
                        <?php } ?>
                    </select>
                    <script defer>storeValue(<?php echo $value ?>, "category_id")</script>
                <?php
                    continue;
                }
                ?>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                        <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'actor_id' || $key == 'last_update') ? 'readonly' : '') ?>>
                    </div>
                </div>

            <?php endforeach; ?>

            <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
            <a href="film_category.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
        </div>
    </form>
</body>

</html>