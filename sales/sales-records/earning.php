<?php
	include '../../include/connection.php';
	include '../../include/functions.php';
?>

<style type="text/css">
	.item_sold:nth-child(even) {background-color: #a5d0ff;}

	th{
      padding: 8px;
      border-bottom: 1px solid #003366;
    }

    #earning_div_1{
    	border-bottom: 5px solid #003366;
    }
</style>

<h4>Date :	<?php 
				$date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
			    $date2 = $date->format('d/m/Y');
			    echo $date2;  
			?></h4>
<div class="earning_div">
<div id="earning_div_1" align="center">
	<table align="center">
		<tr>
			<td align="center"><b>Total Sales</b></td>
			<td>:</td>
			<td style="border: 2px solid;font-size: 17px;padding: 10px;background-color: white;">
				<?php

					$today_date = setDate();
					$query = "SELECT receipt_total FROM receipt WHERE receipt_date = '$today_date' ";
			    	$write = mysqli_query($con, $query);
			    	$sales = 0;

			    	while($result = mysqli_fetch_array($write, MYSQLI_ASSOC)){
			           $sales = $sales + $result['receipt_total'];
			    	}

			       echo 'RM '.$sales;
				?>
			</td>
		</tr>

		<tr>
			<td align="right"><b>Number of transaction(s)</b></td>
			<td>:</td>
			<td style="border: 2px solid;font-size: 17px;padding: 10px;background-color: white;" align="center">
				<?php

					$today_date = setDate();
					$query = "SELECT receipt_total FROM receipt WHERE receipt_date = '$today_date' ";
			    	$write = mysqli_query($con, $query);
			    	$sales = 0;

			    	while($result = mysqli_fetch_array($write, MYSQLI_ASSOC)){
			           $sales++;
			    	}

			       echo $sales;
				?>
			</td>
		</tr>

		<tr></tr>

	</table>
</div>


<h4><u>Item Sold Today</u></h4>
<div>
	<table align="center">

		<tr>
			<th><b>No.</b></th>
			<th><b>Brand</b></th>
			<th><b>Name</b></th>
			<th><b>Selling Price (RM)</b></th>
			<th><b>Discount (%)</b></th>
		</tr>

				<?php
					$counter = 1;
					$today_date = setDate();
					$query = "SELECT * FROM receipt WHERE receipt_date = '$today_date' ";
			    	$write = mysqli_query($con, $query);
			    	$sales = 0;

			    	while($result = mysqli_fetch_array($write, MYSQLI_ASSOC)){
			    		$receipt_id = $result['receipt_id'];
			    		$get_product_id = mysqli_query($con, "SELECT * FROM purchase WHERE receipt_id = '$receipt_id' " );


			    		while($result_product_id = mysqli_fetch_array($get_product_id,MYSQLI_ASSOC)){
			    			//echo '<tr><td>'.$result_product_id['prod_id'] . '</td></tr>';

			    			$prod_id = $result_product_id['prod_id'];
			    			$get_product_info = mysqli_query($con, "SELECT * FROM inventory WHERE prod_id = '$prod_id' " );

			    			while($result_product_infor = mysqli_fetch_array($get_product_info,MYSQLI_ASSOC)){
			    				echo '<tr align="center" class="item_sold"><td style="padding: 10px;">' .$counter. '</td><td>'.$result_product_infor['brand'] .'</td><td>'.$result_product_infor['name'].'</td><td>'.$result_product_infor['selling_price']. '</td><td>'.$result_product_id['prod_discount'].'</td></tr>';
			    				$counter++;
			    			}
			    		}
			    	}

			       //echo $sales;
				?>

	</table>
</div>

</div>

<br><br>
<input type="button" class="back-btn" style="margin-top: 2%;" name="back-button" value="Back" onclick="location.href='../'">