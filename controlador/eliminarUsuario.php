<?php
session_start();
extract ($_POST);
require "../modelo/conexion.php";
require "../modelo/usuario.php";
$objUsuario=new Usuarios();
$objUsuario->crearUsuario($_POST['id_usuario'], $_POST['email'], $_POST['password'], $_POST['tipo_usuario']);
$resultado=$objUsuario->eliminarUsuario();

if($resultado){

	header("location:../vista/listaUsuarios.php?pag=eliminarUsuario&msj=1");

}
else{
	header("location:../vista/index2.php");
}


?>
