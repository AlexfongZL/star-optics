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

.edit-btn{
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
.edit-btn:hover {background-color: #3e8e41}

.edit-btn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

/* ---------------------------- */

.back-btn{
    display: inline-block;
      padding: 10px 20px;
      font-size: 20px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: red;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
}
.back-btn:hover {background-color: brown;}

.back-btn:active {
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
<!-- 
  _   _                 _____            _             
 | \ | |               |  __ \          (_)            
 |  \| | _____      __ | |  | | ___  ___ _  __ _ _ __  
 | . ` |/ _ \ \ /\ / / | |  | |/ _ \/ __| |/ _` | '_ \ 
 | |\  |  __/\ V  V /  | |__| |  __/\__ \ | (_| | | | |
 |_| \_|\___| \_/\_/   |_____/ \___||___/_|\__, |_| |_|
                                            __/ |      
                                           |___/ -->
    <div class="data-div">
      
        <div class="column" style="border-right: 2px solid red;">
          <h3>Enter the new item information below</h3>
            <form action="action.php" method="post">
              <fieldset>
                <legend><h4>Basic Information</h4></legend>
                <table>
                <tr>
                  <td>
                    Name: <input value="<?php echo $item["name"]; ?>" type="text" name="item_name" id="item_name" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
                  </td>

                  <td>Brand:<input value="<?php echo $item["brand"]; ?>" type="text" name="item_brand" id="item_brand" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/></td>

                  <td>Type:</td>
                    <td>
                      <input value="<?php echo $item["type"]; ?>" type="text" name="item_type" id="item_type" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
                    </td>
                </tr>

              </table>
              </fieldset>
              
              <!--Name: <input style="" type="text" name="item_name" id="item_name" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>-->
                <fieldset>
                  <legend><h4>Quantity Information</h4></legend>

                  <table>
                    <tr>
                      <td><input type="checkbox" name="checkbox[]" value="singled" id="check_single" <?php if($item["quantity_type"] == 'SINGLED'){echo 'checked="checked"';} ?> disabled="disabled"/>Singled Item<input type="checkbox" name="checkbox[]" value="boxed" id="check_boxed" <?php if($item["quantity_type"] == 'BOXED'){echo 'checked="checked"';} ?> disabled="disabled"/>Boxed Item
                    </tr>

                    <tr>
                      <td>
                        <div id="check_single_div">
                          <table>
                            <tr>
                              <td>
                                Quantity:
                              </td>

                              <td>
                                <input value="<?php echo $item["quantity"]; ?>" type="text" name="item_quantity" id="item_quantity" disabled="disabled"/>
                              </td>
                            </tr>
                          </table>
                          
                        </div>

                        <div id="check_boxed_div">
                          <table>
                            <tr>
                              <td>Number of Boxes:</td>

                              <td>
                                <input value="<?php echo $item["num_of_box"]; ?>" type="text" name="item_box_num" id="item_box_num" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"disabled="disabled"/>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                Number per Boxes:
                              </td>
                              <td>
                                <input value="<?php echo $item["num_per_box"]; ?>" type="text" name="item_num_per_box" id="item_num_per_box" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"disabled="disabled"/>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                Total Quantity: 
                              </td>

                              <td>
                                <input value="<?php echo $item["quantity_box"]; ?>" type="text" name="item_quantity_box" id="item_quantity_box" disabled="disabled"/>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </td>

                      
                    </tr>

                    <tr>
                      <td>
                         <div><br>
                            Minimum Quantity:<input value="<?php echo $item["min_quantity"]; ?>" type="text" name="min_quantity" id="min_quantity" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"disabled="disabled"/>
                        </div>
                      </td>
                    </tr>

                  </table>

                </fieldset>

                <fieldset>
                  <legend><h4>Price Information</h4></legend>
                  <table>
                    

                    <tr>
                      <td>Cost Price/Item:</td>
                      <td><input value="<?php echo $item["cost_price"]; ?>" type="text" name="item_cost_price" id="item_cost_price" disabled="disabled"/></td>
                    </tr>

                    <tr>
                      <td>Sell Price/Item:</td>
                      <td><input value="<?php echo $item["selling_price"]; ?>" type="text" name="item_sell_price" id="item_sell_price" disabled="disabled"/></td>
                    </tr>
                  </table>
                </fieldset>

              
                <br/><br/>
              
                <br/><br/>
              
        </div>

 <div class="column">
        <fieldset>
          <legend><h4>Other Details</h4></legend>

          <table>
            <tr>
              <td>Item-ID</td>
              <td>:</td>
              <td><input value="<?php echo $item["item_id"]; ?>" type="text" name="item_id" id="item_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/></td>
            </tr>

            <tr>
              <td></td>
            </tr>

            <tr>
              <td>Colour 1</td>
              <td>:</td>
              <td>
                <input value="<?php echo $item["colour_1"]; ?>" type="text" name="item_colour_1" id="item_colour_1" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
              </td>

              <td>Colour 2</td>
              <td>:</td>
              <td>
                <input value="<?php echo $item["colour_2"]; ?>" type="text" name="item_colour_2" id="item_colour_2" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
              </td>

              <td>Colour 3</td>
              <td>:</td>
              <td>
                <input value="<?php echo $item["colour_3"]; ?>" type="text" name="item_colour_3" id="item_colour_3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
              </td>

              
            </tr>

            <tr>
              <td></td>
            </tr>

            <tr>
              <td>
                Order ID
              </td>
              <td>:</td>
              <td>
                <input value="<?php echo $item["order_id"]; ?>" type="text" name="item_order_id" id="item_order_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/>
              </td>

              <td>Degree</td>
              <td>:</td>
              <td><input value="<?php echo $item["degree"]; ?>" type="text" name="item_degree" id="item_degree" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" disabled="disabled"/></td>
            </tr>

            <tr>
              <td></td>
            </tr>

            <tr>
              <td>Supplier ID</td>
              <td>:</td>
              <td><input value="<?php echo $item["supp_id"]; ?>" type="text" name="item_supp_id" id="item_supp_id" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" style="width:220px" disabled="disabled"/></td>
            </tr>

            <tr>
              <td></td>
            </tr>

            <tr>
              <td>Remarks</td>
              <td>:</td>
              <td><input value="<?php echo $item["remarks"]; ?>" type="text" name="item_remarks" id="item_remarks" disabled="disabled"/></td>
            </tr>

          </table>
        </fieldset>

        <br><br>
            <input type="button" class="back-btn" name="back" id="back" value="Back" onclick="window.location.href='index.php'">
        
            <input class="edit-btn" type="button" name="edit-btn" id="edit-btn" value="Edit" onclick="window.location.href='edit_inventory.php?id=<?php echo $item['prod_id']; ?>'">
  
        </div>
    </div>
    

    <div id="form-2">
      FORM-2
      <!-- show the barcode image based on the id and shit -->
      

      
    </div>
  </form>

    
</div>


  

</div>

</body>
<script type="text/javascript">
  footnoteLoad();
</script>
</html>
