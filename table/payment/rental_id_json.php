<?php
header('Content-Type: application/json');
  require "../../include/config.php";
  require "../../include/common.php";
  require_once "../../include/login-check.php";


  try{

    //#1 Open Connection
    $connection = new PDO ($dsn,$username,$password,$options);
    
    //#2 Prepare Sql QUery 
    $statement = $connection->prepare("SELECT rental_id FROM rental");
   
    $statement->execute();
    $data= $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);

} catch (PDOException $error){

    echo "<br>".$error->getMessage();

}

?>