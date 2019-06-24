<?php
	include '../../include/connection.php';
	include 'count_number.php';

	if(isset($_POST['month_one']) && !empty($_POST['month_one'])){
		$month_one = $_POST['month_one'];
		echo $month_one;
	}
	if(isset($_POST['month_two']) && !empty($_POST['month_two'])){
		$month_two = $_POST['month_two'];
		echo $month_two;
	}
	if(isset($_POST['month_three']) && !empty($_POST['month_three'])){
		$month_three = $_POST['month_three'];
		echo $month_three;
	}
	if(isset($_POST['month_four']) && !empty($_POST['month_four'])){
		$month_four = $_POST['month_four'];
	}
	if(isset($_POST['month_five']) && !empty($_POST['month_five'])){
		$month_five = $_POST['month_five'];
	}
	//echo $month_one;

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sales Chart</title>
<link href="../../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../../include/javascript/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../main.js">

</script><script src="asset/TableFilter/tablefilter_all_min.js"></script>
<link rel="stylesheet" href="asset/TableFilter/filtergrid.css">
<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="asset/datatables/jquery.dataTables.min.css">
<script src="asset/jquery.min.js"></script>
<script src="asset/datatables/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="asset/fonts/font-awesome.min.css">
<link rel="stylesheet" href="asset/metisMenu.min.css">
<link rel="stylesheet" href="asset/sb-admin-2.css">
<link rel="stylesheet" href="asset/chosen-select/chosen.css">
<script src="asset/fonts/fontawesome-webfont.woff2"></script>
<script src="asset/dataTables.bootstrap.min.js"></script>
<script src="asset/pie/anychart-base.min.js"></script>
<script src="asset/column/anychart-base.min.js"></script>
</head>

<script type="text/javascript">
	function showGraph(){
		var month = ["1","2","3","4","5","6","7","8","9","10","11","12"];
		var month_name = ["January","February","March","April","May","June","July","August","September","October","November","December"];

		var today = new Date();
		var mm = today.getMonth() + 1;
		var year = today.getFullYear();

		var current_month_arr = 0;
		var months_for_query = [];

		for(var x = 0;x<12;x++){
			if(month[x] == mm){
				//assign a value to current_month_array for later use
				current_month_arr = x;
			}
		}

		for(var y = 0; y < 5; y++){
			var z = y+1;
			var month = current_month_arr - z;

			if(month == -1){
				month = 11;
			}
			if(month == -2){
				month = 10;
			}
			if(month == -3){
				month = 9;
			}
			if(month == -4){
				month = 8;
			}
			if(month == -5){
				month = 7;
			}

			months_for_query.push(month);
			console.log('month: ',month);
		}

		$.ajax({
		        type: 'POST',
		        data: {
		        	'month_one' : month_name[months_for_query[4]],
		        	'month_two': month_name[months_for_query[3]],
		        	'month_three': month_name[months_for_query[2]],
		        	'month_four': month_name[months_for_query[1]],
		        	'month_five' : month_name[months_for_query[0]]
		        },
		        url: 'sales-chart.php',
		        success: function (response) {
		        	//find how to reload the chart-div, because the variables is in the div
		        	//$('#chart-div').html(response);
		        	console.log('Ajax successfull!');

		            var data1 = anychart.data.set([
		                [month_name[months_for_query[4]], <?php echo count_sales();?>],
		                [month_name[months_for_query[3]], <?php echo count_sales();?>],
		                [month_name[months_for_query[2]], <?php echo count_sales();?>],
		                [month_name[months_for_query[1]], <?php echo count_sales();?>],
		                [month_name[months_for_query[0]], <?php echo count_sales();?>]
		            ]);

		            // map the data
		            var seriesData_1 = data1.mapAs({x: 0, value: 1, fill: 3, stroke: 5, label: 6});
		            //var seriesData_2 = data1.mapAs({x: 0, value: 2, fill: 4, stroke: 5, label: 6});
		            // create a chart
		            var chart = anychart.column();

		            // create a column series and set the data
		            var series1 = chart.column(seriesData_1);
		            series1.name("Sales (RM)");
		            // set the chart title
		            chart.title("Sales for the past 5 months");

		            // set the titles of the axes
		            chart.xAxis().title("Month");
		            chart.yAxis().title("Sales (Rm)");

		            // set the container id
		            chart.container("chart-div");

		            // initiate drawing the chart
		            chart.draw();

		            chart.labels().fontSize(16);
		            chart.labels(true);

		            chart.background().fill({
		                keys: ["#eeeeee"],
		            });

		    },
		        error: function(){
		            console.log('Ajax Error');
		        }
		    });


        /*anychart.onDocumentReady(function(){
		    


            var data1 = anychart.data.set([
                [month_name[months_for_query[4]], <?php //echo count_sales();?>],
                [month_name[months_for_query[3]], <?php //echo count_sales();?>],
                [month_name[months_for_query[2]], <?php //echo count_sales();?>],
                [month_name[months_for_query[1]], <?php //echo count_sales();?>],
                [month_name[months_for_query[0]], <?php //echo count_sales();?>]
            ]);

            // map the data
            var seriesData_1 = data1.mapAs({x: 0, value: 1, fill: 3, stroke: 5, label: 6});
            //var seriesData_2 = data1.mapAs({x: 0, value: 2, fill: 4, stroke: 5, label: 6});
            // create a chart
            var chart = anychart.column();

            // create a column series and set the data
            var series1 = chart.column(seriesData_1);
            series1.name("Sales (RM)");
            // set the chart title
            chart.title("Sales for the past 5 months");

            // set the titles of the axes
            chart.xAxis().title("Month");
            chart.yAxis().title("Sales (Rm)");

            // set the container id
            chart.container("chart-div");

            // initiate drawing the chart
            chart.draw();

            chart.labels().fontSize(16);
            chart.labels(true);

            chart.background().fill({
                keys: ["#eeeeee"],
            });
        });*/
	}
</script>

<body>
<span style="text-align: left"></span><span style="text-align: center"></span><span style="text-align: left"></span><span style="text-align: center"></span><span style="color: #0E008F"></span><span style="color: #85600A"></span><span style="color: #BA5300"></span>
<div class="main-div">
  <div class="menu-div" id="menu-div">
	  <input type="button" class="menu-button" value="Home" onclick="location.href='../../home.html'">
    <input type="button" class="menu-button selected-button" value="Sales" onclick="location.href='../../sales'">
    <input type="button" class="menu-button" value="Customer" onclick="location.href='../../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../../inventory/'">
  <input type="button" class="menu-button" value="Supplier" onclick="location.href='../../supplier/'"></div>

<div class="clock">
	<iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

	<div class="data-div"><br/>
			<?php
				if(isset($_POST['month_one']) && !empty($_POST['month_one'])){
					$month_one = $_POST['month_one'];
					echo $month_one;
				}
				if(isset($_POST['month_two']) && !empty($_POST['month_two'])){
					$month_two = $_POST['month_two'];
					echo $month_two;
				}
				if(isset($_POST['month_three']) && !empty($_POST['month_three'])){
					$month_three = $_POST['month_three'];
					echo $month_three;
				}
				if(isset($_POST['month_four']) && !empty($_POST['month_four'])){
					$month_four = $_POST['month_four'];
				}
				if(isset($_POST['month_five']) && !empty($_POST['month_five'])){
					$month_five = $_POST['month_five'];
				}
			?>

		<div id="chart-div"></div>
	</div>
</div>
</body>

<script>
	footnoteLoad();
	showGraph();
</script>
</html>
