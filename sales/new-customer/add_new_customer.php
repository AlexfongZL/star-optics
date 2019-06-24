<script type="text/javascript" src="sales.js"></script>
<style type="text/css">

  *{
box-sizing: border-box;
}

.data-div {
display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
flex: 100%;
padding: 5px;
}

td{
 padding: 2.8px;
 text-align: right;
}
.fieldset-side{
      -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin:0;
    float: left;
}


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
/*
</style>

<!--
  _   __                _____            _
 | \ | |               |     \          (_)            
 |  \| | _____      __ | |  | | ___  ___ _  __ _ _ __  
 | . ` |/ _ \ \ /\ / / | |  | |/ _ \/ __| |/ _` | '_ \ 
 | |\  |  __/\ V  V /  | |__| |  __/\__ \ | (_| | | | |
 |_| \_|\___| \_/\_/   |_____/ \___||___/_|\__, |_| |_|
                                            __/ |      
                                           |___/  -->
<div class="data-div">
<div class="column" style="border-right: 2px solid red;">
  <h3><p><b><u>Add New Customer for Sales</u></b></p></h3>
  <form action="action.php" method="POST">
        

         <fieldset><legend><h4>Personal Information</h4></legend>
            <table border="0" cellspacing="0" cellpadding="1" style="font-family:Arial, Helvetica, sans-serif; font-size:18px;padding-top:10px;padding-left:15px;padding-bottom:15px;">
            <tr height="30">
            <td>Customer Name</td>
            <td>:</td>
            <td><input class="input" type="text" name="full_name" id="full_name" size="51" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" required/>
          </td>
          </tr>

          <tr height="30">
            <td>Customer Address</td>
            <td>:</td>
            <td><textarea class="input" name="address" id="address" rows="3" cols="40" style="resize:none;" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off"></textarea></td>
          </tr>
          
          <tr height="30">
            <td>Customer Contact no.</td>
            <td>:</td>
            <td>
          <input class="input" type="text" name="phone_no" id="phone_no" class="tel" autocomplete="off" size="51"/>
          </td>
          </tr>
          </table>
         </fieldset> 
      
         <fieldset><legend><h4>Vision Information</h4></legend>
          <table>
            <tr><td><b><u>Right Vision</u></b></td></tr>
            <tr align="center">
            <td><b></b></td>
            <td>Sph</td>
            <td>Cyl</td>
            <td>Axis</td>
            <td>Vision</td>
          </tr>

          <tr>
            <td>Distance</td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_sph" id="right_d_sph"/></td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_cyl" id="right_d_cyl"/></td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_axis" id="right_d_axis"/></td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_vision" id="right_d_vision"/></td>
          </tr>

          <tr>
            <td>Reading</td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_sph" id="right_r_sph"/></td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_cyl" id="right_r_cyl"/></td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_axis" id="right_r_axis"/></td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_vision" id="right_r_vision"/></td>
          </tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td><b><u>Left Vision</u></b></td></tr>
          <tr align="center">
          <td><b></b></td>
          <td>Sph</td>
          <td>Cyl</td>
          <td>Axis</td>
          <td>Vision</td>
        </tr>

        <tr>
          <td>Distance</td>
           <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_sph" id="left_d_sph"/></td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_cyl" id="left_d_cyl"/></td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_axis" id="left_d_axis"/></td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_vision" id="left_d_vision"/></td>
        </tr>

        <tr>
          <td>Reading</td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_sph" id="left_r_sph"/></td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_cyl" id="left_r_cyl"/></td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_axis" id="left_r_axis"/></td>
          <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_vision" id="left_r_vision"/></td>
        </tr>
          </table>

         </fieldset>

</div>

<div class="column">
  <fieldset class="fieldset-side" style="width: 30%;"><legend><h4>Decenter</h4></legend>
    <table>
      <tr>
        <td>In</td>
        <td>Out</td>
      </tr>

      <tr>
        <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_in" id="decenter_in" autocomplete="on"/></td>

        <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_out" id="decenter_out" autocomplete="on"/></td>
      </tr>
    </table>
  </fieldset>

  <fieldset  class="fieldset-side" style="width: 30%;"><legend><h4>Segment Height</h4></legend>
    <table>
      <tr>
         <td>RV</td>
          <td>LV</td>
      </tr>

      <tr>
        <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_rv" id="seg_height_rv" autocomplete="on"/></td>

          <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_lv" id="seg_height_lv" autocomplete="on"/></td>
      </tr>
    </table>
  </fieldset>

  <fieldset style="width: 30%;"><legend><h4>Base</h4></legend>
    <table>
      <tr>
        <td>RV</td>
          <td>LV</td>
      </tr>

      <tr>
        <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_rv" id="base_rv" autocomplete="on"/></td>

        <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_lv" id="base_lv" autocomplete="on"/></td>
      </tr>
    </table>
  </fieldset>

  <fieldset><legend><h4>Extra Information</h4></legend>
    <table>
      <td>Lense</td>
      <td>:</td>
    <td>
      <input class="input" type="text" size="51" name="lense" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" id="lense" autocomplete="on" />
  </td>
 </tr>

   <tr>
    <td>Frame</td>
    <td>:</td>
    <td>
      <input class="input" type="text" size="51" name="frame" id="frame" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/></td>
  </tr>

  <tr height="30">
    <td>Remarks</td>
    <td>:</td>
    <td>
      <textarea class="input" type="text" name="remarks" id="remarks" rows="3" cols="40" style="resize:none;" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off"></textarea>
  </td>
 </tr>
    </table>
  </fieldset>

    <table border="0" cellspacing="0" cellpadding="4" align="center">
      <tr>
    <td align="right">
      <input type="button" class="back-btn" value="Back" width="93" height="25" onclick="window.location.href='../index.php'"/>
            &nbsp;
            <input type="button" name="submit_add_cus" class="submit-btn" width="93" height="25" value="Next" onclick="salesLoad()"/>
    </td>
      </tr>
    </table>
</div>
</div>
