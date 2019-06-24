<?php 

session_start();
 
include '../include/connection.php';

$item_id = $_GET['id'];
$item_q = mysqli_query($con,"SELECT * FROM inventory WHERE prod_id = '$item_id'");
$item = mysqli_fetch_assoc($item_q);
$oth = 1;
?>

<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="../include/javascript/jquery-1.9.1.js"></script>
<link href="../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../main.js"></script>
<script src="inventory.js"></script>
<title>Edit Item</title>
</head>

<style type="text/css">

.next-btn{
    display: inline-block;
      padding: 10px 20px;
      font-size: 20px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #4CAF50;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
}
.next-btn:hover {background-color: #3e8e41}

.next-btn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

/* ---------------------------- */

* {
  box-sizing: border-box;
}

.data-div {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 10px;
}

</style>
<body>
  <!-- This is where I left. I want to redesign this page with nice shit-->
<div class="main-div">

   <div class="menu-div" id="menu-div">
    <input type="button" class="menu-button" value="Home" onclick="location.href='../home.html'">
    <input type="button" class="menu-button" value="Sales" onclick="location.href='../sales/'">
    <input type="button" class="menu-button" value="Customer" onclick="location.href='../customer/'">
    <input type="button" class="menu-button selected-button" value="Inventory" onclick="location.href='../inventory/'">
    <input type="button" class="menu-button" value="Supplier" onclick="location.href='../supplier/'">
  </div>

  <div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

    <div class="data-div">
      
        <div class="column" style="border-right: 5px solid red;">
          <h3>Edit item information below</h3>
            <form action="action.php" method="post">

              <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $item["prod_id"]; ?>" />

              Name: <input value="<?php echo $item["name"]; ?>" type="text" name="item_name" id="item_name" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
                <br/><br/>
              
              Brand:<input value="<?php echo $item["brand"]; ?>" type="text" name="item_brand" id="item_brand" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
                <br/><br/>
              
              Type: <select id="item_type" name="item_type">
                      <option <?php if($item["brand"]=="LENSE"){echo 'selected="selected"';} ?> value="LENSE">Lense</option>
                      <option <?php if($item["brand"]=="SPECTACLE"){echo 'selected="selected"';} ?> value="SPECTACLE">Spectacle</option>
                      <option  <?php if($item["brand"]=="SUNGLASS"){echo 'selected="selected"';} ?>value="SUNGLASS">Sunglass</option>
                      <option  <?php if($item["brand"]=="CONTACT LENSE"){echo 'selected="selected"';} ?>value="CONTACT LENSE">Contact Lense</option>
                      <option  <?php if($item["brand"]=="OTHER"){echo 'selected="selected"';} ?>value="OTHER">Other</option>
                    </select><br><br><!-- Consider make a expiry date input if user choose 'contact lense' -->
                <br/>
              
              <h3>Number of Item</h3>
              <input type="checkbox" name="checkbox[]" value="singled" id="check_single" <?php if($item["quantity_type"] == 'SINGLED'){echo 'checked="checked"';} ?> />Singled Item
              
              <input type="checkbox" name="checkbox[]" value="boxed" id="check_boxed" <?php if($item["quantity_type"] == 'BOXED'){echo 'checked="checked"';} ?>/>Boxed Item<br>
                <br/>
              <div id="check_single_div">
                
                Quantity:<input value="<?php echo $item["quantity"]; ?>" type="number" name="item_quantity" id="item_quantity" required/>
              </div>
              
              <div id="check_boxed_div">
                Number of Boxes:<input value="<?php echo $item["num_of_box"]; ?>" type="number" name="item_box_num" id="item_box_num" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"required/><br><br>

                Number per Boxes:<input value="<?php echo $item["num_per_box"]; ?>" type="number" name="item_num_per_box" id="item_num_per_box" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"required/><br><br>

                Total Quantity: <input value="<?php echo $item["quantity_box"]; ?>" type="number" name="item_quantity_box" id="item_quantity_box" /><br><br>
              </div>

              <div>
                Minimum Quantity:<input value="<?php echo $item["min_quantity"]; ?>" type="number" name="min_quantity" id="min_quantity" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"required/><br><br>
              </div>
                <br/>

              <h3>Item Details</h3>
              Item-ID:<input value="<?php echo $item["item_id"]; ?>" type="text" name="item_id" id="item_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/>
                <br/><br/>
              
              Cost Price/Item:<input value="<?php echo $item["cost_price"]; ?>" type="number" name="item_cost_price" id="item_cost_price"/>
                <br/><br/>
              
              Sell Price/Item:<input value="<?php echo $item["selling_price"]; ?>" type="number" name="item_sell_price" id="item_sell_price"/>
        </div>

        <div class="column" style="margin-top:5%;">
            
            Colour 1:<input value="<?php echo $item["colour_1"]; ?>" type="text" name="item_colour_1" id="item_colour_1" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" />
              <br/><br/>
            
            Colour 2:<input value="<?php echo $item["colour_2"]; ?>" type="text" name="item_colour_2" id="item_colour_2" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" />
              <br/><br/>
            
            Colour 3:<input value="<?php echo $item["colour_3"]; ?>" type="text" name="item_colour_3" id="item_colour_3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" />
              <br/><br/>
            
            Order ID:<input value="<?php echo $item["order_id"]; ?>" type="text" name="item_order_id" id="item_order_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" />
              <br/><br/>
            
            Degree:<input value="<?php echo $item["degree"]; ?>" type="text" name="item_degree" id="item_degree" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" />
              <br/><br/>
            
            Supplier ID:<input value="<?php echo $item["supp_id"]; ?>" type="text" name="item_supp_id" id="item_supp_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/>
              <br/><br/>
            
            Remarks:<input value="<?php echo $item["remarks"]; ?>" type="text" name="item_remarks" id="item_remarks"/><br/><br/>
            <input type="button" class="next-btn" name="next" id="next" value="Next">
  
        </div>
    </div>

    

    

    <div id="form-2">
      FORM-2
      <!-- show the barcode image based on the id and shit -->
      

      <input type="button" name="back" id="back" value="Back" onclick="window.location.href='index.php'">
      <input type="submit" name="edit_item_submit" id="edit_item_submit" value="Submit">
    </div>
  </form>

    
</div>


  

</div>

</body>
<script type="text/javascript">
  footnoteLoad();
</script>
</html>
