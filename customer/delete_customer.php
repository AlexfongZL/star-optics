<?php
	include '../include/connection.php';

	$customer_id = $_POST['cus_id'];
	$sql_delete_customer = mysqli_query($con,"DELETE FROM customer_details WHERE cus_id = '$customer_id' ");
	//$exe_sql_delete_customer = mysqli_fetch_assoc($sql_delete_customer);
?>