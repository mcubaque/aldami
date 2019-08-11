<?php 
modificarProducto($_POST['prodid'], $_POST['provid'], $_POST['prodmarca'], $_POST['prodgenero'], $_POST['prodprecio'], $_POST['prodcolor'], $_POST['prodescripcion']);
function modificarProducto($prodid, $provid, $prodmarca, $prodgenero, $prodprecio, $prodcolor, $prodescripcion){
	include "../modelo/conexion.php";
	$sentencia = "UPDATE producto SET prodid = '".$prodid."', provid = '".$provid."', prodmarca = '".$prodmarca."', prodgenero = '".$prodgenero."', prodprecio = '".$prodprecio."', prodcolor = '".$prodcolor."', prodescripcion = '".$prodescripcion."' WHERE prodid = '".$prodid."' ";
	Conectarse()->query($sentencia) or die("Error al ingresar los datos".mysqli_error($conexion));
}
?>

 <script type="text/javascript">
 	alert("Producto Modificado Exitosamente");
 	window.location.href = "productos.php";
 </script>