<?php 

session_start();
 
include '../include/connection.php';

$sung_id = $_POST['id'];
$sung_q = mysqli_query($con,"SELECT * FROM sunglass WHERE id = '$sung_id'");
$sung = mysqli_fetch_assoc($sung_q); 

?>

<title>Edit Sunglass</title>

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

<body bgcolor="#EBF3FE">

	<form action="action.php" method="POST">
	<input name="id" id="id" type="hidden" value="<?php echo $sung_id; ?>">
    <table width="95%" border="0" cellspacing="0" cellpadding="4" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;background-color:#FFF;padding-top:10px;padding-left:15px;padding-bottom:15px;" align="center">
   <h2>Edit sunglass: <?php echo $sung['name']; ?></h2>
  
   <tr height="30">
    <td>Brand</td>
    <td><input type="text" name="sung_brand" id="sung_brand" size="40" value="<?php echo $sung['brand'];?>" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
	</td>
  </tr>

  <tr height="30">
    <td>Name</td>
    <td><input type="text" name="sung_name" id="sung_name" size="40" value="<?php echo $sung['name'];?>" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
	</td>
  </tr>

  <tr height="30">
    <td>Colour</td>
    <td><input type="text" name="sung_colour" id="sung_colour" size="40" value="<?php echo $sung['colour'];?>" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
  </td>
  </tr>

  <tr height="30">
    <td>Quantity</td>
    <td>
    <input type="number" name="sung_quantity" id="sung_quantity" rows="3" cols="50" value="<?php echo $sung['quantity'];?>"></td>
  </tr>
  
  <tr height="30">
    <td>Sunglass-ID</td>
    <td>
	<input type="text" name="sung_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" value="<?php echo $sung['sunglass_id'];?>" id="sung_id" autocomplete="off"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>

 <tr height="30">
    <td>Whole Sale Price/Item (RM)</td>
    <td>
	<input type="number" name="sung_whole_price" value="<?php echo $sung['whole_sale_price_per_item'];?>" id="sung_whole_price" autocomplete="off" />
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>

 <tr height="30">
    <td>Retail Price/Item (RM)</td>
    <td>
	<input type="number" name="sung_retail_price" value="<?php echo $sung['retail_price_per_item'];?>" id="sung_retail_price" autocomplete="off" />
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>

  <tr height="30">
    <td>Remarks</td>
    <td>
	<textarea type="text" name="sung_remarks" id="sung_remarks"><?php echo $sung['remarks'];?></textarea> 
	&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
 </tr>

 </table><br/>

 <table>
      <tr>
		<td>
			<input type="button" class="back-btn" value="Back" width="93" height="25" onclick="window.location.href='../stock/'"/>
      &nbsp;
      <input type="submit" name="sung_edit_submit" id="sung_edit_submit" class="submit-btn" width="93" height="25" value="Submit"/>
</td>
      </tr>
    </table>
</form>

</body>
</html>