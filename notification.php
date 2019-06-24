<?php
 //session_start();
  include 'include/connection.php';
?>  
<style type="text/css">
  .notification-table{
    border: none;
  }

  th{
    padding: 8px;
    border-bottom: 1px solid #003366;
  }
  tr:nth-child(even) {background-color:#FFE4E1;}
</style>

  <h4>Item low in stock</h4>
  <table class="notification-table" style="border-collapse: collapse;width:80%;background-color: #FFB6C1;">
    
    <tr align="center" style="background-color:#D8BFD8;">
      <td>Brand</td>
      <td>Name</td>
      <td>Current Quantity</td>
      <td>Minimum Quantity</td>
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

        $statement = "SELECT * FROM inventory WHERE quantity <= min_quantity";

        $sql_fetch = $statement . ' LIMIT ' . $this_page_first_result . ',' . $result_per_page;

      $sql_count = mysqli_query($con,$statement);

      $num_of_result = mysqli_num_rows($sql_count);

      $sql_fetch_all = mysqli_query($con,$sql_fetch);
      $num_of_pages = ceil($num_of_result/$result_per_page);

      while($exe_sql_fetch_all = mysqli_fetch_array($sql_fetch_all)){
    ?>

    <tr align="center">
      <td contenteditable="false" id="name"><?php echo $exe_sql_fetch_all['brand']; ?></td>
      <td contenteditable="false" id="phone"><?php echo $exe_sql_fetch_all['name']; ?></td>
      <td contenteditable="false" id="address"><?php echo $exe_sql_fetch_all['quantity']; ?></td>
      <td contenteditable="false" id="address"><?php echo $exe_sql_fetch_all['min_quantity']; ?></td>
    </tr>

    <?php
      $ctr++;
    }

    ?>
  </table>
  &nbsp;

  <table>
    <tr>
      <center>
        <?php

          for($page=1;$page<=$num_of_pages;$page++){
        ?>
          Page: <input type="button" id="page-btn" value="<?php echo $page; ?>" onclick="loaddata('notification.php?page=<?php echo $page; ?>');"/>
        <?php
          }
        ?>
      </center>
    </tr>
  </table>
