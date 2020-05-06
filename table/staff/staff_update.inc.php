
<?php

require "../../include/config.php";
require "../../include/common.php";

if (isset($_POST['submit'])) {

    $updatefile = false;
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
            echo "imgdata created";
            $imgData = file_get_contents($_FILES['picture']['tmp_name']);
            $updatefile = true;
        }
    }

    if ($updatefile) {

        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $staff = [
                "staff_id"            => $_POST['staff_id'],
                "first_name"          => $_POST['first_name'],
                "last_name"           => $_POST['last_name'],
                "email"               => $_POST['email'],
                "address_id"          => $_POST['address_id'],
                "picture"             => $imgData,
                "store_id"            => $_POST['store_id'],
                "active"              => $_POST['active'],
                "username"            => $_POST['username'],
                "password"            => $_POST['password'],
                "last_update"         => $_POST['last_update']
            ];

            $statement = $connection->prepare(
                "UPDATE staff 
                SET staff_id        = :staff_id, 
                first_name          = :first_name,
                last_name           = :last_name,
                email               = :email,
                address_id          = :address_id,
                picture             = :picture,
                store_id            = :store_id,
                active              = :active,
                username            = :username,
                password            = :password,
                last_update         = NOW()
                WHERE staff_id   = :staff_id "
            );

            $statement->execute($staff);
        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }
    } else {

        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $staff = [
                "staff_id"            => $_POST['staff_id'],
                "first_name"          => $_POST['first_name'],
                "last_name"           => $_POST['last_name'],
                "email"               => $_POST['email'],
                "address_id"          => $_POST['address_id'],
                "store_id"            => $_POST['store_id'],
                "active"              => $_POST['active'],
                "username"            => $_POST['username'],
                "password"            => $_POST['password'],
                "last_update"         => $_POST['last_update']
            ];

            $statement = $connection->prepare(
                "UPDATE staff
                SET staff_id        = :staff_id,
                first_name          = :first_name,
                last_name           = :last_name,
                email               = :email,
                address_id          = :address_id,
                store_id            = :store_id,
                active              = :active,
                username            = :username,
                password            = :password,
                last_update         = NOW()
                WHERE staff_id      = :staff_id "
            );

            $statement->execute($staff);
        } catch (PDOException $error) {
            echo "<br>" . $error->getMessage();
        }
    }

    if (isset($_POST['submit']) && $statement) {
        header("Location: staff.php");
        exit();
    }
}
?>