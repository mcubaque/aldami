<?php
session_start();
extract($_POST); 
require "../Modelo/conexion.php";
require "../Modelo/cliente.php";

$objCliente= new Clientes();

$objCliente->crearCliente($_POST['clienumerodoc'],$_POST['clienombre'],$_POST['clieapellido'],$_POST['clieemail'],$_POST['cliedireccion'],$_POST['cliefechanacimiento'],$_POST['ciudad']);

$resultado = $objCliente->modificarCliente();
if ($resultado)
	header ("location:../Vista/clientes.php");
else
	header ("location:../Vista/index2.php?pag=insertarMedico&msj=2");

?>
