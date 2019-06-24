<?php
include '../include/connection.php';

$supp_id = $_POST['supp_id'];

$delete_supplier = mysqli_query($con,"DELETE FROM supplier WHERE supp_id = '$supp_id'");

?>