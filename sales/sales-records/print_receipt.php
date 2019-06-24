<?php
	include '../../include/fpdf/fpdf.php';
	include '../../include/connection.php';

	$receipt_id = $_GET['id'];

    $purchase_q = mysqli_query($con,"SELECT * FROM purchase WHERE receipt_id = '$receipt_id' ORDER BY prod_id");
    $purchase = mysqli_fetch_array($purchase_q);

    $cus_id = $purchase['cus_id'];
    $receipt_no = $purchase['receipt_id'];

    $receipt_q = mysqli_query($con,"SELECT receipt_date FROM receipt WHERE receipt_id = '$receipt_id'");
    $receipt = mysqli_fetch_array($receipt_q);
    $receipt_date = $receipt['receipt_date'];


	$pdf = new FPDF('p','mm','A4');

	$pdf-> AddPage();

	$pdf->SetFont('Arial','B',14);

	

	// Header
	$pdf->Image('../../img/star_optics_logo.png',10,10,-700);
	$pdf->Cell(130,25,'',0,1);

	$pdf->Cell(130,5,'STAR OPTICS',0,0);
	$pdf->Cell(59,5,'RECEIPT',0,1);

	//details
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(130,5,'Faculty of Computer Science & Information Technology,',0,0);
	$pdf->Cell(59,5,'Date:'.$receipt_date,0,1);

	
	$pdf->Cell(130,5,'Universiti Malaysia Sarawak 94300 Kota Samarahan,',0,1);
	

	$pdf->Cell(130,5,'Sarawak, Malaysia',0,1);

	//just a big blank place yoo
	$pdf->Cell(189,10,'',0,1);

	// customer details
	$pdf->SetFont('Arial','',13);
	$pdf->Cell(130,5,'Receipt No.:'.$receipt_no,0,1);
	$pdf->Cell(130,10,'',0,1);
	$pdf->Cell(130,5,'Customer ID: '.$cus_id,0,1);

	$cus_q = mysqli_query($con,"SELECT * FROM customer_details WHERE cus_id = '$cus_id'");
	$cus = mysqli_fetch_array($cus_q);
	$cus_name = $cus['full_name'];
	//just a big blank place yoo
	$pdf->Cell(130,10,'',0,1);
	
	$pdf->Cell(130,5,'Customer Name: '.$cus_name,0,1);

	//just a big blank place yoo
	$pdf->Cell(189,10,'',0,1);

	$pdf->Cell(90,10,'Item ',1,0);
	$pdf->Cell(10,10,'Qty ',1,0);
	$pdf->Cell(22,10,'Amt (RM)',1,0);
	$pdf->Cell(20,10,'Disc (%) ',1,0);
	$pdf->Cell(43,10,'Amt after disc(RM)',1,1);

	$total = 0;
	$purchase_q2 = mysqli_query($con,"SELECT * FROM purchase WHERE receipt_id = '$receipt_id'");
	while($purchase2 = mysqli_fetch_array($purchase_q2)){
		$pdf->Cell(90,10,$purchase2['prod_id'],1,0);
		$pdf->Cell(10,10,$purchase2['prod_quantity'],1,0);

		
		$prod_id = $purchase2['prod_id'];

		$purchase_q3 = mysqli_query($con,"SELECT selling_price FROM inventory WHERE prod_id = '$prod_id'");
		$purchase3 = mysqli_fetch_array($purchase_q3);
		$selling_price = $purchase3['selling_price']*$purchase2['prod_quantity'];

		$pdf->Cell(22,10,$selling_price,1,0);
		$pdf->Cell(20,10,$purchase2['prod_discount'],1,0);

		// calculate discount yo
		$price_after_discount = $selling_price - ($selling_price*($purchase2['prod_discount']/100));

		$pdf->Cell(43,10,$price_after_discount,1,1);
		$total=$total +$price_after_discount;
	}

		$pdf->Cell(189,10,'',0,1);

		$pdf->Cell(90,10,'TOTAL:',0,0);
		$pdf->Cell(10,10,'',0,0);
		$pdf->Cell(22,10,'',0,0);
		$pdf->Cell(20,10,'',0,0);
		$pdf->Cell(43,10,$total,0,1);

	$pdf->Output();
?>