<?php
session_start();
extract ($_POST);
require "../modelo/conexion.php";
require "../modelo/cliente.php";
$objCliente=new Clientes();
$objCliente->crearCliente($_POST['clienumerodoc'], $_POST['clienombre'], $_POST['clieapellido'], $_POST['clieemail'], $_POST['cliedireccion'], $_POST['cliefechanacimiento'], $_POST['ciudad']);
$resultado=$objCliente->eliminarCliente();

if($resultado){

	header("location:../vista/clientes.php?pag=eliminarCliente&msj=1");

}
else{
	header("location:../vista/index2.php");
}


?>
