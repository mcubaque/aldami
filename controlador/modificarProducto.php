<?php
session_start();
extract($_POST); 
require "../modelo/conexion.php";
require "../modelo/productos.php";

$objEmpleado= new Productos();
$objEmpleado->crearProducto($_POST['prodid'], $_POST['provid'], $_POST['prodmarca'], $_POST['prodgenero'], $_POST['prodprecio'], $_POST['prodcolor'], $_POST['prodescripcion']);
$resultado = $objEmpleado->modificarProducto();


if ($resultado)
	header ("location:../Vista/productos.php");
else
	header ("location:../Vista/index2.php?pag=insertarMedico&msj=2");


?>


