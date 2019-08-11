<?php
session_start();
extract ($_POST);
require "../modelo/conexion.php";
require "../modelo/productos.php";
$objProducto=new Productos();
$objProducto->crearProducto($_POST['prodid'], $_POST['provid'], $_POST['prodmarca'], $_POST['prodgenero'], $_POST['prodprecio'], $_POST['prodcolor'], $_POST['prodescripcion']);
$resultado=$objProducto->eliminarProducto();

if($resultado){

	header("location:../vista/productos.php?pag=eliminarProducto&msj=1");

}
else{
	header("location:../vista/index2.php");
}


?>
