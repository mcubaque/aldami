<?php
function Conectarse()
{
	$objConexion = new mysqli("localhost","root","","aldamidb");
	if ($objConexion->connect_errno)
	{
		echo "Error de conexion a la Base de Datos ".$objConexion->connect_error;
		exit();
	}
	else
	{
		return $objConexion;
	}
}
?>