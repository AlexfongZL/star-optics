<?php
    include '../../include/connection.php';
    include '../../include/functions.php';
 //***********************************************************************************************//
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
    
    $date_time = datetime();
    $uniq_id = setUniqID_customer();
      $id = setID();

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

    $prod_id = $_POST['prod_id'];
    $prod_quantity = $_POST['prod_quantity'];
    $prod_discount = $_POST['prod_discount'];

    $num_of_row = $_POST['num_of_row'];
    $receipt_total = 0;

    /* --- SQL INSERT INTO TABLE RECEIPT --- */

    //function to calculate the receipt_total
    for($x = 0;$x < $num_of_row;$x++){

        $this_prod_id = $prod_id[$x];
        $this_prod_quantity = $prod_quantity[$x];
        $this_prod_discount = 1 - $prod_discount[$x]/100;

        $sql_fetch_inv = mysqli_query($con, "SELECT selling_price FROM inventory 
                                                WHERE prod_id = '$this_prod_id'");

        $this_prod_selling_price = mysqli_fetch_array($sql_fetch_inv);
        $this_prod_selling_price = $this_prod_selling_price['selling_price'];

        $multiplication = $this_prod_selling_price * $this_prod_quantity * $this_prod_discount;

        $receipt_total = $receipt_total + $multiplication;

    }    

    $receipt_id = 'RECPT'.setID();
    $receipt_date = setDate();
    $receipt_time = setTime();

    $sql_add_new_receipt = mysqli_query($con,"INSERT INTO receipt SET
                              receipt_id = '$receipt_id',
                              receipt_date = '$receipt_date',
                              receipt_time = '$receipt_time',
                              receipt_total = '$receipt_total'");

    //function to insert into PURCHASE
    for($x = 0;$x < $num_of_row;$x++){

        $this_prod_id = $prod_id[$x];
        $this_prod_quantity = $prod_quantity[$x];
        $this_prod_discount = $prod_discount[$x];

        /* --- SQL INSERT INTO TABLE PURCHASE --- */
    $sql_add_new_purchase = mysqli_query($con,"INSERT INTO purchase SET
                              receipt_id = '$receipt_id',
                              cus_id = '$uniq_id',
                              prod_id = '$this_prod_id',
                              prod_quantity = '$this_prod_quantity',
                              prod_discount = '$this_prod_discount'");

    $sql_update_inv = mysqli_query($con,"UPDATE inventory SET
                                          quantity = quantity - '$this_prod_quantity'
                                          WHERE prod_id = '$this_prod_id'");
    if($sql_update_inv){
      echo "<script>window.location = '../sales.html'</script>";
    }
    else{
      echo "Error updating record: " . mysqli_error($sql_update_inv);
    }
    }

?>