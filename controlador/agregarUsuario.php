<?php
session_start();
extract ($_POST);
require "../Modelo/conexion.php";
require "../Modelo/usuario.php";
$objUsuario=new Usuarios();
$objUsuario->crearUsuario($_POST['id_usuario'],$_POST['email'],$_POST['password'],$_POST['tipo_usuario']);
$resultado=$objUsuario->agregarUsuario();
if ($resultado) 
	header("location:../Vista/usuarios.php?pag=insertarMedico&msj=1");
else
	header("location:../Vista/index2.php?pag=insertarMedico&msj=2");



