<?php

    include '../include/connection.php';
    include '../include/functions.php';

  if(isset($_POST['add_supplier_submit'])){

    date_default_timezone_set('Asia/Kuala_Lumpur');

    $supp_name = $_POST['supp_name'];
    $supp_addr = $_POST['supp_addr'];
    $supp_phone_1 = $_POST['supp_phone_1'];
    $supp_phone_2 = $_POST['supp_phone_2'];
    $supp_remarks = $_POST['supp_remarks'];
    
    $date = date('Y-m-d');
    $uniq_id = setUniqID_supplier('SUPP');
    $id = setID();

    $sql_add_new_cus = mysqli_query($con,"INSERT INTO supplier SET
                          supp_id = '$uniq_id',
                          name = '$supp_name',
                          address = '$supp_addr',
                          contact_no = '$supp_phone_1',
                          contact_no_2 = '$supp_phone_2',
                          date_created = '$date',
                          date_modified = '$date',
                          remarks = '$supp_remarks'");
    //$exe_sql_add_new_cus = mysqli_fetch_assoc($sql_add_new_cus);
    echo "<script>window.location = 'index.php'</script>";
  }

   else if(isset($_POST['edit_supplier_submit'])){

    date_default_timezone_set('Asia/Kuala_Lumpur');

    $supp_id = $_POST['supp_id'];
    $supp_name = $_POST['supp_name'];
    $supp_addr = $_POST['supp_addr'];
    $supp_phone_1 = $_POST['supp_phone_1'];
    $supp_phone_2 = $_POST['supp_phone_2'];
    $supp_remarks = $_POST['supp_remarks'];
    
    $date = date('Y-m-d');
    //$uniq_id = setUniqID_supplier('SUPP');
    //$id = setID();

    $sql_add_new_cus = mysqli_query($con,"UPDATE supplier SET
                          name = '$supp_name',
                          address = '$supp_addr',
                          contact_no = '$supp_phone_1',
                          contact_no_2 = '$supp_phone_2',
                          date_modified = '$date',
                          remarks = '$supp_remarks'
                          WHERE supp_id = '$supp_id'");
    //$exe_sql_add_new_cus = mysqli_fetch_assoc($sql_add_new_cus);
    echo "<script>window.location = 'index.php'</script>";
  }

?>