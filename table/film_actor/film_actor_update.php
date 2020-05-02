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
</head>

<body>

    <?php

    require "../../include/config.php";
    require "../../include/common.php";

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("SELECT actor_id  FROM actor");
       
        $statement->execute();
        $customer_result = $statement->fetchAll();
    
    } catch (PDOException $error){
    
        echo "<br>".$error->getMessage();
    
    }

    //update custoer info
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $film_actor = [
                "actor_id"          => $_POST['actor_id'],
                "film_id"           => $_POST['film_id'],
                "last_update"       => $_POST['last_update']
            ];
            
            $statement = $connection->prepare(
                "UPDATE film_actor 
                SET actor_id =:actor_id,
                    film_id =:film_id,
                    last_update = NOW()
                WHERE actor_id  =:ori_actor_id and film_id =:ori_film_id"
            );

            $statement->bindValue(':ori_actor_id',$_GET['actor_id']);
            $statement->bindValue(':ori_film_id',$_GET['film_id']);

            $statement->execute($film_actor);
        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }
    }

    if (isset($_GET['actor_id']) && isset($_GET['film_id'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $statement = $connection->prepare("SELECT * FROM film_actor WHERE actor_id = :actor_id and film_id=:film_id");
            $statement->bindValue(':actor_id', $_GET['actor_id']);
            $statement->bindValue(':film_id', $_GET['film_id']);
            $statement->execute();

            $film_actor = $statement->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }

    } else {
        echo "Something went wrong!";
        exit;
    }
    ?>

    <?php if (isset($_POST['submit']) && $statement) : ?>
        <?php
        // header("location: film_actor.php");
        exit();
        ?>
    <?php endif; ?>

    <form method="post">
        <div class="content">
            <h3 class="title">Update Film Actor Information</h3>

            <!-- <?php foreach ($film_actor as $key => $value) : ?>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                        <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" <?php echo (($key == 'last_update') ? 'readonly' : '') ?>>
                    </div>
                </div>

            <?php endforeach; ?> -->

        <select name="actor_id" id="actor_id">
            <option value="hide">Actor</option>
            <?php foreach ($actor_result as $actor): ?>
                <option value =<?php echo($actor["actor_id"]) ?>><?php echo($actor["first_name"].' '.$actor["last_name"]) ?></option>
            <?php endforeach;?>
        </select>

        <div></div>

        <select name="film_id" id="film_id">
            <option value="hide">Film</option>
            <?php foreach ($film_result as $film): ?>
                <option value =<?php echo($film["film_id"])?>><?php echo($film["title"]) ?></option>
            <?php endforeach; ?>
        </select>

            <input class="btn btn-dark ml-1" type="submit" name="submit" value="Submit" style="margin-bottom: 15px" />
            <a href="film_actor.php" class="btn-back" style="margin-bottom: 15px">BACK</a>
        </div>
    </form>
</body>

</html>