<?php
	include '../include/connection.php';
	include '../include/functions.php';

	$query = mysqli_query($con,"SELECT * FROM getdatatable WHERE status = 'new'");

	//$query = mysqli_query($con,"SELECT code FROM getdatatable WHERE status = '"new"'
	//'");


	$fetch = mysqli_fetch_assoc($query);

	if(is_null($fetch)){
		echo '';
	}
	else{
	    $inv_info = array($fetch['code'],$fetch["type"],$fetch["colour"],$fetch["price"]);
	        echo json_encode($inv_info);
	    }
?>