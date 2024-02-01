<?php
require('fpdf.php');
include("connection.php"); 
$output = '';
$sql = 'SELECT * FROM clients';
$result = mysqli_query($conn, $sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont("Arial");
$pdf->SetTextColor(255,0,0);
$pdf->SetFillColor(0,255,0);
$pdf->Cell(0,10,"Information Technology",1,1,"C",true);
$pdf->Cell(0,10," ",0,1,"C");
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(0,10,"user table",1,1,"C",true);
$pdf->Cell(0,10," ",0,1,"C");
//Table header
$pdf->SetFillColor(150,150,150);
$pdf->Cell(10,10,"id",1,0,"C",true);
$pdf->Cell(40,10,"First name",1,0,"C",true);
$pdf->Cell(40,10,"Last name",1,0,"C",true);
$pdf->Cell(40,10,"User name",1,0,"C",true);
$pdf->Cell(60,10,"Last login",1,1,"C",true);

//Table body
$pdf->SetFillColor(255,255,255);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$pdf->Cell(10,10,"{$row["user_id"]}",1,0,"C",true);
	$pdf->Cell(40,10,"{$row["first_name"]}",1,0,"C",true);
	$pdf->Cell(40,10,"{$row["last_name"]}",1,0,"C",true);
	$pdf->Cell(40,10,"{$row["user"]}",1,0,"C",true);
	$pdf->Cell(60,10,"{$row["last_login"]}",1,1,"C",true);
}





$pdf->output();
?>