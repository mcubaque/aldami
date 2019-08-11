<?php
require('fpdf/fpdf.php');
require('../modelo/conexion.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('img/logoAldami.PNG' , 10 ,8, 10 , 13,'');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'INFORME DE PRODUCTOS DISPONIBLES', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE PRODUCTOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 8, 'ID_Producto', 0);
$pdf->Cell(30, 8, 'ID_Proveedor', 0);
$pdf->Cell(25, 8, 'Marca', 0);
$pdf->Cell(25, 8, 'Genero', 0);
$pdf->Cell(25, 8, 'Precio', 0);
$pdf->Cell(25, 8, 'Color', 0);
$pdf->Cell(25, 8, 'Descripcion', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$sentencia="SELECT * FROM producto";
$resultado=Conectarse()->query($sentencia) or die (mysqli_error(Conectarse()));

while ($filas=$resultado->fetch_assoc()) {
	
	$pdf->Cell(30, 8,$filas['prodid'], 0);
	$pdf->Cell(30, 8, $filas['provid'], 0);
	$pdf->Cell(25, 8, $filas['prodmarca'], 0);
	$pdf->Cell(25, 8, $filas['prodgenero'], 0);
	$pdf->Cell(25, 8, $filas['prodprecio'], 0);
	$pdf->Cell(25, 8, $filas['prodcolor'], 0);
	$pdf->Cell(25, 8, $filas['prodescripcion'], 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
$pdf->Output();
?>