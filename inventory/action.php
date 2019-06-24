<?php
session_start();

include '../include/connection.php';
include '../include/functions.php';


	if(isset($_POST['add_item_submit'])){
	    $item_name = strtoupper(mysqli_real_escape_string($con,$_POST['item_name']));
	    //echo '$item_name: ' .$item_name.'<br/>';

	    $item_brand = strtoupper(mysqli_real_escape_string($con,$_POST['item_brand']));
	    //echo '$item_brand: ' .$item_brand.'<br/>';

	    $item_type = mysqli_real_escape_string($con,$_POST['item_type']);
	    //echo '$item_type: ' .$item_type.'<br/>';

	    $quantity_type = strtoupper(mysqli_real_escape_string($con,$_POST['checkbox'][0]));
	    //echo '$quantity_type: ' .$quantity_type.'<br/><br/><br/>';

/*#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#*/

/*
       _               _          _             _           _ _       
      | |             | |        (_)           | |         | (_)      
   ___| |__   ___  ___| | __  ___ _ _ __   __ _| | ___   __| |___   __
  / __| '_ \ / _ \/ __| |/ / / __| | '_ \ / _` | |/ _ \ / _` | \ \ / /
 | (__| | | |  __/ (__|   <  \__ \ | | | | (_| | |  __/| (_| | |\ V / 
  \___|_| |_|\___|\___|_|\_\ |___/_|_| |_|\__, |_|\___| \__,_|_| \_/  
                         ______            __/ |    ______            
                        |______|          |___/    |______|*/
	    //if($_POST['item_quantity'] != ''){
	    	$item_quantity = mysqli_real_escape_string($con,$_POST['item_quantity']);
	    	//echo '$item_quantity: ' .$item_quantity.'<br/><br/>';
	    //}else{
	    //	$item_quantity = NULL;
	    	//echo '$item_quantity: empty<br/><br/>';
	   // }


/*
       _               _      _                       _      _ _       
      | |             | |    | |                     | |    | (_)      
   ___| |__   ___  ___| | __ | |__   _____  _____  __| |  __| |___   __
  / __| '_ \ / _ \/ __| |/ / | '_ \ / _ \ \/ / _ \/ _` | / _` | \ \ / /
 | (__| | | |  __/ (__|   <  | |_) | (_) >  <  __/ (_| || (_| | |\ V / 
  \___|_| |_|\___|\___|_|\_\ |_.__/ \___/_/\_\___|\__,_| \__,_|_| \_/  
                         ______                      ______            
                        |______|                    |______|*/

	    //if($_POST['item_quantity_box'] != ''){
	    	$item_quantity_box = mysqli_real_escape_string($con,$_POST['item_quantity_box']);
	    	//echo '$item_quantity_box: ' .$item_quantity_box.'<br/>';
	    //}else{
	    	//$item_quantity_box = NULL;
	    	//echo '$item_quantity_box: empty <br/>';
	    //}

	    //if($_POST['item_box_num'] !=''){
	    	$item_box_num = mysqli_real_escape_string($con,$_POST['item_box_num']);
	    	//echo '$item_box_num: ' .$item_box_num.'<br/>';
	    //}else{
	    	//$item_box_num = NULL;
	    	//echo '$item_box_num: empty<br/>';
	    //}


	   // if($_POST['item_num_per_box'] !=''){
	    	$item_num_per_box = mysqli_real_escape_string($con,$_POST['item_num_per_box']);
	    	//echo '$item_num_per_box: ' .$item_num_per_box.'<br/>';
	    //}else{
	    	//$item_num_per_box = NULL;
	    	//echo '$item_num_per_box: empty <br/><br/><br/>';
	   // }

/*#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#*/

	    if($_POST['min_quantity'] !=''){
	    	$min_quantity = mysqli_real_escape_string($con,$_POST['min_quantity']);	
	    }else{
	    	$min_quantity = NULL;
	    }

	    $item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	    //echo '$item_id: ' .$item_id.'<br/>';

	    $item_cost_price = mysqli_real_escape_string($con,$_POST['item_cost_price']);
	    //echo '$item_cost_price: ' .$item_cost_price.'<br/>';

	    $item_sell_price = mysqli_real_escape_string($con,$_POST['item_sell_price']);
	    //echo '$item_sell_price: ' .$item_sell_price.'<br/>';


	    $item_colour_1 = mysqli_real_escape_string($con,$_POST['item_colour_1']);
	    //echo '$item_colour_1: ' .$item_colour_1.'<br/>';

	    $item_colour_2 = mysqli_real_escape_string($con,$_POST['item_colour_2']);
	    //echo '$item_colour_2: ' .$item_colour_2.'<br/>';

	    $item_colour_3 = mysqli_real_escape_string($con,$_POST['item_colour_3']);
	    //echo '$item_colour_3: ' .$item_colour_3.'<br/>';


	    $item_order_id = mysqli_real_escape_string($con,$_POST['item_order_id']);
	    //echo '$item_order_id: ' .$item_order_id.'<br/>';

	    $item_degree = mysqli_real_escape_string($con,$_POST['item_degree']);
	    //echo '$item_degree: ' .$item_degree.'<br/>';

	    $item_supp_id = mysqli_real_escape_string($con,$_POST['item_supp_id']);
	    //echo '$item_supp_id: ' .$item_supp_id.'<br/>';


	    $item_remarks = mysqli_real_escape_string($con,$_POST['item_remarks']);
	    //echo '$item_remarks: ' .$item_remarks.'<br/>';


	    $uniq_id = setUniqID($item_brand, $item_type);
	    //echo '$uniq_id: ' .$uniq_id.'<br/>';

	    $date_time = setDate();
	    //echo '$date_time: ' .$date_time.'<br/>';

	    $sql_add_new_item = mysqli_query($con,"INSERT INTO inventory SET prod_id = '$uniq_id',
	    	brand = '$item_brand',
	    	type = '$item_type',
	    	name = '$item_name',
	    	quantity_type = '$quantity_type',
	    	quantity = '$item_quantity',
	    	quantity_box = '$item_quantity_box',
	    	num_of_box = '$item_box_num',
	    	num_per_box = '$item_num_per_box',
	    	item_id = '$item_id',
	    	min_quantity = '$min_quantity',
	    	cost_price = '$item_cost_price',
	    	selling_price = '$item_sell_price',
	    	colour_1 = '$item_colour_1',
	    	colour_2 = '$item_colour_2',
	    	colour_3 = '$item_colour_3',
	    	order_id = '$item_order_id',
	    	degree = '$item_degree',
	    	supp_id = '$item_supp_id',
	    	date_added = '$date_time',
	    	date_modified = '$date_time',
	    	remarks = '$item_remarks'");

	    if($sql_add_new_item){
	    	echo "<script>window.location = 'inventory.html'</script>";
	    }
	    else{
	    	echo "Error updating record: " . mysqli_error($sql_add_new_item);
	    }

	    
  }


	if(isset($_POST['edit_item_submit'])){//action for edit page

		$prod_id = strtoupper(mysqli_real_escape_string($con,$_POST['prod_id']));
		
	    $item_name = strtoupper(mysqli_real_escape_string($con,$_POST['item_name']));
	    $item_brand = strtoupper(mysqli_real_escape_string($con,$_POST['item_brand']));
	    $item_type = mysqli_real_escape_string($con,$_POST['item_type']);

	    $quantity_type = strtoupper(mysqli_real_escape_string($con,$_POST['checkbox'][0]));
	    
	    $item_quantity = strtoupper(mysqli_real_escape_string($con,$_POST['item_quantity']));
	    $item_quantity_box = strtoupper(mysqli_real_escape_string($con,$_POST['item_quantity_box']));

	    $item_box_num = mysqli_real_escape_string($con,$_POST['item_box_num']);
	    $item_num_per_box = mysqli_real_escape_string($con,$_POST['item_num_per_box']);
	    $min_quantity = mysqli_real_escape_string($con,$_POST['min_quantity']);

	    $item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	    $item_cost_price = mysqli_real_escape_string($con,$_POST['item_cost_price']);
	    $item_sell_price = mysqli_real_escape_string($con,$_POST['item_sell_price']);

	    $item_colour_1 = mysqli_real_escape_string($con,$_POST['item_colour_1']);
	    $item_colour_2 = mysqli_real_escape_string($con,$_POST['item_colour_2']);
	    $item_colour_3 = mysqli_real_escape_string($con,$_POST['item_colour_3']);

	    $item_order_id = mysqli_real_escape_string($con,$_POST['item_order_id']);
	    $item_degree = mysqli_real_escape_string($con,$_POST['item_degree']);
	    $item_supp_id = mysqli_real_escape_string($con,$_POST['item_supp_id']);

	    $item_remarks = mysqli_real_escape_string($con,$_POST['item_remarks']);

	    $date_time = setDate();

		$update_item = mysqli_query($con,"UPDATE inventory SET
	                          brand = '$item_brand',
	                          type = '$item_type',
	                          name = '$item_name',
	                          quantity_type = '$quantity_type',
	                          quantity = '$item_quantity',
	                          quantity_box = '$item_quantity_box',
	                          num_of_box = '$item_box_num',
	                          num_per_box = '$item_num_per_box',
	                          min_quantity = '$min_quantity',
	                          item_id = '$item_id',
	                          cost_price = '$item_cost_price',
	                          selling_price = '$item_sell_price',
	                          colour_1 = '$item_colour_1',
	                          colour_2 = '$item_colour_2',
	                          colour_3 = '$item_colour_3',
	                          order_id = '$item_order_id',
	                          degree = '$item_degree',
	                          supp_id = '$item_supp_id',
	                          date_modified = '$date_time',
	                          remarks = '$item_remarks'
	                          WHERE prod_id = '$prod_id'");

		if($update_item){
			echo "<script>window.location = 'inventory.html'</script>";
		}
		else{
			echo "Error updating record: " . mysqli_error($update_item);
		}

	}

?>