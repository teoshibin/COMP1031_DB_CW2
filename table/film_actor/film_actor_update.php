<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../../css/update.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="film_actor_valid.js"></script>
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

        $statement = $connection->prepare("SELECT actor_id, first_name, last_name FROM actor");
        $statement->execute();
        $actor_result = $statement->fetchAll();

    } catch (PDOException $error) {
  
        echo "<br>" . $error->getMessage();
    }

    //use $_GET to retrieve information from the URL 
    if (isset($_GET["film_id"]) && isset($_GET["actor_id"])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $statement = $connection->prepare("SELECT * FROM film_actor WHERE film_id = :film_id and actor_id= :actor_id ");
            $statement->bindValue(':film_id', $_GET["film_id"]);
            $statement->bindValue(':actor_id', $_GET["actor_id"]);
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
        header("location: film_actor.php");
        exit();
        ?>
    <?php endif; ?>

    <form name="myform" action="film_actor_update.inc.php" onsubmit="return validateForm()" method="post">
        <div class="content">
            <h3 class="title">Update Film Actor Information</h3>

            <input type="hidden" name="old_film_id" value="<?php echo($_GET['film_id']) ?>">
            <input type="hidden" name="old_actor_id" value="<?php echo($_GET['actor_id']) ?>">

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
                } elseif ($key == 'actor_id') {
                ?>
                    <h5 style="color: #999; font-size: 15px;"><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                    <select name="actor_id" id="actor_id">
                        <option value="hide">Actor</option>
                        <?php foreach ($actor_result as $actor) { ?>
                            <option value=<?php echo ($actor["actor_id"]) ?>><?php echo ($actor['actor_id'].'. '.$actor["first_name"].' '.$actor["last_name"]) ?></option>
                        <?php } ?>
                    </select>
                    <script defer>storeValue(<?php echo $value ?>, "actor_id")</script>
                <?php
                    continue;
                }
                ?>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                        <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'last_update') ? 'readonly' : '') ?>>
                    </div>
                </div>

            <?php endforeach; ?>

            <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
            <a href="film_actor.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
        </div>
    </form>
</body>

</html>