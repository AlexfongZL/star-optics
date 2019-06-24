<?php
 session_start();
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
        font-size: 16px;
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
 <button onClick="location.href = 'add_new_item.html';" class="addButton button1" style="float: right;margin-right:0.5%;margin-bottom:-2.5%;margin-top:-3%;">Add New Item</button>
  
  <table id="table_main">
    
    <tr align="center">
      <td>No.</td>
      <td>Product ID</td>
      <td>Brand</td>
      <td>Name</td>
      <td>Quantity</td>
      <td>Type</td>
      <td>Selling Price (RM)</td>
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

        $statement = "SELECT * FROM inventory WHERE 1=1";

        if(isset($_POST['id']) && !empty($_POST['id']))
        {
          $id = $_POST['id'];
          $statement .= " AND prod_id LIKE '%$id%'";
        }

        if(isset($_POST['name']) && !empty($_POST['name']))
        {
          $name = $_POST['name'];
          $statement .= " AND name LIKE '%$name%'";
        }

         if(isset($_POST['brand']) && !empty($_POST['brand']))
        {
          $brand = $_POST['brand'];
          $statement .= " AND brand LIKE '%$brand%'";
        }

        if($_POST['type'] !== 'ALL')
        {
          $type = $_POST['type'];
          $statement .= " AND type LIKE '%$type%'";
        }

        $sql_fetch = $statement . ' LIMIT ' . $this_page_first_result . ',' . $result_per_page;

      $sql_count = mysqli_query($con,$statement);
      //SELECT * FROM customer_details WHERE 1=1 AND name LIKE '%NUR%'
      $num_of_result = mysqli_num_rows($sql_count);

      $sql_fetch_all = mysqli_query($con,$sql_fetch);
      $num_of_pages = ceil($num_of_result/$result_per_page);

      while($exe_sql_fetch_all = mysqli_fetch_array($sql_fetch_all)){
    ?>

    <tr align="center">
      <td><?php echo $ctr; ?></td>
      <!--<td><?php //echo $exe_sql_fetch_all['uniq_id']; ?></td>-->
      <td align="left" contenteditable="false" id="id"><?php echo $exe_sql_fetch_all['prod_id']; ?></td>
      <td contenteditable="false" id="brand"><?php echo $exe_sql_fetch_all['brand']; ?></td>
      <td align="left" contenteditable="false" id="name"><?php echo $exe_sql_fetch_all['name']; ?></td>
      <td contenteditable="false" id="name"><?php if($exe_sql_fetch_all['quantity_type'] === 'SINGLED'){
        echo $exe_sql_fetch_all['quantity'];
      }else{
        echo $exe_sql_fetch_all['quantity_box'];
      }?></td>
      <td contenteditable="false" id="type"><?php echo $exe_sql_fetch_all['type']; ?></td>
      <td contenteditable="false" id="selling_price"><?php echo $exe_sql_fetch_all['selling_price']; ?></td>

      <!--<td><?php //echo $exe_sql_fetch_all['remarks']; ?></td>-->
      <td><input type="image" src="../img/view.png" onclick="location.href = 'view_inventory.php?id=<?php echo $exe_sql_fetch_all['prod_id']; ?>';" width="30"/>
      <input type="image" src="../img/edit.png" onclick="location.href = 'edit_inventory.php?id=<?php echo $exe_sql_fetch_all['prod_id']; ?>';" width="30" id="edit_button"/>
      <input type="image" src="../img/delete.png" onclick="deleteConfirmation('<?php echo $exe_sql_fetch_all['prod_id']; ?>');" width="30"/></td>
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
        echo "Page:";
        for($page=1;$page<=$num_of_pages;$page++){
?>
          <input type="button" value="<?php echo $page; ?>" id="page-btn" onclick="loaddata('inventory_list.php?page=<?php echo $page; ?>')" />
<?php
  }

    ?>
  </center>
  </tr>
  </table>

</body>


</html>
