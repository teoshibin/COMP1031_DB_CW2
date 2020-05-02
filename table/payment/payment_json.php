
<?php

//view customer information
require "../../include/login-check.php";
// require "../../include/config.php";
require "../../include/common.php";
require "../../include/header.php";
// require "fetch.php";

// if (isset($_GET["id"])) {

//     try {
//         $connection = new PDO($dsn, $username, $password, $options);
//         //sql command to delete student
//         $statement = $connection->prepare("DELETE FROM payment WHERE payment_id= :payment_id");
//         $statement->bindValue(':payment_id', $_GET["id"]);
//         //execute with PDO
//         $statement->execute();

//         //store a string in variable
//         $success = "Payment successfully deleted";
//     } catch (PDOException $error) {
//         echo "<br>" . $error->getMessage();
//     }
// }

// try {
//     $connection = new PDO($dsn, $username, $password, $options);

//     $statement = $connection->prepare("SELECT payment.payment_id, payment.customer_id, payment.staff_id, 
//     payment.rental_id, payment.amount, payment.payment_date,payment.last_update FROM payment");

//     //execute with PDO
//     $statement->execute();

//     //store result in $result
//     $result = $statement->fetchAll();
// } catch (PDOException $error) {
//     echo "<br>" . $error->getMessage();
// }

// ?>

<section class="content">
    <!-- outer most one - transparent -->

    <div class="top">
        <a class="insertbtn" href="payment_add.php" role="button" style="width: 15%;"><strong>Create New Payment</strong></a>
        <h2 class="title">Payment</h2>
    </div>

    <div style="overflow-x:auto!important;">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" role="grid" cellspacing="0" width="100%">
            <thead>
                <!-- <tr class="bg-primary text-white"> -->
                <tr class="th-back">
                    <th>Payment ID</th>
                    <th>Customer ID</th>
                    <th>Staff ID</th>
                    <th>Rental ID</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
              
                    <tr class="tr-back">
                        <td><span id ="payment_id"></td>
                        <td><span id ="customer_id"></td>
                        <td><span id ="staff_id"></td>
                        <td><span id ="rental_id"></td>
                        <td><span id ="amount"></td>
                        <td><span id ="payment_date"></td>
                        <td><span id ="last_update"></td>
                        <td align="left">

                            <a type="buttons" class="btn" name="view" href="payment_view.php?id=<?php echo escape($row['payment_id']); ?>">
                                <i class="fas fa-info-circle button" aria-hidden="true">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="update" href="payment_update.php?id=<?php echo escape($row['payment_id']); ?>">
                                <i class="far fa-edit button">
                                </i>
                            </a>

                            <a type="buttons" class="btn" name="delete" type="submit" href="payment.php?id=<?php echo escape($row['payment_id']); ?>" onClick='return confirm("Are you sure want to delete this ?");'>
                                <i class="fa fa-trash button" aria-hidden="true">
                                </i>
                            </a>

                        </td>
                    </tr>
     
            </tbody>
        </table>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" script src="../../js/tablesort.js"></script>
<script>
    $.ajax({
    url:"fetch.php",
    method:"GET",
    data:{
        'payment_id' :$('#payment_id').val(),
        'customer_id' :$('#customer_id').val(),
        'staff_id' :$('#staff_id').val(),
        'rental_id' :$('#rental_id').val(),
        'payment_date' :$('#payment_date').val(),
        'amount' :$('#amount').val(),
        'last_update' :$('#last_update').val(),
    },
    dataType:"JSON",
    success:function(data)
    {
    //  $('#dtHorizontalVerticalExample').css("display", "block");
     $('#payment_id').text(data.payment_id);
     $('#customer_id').text(data.customer_id);
     $('#staff_id').text(data.staff_id);
     $('#rental_id').text(data.rental_id);
     $('#amount').text(data.amount);
     $('#payment_date').text(data.payment_date);
     $('#last_update').text(data.last_update);
    }
   })
</script>
</body>
</html>