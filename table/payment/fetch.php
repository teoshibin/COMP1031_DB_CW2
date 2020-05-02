<?php
//fetch.php
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "sakila");
 $query = "SELECT payment.payment_id, payment.customer_id, payment.staff_id, 
 payment.rental_id, payment.amount, payment.payment_date,payment.last_update FROM payment";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["payment_id"] = $row["payment_id"];
  $data["customer_id"] = $row["customer_id"];
  $data["staff_id"] = $row["staff_id"];
  $data["rental_id"] = $row["rental_id"];
  $data["amount"] = $row["amount"];
  $data["payment_date"] = $row["payment_date"];
  $data["last_update"] = $row["last_update"];
 }

 echo json_encode($data);
}
?>