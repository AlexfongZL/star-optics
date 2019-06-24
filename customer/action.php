<?php
	include '../include/connection.php';
	include '../include/functions.php';

	if(isset($_POST['submit_edit_cus'])){

	    $cus_id = strtoupper(mysqli_real_escape_string($con,$_POST['cus_id']));
	    $full_name = strtoupper(mysqli_real_escape_string($con,$_POST['full_name']));
	    $address = strtoupper(mysqli_real_escape_string($con,$_POST['address']));
	    $phone_no = strtoupper(mysqli_real_escape_string($con,$_POST['phone_no']));

	    $right_d_sph = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_sph']));
	    $right_d_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_cyl']));
	    $right_d_axis = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_axis']));
	    $right_d_vision = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_vision']));

	    $right_r_sph = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_sph']));
	    $right_r_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_cyl']));
	    $right_r_axis = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_axis']));
	    $right_r_vision = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_vision']));

	    $left_d_sph = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_sph']));
	    $left_d_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_cyl']));
	    $left_d_axis = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_axis']));
	    $left_d_vision = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_vision']));

	    $left_r_sph = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_sph']));
	    $left_r_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_cyl']));
	    $left_r_axis = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_axis']));
	    $left_r_vision = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_vision']));

	    $decenter_in = strtoupper(mysqli_real_escape_string($con,$_POST['decenter_in']));
	    $decenter_out = strtoupper(mysqli_real_escape_string($con,$_POST['decenter_out']));

	    $seg_height_rv = strtoupper(mysqli_real_escape_string($con,$_POST['seg_height_rv']));
	    $seg_height_lv = strtoupper(mysqli_real_escape_string($con,$_POST['seg_height_lv']));

	   	$base_rv = strtoupper(mysqli_real_escape_string($con,$_POST['base_rv']));
	    $base_lv = strtoupper(mysqli_real_escape_string($con,$_POST['base_lv']));

	   	$lense = strtoupper(mysqli_real_escape_string($con,$_POST['lense']));
	    $frame = strtoupper(mysqli_real_escape_string($con,$_POST['frame']));
	    $remarks = strtoupper(mysqli_real_escape_string($con,$_POST['remarks']));
	    $date_time = datetime();

	    $sql_update_cus = mysqli_query($con,"UPDATE customer_details SET
	                          full_name = '$full_name',
	                          address = '$address',
	                          phone_no = '$phone_no',

	                          right_d_sph = '$right_d_sph',
	                          right_d_cyl = '$right_d_cyl',
	                          right_d_axis = '$right_d_axis',
	                          right_d_vision = '$right_d_vision',

	                          right_r_sph = '$right_r_sph',
	                          right_r_cyl = '$right_r_cyl',
	                          right_r_axis = '$right_r_axis',
	                          right_r_vision = '$right_r_vision',

	                          left_d_sph = '$left_d_sph',
	                          left_d_cyl = '$left_d_cyl',
	                          left_d_axis = '$left_d_axis',
	                          left_d_vision = '$left_d_vision',

	                          left_r_sph = '$left_r_sph',
	                          left_r_cyl = '$left_r_cyl',
	                          left_r_axis = '$left_r_axis',
	                          left_r_vision = '$left_r_vision',

	                          decenter_in = '$decenter_in',
	                          decenter_out = '$decenter_out',

	                          seg_height_rv = '$seg_height_rv',
	                          seg_height_lv = '$seg_height_lv',

	                          base_rv = '$base_rv',
	                          base_lv = '$base_lv',

	                          lense = '$lense',
	                          frame = '$frame',
	                          date_modified = '$date_time',
	                          remarks = '$remarks'

	                          WHERE cus_id = '$cus_id'");

	    if($sql_update_cus){
	    	echo "<script>window.location = 'index.php'</script>";
	    }
	    else{
	    	echo "Error updating record: " . mysqli_error($sql_update_cus);
	    }
  }

    else if(isset($_POST['submit_add_cus'])){

	    $full_name = strtoupper(mysqli_real_escape_string($con,$_POST['full_name']));
	    //echo $full_name;
	    $address = strtoupper(mysqli_real_escape_string($con,$_POST['address']));
	    //echo $address;
	    $phone_no = strtoupper(mysqli_real_escape_string($con,$_POST['phone_no']));
	    //echo $phone_no;

	    $right_d_sph = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_sph']));
	    //echo $right_d_sph;
	    
	    $right_d_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_cyl']));
	    //echo $right_d_cyl;
	    
	    $right_d_axis = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_axis']));
	    //echo $right_d_axis;
	    
	    $right_d_vision = strtoupper(mysqli_real_escape_string($con,$_POST['right_d_vision']));
	    //echo $right_d_vision;

	    $right_r_sph = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_sph']));
	    //echo $right_r_sph;
	    
	    $right_r_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_cyl']));
	    //echo $right_r_cyl;
	    
	    $right_r_axis = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_axis']));
	    //echo $right_r_axis;
	    
	    $right_r_vision = strtoupper(mysqli_real_escape_string($con,$_POST['right_r_vision']));
	    //echo $right_r_vision;
	    

	    $left_d_sph = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_sph']));
	    //echo $left_d_sph;
	    
	    $left_d_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_cyl']));
	    //echo $left_d_cyl;
	    
	    $left_d_axis = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_axis']));
	    //echo $left_d_axis;
	    
	    $left_d_vision = strtoupper(mysqli_real_escape_string($con,$_POST['left_d_vision']));
	    //echo $left_d_vision;

	    $left_r_sph = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_sph']));
	    //echo $left_r_sph;
	    
	    $left_r_cyl = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_cyl']));
	    //echo $left_r_cyl;
	    
	    $left_r_axis = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_axis']));
	    //echo $left_r_axis;
	    
	    $left_r_vision = strtoupper(mysqli_real_escape_string($con,$_POST['left_r_vision']));
	    //echo $left_r_vision;
	    

	    $decenter_in = strtoupper(mysqli_real_escape_string($con,$_POST['decenter_in']));
	    //echo $decenter_in;
	    
	    $decenter_out = strtoupper(mysqli_real_escape_string($con,$_POST['decenter_out']));
	    //echo $decenter_out;

	    $seg_height_rv = strtoupper(mysqli_real_escape_string($con,$_POST['seg_height_rv']));
	    //echo $seg_height_rv;
	    
	    $seg_height_lv = strtoupper(mysqli_real_escape_string($con,$_POST['seg_height_lv']));
	    //echo $seg_height_lv;

	   	$base_rv = strtoupper(mysqli_real_escape_string($con,$_POST['base_rv']));
	   	echo $base_rv;
	    $base_lv = strtoupper(mysqli_real_escape_string($con,$_POST['base_lv']));
	    //echo $base_lv;

	   	$lense = strtoupper(mysqli_real_escape_string($con,$_POST['lense']));
	   	//echo $lense;
	    $frame = strtoupper(mysqli_real_escape_string($con,$_POST['frame']));
	    //echo $frame;
	    $remarks = strtoupper(mysqli_real_escape_string($con,$_POST['remarks']));
	    //echo $remarks;
    	
		$date_time = datetime();
		echo '<br/>Date time: ' .$date_time .'<br/>';

	    $uniq_id = setUniqID_customer();
	    echo 'uniq_id: ' .$uniq_id .'<br/>';

	    $id = setID();
	    echo 'id: ' .$id.'<br/>';

    $sql_add_new_cus = mysqli_query($con,"INSERT INTO customer_details SET
                          cus_id = '$uniq_id',
                          full_name = '$full_name',
                          address = '$address',
                          phone_no = '$phone_no',

                          right_d_sph = '$right_d_sph',
                          right_d_cyl = '$right_d_cyl',
                          right_d_axis = '$right_d_axis',
                          right_d_vision = '$right_d_vision',

                          right_r_sph = '$right_r_sph',
                          right_r_cyl = '$right_r_cyl',
                          right_r_axis = '$right_r_axis',
                          right_r_vision = '$right_r_vision',

                          left_d_sph = '$left_d_sph',
                          left_d_cyl = '$left_d_cyl',
                          left_d_axis = '$left_d_axis',
                          left_d_vision = '$left_d_vision',

                          left_r_sph = '$left_r_sph',
                          left_r_cyl = '$left_r_cyl',
                          left_r_axis = '$left_r_axis',
                          left_r_vision = '$left_r_vision',

                          decenter_in = '$decenter_in',
                          decenter_out = '$decenter_out',

                          seg_height_rv = '$seg_height_rv',
                          seg_height_lv = '$seg_height_lv',

                          base_rv = '$base_rv',
                          base_lv = '$base_lv',

                          lense = '$lense',
                          frame = '$frame',
                          creation_date = '$date_time',
                          date_modified = '$date_time',
                          remarks = '$remarks'");
    
    if($sql_add_new_cus){
	    	echo "<script>window.location = 'index.php'</script>";
	    }
	    else{
	    	echo "Error updating record: " . mysqli_error($sql_add_new_cus);
	    }
  }

?>