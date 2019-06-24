<?php 

session_start();
 
include '../include/connection.php';

$cust_id = $_GET['id'];
$customer_q = mysqli_query($con,"SELECT * FROM customer_details WHERE cus_id = '$cust_id'");
$customer = mysqli_fetch_assoc($customer_q); 
$oth = 1;
?>
<head>
<link href="../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../main.js"></script>
<script type="text/javascript" src="../include/javascript/jquery-1.9.1.js"></script>
<script src="customer.js"></script>
<title>Edit Customer</title>

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
    <input type="button" class="menu-button selected-button" value="Customer" onclick="location.href='../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../inventory/'">
  <input type="button" class="menu-button" value="Supplier" onclick="location.href='../supplier/'"></div>

    <div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

<div class="data-div">
	<form action="action.php" method="POST">
	<input name="cus_id" id="cus_id" type="hidden" value="<?php echo $customer['cus_id']; ?>">
    <table width="95%" border="0" cellspacing="0" cellpadding="4" style="font-family:Arial, Helvetica, sans-serif; font-size:18px;background-color:#FFF;padding-top:10px;padding-left:15px;padding-bottom:15px;" align="center">
   <h2>Edit customer: <?php echo $customer['full_name']; ?></h2>
  
  <tr height="30">
    <td>Full Name:</td>
    <td><input class="input" type="text" name="full_name" id="full_name" size="40" value="<?php echo $customer['full_name'];?>" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
	</td>
  </tr>

  <tr height="30">
    <td>Address:</td>
    <td><textarea class="input" name="address" id="address" rows="3" cols="50" style="resize:none;" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"><?php echo $customer['address'];?></textarea></td>
  </tr>
  
  <tr height="30">
    <td>Contact No.: </td>
    <td>
	<input class="input" type="text" name="phone_no" value="<?php echo $customer['phone_no'];?>" id="phone_no" class="tel" autocomplete="off"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>
</table>

<table id="table_add_new_customer">

    <tr align="center">
      <td><b>Right Vision</b></td>
      <td>Sph</td>
      <td>Cyl</td>
      <td>Axis</td>
      <td>Vision</td>
    </tr>

    <tr>
      <td>Distance</td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_sph" id="right_d_sph" value="<?php echo $customer['right_d_sph'];?>"/></td>

      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_cyl" id="right_d_cyl" value="<?php echo $customer['right_d_cyl'];?>"/></td>

      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_axis" id="right_d_axis" value="<?php echo $customer['right_d_axis'];?>"/></td>

      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_vision" id="right_d_vision" value="<?php echo $customer['right_d_vision'];?>"/></td>
    </tr>

    <tr>
      <td>Reading</td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_sph" id="right_r_sph" value="<?php echo $customer['right_r_sph'];?>"/></td>

      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_cyl" id="right_r_cyl" value="<?php echo $customer['right_r_cyl'];?>"/></td>

      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_axis" id="right_r_axis" value="<?php echo $customer['right_r_axis'];?>"/></td>

      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_vision" id="right_r_vision" value="<?php echo $customer['right_r_vision'];?>"/></td>
    </tr>
</table>

<table id="table_add_new_customer">
    <tr align="center">
      <td><b>Left Vision</b></td>
      <td>Sph</td>
      <td>Cyl</td>
      <td>Axis</td>
      <td>Vision</td>
    </tr>

    <tr>
      <td>Distance</td>
       <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_sph" id="left_d_sph" value="<?php echo $customer['left_d_sph'];?>"/></td>
      
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_cyl" id="left_d_cyl" value="<?php echo $customer['left_d_cyl'];?>"/></td>
      
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_axis" id="left_d_axis" value="<?php echo $customer['left_d_axis'];?>"/></td>
      
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_vision" id="left_d_vision" value="<?php echo $customer['left_d_vision'];?>"/></td>
    </tr>
	&nbsp;
	&nbsp;
    <tr>
      <td>Reading</td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_sph" id="left_r_sph" value="<?php echo $customer['left_r_sph'];?>"/></td>
      
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_cyl" id="left_r_cyl" value="<?php echo $customer['left_r_cyl'];?>"/></td>
      
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_axis" id="left_r_axis" value="<?php echo $customer['left_r_axis'];?>"/></td>
      
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_vision" id="left_r_vision" value="<?php echo $customer['left_r_vision'];?>"/></td>
    </tr>
</table>

&nbsp;
  &nbsp;

<table id="table_add_new_customer">
              <tr align="center">
                <td><b>Decenter</b></td>
                <td></td>
                
                <td><b>Segment Height</b></td>
                <td></td>
                
                <td><b>Base</b></td>
                <td></td>
              
              </tr>
              <tr>
                <td>In</td>
                <td>Out</td>
                
                <td>RV</td>
                <td>LV</td>
                
                <td>RV</td>
                <td>LV</td>
              
              </tr>

              <tr>
                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_in" id="decenter_in" autocomplete="off" value="<?php echo $customer['decenter_in']; ?>"/></td>

                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_out" id="decenter_out" autocomplete="off" value="<?php echo $customer['decenter_out']; ?>"/></td>
                
                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_rv" id="seg_height_rv" autocomplete="off" value="<?php echo $customer['seg_height_rv']; ?>"/></td>

                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_lv" id="seg_height_lv" autocomplete="off" value="<?php echo $customer['seg_height_lv']; ?>"/></td>
                
                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_rv" id="base_rv" autocomplete="off" value="<?php echo $customer['base_rv']; ?>"/></td>

                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_lv" id="base_lv" autocomplete="off" value="<?php echo $customer['base_lv']; ?>"/></td>
              
              </tr>
          </table>

<table width="95%" border="0" cellspacing="0" cellpadding="4" style="font-family:Arial, Helvetica, sans-serif; font-size:18px;background-color:#FFF;padding-top:10px;padding-left:15px;padding-bottom:15px;" align="center">
 <tr height="30">
    <td>Lense:</td>
    <td>
	<input class="input" type="text" name="lense" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" value="<?php echo $customer['lense'];?>" id="lense" autocomplete="off" />
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>

   <tr>
    <td>Frame:</td>
    <td><input type="text" size="47" name="frame" id="frame" value="<?php echo $customer['frame'];?>" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/></td>
  </tr>

    <!--<tr>
        <td>Segment Diameter:</td>
        <td><input type="text" size="47" name="segment_diameter" id="segment_diameter" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/></td>
      </tr>

      <tr>
        <td>Size:</td>
        <td><input type="text" size="47" name="size" id="size" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/></td>
      </tr>
&nbsp;
      <tr>
        <td>Bridge:</td>
        <td><input type="text" size="47" name="bridge" id="Bridge" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/></td>
      </tr>-->

  <tr height="30">
    <td>Remarks:</td>
    <td>
	<input class="input" type="text" name="remarks" value="<?php echo $customer['remarks'];?>" id="remarks" autocomplete="off" />
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>

 </table><br/>
 <table width="95%" border="0" cellspacing="0" cellpadding="4" align="center">
      <tr>
		<td align="right">
			<input type="button" class="back-btn" value="Back" width="93" height="25" onclick="window.location.href='index.php'"/>
            &nbsp;
            <input type="submit" name="submit_edit_cus" class="submit-btn" width="93" height="25" value="Save"/>
		</td>
      </tr>
    </table>
</form>
</div>
</div>
</body>
<script type="text/javascript">
    footnoteLoad();
</script>
</html>