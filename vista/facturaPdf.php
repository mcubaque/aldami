<?php
require('fpdf/fpdf.php');
require('../modelo/conexion.php');

$total = isset($_POST['total']) ? $_POST['total'] : "";
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";
$num_fact = mt_rand(1000,9999);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('img/logoAldami.PNG' , 10 ,8, 10 , 13,'');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, 'FACTURA DE VENTA No ' . $num_fact,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Datos del Cliente', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(30, 8, 'Documento', 1,0,'C');
$pdf->Cell(30, 8, 'Nombre', 1,0,'C');
$pdf->Cell(25, 8, 'Apellidos', 1,0,'C');
$pdf->Cell(45, 8, 'Email', 1,0,'C');
$pdf->Cell(25, 8, 'Direccion', 1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

$sentencia="SELECT * FROM cliente LEFT JOIN usuarios on clieemail = email WHERE clieemail = '$id_cliente'";
$resultado=Conectarse()->query($sentencia) or die (mysqli_error(Conectarse()));

while ($filas=$resultado->fetch_assoc()) {
	
	$pdf->Cell(30, 8,$filas['clienumerodoc'], 0);
	$pdf->Cell(30, 8, $filas['clienombre'], 0);
	$pdf->Cell(25, 8, $filas['clieapellido'], 0);
	$pdf->Cell(45, 8, $filas['clieemail'], 0);
	$pdf->Cell(25, 8, $filas['cliedireccion'], 0);
	$pdf->Ln(8);
}

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Detalles del Pedido', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 8, 'Id_Producto', 1,0,'C');
$pdf->Cell(50, 8, 'Marca', 1,0,'C');
$pdf->Cell(25, 8, 'Precio', 1,0,'C');
$pdf->Cell(25, 8, 'Cantidad', 1,0,'C');
$pdf->Cell(25, 8, 'Subtotal', 1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

//CONSULTA
$sentencia="SELECT  prodid, prodmarca, prodprecio, cantidad, cantidad * prodprecio AS subtotal FROM cart_items LEFT JOIN producto ON id_producto = prodid";
$resultado=Conectarse()->query($sentencia) or die (mysqli_error(Conectarse()));

while ($filas=$resultado->fetch_assoc()) {
	
	$pdf->Cell(30, 8,$filas['prodid'], 0);
	$pdf->Cell(50, 8, $filas['prodmarca'], 0);
	$pdf->Cell(25, 8, $filas['prodprecio'], 0,0,'R');
	$pdf->Cell(25, 8, $filas['cantidad'], 0,0,'C');
	$pdf->Cell(25, 8, $filas['subtotal'], 0,0,'R');
	$pdf->Ln(8);
}



$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(130, 8, 'Total', 1);
$pdf->Cell(25, 8, $total, 1,0,'R');

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
$pdf->Output();
?>