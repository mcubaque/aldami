<?php 
eliminarProducto($_GET['prodid']);
function eliminarProducto($prodid){
	include "../modelo/conexion.php";
	$sentencia = "DELETE FROM producto WHERE prodid = '".$prodid."' ";
	Conectarse()->query($sentencia) or die("Error al eliminar los datos".mysqli_error($conexion));
}
?>

 <script type="text/javascript">
 	alert("Producto Eliminado Exitosamente");
 	window.location.href = "productos.php";
 </script>