<?php     
    include '../../include/connection.php';

    $receipt_id = $_GET['id'];

    $purchase_q = mysqli_query($con,"SELECT * FROM purchase WHERE receipt_id = '$receipt_id' ORDER BY prod_id");
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>View Receipt</title>
<link href="../../main.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="../../main.js"></script>
</head>

</head>

<body>
<div class="main-div">
	<div class="menu-div" id="menu-div">
    <input type="button" class="menu-button" value="Home" onclick="location.href='../../home.html'">
    <input type="button" class="menu-button selected-button" value="Sales" onclick="location.href='../../sales/'">
    <input type="button" class="menu-button" value="Customer" onclick="location.href='../../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../../inventory/'">
    <input type="button" class="menu-button" value="Supplier" onclick="location.href='../../supplier/'">
  </div>

  <div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

<div class="data-div">

   <h2>View Purchase ID: <?php echo $receipt_id; ?></h2>
   <input type="image" src="../../img/print.png" onclick="location.href = 'print_receipt.php?id=<?php echo $receipt_id; ?>';" width="30"/>

<table id="table_main">
    <tr align="center">
      <td>No.</td>
      <td>Customer ID</td>
      <td>Product ID</td>
      <td>Product Quantity</td>
      <td>Product Discount</td>
    </tr>

    <?php
      $counter = 1;
      while($purchase = mysqli_fetch_array($purchase_q)){
    ?>
      <tr align="center">
        <td contenteditable="false" id="prod_id"><?php echo $counter; ?></td>
        <td contenteditable="false" id="prod_id"><?php echo $purchase['cus_id']; ?></td>
        <td contenteditable="false" id="prod_id"><?php echo $purchase['prod_id']; ?></td>
        <td contenteditable="false" id="prod_quantity"><?php echo $purchase['prod_quantity']; ?></td>
        <td contenteditable="false" id="prod_discount"><?php echo $purchase['prod_discount']; ?>%</td>
      </tr>
    <?php
    $counter++;
    }
    ?>
</table>
<br><br>
  <input type="button" class="back-btn" name="back-button" value="Back" onclick="location.href='sales-records.html'">
  </div>
</div>
</body>
<script type="text/javascript">
    footnoteLoad();
</script>
</html>

