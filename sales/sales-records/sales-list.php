<?php
 //session_start();
  include '../../include/connection.php';
?>  
  <!--<button onclick="location.href = 'sales-chart.php';" style="float: right;margin-right:1%;margin-bottom:-2.5%;margin-top:-1.4%;background-color: black;">
    <img src="../../img/report.png" style="width:50px;height:50px;"/>
  </button>-->
  
  <table id="table_main">
    
    <tr align="center">
      <td>No.</td>
      <td>Receipt ID</td>
      <td>Date</td>
      <td>Total (RM)</td>
    </tr>


    <?php
      $result_per_page = 10;
      $ctr = 1;

      if(!isset($_GET['page'])){
        $page = 1;
      }
      else{
        $page = $_GET['page'];
      }

      $this_page_first_result = ($page-1)*$result_per_page;

        $statement = "SELECT * FROM receipt WHERE 1=1";

        /*if(isset($_POST['name']) && !empty($_POST['name']))
        {
          $name = $_POST['name'];
          $statement .= " AND full_name LIKE '%$name%'";
        }

         if(isset($_POST['phone']) && !empty($_POST['phone']))
        {
          $phone = $_POST['phone'];
          $statement .= " AND phone_no = '$phone'";
        }


        if(isset($_POST['address']) && !empty($_POST['address']))
        {
          $address = $_POST['address'];
          $statement .= " AND address LIKE '%$address%'";
        }

        if(isset($_POST['left_d']) && !empty($_POST['left_d']))
        {
          $left_d = $_POST['left_d'];
          $statement .= " AND left_d LIKE '$left_d'";
        }

        if(isset($_POST['right_d']) && !empty($_POST['right_d']))
        {
          $right_d = $_POST['right_d'];
          $statement .= " AND right_d LIKE '$right_d'";
        }

        if(isset($_POST['lense']) && !empty($_POST['lense']))
        {
          $lense = $_POST['lense'];
          $statement .= " AND lense LIKE '%$lense%'";
        }*/

        $sql_fetch = $statement . ' LIMIT ' . $this_page_first_result . ',' . $result_per_page;

      $sql_count = mysqli_query($con,$statement);

      $num_of_result = mysqli_num_rows($sql_count);

      $sql_fetch_all = mysqli_query($con,$sql_fetch);
      $num_of_pages = ceil($num_of_result/$result_per_page);

      while($exe_sql_fetch_all = mysqli_fetch_array($sql_fetch_all)){
    ?>

    <tr align="center">
      <td><?php echo $ctr; ?></td>
      <td contenteditable="false" id="receipt_id"><?php echo $exe_sql_fetch_all['receipt_id']; ?></td>
      <td contenteditable="false" id="receipt_date"><?php echo $exe_sql_fetch_all['receipt_date']; ?></td>
      <td contenteditable="false" id="receipt_total"><?php echo $exe_sql_fetch_all['receipt_total']; ?></td>

      <td><input type="image" src="../../img/view.png" onclick="location.href = 'view_receipt.php?id=<?php echo $exe_sql_fetch_all['receipt_id']; ?>';" width="30"/></td>
    </tr>

    <?php
      $ctr++;
    }

    ?>
  </table>
  <br>
  <input type="button" class="back-btn" name="back-button" value="Back" onclick="location.href='../'">
  <br><br><br>
  <!-- Page number button -->
  <table>
    <tr>
      <center>
        <?php

          for($page=1;$page<=$num_of_pages;$page++){
        ?>
          <input type="button" id="page-btn" value="<?php echo $page; ?>" onclick="loaddata('sales-list.php?page=<?php echo $page; ?>');"/>
        <?php
          }
        ?>
      </center>
    </tr>
  </table>
