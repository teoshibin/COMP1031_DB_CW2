
<?php

//view customer information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";
require "../../include/header.php";
// require "fetch.php";
session_start();
if (isset($_GET["id"])) {

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        //sql command to delete student
        $statement = $connection->prepare("DELETE FROM payment WHERE payment_id= :payment_id");
        $statement->bindValue(':payment_id', $_GET["id"]);
        //execute with PDO
        $statement->execute();

        //store a string in variable
        $success = "Payment successfully deleted";
    } catch (PDOException $error) {
        echo "<br>" . $error->getMessage();
    }
}

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

?>

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
                <!-- <?php foreach ($result as $row) : ?> -->
                    <!-- <tr class="tr-back" >
                        <td><?php echo escape($row['payment_id']); ?></td>
                        <td><?php echo escape($row['customer_id']); ?></td>
                        <td><?php echo escape($row['staff_id']); ?></td>
                        <td><?php echo escape($row['rental_id']); ?></td>
                        <td><?php echo escape($row['amount']); ?></td>
                        <td><?php echo escape($row['payment_date']); ?></td>
                        <td><?php echo escape($row['last_update']); ?> </td>
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
                    </tr> -->
                   <!-- <?php endforeach; ?> -->
     
            </tbody>
        </table>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->


<script language="JavaScript" type="text/javascript" script src="../../js/tablesort.js"></script>
<script>
//     $.ajax({
//     url:"fetch.php",
//     method:"GET",
//     data:{
//         'payment_id' :$('#payment_id').val(),
//         'customer_id' :$('#customer_id').val(),
//         'staff_id' :$('#staff_id').val(),
//         'rental_id' :$('#rental_id').val(),
//         'payment_date' :$('#payment_date').val(),
//         'amount' :$('#amount').val(),
//         'last_update' :$('#last_update').val(),
//     },
//     dataType:"JSON",
//     success:function(data)
//     {
//     //  $('#dtHorizontalVerticalExample').css("display", "block");
//      $('#payment_id').text(data.payment_id);
//      $('#customer_id').text(data.customer_id);
//      $('#staff_id').text(data.staff_id);
//      $('#rental_id').text(data.rental_id);
//      $('#amount').text(data.amount);
//      $('#payment_date').text(data.payment_date);
//      $('#last_update').text(data.last_update);
//     }
//    })
// $.ajax({
//                     type: "GET",
//                     url: "fetch.php",
//                     data: {},
//                     contentType: "application/json; charset=utf-8",
//                     dataType: "json",                    
//                     cache: false,                       
//                     success: function(response) {                        
//                         var trHTML = '';
//                             $.each(response, function (i, item) {
//                                 trHTML +=    '<tr><td>' + item.payment_id + '</td><td>' + item.customer_id +
//                                '</td><td>' + item.staff_id + '</td><td>' + item.rental_id + '</td><td>' + item.amount +
//                                '</td><td>' + item.payment_date + '</td><td>' + item.last_update + '</td></tr>';
//                             });
//                             $('#dtHorizontalVerticalExample').append(trHTML);
//                     },
//                     error: function (e) {
//                         console.log(response);
//                     }
//             }); 

// $.getJSON("fetch.php",function(data){
//     var items = [];
//     $.each(data,function(key,val){
//         items.push("<tr>");
//         items.push("<td=''"+key+"''>"+val.payment_id+"</td>");
//         items.push("<td=''"+key+"''>"+val.customer_id+"</td>");
//         items.push("<td=''"+key+"''>"+val.staff_id+"</td>");
//         items.push("<td=''"+key+"''>"+val.rental_id+"</td>");
//         items.push("<td=''"+key+"''>"+val.amount+"</td>");
//         items.push("<td=''"+key+"''>"+val.payment_date+"</td>");
//         items.push("<td=''"+key+"''>"+val.last_update+"</td>");
//         items.push("</tr>");
//     });
//     $("<tbody/>",{html:items.join("")}).appendTo("table");
// });

// $(document).ready(function(){
//     $.getJSON("data.json",function(data){
//         var payment_data = '';
//         $.each(data,function(key,value){
//             payment_data += '<tbody>';
//             payment_data += '<tr class="tr-back">';
//             payment_data += '<td>' + value.payment_id +' </td>';
//             payment_data += '<td>' + value.customer_id +' </td>';
//             payment_data += '<td>' + value.staff_id +' </td>';
//             payment_data += '<td>' + value.rental_id +' </td>';
//             payment_data += '<td>' + value.amount +' </td>';
//             payment_data += '<td>' + value.payment_date +' </td>';
//             payment_data += '<td>' + value.last_update +' </td>';
//             payment_data += '</tr>';
//             payment_data += '</tbody>';

//         });
//         $("#dtHorizontalVerticalExample").append(payment_data);
//     });
// });

// if ( $.fn.dataTable.isDataTable( '#dtHorizontalVerticalExample' ) ) {
//     table = $('#dtHorizontalVerticalExample').DataTable();
// }
// else {
//     table = $('#dtHorizontalVerticalExample').DataTable( {
//         paging: false
//     } );
// }

$(document).ready(function() {
    $('#dtHorizontalVerticalExample').DataTable( {
        "ajax": {
            "type": "GET",
            "url": "http://localhost/DB_CW2/table/payment/fetch.php",
            "dataSrc": function (data) {
                var return_data = new Array();
                for(var i=0;i< data.length; i++){
                    return_data.push({
                        'payment_id': data[i].payment_id,
                        'customer_id': data[i].customer_id,
                        'staff_id': data[i].staff_id,
                        'rental_id': data[i].rental_id,
                        'amount': data[i].amount,
                        'payment_date': data[i].payment_date,
                        'last_update': data[i].last_update
                        })
                }
                return return_data;
            }
        },
            "columns": [
                { "data": "payment_id" },
                { "data": "customer_id" },
                { "data": "staff_id" },
                { "data": "rental_id" },
                { "data": "amount" },
                { "data": "payment_date" },
                { "data": "last_update" }
            ]
    });
});
// $(document).ready(function(){
//     $.ajax({
//         type: "GET",
//         url: "http://localhost/DB_CW2/table/payment/fetch.php",
//         data: {},
//         contentType: "application/json; charset=utf-8",
//         dataType: "json",                    
//         cache: false,
//         success: function(data) {  
//             var payment_data = '';
//             $.each(data,function(key,value){
//                 // payment_data +=    '<tbody><tr class="tr-back"><td>' + value.payment_id + '</td><td>' + value.customer_id +
//                 //               '</td><td>' + value.staff_id + '</td><td>' + value.rental_id + '</td><td>' + value.amount +
//                 //                '</td><td>' + value.payment_date + '</td><td>' + value.last_update + '</td></tr></tbody>';
//             payment_data += '<tbody>';
//             payment_data += '<tr class="tr-back">';
//             payment_data += '<td>' + value.payment_id +' </td>';
//             payment_data += '<td>' + value.customer_id +' </td>';
//             payment_data += '<td>' + value.staff_id +' </td>';
//             payment_data += '<td>' + value.rental_id +' </td>';
//             payment_data += '<td>' + value.amount +' </td>';
//             payment_data += '<td>' + value.payment_date +' </td>';
//             payment_data += '<td>' + value.last_update +' </td>';
//             payment_data += '</tr>';
//             payment_data += '</tbody>';

//         });
//         $('#dtHorizontalVerticalExample').append(payment_data);

//         },
//         error:function(e){
//             console.log(data);
//         }
//     });
// });


</script>
</body>
</html>