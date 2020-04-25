<?php 

/**
 * Open a connection via PDO to insert a
 * customer and table with structure.
 */
/**
 * all the inputs are placed into 
 * a $_POST array. 
 * it runs only if the form has been submitted.
 */
if(isset($_POST['insert'])){
    require "../../include/config.php";
    require "../../inlcude/common.php";
    $statement=false;
    $new_customer = array(
        "customer_id"       => $_POST['customer_id'],
        "store_id"          => $_POST['store_id'],
        "first_name"         => $_POST['first_name'],
        "last_name"          => $_POST['last_name'],
        "email"             => $_POST['email'],
        "address_id"        => $_POST['address_id'],
        "active"            => $_POST['active'],
        "create_date"       => $_POST['create_date'],
        "last_update"       => $_POST['last_update'],

    );

    try{
        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) 
        VALUES (?,?,?,?,?,?,?,NOW(),NOW())");
        $statement ->bindParam(1,$_POST['customer_id'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['first_name'],PDO::PARAM_STR);
        $statement ->bindParam(3,$_POST['last_name'],PDO::PARAM_STR);
        $statement ->bindParam(4,$_POST['email'],PDO::PARAM_STR);
        $statement ->bindParam(5,$_POST['address_id'],PDO::PARAM_STR);
        $statement ->bindParam(6,$_POST['active'],PDO::PARAM_STR);
        $statement ->bindParam(7,$_POST['create_date'],PDO::PARAM_STR);
        $statement ->bindParam(8,$_POST['last_update'],PDO::PARAM_STR);


        //$statement = $connection->prepare($sql);
        $statement->execute();
    } catch (PDOException $error){
            echo "<br>".$error->getMessage();
    }

    if (isset($_POST['insert']) && $statement) {
        echo '<p class="">Data successfully added</p>';
    } else {
        echo '<p class="">Please fill in all the details correctly</p>';
    } 
}
header("Location: customer.php")
?>