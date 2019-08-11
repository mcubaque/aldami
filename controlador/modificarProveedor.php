<?php
session_start();
extract($_POST); 
require "../modelo/conexion.php";
require "../modelo/proveedor.php";

$objProveedor= new Proveedor();
$objProveedor->crearProveedor($_POST['ProveeId'],$_POST['proveenombre'],$_POST['proveecargocontacto'],$_POST['proveetelefono'],$_POST['proveedireccion']);
$resultado = $objProveedor->modificarProveedor();
if ($resultado)
	header ("location:../vista/proveedores.php");
else
	header ("location:../Vista/index2.php?pag=modificarProveedor&msj=2");

?>
