<?php 
nuevoProducto($_POST['prodid'], $_POST['provid'], $_POST['prodmarca'], $_POST['prodgenero'], $_POST['prodprecio'], $_POST['prodcolor'], $_POST['prodescripcion']);
function nuevoProducto($prodid, $provid, $prodmarca, $prodgenero, $prodprecio, $prodcolor, $prodescripcion){
	include "../modelo/conexion.php";
	echo $sentencia = "INSERT INTO producto (prodid, provid, prodmarca, prodgenero, prodprecio, prodcolor, prodescripcion) VALUES ('".$prodid."', '".$provid."', '".$prodmarca."', '".$prodgenero."', '".$prodprecio."', '".$prodcolor."', '".$prodescripcion."')";
	Conectarse()->query($sentencia) or die("Error al ingresar los datos");
}
?>

 <script type="text/javascript">
 	alert("Producto Ingresado Exitosamente");
 	window.location.href = "../vista/productos.php";
 </script>	