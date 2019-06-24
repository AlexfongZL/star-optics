<?php

include 'connection.php';
include 'functions.php';
 
 $code = $_POST['code'];
 $date_time = setDate();

 $checkItem = mysqli_query($con,"SELECT prod_id FROM inventory WHERE prod_id = '$code'");

 if(mysqli_num_rows($checkItem) == 1){
 	$request_item_data = mysqli_query($con,"SELECT * FROM inventory WHERE prod_id = '$code'");
 	$item_info = mysqli_fetch_assoc($request_item_data);

 	$item_type = $item_info['type'];
 	$item_colour = $item_info['colour_1'];
 	$item_price = $item_info['selling_price'];

 	$query = mysqli_query($con,"INSERT INTO getdatatable SET code = '$code',type = '$item_type', colour = '$item_colour', price = '$item_price', insert_date_time ='$date_time',status='new'");

	 if($query){
	 	echo 'Data Submit Successfully';
	 }
	 else{
	 	echo 'Try Again'. mysqli_error($query);
	 }
 }
 else{
 	//do nothing
 }

 mysqli_close($con);


?>