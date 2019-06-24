<?php
  include '../include/connection.php';

  $prod_id = $_POST['id'];
  $sql_delete_item = mysqli_query($con,"DELETE FROM inventory WHERE prod_id = '$prod_id'");

?>