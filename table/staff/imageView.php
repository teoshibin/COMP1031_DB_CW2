<?php

require "../../include/config.php";

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(isset($_GET['id'])) {
        $sql = "SELECT picture FROM staff WHERE staff_id=" . $_GET['id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: image/png");
		echo $row["picture"];
	}
	mysqli_close($conn);
?>