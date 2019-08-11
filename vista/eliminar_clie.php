<?php 
eliminarCliente($_GET['clienumerodoc']);
function eliminarCliente($clienumerodoc){
	include "../modelo/conexion.php";
	$sentencia = "DELETE FROM cliente WHERE clienumerodoc = '".$clienumerodoc."' ";
	Conectarse()->query($sentencia) or die("Error al eliminar los datos".mysqli_error($conexion));
}
?>

 <script type="text/javascript">
 	alert("Cliente Eliminado Exitosamente");
 	window.location.href = "clientes.php";
 </script>