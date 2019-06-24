<?php
    include '../../include/connection.php';
    include '../../include/functions.php';
 //***********************************************************************************************//
    $cus_id = $_POST['cus_id'];

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
                              cus_id = '$cus_id',
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