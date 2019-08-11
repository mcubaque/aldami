<?php
session_start();
extract($_POST); 
require "../modelo/conexion.php";
require "../modelo/empleado.php";

$objEmpleado= new Empleado();
$objEmpleado->crearEmpleado($_POST['emplenumerodoc'],$_POST['emplenombre'],$_POST['empleapellido'],$_POST['emplecargo'],$_POST['empleemail'],$_POST['empletelefono']);
$resultado = $objEmpleado->modificarEmpleado();


if ($resultado)
	header ("location:../Vista/modificar_empleado.php?idEmpleado=idEmpleado&msj=1");
else
	header ("location:../Vista/index2.php?pag=insertarMedico&msj=2");

?>
