<script type="text/javascript" src="sales.js"></script>
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
/*
</style>
<form>

<table id="table_add_new_customer" style="margin-left: 23%;">
  
  <tr height="30">
    <td>Full Name:</td>
    <td><input class="input" type="text" name="full_name" id="full_name" size="40" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" required/>
  </td>
      <td>Contact No.: </td>
    <td>
  <input class="input" type="text" name="phone_no" id="phone_no" class="tel" autocomplete="off"/>
  &nbsp;&nbsp;&nbsp;&nbsp;
  </td>
  </tr>

  <tr height="30">
    <td>Address:</td>
    <td><textarea class="input" name="address" id="address" rows="3" cols="50" style="resize:none;" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off"></textarea></td>
  </tr>
</table>

<br>
<table id="table_add_new_customer" style="margin-left: 23%;">

    <tr align="center">
      <th><b>Right Vision</b></th>
      <th>Sph</th>
      <th>Cyl</th>
      <th>Axis</th>
      <th>Vision</th>
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
</table>

<table id="table_add_new_customer" style="margin-left: 23%;">
    <tr align="center">
      <th><b>Left Vision</b></th>
      <th>Sph</th>
      <th>Cyl</th>
      <th>Axis</th>
      <th>Vision</th>
    </tr>

    <tr>
      <td>Distance</td>
       <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_sph" id="left_d_sph"/></td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_cyl" id="left_d_cyl"/></td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_axis" id="left_d_axis"/></td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_vision" id="left_d_vision"/></td>
    </tr>
  &nbsp;
  &nbsp;
    <tr>
      <td>Reading</td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_sph" id="left_r_sph"/></td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_cyl" id="left_r_cyl"/></td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_axis" id="left_r_axis"/></td>
      <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_vision" id="left_r_vision"/></td>
    </tr>
</table>

&nbsp;
  &nbsp;

<table id="table_add_new_customer" style="margin-left: 23%;">
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
                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_in" id="decenter_in" autocomplete="on"/></td>

                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_out" id="decenter_out" autocomplete="on"/></td>
                
                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_rv" id="seg_height_rv" autocomplete="on"/></td>

                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_lv" id="seg_height_lv" autocomplete="on"/></td>
                
                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_rv" id="base_rv" autocomplete="on"/></td>

                <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_lv" id="base_lv" autocomplete="on"/></td>
              
              </tr>
          </table>

<table style="margin-left: 23%;">
 <tr height="30">
    <td>Lense:</td>
    <td>
  <input class="input" type="text" name="lense" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" id="lense" autocomplete="on" />
  &nbsp;&nbsp;&nbsp;&nbsp;
  </td>
 </tr>

   <tr>
    <td>Frame:</td>
    <td><input type="text" size="47" name="frame" id="frame" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/></td>
  </tr>

  <tr height="30">
    <td>Remarks:</td>
    <td>
  <input class="input" type="text" name="remarks" id="remarks" autocomplete="on" />
  &nbsp;&nbsp;&nbsp;&nbsp;
  </td>
 </tr>

 </table><br/>
 <table width="95%" border="0" cellspacing="0" cellpadding="4" align="center">
      <tr>
    <td align="center">
            &nbsp;
            <input type="button" name="next" class="next-btn" width="93" height="25" value="Next" onclick="salesLoad()"/>
    </td>
      </tr>
    </table>
</form>