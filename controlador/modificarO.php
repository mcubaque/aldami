<?php
session_start();
extract($_POST); 
require "../Modelo/conexion.php";
require "../Modelo/productos.php";

$objMedico= new Productos();

$objMedico->crearPoducto($_POST['prodid'],$_POST['provid'],$_POST['prodmarca'],$_POST['prodgenero'],$_POST['prodprecio'],$_POST['prodcolor'],$_POST['prodescripcion']);

$resultado = $objMedico->modificarProducto();
if ($resultado)
	header ("location:../Vista/agregar_producto.php?pag=insertarMedico&msj=1");
else
	header ("location:../Vista/index2.php?pag=insertarMedico&msj=2");

?>
