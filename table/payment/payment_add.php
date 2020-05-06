<?php 
    require "../../include/config.php";
    require "../../include/common.php";
    require_once "../../include/login-check.php";
    require_once "../../include/header.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement1 = $connection->prepare("SELECT customer_id,first_name,last_name FROM customer");
        $statement1->execute();
        $result1 = $statement1->fetchAll();

        $statement2 = $connection->prepare("SELECT staff_id,first_name,last_name FROM staff");
        $statement2->execute();
        $result2 = $statement2->fetchAll();
        
        // $statement3 = $connection->prepare("SELECT rental_id FROM rental");
        // $statement3->execute();
        // $result3 = $statement3->fetchAll();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <!-- <script type="text/javascript" src="insert.js"></script> -->
    <script type="text/javascript" src="payment_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Payment</h3>
  
    <form name="myform" action="payment_add.inc.php" onsubmit="return validateForm()" method="post">

                <select type="text" name="customer_id" id="customer_id" class="input">
                    <option value="-" selected>Customer ID</option>
                    <?php foreach($result1 as $customer) { echo "<option value =$customer[customer_id]>$customer[customer_id]. $customer[first_name] $customer[last_name]</option>";}?>
                </select>

                <br>

                <select type="text" name="staff_id" id="staff_id" class="input">
                    <option value="-" selected>Staff ID</option>
                    <?php foreach($result2 as $staff) { echo "<option value =$staff[staff_id]>$staff[staff_id]. $staff[first_name] $staff[last_name]</option>";}?>
                </select>
                
                <br>

                <select type="text" name="rental_id" id="rental_id" class="input">
                    <option value="-" selected>Rental ID</option>
                    <!-- <?php foreach($result3 as $rental) { echo "<option value =$rental[rental_id]>$rental[rental_id]</option>";}?> -->
                </select>

                    <br>

            <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Rental ID</h5>
                <input type="number" name="rental_id" id="rental" class="input">
            </div>
        </div>
        
        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Amount</h5>
                <input type="number" name="amount" id="amount" step ="0.01" class="input">
            </div>
        </div>

        


        <input class="btn btn-primary" type="submit" name="submit" style="margin-top:30px">

        <br>

        <a href="payment.php" class="btn-back" style="margin-bottom:100px;">BACK</a>
        
    </form>
</div>
</body>
<script type="text/javascript">
// function myFunction()
//   {
//     $('#rental_id').empty();
//     $('#rental_id').append("<option>Rental ID</option>");

//     $.ajax({
//             type: "POST",
//             url: "http://localhost/DB_CW2/table/payment/rental_id_json.php",
//             contentType: "application/json; charset=utf-8",
//             dataType:"json",
//             success: function(data){
//                 $('#rental_id').empty();
//                 $('#rental_id').append("<option value='hide'>Rental ID</option>");
//                 $.each(data, function(i, value) {
//                     // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
//                     $('#rental_id').append('<option value="' +value.rental_id + '">' + value.rental_id + '</option>');
//                 });
//             },
//             complete:function(){

//             }
//         });
//   }

$(document).ready(function(){
    var url = "http://localhost/DB_CW2/table/payment/rental_id_json.php";
    $.getJSON(url, function (data) {
                $.each(data, function (index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $('#rental_id').append('<option value="' + value.rental_id + '">' + value.rental_id + '</option>');
                });
            });
        });




</script>

</html>