<?php 
eliminarUsuario($_GET['id_usuario']);
function eliminarUsuario($id_usuario){
	include "../modelo/conexion.php";
	$sentencia = "DELETE FROM usuarios WHERE id_usuario = '".$id_usuario."' ";
	Conectarse()->query($sentencia) or die("Error al eliminar los datos".mysqli_error($conexion));
}
?>

 <script type="text/javascript">
 	alert("Usuario Eliminado Exitosamente");
 	window.location.href = "listaUsuarios.php";
 </script>