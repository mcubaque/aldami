<?php
session_start();
extract ($_POST);
require "../modelo/conexion.php";
require "../modelo/proveedor.php";
$objProveedor=new Proveedor();
$objProveedor->crearProveedor($_POST['ProveeId'],$_POST['proveenombre'],$_POST['proveecargocontacto'],$_POST['proveetelefono'],$_POST['proveedireccion']);
$resultado=$objProveedor->eliminarProveedor();

if($resultado){

	header("location:../vista/proveedores.php?pag=eliminarProveedor&msj=1");

}
else{
	header("location:../vista/index2.php");
}


?>

		
