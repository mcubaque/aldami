<?php
session_start();
extract ($_POST);
require "../modelo/conexion.php";
require "../modelo/cliente.php";
$objCliente=new Clientes();
$objCliente->crearCliente($_POST['clienumerodoc'],$_POST['clienombre'],$_POST['clieapellido'],$_POST['clieemail'],$_POST['cliedireccion'],$_POST['cliefechanacimiento'],$_POST['ciudad']);
$resultado=$objCliente->agregarCliente();


//si esta definido cliepass y usuariocliente quiere decir que se esta registrando un cliente, se insertan datos de login //en la tabla usuarios
if(isset($_POST['cliepass']) and isset($_POST['tipo_usuario'])){
	require "../Modelo/usuario.php";
	$objUsuario=new Usuarios();
	$objUsuario->crearUsuario($_POST['id_usuario'],$_POST['clieemail'],$_POST['cliepass'],$_POST['tipo_usuario']);

	$resultado2=$objUsuario->agregarUsuario();
	
	header("location:../index.php?msj=1");
	
}else{

	if ($resultado){ 
		header("location:../vista/clientes.php");
	}else{
		header("location:../vista/index2.php?pag=insertarMedico&msj=2");
	}


}
