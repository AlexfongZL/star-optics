<!DOCTYPE html>
<html>
<head>
<link href="../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../main.js"></script>
</head>

<body>
<span style="text-align: left"></span><span style="text-align: center"></span><span style="text-align: left"></span><span style="text-align: center"></span><span style="color: #0E008F"></span><span style="color: #85600A"></span><span style="color: #BA5300"></span>

<div class="main-div">

  <div class="menu-div" id="menu-div">
    <input type="button" class="menu-button" value="Home" onclick="location.href='../home.html'">
    <input type="button" class="menu-button" value="Sales" onclick="location.href='../sales/'">
    <input type="button" class="menu-button" value="Customer" onclick="location.href='../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../inventory/'">
    <input type="button" class="menu-button selected-button" value="Supplier" onclick="location.href='../supplier/'"></div>

<div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

<div class="data-div">
  <h3>Add New Supplier</h3>
  <fieldset><legend><b>Supplier Details</b></legend>
      <form action="action.php" method="post">
      <table>
       
        <tr height="30">
          <td>Supplier Name:</td>
          <td><input type="text" size="47" name="supp_name" id="supp_name" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" required/></td>
        </tr>

        <tr height="50">
          <td>Supplier Address:</td>
          <td><textarea type="text" style="width: 300px; height: 60px;" size="47" rows="3" cols="50" name="supp_addr" id="supp_addr" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off"/></textarea></td>
        </tr>

        <tr>
          <td>Supplier contact number 1:</td>
          <td><input type="text" size="47" name="supp_phone_1" id="supp_phone_1" autocomplete="off"/></td>
        </tr>

        <tr>
          <td>Supplier contact number 2:</td>
          <td><input type="text" size="47" name="supp_phone_2" id="supp_phone_2" autocomplete="off"/></td>
        </tr>  
        
        <tr>
          <td>Remarks:</td>
          <td><textarea type="text" style="width: 300px; height: 85px;" size="47" name="supp_remarks" id="supp_remarks" autocomplete="off"/></textarea></td>
        </tr>

        <tr>
          <td><input type="button" class="back-btn" value="Back" width="93" height="25" onclick="window.location.href='index.php'"/></td>

          <td><input type="submit" class="submit-btn" name="add_supplier_submit" value="Add Supplier"></td>
        </tr>
      </table>
    </form>
  </fieldset>
   
</div>

</body>
</html>
