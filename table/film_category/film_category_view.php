<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>View</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/update.css">
</head>

<body>
    <?php

    require "../../include/config.php";
    require "../../include/common.php";

    //use $_GET to retrieve information from the URL 
    if (isset($_GET['film_id']) && isset($_GET['category_id'])) {
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

    <form method="post">
        <div class="content">
            <h3 class="title">Film Category Information</h3>

            <?php foreach ($result as $key => $value) : ?>

                <div class="input-div">
                    <div class="i">
                    </div>
                    <div class="div">
                        <h5><?php echo str_replace('_', ' ', ucfirst($key)) ?></h5>
                        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" class="input" value="<?php echo escape($value) ?>" readonly>
                    </div>
                </div>

            <?php endforeach; ?>

            <a href="film_category.php" class="btn-back" style="margin-bottom: 15px;">BACK</a>
        </div>
    </form>
</body>

</html>