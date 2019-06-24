<?php
	/* This php codes basically delete data from the TEMP 
		data from the getdatatable in the database */
	

	include '../include/connection.php';
	include '../include/functions.php';

	$codeID = $_POST['codeID'];

	$query = mysqli_query($con,"DELETE FROM getdatatable WHERE code='$codeID'");

	if($query){
		echo 'Successfully remove';	
	}
	else{
		echo 'Error: '.mysqli_error($query);
	}
?>