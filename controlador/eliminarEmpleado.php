<?php
session_start();
extract ($_POST);
require "../modelo/conexion.php";
require "../modelo/empleado.php";

		$objEmpleado=new Empleado();
		$objEmpleado->crearEmpleado($_POST['emplenumerodoc'],$_POST['emplenombre'],$_POST['empleapellido'],$_POST['emplecargo'],$_POST['empleemail'],$_POST['empletelefono']);
		$resultado=$objEmpleado->eliminarEmpleado();
		if ($resultado) {
			header("location:../vista/empleados.php?pag=insertarProveedor&msj=1");
			
		}else{
			header("location:../vista/index2.php?pag=insertarProveedor&msj=2");
		}
	


?>