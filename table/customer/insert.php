
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
</head> 
<body>
<?php

if(isset($_POST["submit"])){

    //create connection
    $link = mysqli_connect("localhost", "root","","sakila");
    
    // Check connection
    if(!$link){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Escape user inputs for security
    $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $address_id = mysqli_real_escape_string($link, $_REQUEST['address_id']);
    $store_id = mysqli_real_escape_string($link, $_REQUEST['store_id']);
    $active = mysqli_real_escape_string($link, $_REQUEST['active']);



    // Attempt insert query execution
    $sql = "INSERT INTO customer ( store_id, first_name, last_name, email, address_id, active) 
    VALUES ($store_id,$first_name,$last_name,$email,$address_id,$active)";
    
    if(mysqli_query($link, $sql)){
        echo 'Success';
    } else{
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        echo 'Fail';
    }
    // Close connection
    mysqli_close($link);
}
?>

</body>
</html>