<?php
session_start();
extract ($_POST);
require "../Modelo/conexion.php";
require "../Modelo/productos.php";
$objProducto=new Productos();
$objProducto->crearPoducto($_POST['prodid'],$_POST['provid'],$_POST['prodmarca'],$_POST['prodgenero'],$_POST['prodprecio'],$_POST['prodcolor'],$_POST['prodescripcion']);
$resultado=$objProducto->agregarProducto();
if ($resultado) 
	header("location:../Vista/agregar_producto.php?pag=insertarMedico&msj=1");
else
	header("location:../Vista/index2.php?pag=insertarMedico&msj=2");



