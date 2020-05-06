
<?php

//view payment information
require "../../include/login-check.php";
require "../../include/config.php";
require "../../include/common.php";
require "../../include/header.php";

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
            </tbody>
        </table>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type ="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<!-- <script language="JavaScript" type="text/javascript" script src="../../js/tablesort.js"></script> -->
<script>
$(document).ready(function() {

    
var table = $('#dtHorizontalVerticalExample').DataTable( {
    "columns": [
        { "data": "payment_id" },
        { "data": "customer_id" },
        { "data": "staff_id" },
        { "data": "rental_id" },
        { "data": "amount" },
        { "data": "payment_date" },
        { "data": "last_update" }
       
    ]
} );

  table.destroy();
      table = $('#dtHorizontalVerticalExample').DataTable( {
     "ajax": {
         "url": "http://localhost/DB_CW2/table/payment/payment_json.php",
         "dataSrc": ""
     },
    "columns": [
        { "data": "payment_id" },
        { "data": "customer_id" },
        { "data": "staff_id" },
        { "data": "rental_id" },
        { "data": "amount" },
        { "data": "payment_date" },
        { "data": "last_update" },
        {data: "payment_id" , render : function ( data, type, row, meta ) {
          return type === 'display'  ?
            '<a type="buttons" class="btn" name="view" href="payment_view.php?id='+ data +'" ><i class="fas fa-info-circle button" aria-hidden="true"></i></a>' + '<a type="buttons" class="btn" name="view" href="payment_update.php?id='+ data +'" ><i class="far fa-edit button"></i></a>' + '<a type="buttons" class="btn" name="view" href="payment_delete.php?id='+ data +'"><i class="fa fa-trash button" aria-hidden="true"></i></a>' :
            data;
        }},
    ]
} );

} );

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


// $(document).ready(function() {
//     $('#dtHorizontalVerticalExample').DataTable( {
//         "ajax": "fetch.php",
//         "columns": [
//             { "data": "payment_id" },
//             { "data": "customer_id" },
//             { "data": "staff_id" },
//             { "data": "rental_id" },
//             { "data": "amount" },
//             { "data": "payment_date" },
//             { "data": "last_update" }
//         ]
//     });
// });
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
