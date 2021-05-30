
<?php
	require "fpdf.php";

include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];


    class myPDF extends FPDF{
        function header(){
            $this->Image('logo.png',10,6);
            $this->SetFont('Arial','B',18);
            $this->Cell(276,7,'Medicine-i-Shop',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
			$this->Cell(276,6,'Ananda Road, Mirpur-14',0,0,'C');
			$this->Ln();
            $this->SetFont('Times','',12);
			$this->Cell(276,6,'Dhaka, Bangladesh',0,0,'C');
			$this->Ln();
            $this->SetFont('Times','',12);
			$this->Cell(276,6,'Contact: 0170000000',0,0,'C');
			$this->Ln(20);



			$this->SetFont('Times','',12);
			$this->Cell(260,6,'Website: www.medicine.com',0,0,'R');
			$this->Ln();
            $this->SetFont('Times','',12);
			$this->Cell(260,6,'Email: medicine@gmail.com',0,0,'R');
			$this->Ln();
            $this->SetFont('Times','',12);
			$this->Cell(260,6,'Hotline: 2626',0,0,'R');
			$this->Ln(20);
            

        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

		}
		function headerTable(){
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,'Order Id',1,0,'C');
			$this->Cell(35,10,'Customer Name',1,0,'C');
			$this->Cell(30,10,'Product ID',1,0,'C');
			$this->Cell(50,10,'Product Tile',1,0,'C');
			$this->Cell(30,10,'Amount(tk)',1,0,'C');
			$this->Cell(40,10,'Invoice No',1,0,'C');
			$this->Cell(30,10,'Quantity(kg)',1,0,'C');
			$this->Cell(40,10,'Order Status',1,0,'C');
			$this->Ln();	
		}

	
		

		
		function viewTable($con){
			$this->SetFont('Times','',12);
			if(isset($_GET['order_id'])){
                $order_id=$_GET['order_id'];
                $get_product="select * from customer_order where order_id='$order_id'";
                $run_product=mysqli_query($con, $get_product);
                $data=mysqli_fetch_array($run_product);
				
				$this->Cell(20,10,$data['order_id'],1,0,'C');
				$this->Cell(35,10,$data['customer_name'],1,0,'C');
				$this->Cell(30,10,$data['product_id'],1,0,'C');
				$this->Cell(50,10,$data['p_title'],1,0,'C');
				$this->Cell(30,10,$data['due_amount'],1,0,'C');
				$this->Cell(40,10,$data['invoice_no'],1,0,'C');
				$this->Cell(30,10,$data['qty'],1,0,'C');
				$this->Cell(40,10,$data['order_status'],1,0,'C');
				$this->Ln(20);

				$this->Cell(40,10,'Total Amount(tk) : ',0,0,'C');

				$this->Cell(40,10,  $data['due_amount'],1,0,'C');
				$this->Ln(20);
			$this->SetFont('Times','',12);
				$this->Cell(276,10,'Thanks for Your Business- Medicine',0,0,'C');
			$this->Ln(20);
			}
			
			
			

		}
	}
	

	


    $pdf = new myPDF();
    $pdf->AliasNbPages();
	$pdf->AddPage('L','A4','0');
	$pdf->headerTable('C','A4','0');
	
	$pdf->viewTable($con,'C','A4','0');
	$pdf->Output();
}

?>

