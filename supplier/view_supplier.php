<?php
  session_start();

  include '../include/connection.php';

  $supp_id = $_GET['id'];
  $supp_q = mysqli_query($con,"SELECT * FROM supplier WHERE supp_id = '$supp_id'");
  $supp = mysqli_fetch_assoc($supp_q);
  $oth = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../main.js"></script>
<script type="text/javascript" src="../include/javascript/jquery-1.9.1.js"></script>
<script src="supplier.js"></script>
<title>View Supplier</title>

<style>
#c {
    margin-left: 10%;
    margin-top: 20%;
    margin-right: 10%;
}

#table tr td {
	padding-right:10px;
}
</style>
</head>

<body>

<div class="main-div">
	<div class="menu-div" id="menu-div">
    <input type="button" class="menu-button" value="Home" onclick="location.href='../home.html'">
    <input type="button" class="menu-button" value="Sales" onclick="location.href='../sales/'">
    <input type="button" class="menu-button" value="Customer" onclick="location.href='../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../inventory/'">
    <input type="button" class="menu-button selected-button" value="Supplier" onclick="location.href='../supplier/'">
  </div>

  <div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

<div class="data-div">
  <h3>View Supplier</h3>
  <fieldset><legend><b>Supplier Details</b></legend>
     <form action="action.php" method="post">
      <table>
        <tr height="30">
          <td>Supplier Name:</td>
          <td><input type="text" size="47" name="supp_name" id="supp_name" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" disabled="disabled" value="<?php echo $supp['name']; ?>"/></td>
        </tr>


        <tr height="50">
          <td>Supplier Address:</td>
          <td><textarea type="text" style="width: 300px; height: 60px;" size="47" rows="3" cols="50" name="supp_addr" id="supp_addr" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/><?php echo $supp['address']; ?></textarea></td>
        </tr>

        <tr>
          <td>Supplier contact number 1:</td>
          <td><input type="text" size="47" name="supp_phone_1" id="supp_phone_1" disabled="disabled" value="<?php echo $supp['contact_no']; ?>"/></td>
        </tr>

        <tr>
          <td>Supplier contact number 2:</td>
          <td><input type="text" size="47" name="supp_phone_2" id="supp_phone_2" disabled="disabled" value="<?php echo $supp['contact_no_2']; ?>"/></td>
        </tr>  
        
        <tr>
          <td>Remarks:</td>
          <td><textarea type="text" style="width: 300px; height: 85px;" size="47" rows="3" cols="50" name="supp_remarks" id="supp_remarks" disabled="disabled"/><?php echo $supp['remarks']; ?></textarea></td>
        </tr>

        <tr>
          
          <td><input type="button" class="back-btn" value="Back" width="93" height="25" onclick="window.location.href='index.php'"/></td>

          <td><input type="button" class="save-btn" value="Edit" width="93" height="25" onclick="window.location.href='edit_supplier.php?id=<?php echo $supp['supp_id']; ?>'"/></td>
        </tr>
      </table>
    </form>
  </fieldset>
</div>
</div>
</body>
</html>