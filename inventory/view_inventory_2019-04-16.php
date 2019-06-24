<?php 

session_start();
 
include '../include/connection.php';

$item_id = $_GET['id'];
$item_q = mysqli_query($con,"SELECT * FROM inventory WHERE prod_id = '$item_id'");
$item = mysqli_fetch_assoc($item_q);
$oth = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script type="text/javascript" src="../include/javascript/jquery-1.9.1.js"></script>
<link href="../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../main.js"></script>
<script src="inventory.js"></script>
<title>View Item</title>

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
    <input type="button" class="menu-button selected-button" value="Inventory" onclick="location.href='../inventory/'">
  <input type="button" class="menu-button" value="Supplier" onclick="location.href='../supplier/'"></div>

  <div class="clock">
    <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
  </div>

<div class="data-div">
  <div id="form-1">
        <div>
            
            Name: <input value="<?php echo $item["name"]; ?>" type="text" name="item_name" id="item_name" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled" />
            
            Brand:<input value="<?php echo $item["brand"]; ?>" type="text" name="item_brand" id="item_brand" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
                  
            Type: <select value="<?php echo $item["type"]; ?>" id="item_type" name="item_type" disabled="disabled">
                    <option value="LENSE">Lense</option>
                    <option value="SPECTACLE">Spectacle</option>
                    <option value="SUNGLASS">Sunglass</option>
                    <option value="CONTACT LENSE">Contact Lense</option>
                    <option value="OTHER" selected="selected">Other</option>
                  </select><br><br><!-- Consider make a expiry date input if user choose 'contact lense' -->

            <h3>Number of Item</h3>
            <!-- Need to find a way to check if it's single item or boxed item,
              and then display it according to the option choosed! -->
        <input type="checkbox" name="checkbox[]" value="singled" id="check_single" disabled="disabled" <?php if($item["quantity_type"] == 'SINGLED'){echo 'checked="checked"';} ?>/>Singled Item
        <input type="checkbox" name="checkbox[]" value="boxed" id="check_boxed"  disabled="disabled" <?php if($item["quantity_type"] == 'BOXED'){echo 'checked="checked"';} ?>/>Boxed Item<br>
            
            <div id="check_single_div">
              Quantity:<input value="<?php echo $item["quantity"]; ?>" type="number" name="item_quantity" id="item_quantity" disabled="disabled"/>
            </div>
            
            <div id="check_boxed_div">
              Number of Boxes:<input value="<?php echo $item["num_of_box"]; ?>" type="number" name="item_box_num" id="item_box_num" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"disabled="disabled"/>

            Number per Boxes:<input value="<?php echo $item["num_per_box"]; ?>" type="number" name="item_num_per_box" id="item_num_per_box" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"disabled="disabled"/>

            Total Quantity: <input value="<?php echo $item["quantity_box"]; ?>" type="number" name="item_quantity_box" id="item_quantity_box" disabled="disabled"/>
            </div>
            
        </div><br/><br/><br/>

        <div>
            Item-ID:<input value="<?php echo $item["item_id"]; ?>" type="text" name="item_id" id="item_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>

            Cost Price/Item:<input value="<?php echo $item["cost_price"]; ?>" type="number" name="item_cost_price" id="item_cost_price" disabled="disabled"/>

            Sell Price/Item:<input value="<?php echo $item["selling_price"]; ?>" type="number" name="item_sell_price" id="item_sell_price" disabled="disabled"/> 
            
            Colour 1:<input value="<?php echo $item["colour_1"]; ?>" type="text" name="item_colour_1" id="item_colour_1" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>

            Colour 2:<input value="<?php echo $item["colour_2"]; ?>" type="text" name="item_colour_2" id="item_colour_2" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>

            Colour 3:<input value="<?php echo $item["colour_3"]; ?>" type="text" name="item_colour_3" id="item_colour_3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
        </div><br/><br/>

        <div>
            Order ID:<input value="<?php echo $item["order_id"]; ?>" type="text" name="item_order_id" id="item_order_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>

            Degree:<input value="<?php echo $item["degree"]; ?>" type="text" name="item_degree" id="item_degree" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
        </div><br/><br/>

        <div>
            
        </div><br/><br/>

        <div>
            Supplier ID:<input value="<?php echo $item["supp_id"]; ?>" type="text" name="item_supp_id" id="item_supp_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>          
        </div><br/><br/>

        <div>
          Remarks:<input value="<?php echo $item["remarks"]; ?>" type="text" name="item_remarks" id="item_remarks" disabled="disabled"/><br/><br/> 
          <input type="button" name="back" id="back" value="Back" onclick="window.location.href='index.php'">
        </div>
    </div>  

</div>
</div>
</body>
<script>
  footnoteLoad();
</script>
</html>