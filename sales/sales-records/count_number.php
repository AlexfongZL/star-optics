<?php

  function count_sales(){
       global $con;

       $query = "SELECT receipt_total FROM receipt";
       $write = mysqli_query($con, $query);
       $sales = 0;
       while($result = mysqli_fetch_array($write, MYSQLI_ASSOC)){
           $sales = $sales + $result['receipt_total'];
       }

       return $sales;
   }

?>
