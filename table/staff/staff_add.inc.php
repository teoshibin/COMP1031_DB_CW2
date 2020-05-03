<?php

if (isset($_POST['submit'])) {

    require "../../include/config.php";
    require "../../include/common.php";

    $statement = false;

    try {

        //#1 Open Connection
        $connection = new PDO($dsn, $username, $password, $options);

        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO staff (first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update) 
        VALUES (?,?,?,?,?,?,?,?,?,NOW())");

        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
                echo "imgdata created";
                $imgData = file_get_contents($_FILES['picture']['tmp_name']);
                // $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
            }
        }

        // Allow certain file formats 
        // $allowTypes = array('jpg','png','jpeg','gif'); 
        // if(in_array($fileType, $allowTypes)){ 
        //     $image = $_FILES['image']['tmp_name']; 
        //     $imgContent = addslashes(file_get_contents($image)); 
        // }
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $statement->bindParam(1, $_POST['first_name'], PDO::PARAM_STR);
        $statement->bindParam(2, $_POST['last_name'], PDO::PARAM_STR);
        $statement->bindParam(3, $_POST['address_id'], PDO::PARAM_INT);
        $statement->bindParam(4, $imgData, PDO::PARAM_STR);
        $statement->bindParam(5, $_POST['email'], PDO::PARAM_STR);
        $statement->bindParam(6, $_POST['store_id'], PDO::PARAM_INT);
        $statement->bindParam(7, $_POST['active'], PDO::PARAM_INT);
        $statement->bindParam(8, $_POST['username'], PDO::PARAM_STR);
        $statement->bindParam(9, $password, PDO::PARAM_STR);


        $statement->execute();
    } catch (PDOException $error) {

        echo "<br>" . $error->getMessage();
    }

    if (isset($_POST['submit']) && $statement) {

        echo '<h1 class="">Data successfully added</p>';
        header("Location: staff.php");
        exit();

    } else {

        echo '<p style="color:white">Please fill in all the details correctly</p>';
    }
}
