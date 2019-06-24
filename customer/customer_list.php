<?php
 //session_start();
  include '../include/connection.php';
?> 
  
  <style type="text/css">
    .addButton {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
      }

      .button1 {
        border: 2px solid #008CBA;
        background-color: #008CBA;
        color: white;
      }

      .button1:hover {
        background-color: white; 
        color: black; 
      }
  </style>
  <button onclick="location.href = 'add_new_customer.html';" class="addButton button1" style="float: right;margin-right:0.5%;margin-bottom:0.5%;margin-top:-3.5%;">
    Add New Customer
  </button>
  
  <table id="table_main">
    
    <tr align="center">
      <td>No.</td>
      <td>Name</td>
      <td>Phone No.</td>
      <td>Address</td>
      <td>Lense</td>
      <td>Actions</td>
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

        $statement = "SELECT * FROM customer_details WHERE 1=1";

        if(isset($_POST['name']) && !empty($_POST['name']))
        {
          $name = $_POST['name'];
          $statement .= " AND full_name LIKE '%$name%'";
        }

         if(isset($_POST['phone']) && !empty($_POST['phone']))
        {
          $phone = $_POST['phone'];
          $statement .= " AND phone_no LIKE '%$phone%'";
        }

        if(isset($_POST['address']) && !empty($_POST['address']))
        {
          $address = $_POST['address'];
          $statement .= " AND address LIKE '%$address%'";
        }

        if(isset($_POST['lense']) && !empty($_POST['lense']))
        {
          $lense = $_POST['lense'];
          $statement .= " AND lense LIKE '%$lense%'";
        }

        $sql_fetch = $statement . ' LIMIT ' . $this_page_first_result . ',' . $result_per_page;

      $sql_count = mysqli_query($con,$statement);

      $num_of_result = mysqli_num_rows($sql_count);

      $sql_fetch_all = mysqli_query($con,$sql_fetch);
      $num_of_pages = ceil($num_of_result/$result_per_page);

      while($exe_sql_fetch_all = mysqli_fetch_array($sql_fetch_all)){
    ?>

    <tr align="center">
      <td><?php echo $ctr; ?></td>
      <td align="left" contenteditable="false" id="name"><?php echo $exe_sql_fetch_all['full_name']; ?></td>
      <td contenteditable="false" id="phone"><?php echo $exe_sql_fetch_all['phone_no']; ?></td>
      <td align="left" contenteditable="false" id="address"><?php echo $exe_sql_fetch_all['address']; ?></td>
      <td align="left" ><?php echo $exe_sql_fetch_all['lense']; ?></td>

      <td><input type="image" src="../img/view.png" onclick="location.href = 'view_customer.php?id=<?php echo $exe_sql_fetch_all['cus_id']; ?>';" width="30"/>
      <input type="image" src="../img/edit.png" onclick="location.href = 'edit_customer.php?id=<?php echo $exe_sql_fetch_all['cus_id']; ?>';" width="30" id="edit_button"/>
      <input type="image" src="../img/delete.png" onclick="deleteConfirmation('<?php echo $exe_sql_fetch_all['cus_id']; ?>');" width="30"/></td>
    </tr>

    <?php
      $ctr++;
    }

    ?>
  </table>
  &nbsp;

  <!-- Page number button -->
  <table>
    <tr>
      <center>
        <?php
          echo "Page:";
          for($page=1;$page<=$num_of_pages;$page++){
        ?>
          <input type="button" value="<?php echo $page; ?>" id="page-btn" onclick="loaddata('customer_list.php?page=<?php echo $page; ?>');"/>
        <?php
          }
        ?>
      </center>
    </tr>
  </table>
