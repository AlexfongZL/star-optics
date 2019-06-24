<?php     
    include '../include/connection.php';

    $cust_id = $_GET['id'];
    $customer_q = mysqli_query($con,"SELECT * FROM customer_details WHERE cus_id = '$cust_id'");
    $customer = mysqli_fetch_assoc($customer_q); 
    $oth = 1;
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>View Customer</title>
<link href="../main.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="../main.js"></script>
<script type="text/javascript" src="../include/javascript/jquery-1.9.1.js"></script>
<script src="customer.js"></script>
</head>

</head>

<body>
<div class="main-div">
	<div class="menu-div" id="menu-div">
    <input type="button" class="menu-button" value="Home" onclick="location.href='../home.html'">
    <input type="button" class="menu-button" value="Sales" onclick="location.href='../sales/'">
    <input type="button" class="menu-button selected-button" value="Customer" onclick="location.href='../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../inventory/'">
    <input type="button" class="menu-button" value="Supplier" onclick="location.href='../supplier/'">
  </div>

  <div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

<div class="data-div">

<table>
   <h2>View customer: <?php echo $customer['full_name']; ?></h2>
  
  <tr height="30">
    <td>Full Name:</td>
    <td><input class="input" type="text" name="name" id="name" size="47" value="<?php echo $customer['full_name'];?>" autocomplete="off" readonly/>
  </td>
  </tr>

  <tr height="30">
    <td>Address:</td>
    <td><textarea class="input" name="address" id="address" rows="3" cols="50" style="resize:none;" readonly><?php echo $customer['address'];?></textarea></td>
  </tr>
  
  <tr height="30">
    <td>Contact No.: </td>
    <td>
  <input class="input" size="47" type="text" name="contact_no" value="<?php echo $customer['phone_no'];?>" id="contact_no" readonly/>
  </td>
 </tr>
</table>

<table>

    <tr align="center">
      <td><b>Right Vision</b></td>
      <td>Sph</td>
      <td>Cyl</td>
      <td>Axis</td>
      <td>Vision</td>
    </tr>

    <tr>
      <td>Distance</td>
      <td><?php if($customer['right_d_sph'] == ''){ echo '-';} else{echo $customer['right_d_sph'];} ?></td>
      <td><?php echo $customer['right_d_cyl']; ?></td>
      <td><?php echo $customer['right_d_axis']; ?></td>
      <td><?php echo $customer['right_d_vision']; ?></td>
    </tr>

    <tr>
      <td>Reading</td>
      <td><?php echo $customer['right_r_sph']; ?></td>
      <td><?php echo $customer['right_r_cyl']; ?></td>
      <td><?php echo $customer['right_r_axis']; ?></td>
      <td><?php echo $customer['right_r_vision']; ?></td>
    </tr>
</table>

 <table>
    <tr align="center">
      <td><b>Left Vision</b></td>
      <td>Sph</td>
      <td>Cyl</td>
      <td>Axis</td>
      <td>Vision</td>
    </tr>

    <tr>
      <td>Distance</td>
      <td><?php echo $customer['left_d_sph']; ?></td>
      <td><?php echo $customer['left_d_cyl']; ?></td>
      <td><?php echo $customer['left_d_axis']; ?></td>
      <td><?php echo $customer['left_d_vision']; ?></td>
    </tr>
  &nbsp;
  &nbsp;
    <tr>
      <td>Reading</td>
      <td><?php echo $customer['left_r_sph']; ?></td>
      <td><?php echo $customer['left_r_cyl']; ?></td>
      <td><?php echo $customer['left_r_axis']; ?></td>
      <td><?php echo $customer['left_r_vision']; ?></td>
    </tr>
</table>

&nbsp;
  &nbsp;

        <table>
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
                <td><?php echo $customer['decenter_in']; ?></td>
                <td><?php echo $customer['decenter_out']; ?></td>
                
                <td><?php echo $customer['seg_height_rv']; ?></td>
                <td><?php echo $customer['seg_height_lv']; ?></td>
                
                <td><?php echo $customer['base_rv']; ?></td>
                <td><?php echo $customer['base_lv']; ?></td>
              
              </tr>
          </table>

<table>
 <tr height="30">
    <td>Lense:</td>
    <td>
    <input class="input" size="47" type="text" name="lense" value="<?php echo $customer['lense'];?>" id="lense" autocomplete="off" readonly/>
  </td>
 </tr>

 <tr height="30">
    <td>Frame:</td>
    <td>
    <input class="input" size="47" type="text" name="frame" value="<?php echo $customer['frame'];?>" id="frame" autocomplete="off" readonly/>
  </td>
 </tr>


  <tr height="30">
    <td>Remarks:</td>
    <td>
    <textarea class="input" name="remarks" id="remarks" rows="3" cols="50" readonly><?php echo $customer['remarks'];?></textarea>
  </td>
 </tr>

 </table><br/>
 <table width="20%" border="0" cellspacing="0" cellpadding="4" align="center">
      <tr>
    <td >
      <input type="button" class="back-btn" value="Back" width="93" height="25" onclick="window.location.href='index.php'"/>
    </td>
    <td align="center">
      <input type="button" class="edit-btn" value="Edit" width="93" height="25" onclick="window.location.href='edit_customer.php?id=<?php echo $customer['cus_id']; ?>'"/>
    </td>
      </tr>
    </table>
  </div>
</div>
</body>
<script type="text/javascript">
    footnoteLoad();
</script>
</html>

